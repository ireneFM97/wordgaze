<?php
//funciones para iniciar o destruir la sesión
    session_start();
    session_destroy();
    header('Location: ../login.php');
?>