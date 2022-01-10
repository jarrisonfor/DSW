<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\InvoiceRequest as CreateInvoiceRequest;
use App\Http\Requests\Update\InvoiceRequest as UpdateInvoiceRequest;
use App\Mail\SendInvoicePdfToClient;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Lot;
use App\Models\Product;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = Client::find($request->client_id);
        return view('invoice.create', ['client' => $client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $data = $request->validated();
        DB::transaction(function () use ($data): void {
            $client = Client::find($data['client']);
            $totalAmount = 0;
            $invoiceProducts = [];
            foreach ($data['products'] as $product_id => $productData) {
                $product = $client->products()->where('id', $product_id)->first();
                $lot = Lot::find($productData['lot']);
                $sub = $lot->quantity - $productData['invoiceQuantity'];
                Validator::make(['quantity' => $sub], [
                    'quantity' => 'required|numeric|min:0',
                ], ['quantity.min' => 'No hay suficiente stock del producto: ' . $product->name])->validate();
                $lot->quantity = $sub;
                $lot->save();
                $totalAmount += round(($product->pivot->price * $productData['invoiceQuantity']) * (1 + $product->tax / 100), 2);
                $invoiceProducts[$product_id] = [
                    'invoiceQuantity' => $productData['invoiceQuantity'],
                    'productName' => $product->name,
                    'lotName' => $lot->name,
                    'lotExpirationDate' => $lot->expirationDate,
                    'productPrice' => $product->pivot->price,
                    'productSubtotal' => round(($product->pivot->price * $productData['invoiceQuantity']) , 2),
                    'tax' => $product->tax,
                    'productTotal' => round(($product->pivot->price * $productData['invoiceQuantity']) * (1 + $product->tax / 100), 2),
                ];
            }
            $invoice = Invoice::create([
                'client_id'=> $client->id,
                'user_id'=> Auth::user()->id,
                'datetime'=> Carbon::now(),
                'totalAmount'=> $totalAmount,
            ]);
            $invoice->products()->sync($invoiceProducts);
            $this->_generateInvoicePdf($invoice);
        });
        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoice.show', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $products = Product::all();
        $clients = Client::all();
        return view('invoice.edit', ['invoice' => $invoice, 'clients' => $clients, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        abort(403);
        $invoice->update($request->validated());
        return redirect()->route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoice.index');
    }

    public function pdf(Invoice $invoice)
    {
        $file = $invoice->invoiceNumber . '.pdf';
        if (Storage::exists('public/Invoices/' . $file)) {
            return Storage::download('public/Invoices/' . $file, $invoice->client->companyName . ' - ' . $file);
        }
        $pdf = $this->_generateInvoicePdf($invoice);
        return $pdf->download($invoice->client->companyName . ' - ' . $file);
    }

    public function sendInvoiceEmail(Invoice $invoice)
    {
        $file = $invoice->invoiceNumber . '.pdf';
        if (!Storage::exists('public/Invoices/' . $file)) {
            $this->_generateInvoicePdf($invoice);
        }
        if ($invoice->client && $invoice->client->email) {
            Mail::to($invoice->client->email)->send(new SendInvoicePdfToClient($invoice, Storage::path('public/Invoices/' . $file)));
        }
        return redirect()->route('invoice.index');
    }

    private function _generateInvoicePdf(Invoice $invoice)
    {
        $file = $invoice->invoiceNumber . '.pdf';
        $pdf = SnappyPdf::loadView('invoice.pdf', ['invoice' => $invoice]);
        Storage::put('public/Invoices/' . $file, $pdf->output());
        return $pdf;
    }

}
