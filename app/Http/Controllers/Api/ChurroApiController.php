<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Churro;
use App\Models\Tipo;

class ChurroApiController extends Controller
{
    // Obtener churros aptos para celíacos
    public function obtenerChurrosAptosCeliacos()
    {
        $churros = Churro::whereHas('tipo', function ($query) {
            $query->where('apto_celiacos', true);
        })->get();

        return response()->json($churros, 200);
    }

    // Agregar un churro
    public function agregarChurro(Request $request)
    {
        $request->validate([
            'id_tipo' => 'required|exists:tipos,id',
            'fecha_vencimiento' => 'required|date',
            'cantidad' => 'required|integer|min:1',
        ]);

        $churro = Churro::create($request->all());

        return response()->json([
            'message' => 'Churro creado exitosamente',
            'churro' => $churro
        ], 201);
    }

    // Eliminar un churro
    public function eliminarChurro($id)
    {
        $churro = Churro::findOrFail($id);
        $churro->delete();

        return response()->json(['message' => 'Churro eliminado correctamente'], 200);
    }

    // Actualizar los datos de un tipo
    public function actualizarTipo(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'calorias' => 'required|integer',
            'apto_celiacos' => 'required|boolean',
        ]);

        $tipo = Tipo::findOrFail($id);
        $tipo->update($request->all());

        return response()->json(['message' => 'Tipo actualizado correctamente', 'tipo' => $tipo], 200);
    }
}
