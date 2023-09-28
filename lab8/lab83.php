<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.3 basado en 4.3</title>
</head>
<body>
<?php
        echo "<b>Manejo de Arreglos P1</b><br><hr>";
        include('class_lib.php');
        $ma = new ManejoArreglo();
        $arreglo = $ma->CargaArreglo();
        echo "Arreglo: ";
        for ($i=0; $i < count($arreglo); $i++) { 
            echo "[".$arreglo[$i]."]";
        }
        echo "<br><br>El ultimo elemento es : ", $ma->ObtenerUltimo(),"<br>";
        echo "Y su indice :" . $ma->ObtenerIndice();
    ?>
</body>
</html>