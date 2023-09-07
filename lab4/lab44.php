<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.4</title>
</head>
<body>
<?php
    session_start();
    if(!array_key_exists('arreglo',$_SESSION)){
        $_SESSION['arreglo'] = [];
    }
    $arreglo = $_SESSION['arreglo'];



    if(array_key_exists('enviar',$_POST)){
        $numero = $_POST['Numero'];

        if ($numero % 2 == 0){ 
            array_push($arreglo, $numero);
            array_push($_SESSION['arreglo'],$numero);
        }else{ 
            echo "El número ingresado no es par, favor coloque un número par!";
        }
        echo '<form action="lab44.php" method = "POST">
                Intruduzca un numero par: <input type="number" name="Numero" ><br>
                <input type="SUBMIT" name="enviar" value="Enviar datos">
                <input type="SUBMIT" name="borrar" value="Borrar datos">
            </form>';
        if(array_key_exists('arreglo',$_SESSION)){
            echo "Arreglo: ";
            for ($i=0; $i < count($_SESSION['arreglo'] ); $i++) { 
                echo "[".$_SESSION['arreglo'][$i]."]";
            }
        }
    }else{
        if(array_key_exists('borrar',$_POST)){
            $_SESSION['arreglo'] = [] ;
        }
?>
        <form action="lab44.php" method = "POST">
            Intruduzca un numero par: <input type="number" name="Numero" ><br>
            <input type="SUBMIT" name="enviar" value="Enviar datos">
            <input type="SUBMIT" name="borrar" value="Borrar datos">
        </form>
<?php
    }
?>
</body>
</html>