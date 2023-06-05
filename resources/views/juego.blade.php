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
    {{-- favicon --}}
    <link rel="icon" type="image/jpg" href="img/camino.png"/>
</head>
{{-- <audio id="myAudio" src="{{ asset('audio/aves.mp3') }}"></audio>
<body onload="playAudio()"> --}}
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
        <div class="primer">
           <!-- Background image -->
                <div class="d-flex justify-content-center align-items-center w-100">
                <!-- CARD -->
                
                <div class="user_card-juego">
                    <div class="d-flex justify-content-center">
                        <!-- IMAGEN -->
                        <div class="img-juego">
                            <img src="img/{{ $juego1->imagen }}" alt="Imagen">
                        </div>
                        <!-- FIN IMAGEN -->
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center form_container">
                        <div class="text-center h-100 titulo titulo-juego p-4">
                            <h4>{{ $juego1->titulo }}</h4>
                        </div>
                        <!-- FORMULARIO -->
                        <div class="d-flex justify-content-center mt-3 login_container botones-juego">
                            <form action="{{route('juegoResto')}}" method="POST">
                                @csrf
                                @method('PUT') 
                                <div class="d-flex justify-content-center login_container w-100">
                                    <input type="hidden" name="opcion" value="{{$juego1->opcion1ruta}}">
                                    <input type="hidden" name="usuario" value='{{session('usuario')}}'>
                                    <input type="hidden" name="prob" value="{{$juego1->probabilidad}}">
                                    <button type="submit" class="btn op1_btn" onclick="goToNextPage()">{{ $juego1->opcion1 }}</button>
                                </div>
                            </form>
                            <form action="{{route('juegoResto')}}" method="POST">
                                @csrf
                                @method('PUT') 
                                <div class="d-flex justify-content-center login_container w-100">
                                    <input type="hidden" name="opcion" value="{{$juego1->opcion2ruta}}">
                                    <input type="hidden" name="usuario" value='{{session('usuario')}}'>
                                    <input type="hidden" name="prob" value="{{$juego1->probabilidad}}">
                                    <button type="submit" class="btn op1_btn" onclick="goToNextPage()">{{ $juego1->opcion2 }}</button>
                                </div>
                            </form>  
                        </div>
                        
                        <!-- FIN FORMULARIO -->
                    </div>
                </div>
                <!-- FIN CARD -->
                </div>
            <!-- Background image -->
            <!-- Background image2 -->
                <div class="d-flex flex-column justify-content-center align-items-center w-100">
                    <!-- CARD -->
                    <div class="p-4 user_card2-juego d-flex flex-column justify-content-center align-items-center">
                        <div class="icono-muerte">
                            <img src="img/diablo.png" alt="Icono de la muerte">
                        </div>
                        <div class="titulo text-center m-5">
                            <h4>PROBABILIDAD DE SOBREVIVIR</h4>
                        </div>
                        <div class="probabilidad-juego">
                            <h4>{{ $juego1->probabilidad }}%</h4>
                        </div>
                    </div>
                    <!-- FIN CARD -->
                </div>
            <!-- Background image2 --> 
        </div>
        
    </main>
    <footer class="d-flex justify-content-center w-100">
        <!-- título -->
        <div class="p-2 text-center titulo-pagina pie">
            <div class="d-flex justify-content-center align-items-center h-100">
                <h3>Debes terminar el juego para poder salir.</h3>
            </div>
        </div>
        <!-- fin título -->
    </footer>

    {{-- SCRIPTS --}}
    {{-- <script>
        function playAudio() {
          var audio = document.getElementById("myAudio");
          audio.play();
        }
        </script> --}}
</body>
</html>