<?php
    $valor = $_POST['Valor'];
    $factorial = $valor;
    for ($i=$valor-1; $i > 0; $i--) { 
        $factorial = $factorial * $i;
    }
    echo "<br> El factorial del numero ". $valor. " es : ". $factorial;
?>