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


<a href="{{ url('padre/create') }}" class="btn btn-success">Nuevo Padre</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre de Padre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($padres as $padre)
        <tr>
            <td>{{ $padre->animal->NombreAnimal }}</td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
{!! $padres->links() !!}
</div>
@endsection