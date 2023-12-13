<?php

// Verificar la sesión del usuario (puedes personalizar esta lógica según tus necesidades)
if (!isset($_GET['usuario']) /*|| !verificarSesion()*/) {
    $respuesta = [
        'error' => 'Acceso no autorizado',
    ];
    http_response_code(401); // Código de respuesta 401 Unauthorized
    echo json_encode($respuesta);
    exit();
}

$usuarioId = $_GET['usuario'];

// Datos ficticios de horarios (puedes reemplazar esto con la lógica que necesites)
$horariosFicticios = [
    ['dia' => 'Lunes', 'horario' => '9:00 AM - 5:00 PM'],
    ['dia' => 'Martes', 'horario' => '9:00 AM - 5:00 PM'],
    ['dia' => 'Miércoles', 'horario' => '9:00 AM - 5:00 PM'],
    ['dia' => 'Jueves', 'horario' => '9:00 AM - 5:00 PM'],
    ['dia' => 'Viernes', 'horario' => '9:00 AM - 5:00 PM'],
];

$respuesta = [
    'horarios' => $horariosFicticios,
];

echo json_encode($respuesta);
