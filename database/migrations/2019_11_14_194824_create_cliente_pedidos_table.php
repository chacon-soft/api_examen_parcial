<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')
            ->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('cliente_pedidos');
    }
}
