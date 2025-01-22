<?php
    include "connection.php";

    if (isset($_GET["verbs"])) {//No entra al if porque el get no tiene el valor "verbs"
        //obtener solo los verbos
        $verbs = $_GET["verbs"];
        $query = $connection->prepare("SELECT * FROM verbos_irregulares");
        $query->bindParam(":verbs", $verbs);
    } else {
        //obtener todas las palabras en inglés y español
        $query = $connection->query("SELECT english_word, spanish_word, category FROM english_spanish_words");
    }

    // Obtener los resultados como un arreglo asociativo
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // Devolver los resultados como un arreglo JSON
    echo json_encode($results);
?>