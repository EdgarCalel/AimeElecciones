<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;

class loginEstudianteController extends Controller
{
    // public function index(){
    //     return view('auth.login');
    // }
    public function create(){
        return view('/estudiante');
    }
    public function store(Request $loginStudnet){
        $correo = $loginStudnet->emailEstudiante;
        $contraseña = $loginStudnet->contraseñaEstudiante;
        $session = Estudiante::where('email', $correo)->where('password', $contraseña)->get();

        // $session = DB::table('estudiantes')
        //         ->where('email', '=', $correo)
        //         ->where('password', '=', $contraseña)
        //         ->get();

        if (count($session)>0) {
            $loginStudnet->session()->put('user_id', $session[0]->id);
            $loginStudnet->session()->put('user_name', $session[0]->name);
            return redirect('admin.index')->with('msg','correo o contraseña incorrecta');
        }else{
            return redirect('/login');
        }
    }
    public function protect(Request $r){
        if ($r->session()->get('user_id')=="") {
            return redirect('/login');
        }else{
            $username=$r->session()->get('user_name');
            $capsule= array('username'=>$username);
            return view('/estudiante');
        }
    }
}
