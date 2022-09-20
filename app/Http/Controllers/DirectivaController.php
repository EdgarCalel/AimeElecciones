<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directivas;
use App\Models\Estudiante;
use App\Models\Grado;
use Illuminate\Support\Facades\DB;
class DirectivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    

        $idUser = auth()->id();
        $directivas= Estudiante::all()
        ->where('directiva', "=", 0);
        return view('Directiva.index', compact('directivas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $gradoSel = Grado::all();
        return view('Directiva.create')->with('gradoSel', $gradoSel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $directivas = $request->all();

         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = 'imagen/';
             $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenProducto);
             $directivas['imagen'] = "$imagenProducto";
         }

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
        $directiva = Estudiante::find($id);
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

        $userLogueado = auth()->user()->email;
        $email = DB::table('estudiantes')->where('email', $userLogueado)->value('codigo_status');
        if ($email === 1) {
            return redirect('/directiva')->with('status', "Ya a votado");
        }else{

            $userLogueado = auth()->user()->email;
            $estudiante = DB::table('estudiantes')
            ->where('email', '=', $userLogueado)
            ->update(['codigo_status'=>1]);
            
            $directiva =  Estudiante::find($id);
            $calculo =$directiva->votos;
            $directiva->votos = $calculo +=1;
            
            $directiva->save();
            return redirect('/directiva');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directiva = Estudiante::find($id);
        $directiva->delete();
        return redirect('/directiva');
    }
}
