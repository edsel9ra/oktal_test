<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['animals']=Animal::paginate(5);
        return view('animal.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $animal = Animal::with('jaula','cuidador')->get(); 
        return view('animal.create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'NombreAnimal'=>'required|string|max:100',
            'Especie'=>'required|string|max:100',
            'Sexo'=>'required|char|max:1',
            'FechaNacimiento'=>'required|date',
            'FechaIngreso'=>'required|date',
            'Color'=>'required|string|max:100',
            'id_jaula'=>'required',
            'id_cuidador'=>'required',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosAnimal=request()->except('_token');
        Animal::insert($datosAnimal);
        return redirect('animal')->with('mensaje','Animal ingresado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $animal=Animal::findOrFail($id);
        return view('animal.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'NombreAnimal'=>'required|string|max:100',
            'Especie'=>'required|string|max:100',
            'Sexo'=>'required|char|max:1',
            'FechaNacimiento'=>'required|date',
            'FechaIngreso'=>'required|date',
            'Color'=>'required|string|max:100',
            'id_jaula'=>'required',
            'id_cuidador'=>'required',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosAnimal=request()->except('_token', '_method');
        Animal::where('id','=',$id)->update($datosAnimal);
        $animal=Animal::findOrFail($id);
        return redirect('animal')->with('mensaje', 'Animal modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Animal::destroy($id);
        return redirect('animal')->with('mensaje', 'Animal retirado');
    }
}
