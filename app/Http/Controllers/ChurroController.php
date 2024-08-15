<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Churro;
use App\Models\Tipo;

class ChurroController extends Controller
{
    public function index()
    {
        $churros = Churro::with('tipo')->get();
        return view('churros.index', compact('churros'));
    }

    public function crearChurro()
    {
        $tipos = Tipo::all();
        return view('churros.crear', compact('tipos'));
    }

    public function guardarChurro(Request $request)
    {
        $request->validate([
            'id_tipo' => 'required|exists:tipos,id',
            'fecha_vencimiento' => 'required|date',
            'cantidad' => 'required|integer|min:1',
        ]);

        Churro::create($request->all());

        return redirect()->route('home')->with('success', 'Churro creado exitosamente.');
    }

    public function editarStock($id)
    {
        $churro = Churro::findOrFail($id);
        return view('churros.editar_stock', compact('churro'));
    }

    public function actualizarStock(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $churro = Churro::findOrFail($id);
        $churro->cantidad = $request->input('cantidad');
        $churro->save();

        return redirect()->route('home')->with('success', 'El stock del churro fue actualizado exitosamente.');
    }

    public function churrosVencidos()
    {
        $churros = Churro::where('vencido', true)->get();
        return view('churros.vencidos', compact('churros'));
    }

    public function marcarChurroComoVencido($id)
    {
        $churro = Churro::findOrFail($id);
        $churro->vencido = true;
        $churro->save();

        return redirect()->route('home')->with('success', 'Churro marcado como vencido.');
    }

    public function buscarChurrosPorTipo(Request $request)
    {
        $tipos = Tipo::all();
        $churros = [];
        if ($request->has('id_tipo')) {
            $churros = Churro::where('id_tipo', $request->input('id_tipo'))->get();
        }

        return view('churros.buscar_por_tipo', compact('churros', 'tipos'));
    }

    public function stockCeliacos(Request $request)
    {
        $valor = $request->input('valor', 0);
        $stockMayor = Churro::whereHas('tipo', function ($query) {
            $query->where('apto_celiacos', true);
        })->sum('cantidad') > $valor;

        return view('churros.stock_celiacos', compact('stockMayor', 'valor'));
    }
}
