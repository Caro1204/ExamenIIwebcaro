<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Churro extends Model
{
    protected $fillable = ['id_tipo', 'fecha_vencimiento', 'cantidad'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo');
    }

    // Función para obtener churros vencidos
    public static function obtenerChurrosVencidos()
    {
        return self::where('fecha_vencimiento', '<', now())->get();
    }

    // Función para verificar stock de churros aptos para celíacos mayor que cierto valor
    public static function stockCeliacosMayorQue($valor)
    {
        // Sumamos las cantidades de los churros que son aptos para celíacos
        $totalStockCeliacos = self::whereHas('tipo', function($query) {
            $query->where('apto_celiacos', true);
        })->sum('cantidad');
    
        // Comparamos el stock total con el valor proporcionado
        return $totalStockCeliacos > $valor;
    }
    
    

    // Función para buscar churros por tipo
    public static function buscarPorTipo($id_tipo)
    {
        return self::where('id_tipo', $id_tipo)->get();
    }

    // Función para crear un churro
    public static function crearChurro($data)
    {
        return self::create($data);
    }
}
