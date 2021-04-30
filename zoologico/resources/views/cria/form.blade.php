
<h1>{{ $modo }} Cría</h1>

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

    <label for="NombreCria"> Nombre Cría </label>
    <input type="text" class="form-control" name="NombreCria" value="{{ isset($cria->NombreCria)?$cria->NombreCria:old('Nombrecria') }}" id="Nombrecria">
</div>
<div class="form-group">
<label for="Sexo"> Sexo </label>
    <input type="text" class="form-control" name="Sexo" value="{{ isset($cria->Sexo)?$cria->Sexo:old('Sexo') }}" id="Sexo">
</div>
<div class="form-group">
<label for="FechaNacimiento"> Fecha Nacimiento </label>
    <input type="date" class="form-control" name="FechaNacimiento" value="{{ isset($cria->FechaNacimiento)?$cria->FechaNacimiento:old('FechaNacimiento') }}" id="FechaNacimiento">
</div>
<div class="form-group">
<label for="Color"> Color </label>
    <input type="text" class="form-control" name="Color" value="{{ isset($cria->Color)?$cria->Color:old('Color') }}" id="Color">
</div>
<div class="form-group">
    <label for="id_padre"> Padre </label>
    <select name="id_animal" class="form-control">
        <option value=" ">Seleccione un animal</option>
        @foreach ($cria as $c)
            <option value="$c->padre->id">{{ $c->padres->id_animal }}</option>
        @endforeach                
    </select>
    </div>
<div class="form-group">
    <label for="id_madre"> Madre </label>
    <select name="id_animal" class="form-control">
        <option value=" ">Seleccione un animal</option>
        @foreach ($cria as $c)
            <option value="$c->madres->id">{{ $c->madres->id_animal }}</option>
        @endforeach                
    </select>  
</div>
<div class="form-group">
    <label for="id_jaula"> Número de Jaula</label>
    <select name="id_jaula" class="form-control">
        <option value=" ">Seleccione una jaula disponible</option>
        @foreach ($cria as $c)
            <option value="$c->jaula->id">{{ $c->jaula->NumeroJaula }}</option>
        @endforeach
    </select>
    </div>
<div class="form-group">
    <label for="id_cuidador"> Cuidador </label>
    <select name="id_cuidador" class="form-control">
        <option value=" ">Seleccione un cuidador</option>
        @foreach ($cria as $c)
            <option value="$c->cuidador->id">{{ $c->cuidador->Nombre }}</option>
        @endforeach
    </select>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a href="{{ url('cria') }}" class="btn btn-primary" >Regresar</a>