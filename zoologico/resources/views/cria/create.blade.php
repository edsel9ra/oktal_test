@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/cria') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('cria.form', ['modo'=>'Crear'])
</form>
</div>
@endsection