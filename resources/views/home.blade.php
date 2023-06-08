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
<body>
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
            <div class="p-5 text-center bg-image">
                <div class="d-flex justify-content-center align-items-center w-100">
                <!-- CARD -->
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <!-- IMAGEN -->
                        <div class="brand_logo_container">
                            <img src="img/camino.png" class="brand_logo" alt="Logo">
                        </div>
                        <!-- FIN IMAGEN -->
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <!-- FORMULARIO -->
                        {{--  --}}
                        <form action="{{route('juegoPrimero')}}">
                            <div class="input-group mb-3">
                                <input type="text" name="nickname" class="form-control input_user" placeholder="Nickname" required>
                            </div>
                            <div id="mensaje" @if ($usuarioExiste) style="display: block;" @else style="display: none;" @endif>
                                <p style="color: red; background-color:rgb(255, 237, 237)"> <img src="img/alerta.png" alt="Icono de alerta" style="width: 30px">El usuario ya existe, introduzca otro nickname.</p>
                              </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <!-- <button type="button" name="button" class="btn login_btn">PLAY</button> -->
                                <input type="submit" class="btn login_btn" value="PLAY">
                            </div>
                            <!-- <div class="d-flex justify-content-center">
                                <input type="file" placeholder="Change profile">
                            </div> -->
                        </form>
                        <!-- FIN FORMULARIO -->
                    </div>
                </div>
                <!-- FIN CARD -->
                </div>
                
            </div>
            <!-- Background image -->
            <!-- Background image2 -->
            <div class="p-3 text-center bg-image2">
                <div class="d-flex flex-column justify-content-center align-items-center w-100">
                    <div class="trofeo">
                        <img src="img/trofeo (1).png" alt="Trofeo">
                    </div>
                    <!-- CARD -->
                    {{-- @foreach ($usuarios as $usuario) --}}
                        <div class="user_card2 d-flex flex-column justify-content-center align-items-center">
                            <div>
                                <h2>{{$usuario1->nickname}}</h2>
                            </div>
                            <div class="puntosNum">
                                <h1>{{$usuario1->puntos}}</h1>
                            </div>
                            <div>
                                <h3>puntos</h3>
                            </div>
                            <div class="gris">
                                <h3>{{$usuario1->fecha}}</h3>
                            </div>
                            <div class="gris">
                                <h3>{{$usuario1->hora}}</h3>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                    <!-- FIN CARD -->
                    <!-- FORMULARIO -->
                    <form action="{{route('juegoRanking')}}">
                        <div class="d-flex justify-content-center mt-3 login_container ranking">
                            <button type="submit" name="button" class="btn ranking_btn">RANKING</button>
                        </div>
                    </form>
                    <!-- FIN FORMULARIO -->
                </div>
            </div>
            <!-- Background image2 --> 
        </div>
        


        <div class="segundo">
            <!-- Background image -->
            <div class="p-5 text-center bg-image3">
                <div class="d-flex justify-content-center align-items-center w-100">
                <!-- CARD -->
                <div class="user_card3">
                    <div class="text-center h-100 titulo">
                        <h1>Elige bien tu camino...</h1>
                        <h2 class="mb-5">¿En qué consiste el juego?</h2>
                        <h4>
                            "Elige bien tu camino" te invita a sumergirte en una aventura llena de decisiones determinantes para tu destino. En cada fase, enfrentarás preguntas y desafíos cruciales que te obligarán a elegir un camino y realizar acciones significativas. <br>Un porcentaje te mostrará las probabilidades de éxito y supervivencia en cada etapa. <br>¡Explora, decide con sabiduría y descubre los emocionantes giros que te esperan en esta experiencia interactiva única!
                        </h4>
                    </div>
                </div>
                <!-- FIN CARD -->
                </div>
                
            </div>
            <!-- Background image -->
        </div>

        <div class="tercero">
            <!-- Background image -->
            <div class="p-5 text-center bg-image4">
                <div class="d-flex justify-content-center align-items-center w-100">
                    <!-- enlaces -->
                    <ul class="wrapper">
                        {{-- <li class="icon facebook">
                            <span class="tooltip">Facebook</span>
                            <div class="icono"><i class="bi bi-facebook"></i></i></div> --}}
                        {{-- </li> --}}
                        <li class="icon linkedin">
                            <span class="tooltip">Linkedin</span>
                            <a href="https://www.linkedin.com/in/carmen-raquel-yelmo-guzm%C3%A1n"><div class="icono"><i class="bi bi-linkedin"></i></i></div></a>
                        </li>
                        <li class="icon github">
                            <span class="tooltip">GitHub</span>
                            <a href="https://github.com/mela3001/PFC.git"><div class="icono"><i class="bi bi-github"></i></div></a>
                        </li>
                        {{-- <li class="icon instagram">
                            <span class="tooltip">Instagram</span>
                            <div class="icono"><i class="bi bi-instagram"></i></div>
                        </li> --}}
                    </ul>
                    
                    <!-- fin enlaces -->
                </div>
            </div>
            <!-- Background image -->
        </div>
       
    </main>
</body>
</html>
