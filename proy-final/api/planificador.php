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

$anio = $conexion->real_escape_string($datos['anio']);
$mes = $conexion->real_escape_string($datos['mes']);
$crud = $conexion->real_escape_string($datos['crud']);
//$instruccion = "CALL sp_departamentos_crud('".$crud."','".$codigo."','".$descripcion."')";
$instruccion = "CALL sp_planificador_crud('".$anio."','".$mes."','C')";
$resultado=$conexion->query($instruccion);

if ($crud == 'C') {
    $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
}

// Cerrar la conexión
$conexion->close();

// Devolver la respuesta en formato JSON
$resultado = [
    'registros' => $resultado,
];
echo json_encode($resultado);
