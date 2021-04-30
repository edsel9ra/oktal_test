
<h1>{{ $modo }} Padre</h1>

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

<label for="id_animal"> Nombre del Padre</label>
    <select name="id_animal" class="form-control">
        <option value=" ">Seleccione un animal</option>
        @foreach ($padre as $p)
            <option value="$p->animal->id">{{ $p->animal->NombreAnimal }}</option>
        @endforeach       
    </select>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a href="{{ url('padre') }}" class="btn btn-primary" >Regresar</a>