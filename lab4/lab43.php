<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.3</title>
</head>
<body>
<?php
        echo "<b>Manejo de Arreglos P1</b><br><hr>";
        $arreglo = array();
        while (count($arreglo)<20) {
            $num_rand = rand(1,500);
            if(!in_array($num_rand, $arreglo)){
                array_push($arreglo, $num_rand);
            }  
        }

        echo "Arreglo: ";
        for ($i=0; $i < count($arreglo); $i++) { 
            echo "[".$arreglo[$i]."]";
        }

        echo "<br><br>El ultimo elemento es : ",end($arreglo),"<br>";
        echo "Y su indice :" . array_search(end($arreglo), $arreglo);
    ?>
</body>
</html>