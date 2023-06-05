<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Usuario;
use Carbon\Carbon;

use TCPDF; //librería pdf
use PDF;

class JuegoController extends Controller
{
    //
    // JUEGO
    public function inicioJuego(Request $request){
        $usuario = $request->nickname;
        $existe=false;

        $usuarios = Usuario::all();
        foreach($usuarios as $usu){
            if(($usu -> nickname) == $usuario){
                $existe = true;
            }
        }

        if($existe){
            $mayorPuntos = Usuario::max('puntos');
            $usuario1 = Usuario::where('puntos', $mayorPuntos)
                    ->orderBy('fecha', 'desc')
                    ->first();
            $usuarioExiste = true;

            $data = [
                'usuario1' => $usuario1,
                'usuarioExiste' => $usuarioExiste,
            ];
            return view('home', $data) ;
        }else{
            session(['usuario' => $usuario]);
            $usuarioNuevo = new Usuario();
            $usuarioNuevo->nickname = $usuario;
            $usuarioNuevo->imagen = 'fotoInicio.png';
            $usuarioNuevo->puntos = 0;
            $usuarioNuevo->save();
        }

        $juego1 = Juego::where('id', 1)->first();
        // $juego1->titulo = $usuario+' '+$juego1->titulo;
        // $juego1->save();
        return view('juego', compact('juego1'));
    }

    public function juegoResto(Request $request){
        $usu = $request->usuario;
        $prob = $request->prob;
        $opcion = $request->opcion;
        $juego1 = Juego::where('id', $opcion)->first();
        if ($juego1->probabilidad == 0 || $juego1->probabilidad == 100) {
            return view('juegoFin', compact('juego1'));
        }else{
            Usuario::where('nickname', $usu)
            ->update(['puntos'=>$prob]);

            return view('juego', compact('juego1')); 
        }
    }

    public function puntuacion(Request $request){
        $fechaHoraActual = Carbon::now();
        $fecha = $fechaHoraActual->toDateString();
        $hora = $fechaHoraActual->toTimeString();


        $usu = $request->usuario;
        Usuario::where('nickname', $usu)
            ->update(['fecha'=>$fecha]);

        Usuario::where('nickname', $usu)
            ->update(['hora'=>$hora]);
        $usuarios = Usuario::all();


        foreach($usuarios as $usuario){
            if($usuario->nickname == $usu){
                session(['usuarioImg' => $usuario->imagen]);
            }
        }

        return view('juegoPuntuacion', compact('usuarios')); 
    }

    public function modificarImg(Request $request){
        
        $imagen = '';
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagen->store('public/img');
        }

        $usu = $request->usuario;
        Usuario::where('nickname', $usu)
            ->update(['imagen'=>$imagen]);

        $fechaHoraActual = Carbon::now();
        $fecha = $fechaHoraActual->toDateString();
        $hora = $fechaHoraActual->toTimeString();
    
    
        $usu = $request->usuario;
        Usuario::where('nickname', $usu)
            ->update(['fecha'=>$fecha]);
    
        Usuario::where('nickname', $usu)
            ->update(['hora'=>$hora]);
        $usuarios = Usuario::all();

        return view('juegoPuntuacion', compact('usuarios'));
    }

    public function eliminarUsuario(Request $request){

        $usu = $request->usuario;
        Usuario::where('nickname', $usu)
            ->delete();

        Usuario::where('fecha', null)
            ->where('hora', null)
            ->where('puntos', 0)
            ->delete();

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

    public function juegoRanking(Request $request){

        $usu = $request->usuario;
        $usuarios = Usuario::orderBy('puntos', 'desc')
                ->orderBy('fecha', 'desc')
                ->orderBy('hora', 'desc')
                ->get();

        $data = [
            'usu' => $usu,
            'usuarios' => $usuarios,
        ];
                
        return view('juegoRanking', $data) ;
    }

    public function descargarPDF(Request $request){

        $puesto = $request->puesto;
        $usuario = $request->nombre;
        $puntos = $request->puntos;
        $fecha = $request->fecha;
        $hora = $request->hora;

        $pdf = PDF::loadView('pdf', ['puesto'=>$puesto,'nombre'=>$usuario,'puntos'=>$puntos,'fecha'=>$fecha,'hora'=>$hora]);
        // $pdf->loadHTML('<h1>Hola</h1>');
        return $pdf->download('EligeTuCamino.pdf');
    }


}


