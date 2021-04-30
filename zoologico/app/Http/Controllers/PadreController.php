<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['padres']=Padre::paginate(5);
        return view('padre.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $padre = Padre::with('animal')->get(); 
        return view('padre.create', compact('padre'));
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
            'AnimalPadre'=>'',
        ];
        $mensaje=[
            'require'=> 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosPadre=request()->except('_token');
        Padre::insert($datosPadre);
        return redirect('padre')->with('mensaje','Un Padre ha sido agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Padre  $padre
     * @return \Illuminate\Http\Response
     */
    public function show(Padre $padre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Padre  $padre
     * @return \Illuminate\Http\Response
     */
    public function edit(Padre $padre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Padre  $padre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Padre $padre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Padre  $padre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Padre $padre)
    {
        //
    }
}
