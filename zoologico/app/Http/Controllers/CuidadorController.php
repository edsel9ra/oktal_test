<?php

namespace App\Http\Controllers;

use App\Models\Cuidador;
use Illuminate\Http\Request;

class CuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cuidadors']=Cuidador::paginate(5);
        return view('cuidador.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuidador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'NumeroIdentificacion'=>'required|string|max:100',
            'FechaNacimiento'=>'required|date',
            'FechaIngreso'=>'required|date',
            'Especialidad'=>'required|string|max:100',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosCuidador=request()->except('_token');
        Cuidador::insert($datosCuidador);
        return redirect('cuidador')->with('mensaje','Cuidador agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function show(Cuidador $cuidador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuidador  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cuidador=Cuidador::findOrFail($id);
        return view('cuidador.edit', compact('cuidador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuidador  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'NumeroIdentificacion'=>'required|string|max:100',
            'FechaNacimiento'=>'required|date',
            'FechaIngreso'=>'required|date',
            'Especialidad'=>'required|string|max:100',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCuidador=request()->except('_token', '_method');
        Cuidador::where('id','=',$id)->update($datosCuidador);
        $cuidador=Cuidador::findOrFail($id);
        return redirect('cuidador')->with('mensaje', 'Cuidador modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cuidador::destroy($id);
        return redirect('cuidador')->with('mensaje', 'Cuidador eliminado');
    }
}
