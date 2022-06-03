<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_login.css">
    <title>Log in</title>
</head>
<body>
    <?php include("./layout/layaut.php"); ?> 
    <form action="../controllers/accessController.php" method="POST" autocomplete="off" class="container">
        <img class="logo" src="../Imagenes/LOGO3.png" alt="">
        <input type="hidden" name="_method" value="POST">
        <label for="username"></label>
        <input class="inp" type="text" placeholder="USUARIO" name="username"> 
        <label for="password"></label>
        <input class="inp" type="password" placeholder="CONTRASEÑA" name="password">
        <input type="submit" value="ENVIAR">
        <p class="registro">Si no tienes una cuenta <a href="registro.php">registrate</a></p>
    </form>

</body>
</html>