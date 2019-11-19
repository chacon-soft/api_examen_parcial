<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use DB;

class ArticuloController extends Controller
{
    public function mostrarArticulos() {
        $articulos = Articulo::from('articulos as a')
        ->join('articulo_fabricas as af','af.articulo_id','a.id')
        ->select('a.id','a.descripcion', DB::raw('SUM(af.existencias) as Stock'))
        ->groupBy('a.id','a.descripcion')
        ->get();
        return response()->json($articulos, 200);
    }

    public function sumaTotal() {
        $pedidos = Articulo::from('articulos as a')
        ->join('articulo_pedidos as ap','ap.articulo_id','a.id')
        ->select('a.id','a.descripcion', DB::raw('SUM(ap.cantidad) as suma_total'))
        ->groupBy('a.id','a.descripcion')
        ->get();
        return response()->json($pedidos, 200);
    }

    public function promedio() {
        $pedidos = Articulo::from('articulos as a')
        ->join('articulo_pedidos as ap','ap.articulo_id','a.id')
        ->select('a.id','a.descripcion', DB::raw('AVG(ap.cantidad) as promedio'))
        ->groupBy('a.id','a.descripcion')
        ->get();
        return response()->json($pedidos, 200);
    }
}
