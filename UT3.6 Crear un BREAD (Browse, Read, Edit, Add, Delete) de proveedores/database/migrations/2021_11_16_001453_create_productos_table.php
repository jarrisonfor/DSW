<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('producto', 40);
            $table->foreignId('proveedor_id')->constrained()->cascadeOnDelete();
            $table->string('cantidad_por_unidad', 20);
            $table->decimal('precio_unidad', 19, 4);
            $table->smallInteger('unidades_existencia');
            $table->smallInteger('unidades_pedido');
            $table->integer('nivel_nuevo_pedido');
            $table->boolean('suspendido');
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
        Schema::dropIfExists('productos');
    }
}
