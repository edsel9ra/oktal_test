@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/cuidador/'.$cuidador->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('cuidador.form', ['modo'=>'Editar'])
</form>
</div>
@endsection
