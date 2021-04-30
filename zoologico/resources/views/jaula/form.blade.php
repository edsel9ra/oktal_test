
<h1>{{ $modo }} Jaula</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    
@endif

<div class="form-group">

<label for="NumeroJaula"> Número de Jaula </label>
    <input type="text" class="form-control" name="NumeroJaula" value="{{ isset($jaula->NumeroJaula)?$jaula->NumeroJaula:old('NumeroJaula') }}" id="NumeroJaula">
</div>
<div class="form-group">
<label for="Ubicacion"> Ubicación </label>
    <input type="text" class="form-control" name="Ubicacion" value="{{ isset($jaula->Ubicacion)?$jaula->Ubicacion:old('Ubicacion') }}" id="Ubicacion">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a href="{{ url('cuidador') }}" class="btn btn-primary" >Regresar</a>