<?php
class ScheduleView {
    
    public function mostrarHorarios($horarios) {
        echo "<h2>Horarios</h2>";
        echo "<ul>";
        foreach ($horarios["horarios"] as $horario) {
            echo "<li>{$horario['dia']}: {$horario['horario']}</li>";
        }
        echo "</ul>";
    }
    
}