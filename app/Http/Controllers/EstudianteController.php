<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\User;
use App\Models\Grado;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLogueado = auth()->user()->id_grado;
        $usersSelect = DB::table('estudiantes')
        ->join('grados', 'grados.id', '=', 'estudiantes.id_grado')
        ->select('estudiantes.*', 'grados.nombre_grado','grados.seccion')
        ->where('estudiantes.id_grado', '=', $userLogueado)
        ->get();

        //   $estudiante = Estudiante::all();
        return view('estudiante.index', compact('userLogueado', 'usersSelect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiante = Estudiante::all();
        $codRandom =Str::random(10);
        
        $gradoSel = Grado::all();
        return view('estudiante.create', compact('codRandom','gradoSel', 'estudiante'));
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
        $codStudntEmail =Str::random(5);
        $user = $request->all();
        $estudiante = $request->all();

        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/estudiante/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $estudiante['foto_perfil']  = "$imagenProducto";
            $user['foto_perfil']  = "$imagenProducto";
        }
        $nombre = $request->get('nombre');
        $nombre1 = explode(" ", $nombre);
        $apellido = $request->get('apellido');
        $apellido2 = explode(" ", $apellido);
        $estudiante['email']  = strtolower($nombre1[0]) . strtolower($apellido2[0]) ."-" .strtolower($codStudntEmail) ."@hotmail.com";
        $clave = Hash::make('123456789');
        $estudiante['password'] = "$clave";
        $estudiante['codigo_votacion']  = "$codRandom";
        $estudiante['codigo_student']  = 0;
        $estudiante['codigo_status']  = 0;
        $estudiante['Directiva']  = $request->get('DirectivaSelect');



        $user['email']  = strtolower($nombre1[0]) . strtolower($apellido2[0]) ."-" .strtolower($codStudntEmail) ."@hotmail.com";
        $user['name'] = $request->get('nombre');
        $user['lastname'] = $request->get('apellido');
        $user['password'] = "$clave";
        $user['is_estudiante'] = true;

        User::create($user)->assignRole('Estudiante');
        Estudiante::create($estudiante);
       
        return redirect('/estudiante')->with('status','se registro correctamente');
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
        $user ->Directiva = $request->get('DirectivaSelect');


        // if($imagen = $request->file('imagen')) {
        //     $rutaGuardarImg = 'imagen/estudiante/';
        //     $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg, $imagenProducto);
        //     $estudiante['foto_perfil']  = "$imagenProducto";
        //     $user['foto_perfil']  = "$imagenProducto";
        // }else{
           
        // }

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
