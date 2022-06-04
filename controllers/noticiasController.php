<?php 

include("../models/DB.php");
include("../models/Noticia.php");

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

            $query = $connection->prepare('SELECT * FROM noticias WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $noticia;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $noticia = new Noticia($row['id'], $row['titulo'], $row['descripcion'], $row['completa'], $row['photo'], $row['active']);    
            }
            /*var_dump($noticia->getArray());
            echo $noticia;*/
            echo json_encode($noticia->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM noticias WHERE active = 1');
            $query->execute();
    
            $noticias = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $noticia = new Noticia($row['id'], $row['titulo'], $row['descripcion'], $row['completa'], $row['photo'], $row['active']);    
    
                $noticias[] = $noticia->getArray();//Push
            }
            /*var_dump($noticias);
            echo $noticias;*/
            echo json_encode($noticias);
        }

        catch(PDOException $e){
            echo $e;
        }
    }
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("titulo",$_POST)){
        var_dump($_POST);
        //Utilizar el arreglo $_POST
        $photo = "";
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["photo"]["tmp_name"];

            $photo = file_get_contents($tmp_name);
        }
        if($_POST["_method"] === "POST"){

            postNoticia($_POST["titulo"], $_POST["descripcion"] ,$_POST["completa"], $photo, true);
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

function postNoticia($titulo, $descripcion, $completa, $photo, $redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO noticias VALUES(NULL, :titulo, :descripcion, :completa, :photo, 1 )');
        $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':completa', $completa, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo, PDO::PARAM_STR);
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