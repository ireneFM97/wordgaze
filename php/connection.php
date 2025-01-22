<?php
//Establece la conexión entre el servidor y la base de datos
    $serverName = "localhost";
    $userName = "root";
    $passwordServer = "root";

    try{
        $connection = new PDO("mysql:host=$serverName; dbname=wordgaze", $userName, $passwordServer);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error " . $e->getMessage();
        die();
    }
?>