@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/jaula/'.$jaula->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('jaula.form', ['modo'=>'Editar'])
</form>
</div>
@endsection
