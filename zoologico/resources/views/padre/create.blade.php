@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/padre') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('padre.form', ['modo'=>'Crear'])
</form>
</div>
@endsection