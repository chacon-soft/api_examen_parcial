<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad')->nullable();

            $table->bigInteger('articulo_id')->unsigned()->nullable();
            $table->foreign('articulo_id')->references('id')
            ->on('articulos')->onDelete('cascade');
            $table->bigInteger('pedido_id')->unsigned()->nullable();
            $table->foreign('pedido_id')->references('id')
            ->on('pedidos')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_pedidos');
    }
}
