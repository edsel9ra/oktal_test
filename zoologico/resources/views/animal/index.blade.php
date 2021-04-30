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


<a href="{{ url('animal/create') }}" class="btn btn-success">Nuevo Animal</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre Animal</th>
            <th>Especie</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Fecha Ingreso</th>
            <th>Color</th>
            <th>Número Jaula</th>
            <th>Cuidador</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($animals as $animal)
        <tr>
            <td>{{ $animal->NombreAnimal }}</td>
            <td>{{ $animal->Especie }}</td>
            <td>{{ $animal->Sexo }}</td>
            <td>{{ $animal->FechaNacimiento }}</td>
            <td>{{ $animal->FechaIngreso }}</td>
            <td>{{ $animal->Color }}</td>
            <td>{{ $animal->jaula->NumeroJaula }}</td>
            <td>{{ $animal->cuidador->Nombre }}</td>
            <td><a href="{{ url('/animal/'.$animal->id.'/edit') }}" class="btn btn-warning">Editar</a> | <form action="{{ url('/animal/'.$animal->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres retirar al animal?')" value="Eliminar"></form></td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
{!! $animals->links() !!}
</div>
@endsection