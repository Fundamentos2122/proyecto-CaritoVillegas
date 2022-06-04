<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_noticiaadmin.css">
    <title>Bolitas de Pelo</title>
</head>
<body>
    <?php include("./layout/layaut.php"); ?> 
    <div class="header">
        <div class="headercen">
            <a href="index.php"><img class="logo" src="../Imagenes/LOGO3.png" alt=""></a>
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
            <form action="#" id="form-tweet">
                    <h3>Ingresa tu id de usuario</h3>
                    <input type="text" name="id_user" placeholder="id de usuario" required>
                    <button type="submit">Buscar</button>
            </form>
        <div class="gato" id="gatos">

        </div> 
    </div>  
    <?php 
       /* include("modal_editarNoticia.php");*/
        //include("modal_adoptar.php"); 
    ?>  
    <script src="../assets/js/appG.js"></script>
</body>
</html>