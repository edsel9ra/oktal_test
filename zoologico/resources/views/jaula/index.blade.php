@extends('layouts.app')
@section('content')

<div class="container">

    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }} 
        <button type="button" class="close" data-dismiss=alert aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


<a href="{{ url('jaula/create') }}" class="btn btn-success">Nueva Jaula</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Número de Jaula</th>
            <th>Ubicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jaulas as $jaula)
        <tr>
            <td>{{ $jaula->NumeroJaula }}</td>
            <td>{{ $jaula->Ubicacion }}</td>
            <td><a href="{{ url('/jaula/'.$jaula->id.'/edit') }}" class="btn btn-warning">Editar</a> | <form action="{{ url('/jaula/'.$jaula->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres eliminar esta jaula?')" value="Eliminar"></form></td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
{!! $jaulas->links() !!}
</div>
@endsection