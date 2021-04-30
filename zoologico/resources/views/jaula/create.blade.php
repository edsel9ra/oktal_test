@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/jaula') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('jaula.form', ['modo'=>'Crear'])
</form>
</div>
@endsection