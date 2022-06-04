<?php 

// var_dump($_POST);

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
    if ($_POST["_method"] === "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        try {
            $query = $connection->prepare('SELECT * FROM users WHERE username = :username');
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() === 0) {
                echo "Usuario no encontrado";
                // header('Location: http://localhost/twitter/');
                exit();
            }

            $user;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $user = new User($row["id"],$row["nombres"],$row["apellidos"],$row["edad"],$row["direccion"],$row["celular"], $row["correo"],  $row["password"], $row["photo"],$row["type"],$row["username"] );
            }

            if (!password_verify($password, $user->getPassword())) {
                echo "Contraseña inválida";
                exit();
            }

            session_start();

            $_SESSION["id"] = $user->getId();
            $_SESSION["username"] = $user->getUsername();
            //$_SESSION["photo"] = $user->getPhoto();
            $_SESSION["type"] = $user->getType();

            if($_SESSION["type"] === "admin"){
                header('Location: http://localhost/BolitasdePelo/views/index_admin.php');
                exit();
            }
            elseif($_SESSION["type"] === "normal"){
                header('Location: http://localhost/BolitasdePelo/views/index_logeado.php');
                exit();
            }
            
        }
            
        
        catch(PDOException $e) {
            echo $e;
        }
    }
    else if($_POST["_method"] === "DELETE") {
        session_start();

        session_destroy();

        header('Location: http://localhost/BolitasdePelo/');

        exit();
    }
}

?>