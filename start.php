<?php
    session_start();
    //Si no existe la sesion ejecuta el siguiente código. Controla que no puedas acceder a la url start.php sin iniciar sesión
    if(!isset($_SESSION['userEmail'])){//Compueba que el email del usuario tiene un valor
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Wordgaze</title>
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
            
            <div class="nav-bar">
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
            <p class="name-user" data-section="navBar" data-value="navBar4">Hi   </p>
            <p class="name-user">
                <?php
                    echo $_SESSION['name'] . "!";
                ?>
            </p>
            </div>
            <span class="material-symbols-outlined icon-user" id="icon-options">account_circle</span>
            <div class="container-options">
                <div class="user-options">
                    <img class="img-user" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="imagen de perfil del usuario">
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
                
                <a class="sign_out" href="php/close_session.php" data-section="options" data-value="option3">Sign out</a>
            </div>
        </div>
    </nav>
    
    <main id="main">
        <section class="container-text">
            <h1 class="title-h1" data-section="content" data-value="title1">Learn English for free</h1>
            <h3 class="text-h3" data-section="content" data-value="text1">You will find all the content needed to learn the English language at your own pace here.</h3>
        </section>

        <div class="container-translate">
            <div class="container-input">
                <textarea spellcheck="false" class="textarea from-text" placeholder="Enter text"></textarea>
                <div spellcheck="false" contenteditable="true" class="textarea to-text"></div>
            </div>
            <ul class="controls">
                <li class="row from">
                    <div class="icons">
                        <i id="from" class="fas fa-volume-up"></i>
                        <i id="from" class="fas fa-copy"></i>
                    </div>
                    <select></select>
                </li>
                <li class="exchange"><i class="fas fa-exchange-alt"></i></li>
                <li class="row to">
                    <select></select>
                    <div class="icons">
                        <i id="to" class="fas fa-volume-up"></i>
                        <i id="to" class="fas fa-copy"></i>
                    </div>
                </li>
            </ul>
            <button>Translate</button>
        </div>

        <section class="container-courses">
            <div class="container-text">
                <h1 class="title-h1" data-section="content" data-value="title2">English courses</h1>
                <h3 class="text-h3" data-section="content" data-value="text2">These are our English courses ready for you to start learning</h3>
            </div>
            <div class="container-card">
                <a href="course_basic.php" class="card-course">
                    <img src="assets/imagen/principiante.PNG" alt="tallo de una planta">
                    <div>
                        <h4 data-section="courses" data-value="titleBasic">Basic level</h4>
                        <p data-section="courses" data-value="descriptionBasic">A basic course designed for those who are beginning.</p>
                    </div>
                </a>
                <a href="#" class="card-course">
                    <img src="assets/imagen/medio.PNG" alt="planta pequeña">
                    <div>
                        <h4 data-section="courses" data-value="titleIntermediate">Intermediate level</h4>
                        <p data-section="courses" data-value="descriptionIntermediate">An intermediate level course for those who have already mastered the basic concepts of English grammar.</p>
                    </div>
                </a>
                <a href="#" class="card-course">
                    <img src="assets/imagen/avanzado.PNG" alt="planta grande">
                    <div>
                        <h4 data-section="courses" data-value="titleAdvanced">Advanced level</h4>
                        <p data-section="courses" data-value="descriptionAdvanced">An advanced course for these who want to perfect their English.</p>
                    </div>
                </a>
                <a href="#" class="card-course">
                    <img src="assets/imagen/negocios.PNG" alt="planta grande">
                    <div>
                        <h4 data-section="courses" data-value="titleBusiness">Business English</h4>
                        <p data-section="courses" data-value="descriptionBusiness">Lessons and vocabulary related to business English.</p>
                    </div>
                </a>
                <a href="#" class="card-course">
                    <img src="assets/imagen/viajes.PNG" alt="planta grande">
                    <div>
                        <h4 data-section="courses" data-value="titleTravel">Travel vocabulary</h4>
                        <p data-section="courses" data-value="descriptionTravel">Useful vocabulary for foreign travel, organized by theme.</p>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <script src="assets/js/start.js"></script>
</body>
</html>