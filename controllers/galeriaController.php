<?php 

include("../models/DB.php");
include("../models/Gato.php");

try{
    $connection = DBConnection::getConnection();

}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(array_key_exists("id",$_GET)){
        //Obtener un solo registro
        try{
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM gatos WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $gato;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $gato = new Gato($row['id'], $row['nombre'], $row['edad'], $row['descripcion'], $row['photo'], $row['adoptado'], $row['active']);    
            }
            /*var_dump($noticia->getArray());
            echo $noticia;*/
            echo json_encode($gato->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM gatos WHERE active = 1');
            $query->execute();
    
            $gatos = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $gato = new Gato($row['id'], $row['nombre'], $row['edad'], $row['descripcion'], $row['photo'], $row['adoptado'], $row['active']); 

                $gatos[] = $gato->getArray();//Push
            }
            //echo $noticias;*/
            echo json_encode($gatos);
        }

        catch(PDOException $e){
            echo $e;
        }
    }
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("nombre",$_POST)){
        var_dump($_POST);
        //Utilizar el arreglo $_POST
        $photo = "";
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];

            $photo = file_get_contents($tmp_name);
        }
        if($_POST["_method"] === "POST"){

            postGato($_POST["nombre"], $_POST["edad"], $_POST["descripcion"] , $photo, true);
        }
        else if($_POST["_method"] === "PUT"){
            putGato($_POST["id"], $_POST["nombre"], $_POST["edad"], $_POST["descripcion"] , true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){
            deleteGato($_POST["id"],true);
        }
    }
    exit();
}

function postGato($nombre, $edad, $descripcion, $photo, $redirect){
    global $connection; 

    try{
        //$query = $connection->prepare('INSERT INTO noticias VALUES(NULL, :titulo, :descripcion, :completa, :photo, 1 )');
        $query = $connection->prepare('INSERT INTO gatos VALUES(NULL, :nombre, :edad, :descripcion, :photo, 0, 1 )');
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':edad', $edad, PDO::PARAM_STR);
        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo, PDO::PARAM_STR);
        $query->execute();
        

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/galeria_admin.php');
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

function putGato($id, $nombre, $edad, $descripcion, $redirect){
    //var_dump($id);
    global $connection;
    try{
        $query = $connection->prepare('UPDATE gatos SET nombre = :nombre, edad = :edad, descripcion = :descripcion WHERE id = :id');
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':edad', $edad, PDO::PARAM_STR);
        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/galeria_admin.php');
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

function deleteGato($id,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE gatos SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/BolitasdePelo/views/galeria_admin.php');
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