<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    // protected $table = 'articulos';
    //
    public $timestamps = false;
    protected $hidden = [
        'pivot',
    ];

    public function list() {
        return $this->hasMany('App\Detalle');
    }

    public function art_pedido() {
        return $this->hasMany('App\ArticuloPedido');
    }

    public function art_fabrica() {
        return $this->hasMany('App\ArticuloFabrica');
    }
}
