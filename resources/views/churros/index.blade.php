@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Lista de Churros</h1>

     
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

        <h2 class="my-4">Crear Churro</h2>

        <form action="{{ route('churros.crear') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_tipo">Tipo de Churro:</label>
                <select name="id_tipo" class="form-control" required>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                <input type="datetime-local" name="fecha_vencimiento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Churro</button>
        </form>
    </div>
@endsection
