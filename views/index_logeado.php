<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_index.css">
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
            <div class="collage">
                <a href="galeria.php"> <img class= collageimg src="../Imagenes/PELUSA2.jpg" alt=""></a>
            </div>
            <div class="consejo">
                <h3>CONSEJO DEL DIA</h3>
                <p>No olvides cepillar a tus gatos, de esta forma evitas nudos, bolas de pelo y eliminas en cierto porcentaje la cantidad de pelo que botan al día.</p>
            </div>
        </div>

        <div class="subcontainer2">
           <a href="noticias.php"> <img class="michinoticias" src="../Imagenes/MICHINOTICIAS.png" alt=""> </a>

        </div>
        

    </div>
</body>
</html>