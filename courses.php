<?php
    session_start();
    //Si no existe la sesion ejecuta el siguiente código
    if(!isset($_SESSION['userEmail'])){
        echo "
            <script>
                alert('Debes iniciar sesión');
                window.location = 'login.php';
            </script>
        ";
        session_destroy();
        die();//Para de ejecutar el código
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <title>Wordgaze Courses</title>
</head>
<body>
<nav>
        <div class="container-logo">
            <h1>WORDGAZE</h1>
            <img class="logo" src="assets/imagen/logo_start.png" alt="logo de la página web con manchas de pintura de color azul, naranja y amarillo">
            <span class="material-symbols-outlined icon-menu">menu</span>
            <div class="options-menu">
                <a href="start.php" data-section="navBar" data-value="navBar1">Home</a>
                <a href="courses.php" data-section="navBar" data-value="navBar2">Courses</a>
                <a href="#" data-section="navBar" data-value="navBar3">Version Pro</a>
            </div>
            
            <div class="courses nav-bar">
                <a href="start.php" data-section="navBar" data-value="navBar1">Home</a>
                <a href="courses.php" data-section="navBar" data-value="navBar2">Courses</a>
                <a href="#" data-section="navBar" data-value="navBar3">Version Pro</a>
                <div class="animation start-home"></div>
            </div>
            <div id="flags" class="flags">
                <div class="flag__item" data-language="es">
                    <img class="flag spain" src="https://cdn-icons-png.flaticon.com/512/330/330557.png" alt="bandera de España">
                </div>
                <div class="flag__item selected" data-language="en">
                    <img class="flag" src="https://cdn-icons-png.flaticon.com/512/6737/6737832.png" alt="bandera de Reino Unido">
                </div>
            </div>
        </div>

        <div class="container-user">
            <div class="container-welcome">
            <p class="name-user" data-section="navBar" data-value="navBar4">Hi</p>
            <p class="name-user">
                <?php
                    echo $_SESSION['name'] . "!";
                ?>
            </p>
            </div>
            <span class="material-symbols-outlined icon-user" id="icon-options">account_circle</span>
            <div class="container-options">
                <div class="user-options">
                    <img class="img-user" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                    <div>
                        <h5>
                            <?php
                                echo $_SESSION['name'] . " " . $_SESSION['surnames'];
                            ?>
                        </h5>
                        <p>
                            <?php
                                echo $_SESSION["userEmail"];
                            ?>
                        </p>
                    </div>
                    
                </div>
                <div class="container-list">
                    <span class="material-symbols-outlined">person</span>
                    <a href="#" data-section="options" data-value="option1">Profile</a>
                </div>
                <div class="container-list">
                    <span class="material-symbols-outlined" id="icon-dark">light_mode</span>
                    <a href="#" id="text-mode-dark">Light mode</a>
                </div>
                <div class="container-list">
                    <span class="material-symbols-outlined">settings</span>
                    <a href="#" data-section="options" data-value="option2">Settings</a>
                </div>
                
                <a class="sign_out" href="php/cerrar_sesion.php" data-section="options" data-value="option3">Sign out</a>
            </div>
        </div>
    </nav>
    <div class="breadcrumb">
        <a href="start.php" class="breadcrumb-link"><span class="material-symbols-outlined">house</span></a>
        <span class="material-symbols-outlined">navigate_next</span>
        <a href="courses.php" class="breadcrumb-actual" data-section="linkBreadcrumb" data-value="linkBreadcrumb1">Courses</a>
    </div>
    <main id="main">
        <section class="courses-container-courses">
            <div class="container-text">
                <h1 class="title-h1" data-section="content" data-value="title3">Are you ready to learn English?</h1>
                <h3 class="text-h3" data-section="content" data-value="text3">Welcome to Wordgaze! Here you can learn and practice English in an easy and fun way</h3>
            </div>
            <div class="container-card">
                <a href="course_basic.php" class="courses-card-course">
                    <img src="assets/imagen/principiante.PNG" alt="tallo de una planta">
                    <div>
                        <h4 data-section="courses" data-value="titleBasic">Basic level</h4>
                        <p data-section="courses" data-value="descriptionBasic">A basic course designed for those who are beginning</p>
                    </div>
                </a>
                <a href="#" class="courses-card-course">
                    <img src="assets/imagen/medio.PNG" alt="planta pequeña">
                    <div>
                        <h4 data-section="courses" data-value="titleIntermediate">Intermediate level</h4>
                        <p data-section="courses" data-value="descriptionIntermediate">An intermediate level course for those who have already mastered the basic concepts of English grammar</p>
                    </div>
                </a>
                <a href="#" class="courses-card-course">
                    <img src="assets/imagen/avanzado.PNG" alt="planta grande">
                    <div>
                        <h4 data-section="courses" data-value="titleAdvanced">Advanced level</h4>
                        <p data-section="courses" data-value="descriptionAdvanced">An advanced course for these who want to perfect their English</p>
                    </div>
                </a>
                <a href="#" class="courses-card-course">
                    <img src="assets/imagen/negocios.PNG" alt="planta grande">
                    <div>
                        <h4 data-section="courses" data-value="titleBusiness">Business English</h4>
                        <p data-section="courses" data-value="descriptionBusiness">Lessons and vocabulary related to business English</p>
                    </div>
                </a>
                <a href="#" class="courses-card-course">
                    <img src="assets/imagen/viajes.PNG" alt="planta grande">
                    <div>
                        <h4 data-section="courses" data-value="titleTravel">Travel vocabulary</h4>
                        <p data-section="courses" data-value="descriptionTravel">Useful vocabulary for foreign travel, organized by theme</p>
                    </div>
                </a>
            </div>
        </section>
    </main>

    <script src="assets/js/start.js"></script>
</body>
</html>