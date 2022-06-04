<?php 
    //Indicamos que haremos uso de la sesión
    session_start();

    if(!array_key_exists("username", $_SESSION)) {
        
        header('Location: http://localhost/BolitasdePelo/');
        exit();
    }
    if($_SESSION["type"]!=="normal"){

        header('Location: http://localhost/BolitasdePelo/index_admin.php');
        exit();
    }

?>

<body style="background-image: url('../Imagenes/FONDO1.png');">