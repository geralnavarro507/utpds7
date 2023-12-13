<?php
require_once '../models/AppModel.php';
require_once '../session.php';
require_once '../config/api.php';

class AppController {
    private $model;

    public function __construct() {
        $this->model = new AppModel();
    }

    public function autenticarUsuario($usuario, $contrasena) {
        // Llamada al modelo para autenticar al usuario
        $autenticado = $this->model->autenticarUsuario($usuario, $contrasena);

        if ($autenticado) {
            // Iniciar sesión si la autenticación es exitosa
            iniciarSesion($usuario); // Aquí deberías obtener el ID del usuario desde la respuesta de la API
            header('Location: home.php');
            exit();
        } else {
            // Redirigir a la página de inicio de sesión con un mensaje de error
            header('Location: login.php?error=1');
            exit();
        }
    }
}
