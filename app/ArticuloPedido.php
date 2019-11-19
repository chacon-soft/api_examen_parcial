<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloPedido extends Model
{
    //
    public $table = 'articulo_pedidos';
    public $primaryKey = 'id';
    public $timestamps = false;
}
