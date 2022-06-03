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
            $id= $_GET["id"];

            $query = $connection->prepare('SELECT * FROM solicitudes WHERE aceptada = 0');
            $query->bindParam(':id',$id_user,PDO::PARAM_INT);
            $query->execute();
    
            $solicitud;
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $solicitud = new Solicitudes($row["id"],$row["id_gato"],$row["id_user"],$row["fecha"],$row["aceptada"] );            
            }

            echo json_encode($solicitud->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM solicitudes WHERE aceptada = 0');//0 no disponible 1 si disponible
            $query->execute();
    
            $noticias = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $solicitud = new Solicitudes($row["id"],$row["id_gato"],$row["id_user"],$row["fecha"],$row["aceptada"]);    
    
                $solicitudes[] = $solicitud->getArray();//Push
            }
            /*var_dump($noticias);
            echo $noticias;*/
            echo("Ya puedes pasar por tu gato");
            header('Location: http://localhost/BolitasdePelo/views/cuenta.php');
        }

        catch(PDOException $e){
            echo $e;
        }
    }
    
}
?>