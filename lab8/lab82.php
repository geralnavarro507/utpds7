<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.2 basado en 4.1</title>
</head>
<body>
<?php
    if(array_key_exists('enviar',$_POST)){

        include('class_lib.php');
        $valor = $_REQUEST['Valor'];
        $sem   = new Semaforo($valor);
        $img  = $sem->GetImagen();
        echo $img;
    }else{
?>
        <form action="lab82.php" method = "POST">
            Intruduzca el valor en % de desempeño de las ventas: <input type="number" name="Valor" min="0" max="100" ><br>
            <input type="SUBMIT" name="enviar" value="Enviar datos">
        </form>
<?php
    }
?>
</body>
</html>