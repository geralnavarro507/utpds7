<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.5</title>
</head>
<body>
<?php

?>


<?php

    if(array_key_exists('enviar',$_POST)){

        $numero = $_POST['Numero'];

        if ($numero % 2 == 0){ 
            //////
            echo "<table border=1>";
            $n=1;
            for ($n1=0; $n1 <$numero ; $n1++) {
                echo "<tr>";
                for ($n2=0; $n2 <$numero ; $n2++) {
                    
                    echo "<td style='width:15px;height:5px;'>", $n, "</td>";
                    $n=$n+1;

                }
                echo "</tr>";
            }
            echo "</table>";
            ///////
        }else{ 
            echo "El número ingresado no es par, favor coloque un número par!";
        }
        echo '<form action="lab45.php" method = "POST">
                Intruduzca un número par para la matriz: <input type="number" name="Numero" ><br>
                <input type="SUBMIT" name="enviar" value="Enviar datos">
            </form>';
    }else{
?>
        <form action="lab45.php" method = "POST">
            Intruduzca un número par para la matriz: <input type="number" name="Numero" ><br>
            <input type="SUBMIT" name="enviar" value="Enviar datos">
        </form>
<?php
    }
?>



</body>
</html>