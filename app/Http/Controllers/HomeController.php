<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Churro;
use App\Models\Tipo;  

class HomeController extends Controller
{
   
    public function index()
    {
      
        $vencidos = session('vencidos', []); 
        $churros = Churro::whereNotIn('id', $vencidos)->with('tipo')->get();

        return view('home', compact('churros'));
    }

 
    public function marcarChurroComoVencido($id)
    {
        
        $vencidos = session('vencidos', []);

     
        if (!in_array($id, $vencidos)) {
            $vencidos[] = $id;
            session(['vencidos' => $vencidos]); 
        }

      
        return redirect()->route('home')->with('success', 'Churro marcado como vencido.');
    }

  
    public function churrosVencidos()
    {
       
        $vencidos = session('vencidos', []);
        $churros = Churro::whereIn('id', $vencidos)->with('tipo')->get();

        return view('churros.vencidos', compact('churros'));
    }
    public function crearChurro()
{
    $tipos = \App\Models\Tipo::all(); 
    return view('churros.crear', compact('tipos')); 
}
public function stockCeliacos(Request $request)
{

    $valor = $request->input('valor', 0);

    $stockMayor = \App\Models\Churro::stockCeliacosMayorQue($valor);

    return view('churros.stock_celiacos', compact('stockMayor', 'valor'));
}
public function editarStock($id)
{
    $churro = \App\Models\Churro::findOrFail($id); 
    return view('churros.editar_stock', compact('churro'));
}


public function actualizarStock(Request $request, $id)
{

    $request->validate([
        'cantidad' => 'required|integer|min:1', 
    ]);

 
    $churro = \App\Models\Churro::findOrFail($id);
    $churro->cantidad = $request->input('cantidad'); 
    $churro->save(); 

  
    return redirect()->route('home')->with('success', 'El stock del churro fue actualizado exitosamente.');
}
public function mostrarAptosCeliacos()
{
  
    $tipos = \App\Models\Tipo::where('apto_celiacos', true)->get();


    return view('churros.apto_celiacos', compact('tipos'));
}
public function buscarChurrosPorTipo(Request $request)
{
    $tipos = Tipo::all();

    if ($request->has('id_tipo')) {
        $churros = Churro::where('id_tipo', $request->input('id_tipo'))->get();
    } else {
        $churros = []; 
    }

    return view('churros.buscar_por_tipo', compact('churros', 'tipos'));
}
}
