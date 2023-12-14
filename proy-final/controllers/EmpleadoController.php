<?php
require_once '../models/EmpleadoModel.php';
require_once '../session.php';
require_once '../config/api.php';

class EmpleadoController {
    private $model;

    public function __construct() {
        $this->model = new EmpleadoModel();
    }

    public function getEmpleado($codigo, $descripcion) {
        // Llamada al modelo para autenticar al usuario
        $empleados = $this->model->getEmpleado($codigo, $descripcion);
        /*echo "<h2>Horarios</h2>";
        echo "<ul>";*/
        $tabla = '';
        if(isset($empleados["registros"])){
            foreach ($empleados["registros"] as $empleado) {
                $comilla = "'";
                $tabla .= '<tr><td>'.$empleado['id'].'</td>'.
                          '<td>'.$empleado['nombre'].'</td>'.
                          '<td><a onclick="f_delete('.$comilla.'empleado'.$comilla.','.$comilla.$empleado["id"].$comilla.');"><i class="bi bi-trash3"></i></a></td>'.
                          '</tr>';
            }
        }
        return ($tabla);
    }
}
