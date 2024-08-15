@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Crear un Nuevo Churro</h1>

        <form action="{{ route('churros.guardar') }}" method="POST">
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

            <button type="submit" class="btn btn-success">Crear Churro</button>
        </form>
    </div>
@endsection
