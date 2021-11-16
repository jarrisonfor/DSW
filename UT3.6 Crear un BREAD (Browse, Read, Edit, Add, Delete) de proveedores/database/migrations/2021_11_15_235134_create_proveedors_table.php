<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompañía', 100);
            $table->string('nombreContacto', 100);
            $table->string('cargoContacto', 100);
            $table->string('dirección', 100);
            $table->string('ciudad', 100);
            $table->string('región', 100);
            $table->string('códPostal', 5);
            $table->string('país', 100);
            $table->string('teléfono', 17);
            $table->string('fax', 17);
            $table->string('páginaPrincipal', 200);
            $table->decimal('latitud', 8, 6);
            $table->decimal('longitud', 9, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
