<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Grado;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLogueado = auth()->user()->id;
        $estudiante = DB::table('estudiantes')
        ->where('id_grado', '=', $userLogueado)
        ->get();

        // $estudiante = Estudiante::all();
        return view('estudiante.index', compact('userLogueado', 'estudiante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codRandom =Str::random(10);
        $gradoSel = Grado::all();
        return view('estudiante.create', compact('codRandom','gradoSel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codRandom =Str::random(10);
        $user = new Estudiante();
        $user ->nombre = $request->get('nombre');
        $user ->apellido = $request->get('apellido');
        $user ->escolaridad = $request->get('escolaridad');
        $user ->codigo_votacion = "$codRandom";
        $user ->id_grado = $request->get('grado');
        $user ->id_grado = $request->get('grado');
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $user ->foto_perfil  = "$imagenProducto";
        }
        



        $user ->save();
        return view('estudiante.index')->with('status','se registro correctamente');
    
        // return redirect()->route('estudiante', $user)->with('status','se registro correctamente');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = Estudiante::find($id);
     
        return view('estudiante.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $user = Estudiante::find($user);
        $user ->nombre = $request->get('nombre');
        $user ->apellido = $request->get('apellido');
        $user ->escolaridad = $request->get('escolaridad');
        $user ->foto_perfil = $request->get('foto_perfil');

        $user ->save();
    
        return redirect()->route('estudiante.edit', $user)->with('status','se registro correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $est = Estudiante::find($id);
        $est->delete();
        return redirect('/estudiante');
    }
}
