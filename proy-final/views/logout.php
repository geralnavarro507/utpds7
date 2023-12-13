<?php
    require_once '../session.php';

    // Procesar el formulario de inicio de sesión
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        cerrarSesion();
        header('Location: login.php?logout=true');
        exit();
    }
?>