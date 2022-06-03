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
?>