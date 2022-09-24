<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\Estudiante;

class UserPdfController extends Controller
{
    /**
     * Return Users data to users view
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();

        $userLogueado = auth()->user()->id_grado;
        $directivas= Estudiante::all()
        ->where('Directiva', "=", 1)
        ->where('id_grado', "=", $userLogueado);

        return view('usersPdf.index', compact( 'directivas'));
    }

    /**
     * Export content to PDF with View
     *
     * @return void
     */
    public function downloadPdf()
    {
        $users = User::all();

        $userLogueado = auth()->user()->id_grado;
        $users= Estudiante::all()
        ->where('Directiva', "=", 1)
        ->where('id_grado', "=", $userLogueado);

       view()->share('usersPdf.download',$users);

        $pdf = PDF::loadView('usersPdf.download', ['users' => $users]);

        return $pdf->download('Directiva.pdf');
    }
}
