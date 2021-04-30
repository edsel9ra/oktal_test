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


<a href="{{ url('cria/create') }}" class="btn btn-success">Nueva Cría</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre Cría</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Color</th>
            <th>Padre</th>
            <th>Madre</th>
            <th>Número Jaula</th>
            <th>Cuidador</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($crias as $cria)
        <tr>
            <td>{{ $cria->NombreCria }}</td>
            <td>{{ $cria->Sexo }}</td>
            <td>{{ $cria->FechaNacimiento }}</td>
            <td>{{ $cria->Color }}</td>
            <td>{{ $cria->padres->id_animal }}</td>
            <td>{{ $cria->madres->id_animal}}</td>
            <td>{{ $cria->jaula->NumeroJaula }}</td>
            <td>{{ $cria->cuidador->Nombre }}</td>
            <td><a href="{{ url('/cria/'.$cria->id.'/edit') }}" class="btn btn-warning">Editar</a> | <form action="{{ url('/cria/'.$cria->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres retirar esta cría?')" value="Eliminar"></form></td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
{!! $crias->links() !!}
</div>
@endsection