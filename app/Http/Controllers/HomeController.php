<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //INICIO
    public function __invoke(){
        $mayorPuntos = Usuario::max('puntos');
        $usuario1 = Usuario::where('puntos', $mayorPuntos)
                   ->orderBy('fecha', 'desc')
                   ->first();
        $usuarioExiste = false;
        $data = [
            'usuario1' => $usuario1,
            'usuarioExiste' => $usuarioExiste,
        ];
        return view('home', $data) ;
    }
}
