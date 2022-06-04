<?php 

include("../models/DB.php");
include("../models/Solicitudes.php");
include("../models/Solicitudinfo.php");

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
            $query = $connection->prepare('SELECT solicitudes.id, solicitudes.fecha, gatos.nombre, users.nombres FROM `solicitudes` INNER JOIN `gatos` ON solicitudes.id_gato=gatos.id INNER JOIN `users` ON solicitudes.id_user=users.id;');
            $query->execute();
    
            $noticias = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $solicitud = new Solicitudinfo($row["id"],$row["fecha"],$row["nombre"],$row["nombres"]);    
    
                $solicitudes[] = $solicitud->getArray();//Push
            }
            /*var_dump($noticias);
            echo $noticias;*/
            echo json_encode($solicitudes);
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
            putSolicitud($_POST["id"],$_POST["id_gato"], $_POST["id_user"], $_POST["aceptada"],true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){
            deleteNoticia($_POST["id"],true);
        }
    }
    exit();
}

function postSolicitud($id_gato, $id_user,$fecha, $redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO solicitudes VALUES(NULL, :id_gato, :id_user, :fecha, 1 )');
        $query->bindParam(':id_gato', $id_gato, PDO::PARAM_STR);
        $query->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->execute();


        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/galeria.php');
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

function putSolicitud($id, $id_gato, $id_user,  $adoptada,  $redirect){
    //var_dump($id);
    global $connection;
    try{
        $query = $connection->prepare('UPDATE solicitudes SET id_gato = :id_gato, id_user = :id_user, aceptada= :aceptada WHERE id = :id');
        $query->bindParam(':id_gato', $id_gato, PDO::PARAM_STR);
        $query->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $query->bindParam(':aceptada', $adoptada, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/cuenta_admin.php');
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
                header('Location: http://localhost/BolitasdePelo/views/galeria.php');
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