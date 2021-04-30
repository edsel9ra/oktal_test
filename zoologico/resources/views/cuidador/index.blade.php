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


<a href="{{ url('cuidador/create') }}" class="btn btn-success">Nuevo Cuidador</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Número Identificación</th>
            <th>Fecha Nacimiento</th>
            <th>Fecha Ingreso</th>
            <th>Especialidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuidadors as $cuidador)
        <tr>
            <td>{{ $cuidador->Nombre }}</td>
            <td>{{ $cuidador->Apellidos }}</td>
            <td>{{ $cuidador->NumeroIdentificacion }}</td>
            <td>{{ $cuidador->FechaNacimiento }}</td>
            <td>{{ $cuidador->FechaIngreso }}</td>
            <td>{{ $cuidador->Especialidad }}</td>
            <td><a href="{{ url('/cuidador/'.$cuidador->id.'/edit') }}" class="btn btn-warning">Editar</a> | <form action="{{ url('/cuidador/'.$cuidador->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres eliminar al cuidador?')" value="Eliminar"></form></td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
{!! $cuidadors->links() !!}
</div>
@endsection