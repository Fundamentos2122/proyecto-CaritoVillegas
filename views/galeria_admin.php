<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_gatosadmin.css">
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
            <form action="../controllers/galeriaController.php" method="POST" id="form-gato" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <label>NOMBRE DE GATO:</label>
                <input type="text" name="nombre"/>
                <br>
                <label for="edad">EDAD:</label>
                <textarea name="edad"></textarea>
                <br>
                <label for="descripcion">DESCRIPCION:</label>
                <textarea name="descripcion"></textarea>
                <br>
                <label for="img_url">FOTO</label>
                <input  type="file" name="photo">
                <br>
                <input type="submit" value="Agregar">
            </form>
        </div>
        <div class="gato" id="gatos">
            
        </div>
    </div>

    <?php 
        include("modal_editarGaleria.php");
        include("modal_eliminarGaleria.php"); 
    ?>
    <script src="../assets/js/appadminGaleria.js"></script>
</body>
</html>