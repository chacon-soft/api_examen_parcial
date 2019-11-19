<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabrica extends Model
{
    //
    public $timestamps = false;

    public function art_fabrica() {
        return $this->hasMany('App\ArticuloFabrica');
    }
    public function articulos() {
        return $this->belongsToMany('App\Articulo','articulo_fabricas');
    }
}
