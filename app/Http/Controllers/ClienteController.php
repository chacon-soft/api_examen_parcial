<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function mostrarArticulos() {
        $clientes = Cliente::with('pedidos')
        ->get();
        return response()->json($clientes, 200);
    }

    public function sinPedidos() {
        $clientes = Cliente::from('clientes as c')
        ->leftJoin('cliente_pedidos as cp','cp.cliente_id','c.id')
        ->where('cp.id',null)
        ->select('c.*')
        ->get();
        return response()->json($clientes, 200);
    }

    public function clienteMayorDescuento() {
        $clientes = Cliente::orderBy('descuento','desc')->first();
        return response()->json($clientes, 200);
    }
}
