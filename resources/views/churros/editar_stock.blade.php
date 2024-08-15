@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Stock del Churro</h1>

        <form action="{{ route('churros.actualizar_stock', $churro->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="form-group">
                <label for="cantidad">Cantidad (Stock) Actual</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $churro->cantidad }}" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar Stock</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
