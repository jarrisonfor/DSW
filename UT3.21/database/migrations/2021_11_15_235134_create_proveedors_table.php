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
            $table->string('nombreCompañía', 100)->nullable();
            $table->string('nombreContacto', 100)->nullable();
            $table->string('cargoContacto', 100)->nullable();
            $table->string('dirección', 100)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('región', 100)->nullable();
            $table->string('códPostal', 5)->nullable();
            $table->string('país', 100)->nullable();
            $table->string('teléfono', 17)->nullable();
            $table->string('fax', 17)->nullable();
            $table->string('páginaPrincipal', 200)->nullable();
            $table->decimal('latitud', 8, 6)->nullable();
            $table->decimal('longitud', 9, 6)->nullable();
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
