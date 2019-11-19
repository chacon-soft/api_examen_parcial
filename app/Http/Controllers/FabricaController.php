<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fabrica;

class FabricaController extends Controller
{
    public function listar() {
        $fabricas = Fabrica::with('art_fabrica')->select('id','nombre','telefono','id as #fabrica')
        ->get();
        return response()->json($fabricas, 200);
    }
    public function crear(Request $request) {
        $nuevaFabrica = new Fabrica();
        $nuevaFabrica->nombre = $request->nombre;
        $nuevaFabrica->telefono = $request->telefono;
        $nuevaFabrica->save();
        return response()->json('Se ha creado una fabrica', 200);
    }
    public function editar(Request $request, $id) {
        $editarFabrica = Fabrica::find($id);
        if ($editarFabrica == '') {
            return response()->json('No existe la fabrica '.$id, 200);
        }
        $editarFabrica->nombre = $request->nombre;
        $editarFabrica->telefono = $request->telefono;
        $editarFabrica->save();
        return response()->json('OK, la fabrica fue editada', 200);
    }
    public function eliminar($id) {
        $fabrica = Fabrica::find($id);
        if ($fabrica == '') {
            return response()->json('No existe la fabrica '.$id, 200);
        } else {
            $fabrica->delete();
        }
        return response()->json('OK, se ha eliminado una fabrica', 200);
    }

    public function mostrarArticulos() {
        $fabricas = Fabrica::with('articulos')->get();
        return response()->json($fabricas, 200);
    }
}
