
<h1>{{ $modo }} Cuidador</h1>

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

<label for="Nombre"> Nombre </label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($cuidador->Nombre)?$cuidador->Nombre:old('Nombre') }}" id="Nombre">
</div>
<div class="form-group">
<label for="Apellidos"> Apellidos </label>
    <input type="text" class="form-control" name="Apellidos" value="{{ isset($cuidador->Apellidos)?$cuidador->Apellidos:old('Apellidos') }}" id="Apellidos">
</div>
<div class="form-group">
<label for="Número Identificación"> Número Identificación </label>
    <input type="text" class="form-control" name="NumeroIdentificacion" value="{{ isset($cuidador->NumeroIdentificacion)?$cuidador->NumeroIdentificacion:old('NumeroIdentificacion') }}" id="NumeroIdentificacion">
</div>
<div class="form-group">
<label for="Fecha Nacimiento"> Fecha Nacimiento </label>
    <input type="date" class="form-control" name="FechaNacimiento" value="{{ isset($cuidador->FechaNacimiento)?$cuidador->FechaNacimiento:old('FechaNacimiento') }}" id="FechaNacimiento">
</div>
<div class="form-group">
<label for="Fecha Ingreso"> Fecha Ingreso </label>
    <input type="date" class="form-control" name="FechaIngreso" value="{{ isset($cuidador->FechaIngreso)?$cuidador->FechaIngreso:old('FechaIngreso') }}" id="FechaIngreso">
</div>
<div class="form-group">
<label for="Especialidad"> Especialidad </label>
    <input type="text" class="form-control" name="Especialidad" value="{{ isset($cuidador->Especialidad)?$cuidador->Especialidad:old('Especialidad') }}" id="Especialidad">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a href="{{ url('cuidador') }}" class="btn btn-primary" >Regresar</a>