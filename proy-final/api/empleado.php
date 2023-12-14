<?php
require_once '../config/database.php';

// Obtener datos del POST
$datos = json_decode(file_get_contents('php://input'), true);

// Conectar a la base de datos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar la conexión
if ($conexion->connect_error) {
    $respuesta = [
        'autenticado' => false,
        'mensaje' => 'Error de conexión a la base de datos',
    ];
    echo json_encode($respuesta);
    exit();
}

// Escapar datos del POST para prevenir SQL injection
$crud = $conexion->real_escape_string($datos['crud']);
$codigo = $conexion->real_escape_string($datos['codigo']);
$descripcion = '';
if (isset($datos['descripcion'])){
    $descripcion = $conexion->real_escape_string($datos['descripcion']);
}
//$instruccion = "CALL sp_departamentos_crud('".$crud."','".$codigo."','".$descripcion."')";
$instruccion = "CALL sp_empleados_crud('R','','','')";
$resultado=$conexion->query($instruccion);

if ($crud == 'R') {
    $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
}

// Cerrar la conexión
$conexion->close();

// Devolver la respuesta en formato JSON
$resultado = [
    'registros' => $resultado,
];
echo json_encode($resultado);
