<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
    public $table = 'direcciones';
    public $timestamps = false;

    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }

    public function pedidos() {
        return $this->hasMany('App\Pedido');
    }
}
