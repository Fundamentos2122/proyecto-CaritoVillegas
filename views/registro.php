<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_registro.css">
    <title>Registro</title>
</head>
<body>
    
    <div class="container">
        <img class="logo" src="../Imagenes/LOGO3.png" alt="">
        <form class="canteiner" action="../controllers/usersController.php" method="POST" autocomplete="off"  enctype="multipart/form-data" >
            <div class="canteiner"> 
                <input class="inp" type="text" placeholder="NOMBRE" name="nombres"> 
                <input class="inp" type="text" placeholder="APELLIDOS" name="apellidos">
                <input class="inp" type="number" placeholder="EDAD" name="edad">
                <input class="inp" type="text" placeholder="DIRECCIÓN" name="direccion">
                <input class="inp" type="tel" placeholder="NUMERO DE CELULAR" name="celular">
                <input class="inp" type="text" placeholder="CORREO" name="correo"> 
                <input class="inp" type="password" placeholder="CONTRASEÑA" name="password">
                <br>
                <label for="photo">Favor de subir foto DE INE(formato png)</label>
                <br>
                <input  type="file" name="photo"><br>
                <input class="inp" type="text" placeholder="USERNAME" name="username">
            </div>

            
        <div class="trato">
            <p>Al darle click al checbox estaras realizando promesa de esterilizacion sin esta no puedes registrarte</p> <input type="checkbox" name="check">
        </div> 
        <input type="submit" value="ENVIAR">
    </form>
        
    </div>
</body>
</html>