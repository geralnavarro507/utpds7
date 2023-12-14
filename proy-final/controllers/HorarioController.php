<?php
require_once '../models/HorarioModel.php';
require_once '../session.php';
require_once '../config/api.php';

class HorarioController {
    private $model;

    public function __construct() {
        $this->model = new HorarioModel();
    }

    public function getHorario($codigo, $descripcion) {
        // Llamada al modelo para autenticar al usuario
        $horarios = $this->model->getHorario($codigo, $descripcion);
        /*echo "<h2>Horarios</h2>";
        echo "<ul>";*/
        $tabla = '';
        if(isset($horarios["registros"])){
            foreach ($horarios["registros"] as $horario) {
                $comilla = "'";
                $tabla .= '<tr><td>'.$horario['id'].'</td>'.
                          '<td>'.$horario['descripcion'].'</td>'.
                          '<td><a onclick="f_delete('.$comilla.'horario'.$comilla.','.$comilla.$horario["id"].$comilla.');"><i class="bi bi-trash3"></i></a></td>'.
                          '</tr>';
            }
        }
        return ($tabla);
    }
}
