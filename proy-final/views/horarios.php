<?php

class HorariosView {
    public function mostrarHorarios($horarios) {
        echo "<h2>Horarios</h2>";
        echo "<ul>";
        foreach ($horarios as $dia => $horario) {
            echo "<li>$dia: $horario</li>";
        }
        echo "</ul>";
    }
}
?>