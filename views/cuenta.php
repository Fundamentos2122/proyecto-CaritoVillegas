<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_cuenta.css">
    <title>Bolitas de Pelo</title>
</head>
<body>
    <?php include("./layout/layaut.php"); ?> 
    <div class="header">
        <div class="headercen">
            <a href="index_logeado.php"><img class="logo" src="../Imagenes/LOGO3.png" alt=""></a>
        </div>
        
    </div>
    
    <div class="menu">
            <a href="galeria.php" class="navitem">GALERIA</a>
            <a href="noticias.php" class="navitem">NOTICIAS</a>
    </div>

    <div class="login">
        <button class="boton" name="ing" type="button" role="link" onclick="window.location='cuenta.php'">Solicitudes</button>
        <button class="boton" name="ing" type="button" role="link" onclick="window.location='../index.php'">Salir</button>
    </div>

    <div class="container">
        <div class="subcontainer1">
            <div class="dato">
                <h6>Nombre</h6>
                <p class="pdato">Carolina</p>
            </div>

            <div class="dato">
                <h6>Apellido</h6>
                <p class="pdato">Villegas Carranza</p>
            </div>

            <div class="dato">
                <h6>Edad</h6>
                <p class="pdato">20</p>
            </div>

            <div class="dato">
                <h6>Direccion</h6>
                <p class="pdato">091 Rivas Trace Apt. 273</p>
            </div>

            <div class="dato">
                <h6>Celular</h6>
                <p class="pdato">4448464211</p>
            </div>

            <div  class="dato">
                <h6>Correo</h6>
                <p class="pdato">ejemplo@hotmail.com</p>
            </div>
        </div>
        <div class="subcontainer2">
            <button class="boton" name="ing" type="button" role="link" onclick="window.location='solicitudes.php'">Solicitudes</button>

            
        </div>
        
    </div>
</body>
</html>