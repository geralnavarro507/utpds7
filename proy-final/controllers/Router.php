<?php
//require_once 'models/EmployeeModel.php';
//require_once 'views/ScheduleView.php';
require_once 'session.php';
require_once 'config/api.php';

class Router {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new EmployeeModel();
        $this->view = new ScheduleView();
    }

    /*public function mostrarHorarios() {
        // Obtener el ID del usuario desde la sesión
        $usuarioId = obtenerIdUsuario();

        // Obtener los horarios del modelo (a través de la API)
        $horarios = $this->model->obtenerHorarios($usuarioId);

        // Mostrar los horarios en la vista
        $this->view->mostrarHorarios($horarios);
    }*/

    public function autenticarUsuario($usuario, $contrasena) {
        // Llamada al modelo para autenticar al usuario
        $autenticado = $this->model->autenticarUsuario($usuario, $contrasena);

        if ($autenticado) {
            // Iniciar sesión si la autenticación es exitosa
            iniciarSesion($usuario); // Aquí deberías obtener el ID del usuario desde la respuesta de la API
            header('Location: index.php');
            exit();
        } else {
            // Redirigir a la página de inicio de sesión con un mensaje de error
            header('Location: login.php?error=1');
            exit();
        }
    }
/*
    public function mostrarVista($app) {
        // Obtener el ID del usuario desde la sesión
        $usuarioId = obtenerIdUsuario();

        // Obtener los horarios del modelo (a través de la API)
        $horarios = $this->model->obtenerHorarios($usuarioId);

        // Mostrar los horarios en la vista
        $this->view->mostrarHorarios($horarios);
    }*/
}
