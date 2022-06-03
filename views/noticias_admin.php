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
            <a href="index_admin.php"><img class="logo" src="../Imagenes/LOGO3.png" alt=""></a>
        </div>
        
    </div>
    
    <div class="menu">
            <a href="galeria_admin.php" class="navitem">GALERIA</a>
            <a href="noticias_admin.php" class="navitem">NOTICIAS</a>
    </div>

    <div class="login">
        <button class="boton" name="ing" type="button" role="link" onclick="window.location='cuenta_admin.php'">Solicitudes</button>

        <button class="boton" name="ing" type="button" role="link" onclick="window.location='../index.php'">Salir</button>
    
    </div>

    <div class="container">
        <div class="subcont">
            <form action="../controllers/noticiasController.php" method="POST" id="form-noticia" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <label>TITULO DE NOTICIA:</label>
                <input type="text" name="titulo"/>
                <br>
                <label for="descripcion">DESCRIPCION:</label>
                <textarea name="descripcion"></textarea>
                <br>
                <label for="completa">NOTICIA COMPLETA:</label>
                <textarea name="completa"></textarea>
                <br>
                <label for="img_url">FOTO</label>
                <input  type="file" name="photo">
                <br>
                <input type="submit" value="Agregar">
            </form>
        </div>
        <div class="gato" id="gatos">
         <!--<div class="card">
                        <div class="card-img">
                            <img src="https:\\picsum.photos/600" alt="">
                        </div>
                        
                        <div class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora corporis consequuntur maiores obcaecati incidunt illo. Eveniet unde deleniti cupiditate odit ducimus nisi atque et delectus saepe, itaque dolorem tempora. Tenetur.
                        </div>
                        <button class="adopta">x</button>
            </div> -->

        </div>
    </div>

    <?php 
        include("modal_editarNoticia.php");
        include("modal_eliminarNoticia.php"); 
    ?>
    <script src="../assets/js/appadminNoticias.js"></script>
    
</body>
</html>