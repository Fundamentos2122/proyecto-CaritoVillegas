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
    <?php include("./layout/layaut2.php"); ?> 
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
    <form action="../controllers/solicitudesController.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="_method" value="POST">
                    <h3>da clic en adoptar para ver que id tiene el gato</h3>
                    <textarea id="form-edit-id" name=""  disabled="" style="resize:none" readonly cols="width" rows="high"required></textarea>
                    <input type="hidden" name="id_user" placeholder="id de usuario" value=<?php echo $_SESSION["id"] ?>>
                    <input type="hidden" name="id_gato" placeholder="escribe la id de arriba " id="id_gato" >
                    <input type="text" name="fecha" placeholder="fecha">
                    <input type="submit" value="Adoptar">
                </form>
            <div class="gato" id="gatos">
           

        </div>
    </div>
    <?php 
       /* include("modal_editarNoticia.php");*/
        //include("modal_adoptar.php"); 
    ?>
    <script src="../assets/js/appgaleria.js"></script>
</body>
</html>