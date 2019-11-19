<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;
use DB;

class DireccionController extends Controller
{
    //
    public function ciudadClientes() {
        // enero a marzo
        $pedidos = Direccion::from('direcciones as d')
        ->join('clientes as c','c.id','d.cliente_id')
        ->select('d.ciudad', DB::raw('COUNT(c.id) as nro_clientes'))
        ->groupBy('d.ciudad')
        ->orderBy('nro_clientes','desc')
        ->first();
        return response()->json($pedidos, 200);
    }
}
