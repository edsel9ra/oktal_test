@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/cuidador') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('cuidador.form', ['modo'=>'Crear'])
</form>
</div>
@endsection