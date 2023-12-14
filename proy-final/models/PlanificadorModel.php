<?php
class PlanificadorModel {
    public function BorraTurnos($anio, $mes) {
        $apiUrl = API_URL . 'planificador.php';
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            
            'anio' => $anio,
            'mes' => $mes,
            'crud' => 'D',
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON (asumiendo que la API devuelve JSON)
        $resultado = json_decode($response, true);

        return $resultado ?? false;
    }
    public function GeneraTurnos($anio, $mes) {
        $apiUrl = API_URL . 'planificador.php';
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            
            'anio' => $anio,
            'mes' => $mes,
            'crud' => 'C',
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON (asumiendo que la API devuelve JSON)
        $resultado = json_decode($response, true);

        return $resultado ?? false;
    }

}
