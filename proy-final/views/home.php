<?php
    // Autoloader (si no estás utilizando un cargador de clases)
    spl_autoload_register(function ($class_name) {
        //include $class_name . '.php';
        include '../controllers/' . $class_name . '.php';
    });

    $app = new AppController();
    if (!verificarSesion()) {
        // Redirigir a la página de inicio de sesión si no hay sesión activa
        header('Location: login.php');
        exit();
    }
    /*
    $name = basename(__FILE__);
    $router->mostrarMenu();*/
    include('../includes/header.php');
    include('../includes/sidebar1.php');
    //home

    include('../includes/sidebar2.php');
    include('../includes/footer.php');
?>