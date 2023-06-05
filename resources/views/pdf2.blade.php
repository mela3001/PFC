<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center; align-content: center">
        <br><br><br><br><br><br><br><br><br><br>
       <div style="text-align: center; background-color:#e6c5f6; padding:10px; border: 5px solid #CB5EFF">
            <br>
            <img src="img/enhorabuena.png" alt="Imagen de enhorabuena" width="100px">
            <br><br>
            <h1>¡¡¡<span style="color:#CB5EFF;">{{$nombre}}</span> con el <span style="color:red;">{{$puesto}}º</span> puesto!!!</h1>
            <br>
            <h2>El usuario <span style="color:#CB5EFF;">{{$nombre}}</span> ha obtenido <span style="color:green;">{{$puntos}} puntos</span> consiguiendo así <br>el <span style="color:red;">{{$puesto}}º</span> puesto.</h2>
            <br>
            <p style="font-size: 17px">Estos resultados se registraron con fecha <b>{{$fecha}}</b> y hora <b>{{$hora}}</b></p>
        </div>
        <div style="text-align: center;">
            <h3><img src="img/camino.png" alt="Emoticono" style="width: 35px">Elige Bien Tu Camino</h3>
        </div> 
    </div>
    
</body>
</html>