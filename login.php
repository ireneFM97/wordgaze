<?php    
    session_start();
    //Si el email esta definido y no es nulo se redirige a start.php
    if(isset($_SESSION['userEmail'])){
        header('Location: start.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordgaze</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="body">
    <main>
        <div class="container">
            <div class="backbox">
                <div class="backbox-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button class="btn" id="btn-login">Iniciar sesión</button>
                </div>
                <div class="backbox-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button class="btn" id="btn-register">Regístrate</button>
                </div>
            </div>

            <!--Formulario de Login y register-->
            <div class="container-forms">
                <!--Login-->
                <form action="php/login_user.php" method="POST" class="form_login">
                    <h2>Iniciar sesión</h2>
                    <input type="email" class="input" id="email-login" name="email" placeholder="Correo electrónico">
                    <p class="error" id="error-email-login">Escribe un usuario válido</p>
                    <div class="container-password">
                    <input type="password" class="input password" id="password-login" name="password" placeholder="Contraseña">
                    <span class="material-icons eye">visibility_off</span>
                    </div>
                    <p class="error" id="error-password-login">Este campo no puede estar vacío</p>
                    <input type="submit" class="button-input" name="submit-login" id="submit-login" value="Iniciar sesión">
                </form>
                <div class="error-back" id="error-login">

                </div>

                <!--Register-->
                <form action="" method="POST" class="form_register">
                    <h2>Registrarse</h2>
                    <input type="text" class="input" name="first-name" id="first-name" placeholder="Nombre">
                    <p class="error" id="error-name">Este campo no puede estar vacío</p>
                    <input type="text" class="input" name="surnames" id="surnames" placeholder="Apellidos">
                    <p class="error" id="error-surnames">Este campo no puede estar vacío</p>
                    <input type="email" class="input" name="email" id="email-register" placeholder="Correo electrónico">
                    <p class="error" id="error-email">Este campo no puede estar vacío</p>
                    <input type="text" class="input" name="user" id="user" placeholder="Usuario">
                    <p class="error" id="error-user">Este campo no puede estar vacío</p>
                    <div class="container-password">
                    <input type="password" class="input password" name="password" id="password-register" placeholder="Contraseña">
                    <span class="material-icons eye">visibility_off</span>
                    </div>
                    <p class="error" id="error-password-register">Este campo no puede estar vacío</p>
                    <input type="submit" class="button-input" name="submit-register" id="submit-register" value="Regístrate">
                </form>
                <div class="error-back" id="error-register">

                </div>
            </div>
        </div>
    </main>

    <script src="assets/js/login.js"></script>
</body>
</html>