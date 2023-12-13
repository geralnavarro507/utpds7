<?php
require_once '../config/database.php';

// Obtener datos del POST
$datos = json_decode(file_get_contents('php://input'), true);

// Validar que se proporcionaron datos
if (empty($datos['usuario']) || empty($datos['contrasena'])) {
    $respuesta = [
        'autenticado' => false,
        'mensaje' => 'Se requieren usuario y contraseña',
    ];
    echo json_encode($respuesta);
    exit();
}

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
$usuario = $conexion->real_escape_string($datos['usuario']);
$contrasena = $conexion->real_escape_string($datos['contrasena']);

// Consulta SQL para la autenticación
$consulta = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";

$instruccion = "CALL sp_validar_usuario('".$usuario."','".$contrasena."')";
$resultado=$conexion->query($instruccion);
//$resultado=$consulta->fetch_all(MYSQLI_ASSOC);
/*
if($resultado){
    return $resultado;
    $resultado->close();
    $this->_db->close();
}

// Ejecutar la consulta
$resultado = $conexion->query($consulta);
*/
// Verificar si la autenticación es exitosa
if ($resultado->num_rows > 0) {
    $respuesta = [
        'autenticado' => true,
        'mensaje' => 'Autenticación exitosa',
    ];
} else {
    $respuesta = [
        'autenticado' => false,
        'mensaje' => 'Credenciales incorrectas',
    ];
}

// Cerrar la conexión
$conexion->close();

// Devolver la respuesta en formato JSON
echo json_encode($respuesta);
