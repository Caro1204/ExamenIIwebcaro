@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Churros Vencidos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($churros as $churro)
                    <tr>
                        <td>{{ $churro->id }}</td>
                        <td>{{ $churro->tipo->nombre }}</td>
                        <td>{{ $churro->fecha_vencimiento }}</td>
                        <td>{{ $churro->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
