@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/cria/'.$cria->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('cria.form', ['modo'=>'Editar'])
</form>
</div>
@endsection
