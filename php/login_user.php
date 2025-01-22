<?php
    session_start();
    include "connection.php";
    
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    //Comprobar que no venga del formulario ningún dato vacio
    if($email == "" || $password == ""){
        header('Location: ../login.php');
    }else{
        //Guardo en un variable si el usuario o contraseña son correctos (me devuelve true o false)
        $validateLogin = "SELECT * FROM users WHERE email = '$email' AND password_user = '$password'";
        $resultLogin = $connection->query($validateLogin);
        $validateExists = $resultLogin->fetchColumn();
        //Si estan bien los datos y existen en la bbdd creo la variable de sesion y hago que me lleve a start.php
        if($validateExists){
            $_SESSION["userEmail"] = $email;
            
            $queryName = "SELECT first_name FROM users WHERE email = '$email'";
            $resultName = $connection->query($queryName);
            $userName = $resultName->fetchColumn();
            
            $_SESSION['name'] =$userName;

            $querySurnames = "SELECT surnames FROM users WHERE email = '$email'";
            $resultSurnames = $connection->query($querySurnames);
            $surNames = $resultSurnames->fetchColumn();
            
            $_SESSION['surnames'] =$surNames;

            $responseLogin = array('success' => true, 'messageLogin' => 'Acceso correcto');
            echo json_encode($responseLogin);
        }else{
            $responseLogin = array('success' => false, 'messageLogin' => 'Email o contraseña incorrectos');
            echo json_encode($responseLogin);
        }
    }

    $connection = null;
?>