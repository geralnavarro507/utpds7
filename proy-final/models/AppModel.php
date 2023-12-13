<?php
class AppModel {
    public function autenticarUsuario($usuario, $contrasena) {
        $apiUrl = API_URL . 'autenticar.php';
        $salt = substr($usuario,0,2);
        $clave_crypt = crypt($contrasena, $salt);

        // Lógica para realizar la solicitud a la API y autenticar al usuario
        // Puedes usar cURL o la función file_get_contents para hacer la solicitud HTTP

        // Ejemplo con cURL
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'usuario' => $usuario,
            'contrasena' => $clave_crypt,
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON (asumiendo que la API devuelve JSON)
        $resultado = json_decode($response, true);

        return $resultado['autenticado'] ?? false;
    }

}
