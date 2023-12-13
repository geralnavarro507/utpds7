<?php
require_once '../models/DepartamentoModel.php';
require_once '../session.php';
require_once '../config/api.php';

class DepartamentoController {
    private $model;

    public function __construct() {
        $this->model = new DepartamentoModel();
    }

    public function getDepartamento($codigo, $descripcion) {
        // Llamada al modelo para autenticar al usuario
        $departamentos = $this->model->getDepartamento($codigo, $descripcion);
        /*echo "<h2>Horarios</h2>";
        echo "<ul>";*/
        $tabla = '';
        if(isset($departamentos["departamentos"])){
            foreach ($departamentos["departamentos"] as $departamento) {
                $comilla = "'";
                $tabla .= '<tr><td>'.$departamento['id'].'</td>'.
                          '<td>'.$departamento['descripcion'].'</td>'.
                          '<td><a onclick="f_delete('.$comilla.'departamento'.$comilla.','.$comilla.$departamento["id"].$comilla.');"><i class="bi bi-trash3"></i></a></td>'.
                          '</tr>';
            }
        }
        return ($tabla);
    }
}
