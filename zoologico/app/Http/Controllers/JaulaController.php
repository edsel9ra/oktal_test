<?php

namespace App\Http\Controllers;

use App\Models\Jaula;
use Illuminate\Http\Request;

class JaulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['jaulas']=Jaula::paginate(5);
        return view('jaula.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jaula.create');
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
            'NumeroJaula'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosJaula=request()->except('_token');
        Jaula::insert($datosJaula);
        return redirect('jaula')->with('mensaje','Jaula agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function show(Jaula $jaula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jaula=Jaula::findOrFail($id);
        return view('jaula.edit', compact('jaula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'NumeroJaula'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosJaula=request()->except('_token', '_method');
        Jaula::where('id','=',$id)->update($datosJaula);
        $jaula=Jaula::findOrFail($id);
        return redirect('jaula')->with('mensaje', 'Jaula modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Jaula::destroy($id);
        return redirect('jaula')->with('mensaje', 'Jaula eliminada');
    }
}
