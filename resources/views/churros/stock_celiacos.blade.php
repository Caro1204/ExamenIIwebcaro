@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Churros Apto para Celíacos</h1>

        
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Calorías</th>
                    <th>Apto para Celíacos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td>{{ $tipo->nombre }}</td>
                        <td>{{ $tipo->calorias }}</td>
                        <td>
                            @if($tipo->apto_celiacos)
                                <span class="badge badge-success">Sí</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
