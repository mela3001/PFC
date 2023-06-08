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
    public function juegoPrimero(Request $request){
        $usuario = $request->nickname;
        $usuarioMinuscula = strtolower($usuario);
        $existe=false;

        $usuarios = Usuario::all();
        foreach($usuarios as $usu){
            
            if(($usu -> nickname) == $usuario || strtolower($usu -> nickname) == $usuarioMinuscula){
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

        $valorUnico = uniqid(); // Generar un valor único
        cookie('valor_unico', $valorUnico, 60); // Almacenar el valor en una cookie durante 60 minutos
        $data = [
            'juego1' => $juego1,
            'valorUnico' => $valorUnico,
        ];
        return view('juego', compact('data'));
    }

    public function juegoResto(Request $request){
        $valorUnicoCookie = cookie('valor_unico');
        $valorUnicoFormulario = $request->input('valor_unico');

        $usu = $request->usuario;
        $prob = $request->prob;
        $opcion = $request->opcion;
        $juego1 = Juego::where('id', $opcion)->first();
        if ($juego1->probabilidad == 0 || $juego1->probabilidad == 100) {
            return view('juegoFin', compact('juego1'));
        }else{
            if ($valorUnicoCookie === $valorUnicoFormulario) {
                 Usuario::where('nickname', $usu)
                ->update(['puntos'=>$prob]);

                $data = [
                    'juego1' => $juego1,
                    'valorUnico' => $valorUnicoCookie,
                ];
                return view('juego', compact('data'));

            } else {
                Usuario::where('nickname', $usu)
                ->delete();
                return view('trampas', compact('usu'));
            }
           
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
        $img = $request->imagen;

        Usuario::where('nickname', $usu)
            ->update(['imagen'=>$img]);

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

    public function descargarPDF2(Request $request){

        $puesto = $request->puesto;
        $usuario = $request->nombre;
        $puntos = $request->puntos;
        $fecha = $request->fecha;
        $hora = $request->hora;

        $pdf = PDF::loadView('pdf2', ['puesto'=>$puesto,'nombre'=>$usuario,'puntos'=>$puntos,'fecha'=>$fecha,'hora'=>$hora]);
        // $pdf->loadHTML('<h1>Hola</h1>');
        return $pdf->download('EligeTuCamino.pdf');
    }


}


