<?php
class DepartamentoModel {
    public function getDepartamento($codigo, $descripcion) {
        $apiUrl = API_URL . 'departamento.php';
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'crud' => 'R',
            'codigo' => $codigo,
            'descripcion' => $descripcion,
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
