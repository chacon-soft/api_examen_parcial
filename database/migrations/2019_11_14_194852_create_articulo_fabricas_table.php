<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloFabricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_fabricas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('existencias')->nullable();

            $table->bigInteger('articulo_id')->unsigned()->nullable();
            $table->foreign('articulo_id')->references('id')
            ->on('articulos')->onDelete('cascade');
            $table->bigInteger('fabrica_id')->unsigned()->nullable();
            $table->foreign('fabrica_id')->references('id')
            ->on('fabricas')->onDelete('cascade');
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
        Schema::dropIfExists('articulo_fabricas');
    }
}
