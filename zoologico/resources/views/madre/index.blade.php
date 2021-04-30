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


<a href="{{ url('madre/create') }}" class="btn btn-success">Nueva Madre</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre de Madre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($madres as $madre)
        <tr>
            <td>{{ $madre->animal->NombreAnimal }}</td>
        </tr>  
        @endforeach
        
    </tbody>
</table>
{!! $madres->links() !!}
</div>
@endsection