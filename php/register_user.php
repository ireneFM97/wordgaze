<?php

    include "connection.php";

    $firstName = $_POST["first-name"];
    $surnames = $_POST["surnames"];
    $email = $_POST["email"];
    $user = $_POST["user"];
    $password = md5($_POST["password"]);//md5 para encriptar la contraseña

    $consultEmail = "SELECT email FROM users WHERE email = '$email'";
    $resultEmail = $connection->query($consultEmail);
    $emailExists = $resultEmail->fetchColumn();//Con fetchColumn devuelve la primera columna, en este caso email

    //Comprobar que no venga del formulario ningún dato vacio
    //Con json_encode envio los mensajes buenos y malos al login.js para que los muestre en pantalla. Lo que me coge es la parte del message y no success porque asi se lo digo en el login.js
    if($firstName == "" || $surnames == "" || $email == "" || $user == "" || $password == ""){
        header('Location: ../login.php');
    }else if($email == $emailExists){ //Comprobar si el email existe en la bbdd o no
        $response = array('success' => false, 'message' => 'Este usuario ya estaba registrado. Inicia sesión');
        echo json_encode($response);
    }else{
        $consultUser = "SELECT username FROM users WHERE username = '$user'";
        $resultUser = $connection->query($consultUser);
        $userExists = $resultUser->fetchColumn();//Con fetchColumn devuelve la primera columna, en este caso username
        //Antes de meter los datos compruebo si el usuario existe en la bbdd o no
        if($user == $userExists){
            $response = array('success' => false, 'message' => 'Nombre de usuario no disponible. Prueba con otro nombre');
            echo json_encode($response);//
        }else{
            //Si no existe ni el correo ni el usuario me lo crea con una inserción de datos en la bbdd
            //Se prepara una sentencia para la inserción de datos en la bbdd
            $stmt = $connection->prepare(
                "INSERT INTO users (first_name, surnames, email, username, password_user) VALUE (?, ?, ?, ?, ?)");
            //Con el metodo bindParam asigno los valores de cada variable a cada ?
            $stmt->bindParam(1, $firstName);
            $stmt->bindParam(2, $surnames);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $user);
            $stmt->bindParam(5, $password);
            $stmt->execute();//Te devuelve un true o false y hago la siguiente comprobacion de abajo

            //Comprobar el alta de los usuarios ha ido bien
            if($stmt){
                $response = array('success' => true, 'message' => 'Usuario registrado correctamente. Inicia sesión');
                echo json_encode($response);
            }else{
                $response = array('success' => false, 'message' => 'Algo ha ido mal. Intenta registrarte de nuevo');
                echo json_encode($response);
            }
        } 
    }

    $connection = null;
?>