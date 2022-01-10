<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->foreignId('invoice_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('invoiceQuantity');
            $table->string('productName');
            $table->string('lotName');
            $table->dateTime('lotExpirationDate');
            $table->double('productPrice');
            $table->double('productSubtotal');
            $table->integer('tax');
            $table->double('productTotal');
            $table->primary(['invoice_id', 'product_id', 'lotName']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_product');
    }

}
