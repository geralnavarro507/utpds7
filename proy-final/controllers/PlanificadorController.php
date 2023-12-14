<?php
require_once '../models/PlanificadorModel.php';
require_once '../session.php';
require_once '../config/api.php';

class PlanificadorController {
    private $model;

    public function __construct() {
        $this->model = new PlanificadorModel();
    }

    public function GeneraTurnos($anio, $mes) {
        // Llamada al modelo para autenticar al usuario
        $turnos = $this->model->GeneraTurnos($anio, $mes);
        /*echo "<h2>Horarios</h2>";
        echo "<ul>";*/
        $tabla = '';
        if(isset($turnos["registros"])){
            foreach ($turnos["registros"] as $turno) {
                $comilla = "'";
                $tabla .= '<tr>'. 
                /*
                '<td>'.$turno['departamento'].'</td>'.
                '<td>'.$turno['empleado'].'</td>'.
                '<td>'.$turno['fecha'].'</td>'.
                */
                            '<td>'.$turno['departamento'].'</td>'.
                            '<td>'.$turno['empleado'].'</td>'.
                            '<td>'.$turno['dia1'].'</td>'.
                            '<td>'.$turno['dia2'].'</td>'.
                            '<td>'.$turno['dia3'].'</td>'.
                            '<td>'.$turno['dia4'].'</td>'.
                            '<td>'.$turno['dia5'].'</td>'.
                            '<td>'.$turno['dia6'].'</td>'.
                            '<td>Libre</td>'.
                          '</tr>';
            }
        }
        return ($tabla);
    }
}
