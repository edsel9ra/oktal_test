
<h1>{{ $modo }} Animal</h1>

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

<label for="NombreAnimal"> Nombre Animal </label>
    <input type="text" class="form-control" name="NombreAnimal" value="{{ isset($animal->NombreAnimal)?$animal->NombreAnimal:old('NombreAnimal') }}" id="NombreAnimal">
</div>
<div class="form-group">
<label for="Especie"> Especie </label>
    <input type="text" class="form-control" name="Especie" value="{{ isset($animal->Especie)?$animal->Especie:old('Especie') }}" id="Especie">
</div>
<div class="form-group">
<label for="Sexo"> Sexo </label>
    <select name="Sexo" id="Sexo" class="form-control">
        <option value=" ">Seleccione un sexo</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
</div>
<div class="form-group">
<label for="FechaNacimiento"> Fecha Nacimiento </label>
    <input type="date" class="form-control" name="FechaNacimiento" value="{{ isset($animal->FechaNacimiento)?$animal->FechaNacimiento:old('FechaNacimiento') }}" id="FechaNacimiento">
</div>
<div class="form-group">
<label for="Fecha Ingreso"> Fecha Ingreso </label>
    <input type="date" class="form-control" name="FechaIngreso" value="{{ isset($animal->FechaIngreso)?$animal->FechaIngreso:old('FechaIngreso') }}" id="FechaIngreso">
</div>
<div class="form-group">
<label for="Color"> Color </label>
    <input type="text" class="form-control" name="Color" value="{{ isset($animal->Color)?$animal->Color:old('Color') }}" id="Color">
</div>
<div class="form-group">
    <label for="id_jaula"> Número de Jaula</label>
        <select name="id_jaula" class="form-control">
            <option value=" ">Seleccione una jaula disponible</option>
            @foreach ($animal as $a)
                <option value="$a->jaula->id">{{ $a->jaula->NumeroJaula }}</option>
            @endforeach
        </select>
    </div>
<div class="form-group">
<label for="id_cuidador"> Cuidador </label>
    <select name="id_cuidador" class="form-control">
        <option value=" ">Seleccione un cuidador</option>
        @foreach ($animal as $a)
            <option value="$a->cuidador->id">{{ $a->cuidador->Nombre }}</option>
        @endforeach
    </select>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a href="{{ url('animal') }}" class="btn btn-primary" >Regresar</a>