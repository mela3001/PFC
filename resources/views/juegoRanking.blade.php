<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <!-- bootstrap -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Creepster&family=Dosis:wght@500&family=Mansalva&display=swap" rel="stylesheet">
</head>
<body class="juego">
    <!-- CABECERA -->
    <header class="d-flex justify-content-center w-100">
        <!-- título -->
        <div class="p-2 text-center titulo-pagina">
            <div class="d-flex justify-content-center align-items-center h-100">
                <h1>Elige bien tu camino...</h1>
            </div>
        </div>
        <!-- fin título -->
    </header>
    <!-- FIN CABECERA -->
    <main class="d-flex flex-column  align-items-center">
        <form action="{{route('home')}}">
            <button type="submit" name="button" class="btn op1_btn mb-3">Volver al inicio</button>
        </form>
        <div class="primer">
           <!-- Background image -->
                <div class="d-flex justify-content-center align-items-center w-100">
                <!-- CARD -->
                <div class="user_card-puntuacion">
                    <div class="m-5">
                       <table class="table table-hover text-center">
                        <thead>
                          <tr>
                            <th scope="col">Posición</th>
                            <th scope="col">Perfil</th>
                            <th scope="col">Nickname</th>
                            <th scope="col">Puntos</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Compartir</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($usuarios as $usuario)
                                @if($usuario->nickname == $usu)
                                    <tr style="background: #f4dbff">
                                        <th scope="row">{{$contador}}</th>
                                        <td><img src="img/{{$usuario->imagen}}" alt="Imagen de usuario" style="width: 40px; border-radius: 50%;"></td>
                                        <td>{{$usuario->nickname}}</td>
                                        <td>{{$usuario->puntos}}</td>
                                        <td>{{$usuario->fecha}}</td>
                                        <td>{{$usuario->hora}}</td>
                                        <td>
                                            <form action="{{route('descargarPDF')}}" method="GET">
                                                @csrf
                                                <input type="hidden" name="puesto" value="{{$contador}}">
                                                <input type="hidden" name="nombre" value="{{$usuario->nickname}}">
                                                <input type="hidden" name="puntos" value="{{$usuario->puntos}}">
                                                <input type="hidden" name="fecha" value="{{$usuario->fecha}}">
                                                <input type="hidden" name="hora" value="{{$usuario->hora}}">
                                                <button type="submit" name="button" style="border:none; background:none"><img src="img/descargar-pdf.png" alt="Descargar pdf" style="width: 35px;"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th scope="row">{{$contador}}</th>
                                        <td><img src="img/{{$usuario->imagen}}" alt="Imagen de usuario" style="width: 40px; border-radius: 50%;"></td>
                                        <td>{{$usuario->nickname}}</td>
                                        <td>{{$usuario->puntos}}</td>
                                        <td>{{$usuario->fecha}}</td>
                                        <td>{{$usuario->hora}}</td>
                                        <td>
                                            <form action="{{route('descargarPDF')}}" method="GET">
                                                @csrf
                                                <input type="hidden" name="puesto" value="{{$contador}}">
                                                <input type="hidden" name="nombre" value="{{$usuario->nickname}}">
                                                <input type="hidden" name="puntos" value="{{$usuario->puntos}}">
                                                <input type="hidden" name="fecha" value="{{$usuario->fecha}}">
                                                <input type="hidden" name="hora" value="{{$usuario->hora}}">
                                                <button type="submit" name="button" style="border:none; background:none"><img src="img/descargar-pdf-deshabilitado.png" alt="Descargar pdf" style="width: 35px;"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @php
                                $contador++;
                            @endphp
                            @endforeach
                        </tbody>
                      </table> 
                    </div>
                </div>
                <!-- FIN CARD -->
                </div>
            <!-- Background image -->
        </div>
        
    </main>
    <footer class="d-flex justify-content-center w-100">
        <!-- título -->
        <div class="p-2 text-center titulo-pagina pie">
            <div class="d-flex justify-content-center align-items-center h-100">
                <h3>Ranking</h3>
            </div>
        </div>
        <!-- fin título -->
    </footer>
</body>
</html>