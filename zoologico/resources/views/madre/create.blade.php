@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/madre') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('madre.form', ['modo'=>'Crear'])
</form>
</div>
@endsection