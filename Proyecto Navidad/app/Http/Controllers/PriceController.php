<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\PriceRequest as CreatePriceRequest;
use App\Http\Requests\Update\PriceRequest as UpdatePriceRequest;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = Client::find($request->client_id);
        return view('price.index', ['client' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = Client::find($request->client_id);
        return view('price.create', ['client' => $client, 'products' => Product::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePriceRequest $request)
    {
        $client = Client::find($request->client_id);
        foreach($client->products as $product) {
            if ((int)$request->product_id === $product->id) {
                Validator::make($request->all(), [
                    'product_id' => 'required|numeric|max:0',
                ], ['product_id.max' => 'El cliente ya tiene asignado ese producto'])->validate();
            }
        }
        $client->products()->syncWithPivotValues([$request->product_id], ['price' => $request->price], false);
        return $this->index($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('price.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $client = Client::find($request->price);
        foreach($client->products as $product) {
            if ((int)$request->product_id === $product->id) {
                $productPivot = $product;
            }
        }
        return view('price.edit', ['client' => $client, 'product' => $productPivot]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceRequest $request)
    {
        $client = Client::find($request->client_id);
        $client->products()->syncWithPivotValues([$request->product_id], ['price' => $request->price], false);
        return $this->index($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client = Client::find($request->price);
        $client->products()->detach($request->product_id);
        $request->client_id = $request->price;
        return $this->index($request);
    }

}
