<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 18.1</title>
</head>
<body>
<?php

    function verificar_email($email){
        if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
            return true;
        }
        echo "Formato incorrecto de Correo";
        return false;
        return true;
    }

    function verificar_password_strenght($password){
        if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)){
            //echo "Su password es seguro.";
            return true;
        }else{
            echo "Su password no es seguro.";
            return false;
        }
    }

    function verificar_ip($ip){
        if(preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" .
        "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip )){
            return true;
        }else{
            echo "ip invalido";
            return false;
        }
    }

    if(array_key_exists('enviar',$_POST)){

        echo    '<form action="lab181.php" method = "POST">
                    <h2>Lab18.1 RegEx desde Back-end</h2>
                    Nombre <input type="text" name="nombre"><br>
                    Apellido <input type="text" name="apellido"><br>
                    Email <input type="text" name="email"><br>
                    Contraseña <input type="text" name="password" ><br>
                    Repetir Contraseña <input type="text" name="password2"><br>
                    IP Actual del equipo <input type="text" name="ip" ><br>
                    <input type="submit" name="enviar" value="Registrar Usuario">
                </form>
                <br><br>';

        $email = $_POST['email'];
        $password = $_POST['password'];
        $ip = $_POST['ip'];
        if(verificar_email($email) and verificar_password_strenght($password) and verificar_ip($ip)){
            echo "Usuario registrado exitosamente";
        }else{
            echo "<br>Datos invalidos, verifique";
        }
        



    }else{
?>
    <form action="lab181.php" method = "POST">
        <h2>Lab18.1 RegEx desde Back-end</h2>
        Nombre <input type="text" name="nombre"><br>
        Apellido <input type="text" name="apellido"><br>
        Email <input type="text" name="email"><br>
        Contraseña <input type="text" name="password" ><br>
        Repetir Contraseña <input type="text" name="password2"><br>
        IP Actual del equipo <input type="text" name="ip" ><br>
        <input type="submit" name="enviar" value="Registrar Usuario">
    </form>
<?php
    }
?>
</body>
</html>
