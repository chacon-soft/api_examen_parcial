<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    public $timestamps = false;
    protected $hidden = [
        'pivot',
    ];

    public function cliente() {
        return $this->belongsToMany('App\Cliente');
    }

    public function art_pedido() {
        return $this->hasMany('App\ArticuloPedido');
    }

    public function articulos() {
        return $this->belongsToMany('App\Articulo','articulo_pedidos');
    }
}
