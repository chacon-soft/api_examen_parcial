<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// CRUD para Fabricas
Route::get('fabricas', 'FabricaController@listar');
Route::post('fabricas/crear', 'FabricaController@crear');
Route::put('fabricas/editar/{id}', 'FabricaController@editar');
Route::delete('fabricas/{id}', 'FabricaController@eliminar');



Route::get('pedidos/cliente', 'PedidoController@buscarPedidosCliente');

Route::get('pedidos/articulos', 'PedidoController@mostrarPedidos');
Route::get('pedidos/meses', 'PedidoController@mostrarPedidosMes');
Route::get('pedidos/ciudades', 'PedidoController@pedidosCiudades');
Route::get('suma/pedidos', 'ArticuloController@sumaTotal');
Route::get('articulos/promedio', 'ArticuloController@promedio');
Route::get('clientes/verpedidos', 'ClienteController@mostrarArticulos');
Route::get('clientes/sinpedidos', 'ClienteController@sinPedidos');
Route::get('clientes/mayordescuento', 'ClienteController@clienteMayorDescuento');
Route::get('ciudad/clientes', 'DireccionController@ciudadClientes');

Route::get('fabrica/articulos', 'FabricaController@mostrarArticulos');
Route::get('articulos/stock', 'ArticuloController@mostrarArticulos');