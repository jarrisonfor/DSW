<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoicePdfToClient extends Mailable
{

    use Queueable;
    use SerializesModels;

    public $invoice;
    public $filePath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, $filePath)
    {
        $this->invoice = $invoice;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('invoice.email', ['invoice' => $this->invoice])
        ->subject('Factura ' . $this->invoice->invoiceNumber)
        ->attach($this->filePath);
    }

}
