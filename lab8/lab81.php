<?php
    include('class_lib.php');
    $valor = $_POST['Valor'];
    $fac = new Factorial($valor);
    $resultado=$fac->calc_factorial();
    echo "<br> El Factorial del numero ". $valor. " es : ". $resultado;
?>