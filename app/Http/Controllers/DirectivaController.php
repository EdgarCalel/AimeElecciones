<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directivas;
class DirectivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directivas= Directivas::all();
        return view('Directiva.index')->with('directivas', $directivas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directivas= Directivas::all();

        return view('Directiva.create')->with('directivas', $directivas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required', 'apellidos' => 'required','Grado' => 'required','seccion' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

         $directivas = $request->all();

         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = 'imagen/';
             $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenProducto);
             $directivas['imagen'] = "$imagenProducto";
         }
var_dump($directivas['imagen']);
         Directivas::create($directivas);
         return redirect('/directiva');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directiva = Directivas::find($id);
        return view('Directiva.edit')->with('directiva', $directiva);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $directiva =  Directivas::find($id);
        $directiva->nombres = $request->get('nombres');
        $directiva->apellidos = $request->get('apellidos');
        $directiva->votos = $request->get('votos');
        $directiva->grado = $request->get('Grado');
        $directiva->seccion = $request->get('seccion');

        $directiva->save();
        return redirect('/directiva');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directiva = Directivas::find($id);
        $directiva->delete();
        return redirect('/directiva');
    }
}
