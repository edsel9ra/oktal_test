@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/animal/'.$animal->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('animal.form', ['modo'=>'Editar'])
</form>
</div>
@endsection
