<?php 

include("../models/DB.php");
include("../models/Solicitudes.php");

try{
    $connection = DBConnection::getConnection();

}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(array_key_exists("id",$_GET)){
        //Obtener un solo registr
        try{
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM solicitudes WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $noticia;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $solicitud = new Solicitudes($row["id"],$row["id_gato"],$row["id_user"],$row["fecha"],$row["aceptada"] );            
            }
            /*var_dump($noticia->getArray());
            echo $noticia;*/
            echo json_encode($solicitud->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM solicitudes WHERE aceptada = 1');
            $query->execute();
    
            $noticias = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $solicitud = new Solicitudes($row["id"],$row["id_gato"],$row["id_user"],$row["fecha"],$row["aceptada"]);    
    
                $solicitudes[] = $solicitud->getArray();//Push
            }
            /*var_dump($noticias);
            echo $noticias;*/
            echo json_encode($solicitud);
        }

        catch(PDOException $e){
            echo $e;
        }
    }
    
}

else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("id_user",$_POST)){
        var_dump($_POST);
        //Utilizar el arreglo $_POST
        $photo = "";
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];

            $photo = file_get_contents($tmp_name);
        }
        if($_POST["_method"] === "POST"){

            postSolicitud( $_POST["id_gato"], $_POST["id_user"], $_POST["fecha"],  true);
        }
        else if($_POST["_method"] === "PUT"){
            putNoticia($_POST["id"], $_POST["titulo"], $_POST["descripcion"],$_POST["completa"],true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){
            deleteNoticia($_POST["id"],true);
        }
    }
    exit();
}

function postSolicitud($id_gato, $id_user, $fecha, $redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO solicitudes VALUES(NULL, :id_gato, :id_user, :fecha, 0 )');
        $query->bindParam(':id_gato', $id_gato, PDO::PARAM_STR);
        $query->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->execute();


        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/solicitudes_admin.php');
            }
            else {
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function putNoticia($id, $titulo, $descripcion, $completa,  $redirect){
    //var_dump($id);
    global $connection;
    try{
        $query = $connection->prepare('UPDATE noticias SET titulo = :titulo, descripcion = :descripcion, completa = :completa WHERE id = :id');
        $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':completa', $completa, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/noticias_admin.php');
            }
            else {
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function deleteNoticia($id,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE noticias SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/noticias_admin.php');
            }
            else {
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }
}
?>