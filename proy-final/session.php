<?php
session_start();

function iniciarSesion($usuarioId) {
    $_SESSION['usuario_id'] = $usuarioId;
}

function cerrarSesion() {
    session_unset();
    session_destroy();
}

function verificarSesion() {
    return isset($_SESSION['usuario_id']);
}

function obtenerIdUsuario() {
    return $_SESSION['usuario_id'] ?? null;
}