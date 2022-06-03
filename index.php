<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_index.css">
    <title>Bolitas de Pelo</title>
</head>
<body  >
        <?php include("./views/layout/layout.php"); ?> 
    <div class="header">
        <div class="headercen">
            <a href="index.html"><img class="logo" src="./Imagenes/LOGO3.png" alt=""></a>
        </div>
        
    </div>
    
    <div class="menu">
            <a href="views/login.php" class="navitem">GALERIA</a>
            <a href="views/login.php" class="navitem">NOTICIAS</a>
    </div>

    <div class="login">
        <button class="boton" name="ing" type="button" role="link" onclick="window.location='views/login.php'">Log in</button><a href="">
    </div>

    <div class="container">
        <div class="subcontainer1">
            <div class="collage">
                <a href="views/login.php"> <img class= collageimg src="./Imagenes/PELUSA2.jpg" alt=""></a>
            </div>
            <div class="consejo">
                <h3>CONSEJO DEL DIA</h3>
                <p>No olvides cepillar a tus gatos, de esta forma evitas nudos, bolas de pelo y eliminas en cierto porcentaje la cantidad de pelo que botan al día.</p>
            </div>
        </div>

        <div class="subcontainer2">
           <a href="views/login.php"> <img class="michinoticias" src="./Imagenes/MICHINOTICIAS.png" alt=""> </a>

        </div>
        

    </div>
</body>
</html>
