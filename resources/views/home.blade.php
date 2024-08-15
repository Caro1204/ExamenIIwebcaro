@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Sistema de Stock - Churros Teresa</h1>


        <h2 class="my-4">Lista de Churros</h2>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($churros as $churro)
                    <tr>
                        <td>{{ $churro->id }}</td>
                        <td>{{ $churro->tipo->nombre }}</td>
                        <td>{{ $churro->fecha_vencimiento }}</td>
                        <td>{{ $churro->cantidad }}</td>
                        <td>
                          
                            <form action="{{ route('churros.marcar_vencido', $churro->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Marcar como Vencido</button>
                            </form>
                       
                            <a href="{{ route('churros.editar_stock', $churro->id) }}" class="btn btn-primary mt-2">Editar Stock</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

      
        <div class="row mt-5">
            <div class="col-md-6 my-3">
                <a href="{{ route('churros.vencidos') }}" class="btn btn-primary btn-lg btn-block">Obtener Churros Vencidos</a>
            </div>
            <div class="col-md-6 my-3">
                <a href="{{ route('churros.stock_celiacos') }}" class="btn btn-success btn-lg btn-block">Chequear Stock de Churros Apto para Celíacos</a>
            </div>
            <div class="col-md-6 my-3">
                <a href="{{ route('churros.buscar_por_tipo') }}" class="btn btn-warning btn-lg btn-block">Buscar Churros por Tipo</a>
            </div>
            <div class="col-md-6 my-3">
                <a href="{{ route('churros.crear') }}" class="btn btn-info btn-lg btn-block">Crear un Nuevo Churro</a>
            </div>
        </div>
    </div>
@endsection
