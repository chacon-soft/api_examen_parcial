<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $timestamps = false;

    public function direcciones() {
        return $this->hasMany('App\Direccion');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Pedido','cliente_pedidos')->with('articulos');
    }
}
