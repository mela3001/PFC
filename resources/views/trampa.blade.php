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
                <div class="user_card-juego p-5">
                    <div class="d-flex flex-column justify-content-center align-items-center form_container">
                        <div class="text-center h-100 titulo">
                            <h4>Has hecho trampas <b>{{ $usu }}</b>... por lo tanto se elimina tu partida.</h4>
                        </div>
                        <br><br><br>
                        <!-- FORMULARIO -->
                        <form action="{{route('home')}}">
                            <button type="submit" name="button" class="btn op1_btn mb-3">Volver al inicio</button>
                        </form>
                        <!-- FIN FORMULARIO -->
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
                <h3>El juego ha terminado, ya puedes salir.</h3>
            </div>
        </div>
        <!-- fin título -->
    </footer>
</body>
</html>