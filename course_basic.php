<!-- <?php
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
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <title>Wordgaze Basic course</title>
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
                
                <a class="sign_out" href="php/close_session.php" data-section="options" data-value="option3">Sign out</a>
            </div>
        </div>
    </nav>
    <div class="breadcrumb">
        <a href="start.php" class="breadcrumb-link"><span class="material-symbols-outlined">house</span></a>
        <span class="material-symbols-outlined">navigate_next</span>
        <a href="courses.php" class="breadcrumb-link" data-section="linkBreadcrumb" data-value="linkBreadcrumb1">Courses</a>
        <span class="material-symbols-outlined">navigate_next</span>
        <a href="#" class="breadcrumb-actual" data-section="linkBreadcrumb" data-value="linkBreadcrumb2">Basic level</a>
    </div>

    <main id="main">
        <div class="container-learn">
            <div class="card vocabulary" id="btn-vocabulary">
                <span class="text-btn">All vocabulary</span>
                <section class="sectionEn" id="section1En"></section>
                <section class="sectionSp" id="section1Sp"></section>
            </div>
            <div class="card vocabulary" id="btn-verbs">
                <span class="text-btn">Irregular verbs</span>
                <section class="sectionEn" id="section2En"></section>
                <section class="sectionSp" id="section2Sp"></section>
            </div>
        </div>
    </main>

    <script src="assets/js/start.js"></script>
</body>
</html>