<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public static function obtenerChurrosVencidos()
{
    return self::where('fecha_vencimiento', '<', now())->get();
} 
public static function verificarStockAptoCeliacos(int $cantidad)
{
    return self::whereHas('tipo', function ($query) {
        $query->where('apto_celiacos', true);
    })->sum('cantidad') > $cantidad;
}

public static function buscarChurrosPorTipo(int $idTipo)
{
    return self::where('id_tipo', $idTipo)->get();
}

public static function crearChurro(array $data)
{
    return self::create($data);
}

}
