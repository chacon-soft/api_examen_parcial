<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Direccion;
use DB;

class PedidoController extends Controller
{
    public function buscarPedidosCliente(Request $request) {
        $resultado = Pedido::from('pedidos as p')
        ->join('cliente_pedidos as cp', 'cp.pedido_id', 'p.id')
        ->join('clientes as c', 'c.id', 'cp.cliente_id')
        // ->where('c.nombre', $request->nombre)
        ->where('c.nombre', 'like', '%'.$request->nombre.'%')
        ->get();
        // return response()->json($resultado, 200);
        return response()->json('La cantidad de pedidos es '.$resultado->count(), 200);
    }

    public function mostrarPedidos(Request $request) {
        $pedidos1 = Pedido::from('pedidos as p')
        ->join('articulo_pedidos as ap', 'ap.pedido_id', 'p.id')
        ->join('articulos as a', 'a.id', 'ap.articulo_id')
        ->select('p.id as #pedido','p.fecha','a.descripcion')
        ->orderBy('p.fecha','asc')->get();

        $pedidos2 = Pedido::with('articulos')->orderBy('fecha','asc')->get();
        return response()->json($pedidos2, 200);
    }

    public function mostrarPedidosMes() {
        // enero a marzo
        $pedidos = Pedido::where('fecha','>=','2019-01-01')
        ->where('fecha','<=','2019-03-31')->get();
        return response()->json($pedidos, 200);
    }

    public function pedidosCiudades() {
        // enero a marzo
        $pedidos = Direccion::from('direcciones as d')
        ->join('pedidos as p','p.direccion_id','d.id')
        ->select('d.ciudad', DB::raw('COUNT(p.id) as nro_pedidos'))
        ->groupBy('d.ciudad')
        ->get();
        return response()->json($pedidos, 200);
    }
}
