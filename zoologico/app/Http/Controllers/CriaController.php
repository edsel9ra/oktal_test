<?php

namespace App\Http\Controllers;

use App\Models\Cria;
use Illuminate\Http\Request;

class CriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['crias']=Cria::paginate(5);
        return view('cria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cria = Cria::with('jaula','cuidador','padres','madres')->get();
        return view('cria.create', compact('cria'));
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
            'NombreCria'=>'required|string|max:100',
            'Sexo'=>'required|char|max:1',
            'FechaNacimiento'=>'required|date',
            'Color'=>'required|string|max:100',
            'Padre'=>'',
            'Madre'=>'',
            'NumeroJaula'=>'',
            'Cuidador'=>'',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosCria=request()->except('_token');
        Cria::insert($datosCria);
        return redirect('cria')->with('mensaje','Cria ingresada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cria  $cria
     * @return \Illuminate\Http\Response
     */
    public function show(Cria $cria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cria  $cria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cria=Cria::findOrFail($id);
        return view('cria.edit', compact('cria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cria  $cria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'NombreCria'=>'required|string|max:100',
            'Sexo'=>'required|char|max:1',
            'FechaNacimiento'=>'required|date',
            'Color'=>'required|string|max:100',
            'Padre'=>'',
            'Madre'=>'',
            'NumeroJaula'=>'',
            'Cuidador'=>'',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCria=request()->except('_token', '_method');
        Cria::where('id','=',$id)->update($datosCria);
        $cria=Cria::findOrFail($id);
        return redirect('cria')->with('mensaje', 'Cria modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cria  $cria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cria::destroy($id);
        return redirect('cria')->with('mensaje', 'Cria retirada');
    }
}
