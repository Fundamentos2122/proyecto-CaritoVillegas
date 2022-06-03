<?php 

include("../models/DB.php");
include("../models/User.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Obtener información del POST
    $nombres = trim($_POST["nombres"]);
    $apellidos = trim($_POST["apellidos"]);
    $edad = trim($_POST["edad"]);
    $direccion = trim($_POST["direccion"]);
    $celular = trim($_POST["celular"]);
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);
    $username = trim($_POST["username"]);
    
    
        
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $type = "normal";
    $photo = "";
    
    if (sizeof($_FILES) > 0) {
        $tmp_name = $_FILES["photo"]["tmp_name"];

        $photo = file_get_contents($tmp_name);
    }

    try {
        $query = $connection->prepare('INSERT INTO users VALUES(NULL, :nombres, :apellidos, :edad, :direccion, :celular, :correo,  :password, :photo, :username,:type)');
        $query->bindParam(':nombres', $nombres, PDO::PARAM_STR);
        $query->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $query->bindParam(':edad', $edad, PDO::PARAM_STR);
        $query->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $query->bindParam(':celular', $celular, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo, PDO::PARAM_STR);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la inserción";
        }
        else {
            header('Location: http://localhost/BolitasdePelo/views/index_logeado.php');

        }
    }
    catch(PDOException $e) {
        echo $e;
    }
}

?>