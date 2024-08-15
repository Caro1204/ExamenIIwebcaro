@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Buscar Churros por Tipo</h1>

    
        <form action="{{ route('churros.buscar_por_tipo') }}" method="GET">
            <div class="form-group">
                <label for="id_tipo">Seleccione un tipo de churro:</label>
                <select name="id_tipo" id="id_tipo" class="form-control">
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        @if(!empty($churros))
            <h2 class="my-4">Resultados de Búsqueda</h2>
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
        @endif
    </div>
@endsection
