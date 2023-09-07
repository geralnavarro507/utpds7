<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.1</title>
</head>
<body>
<?php
    if(array_key_exists('enviar',$_POST)){
        if($_REQUEST['Valor'] != ""){ 
            if($_REQUEST['Valor']>79){
                echo '<img src="semaforo-verde.jpg" alt="'.$_REQUEST['Valor'].'">"';
                
            }else{
                if($_REQUEST['Valor']>49 && $_REQUEST['Valor']<80){
                    echo '<img src="semaforo-amarillo.jpg" alt="'.$_REQUEST['Valor'].'">"';
                }else{
                    echo '<img src="semaforo-rojo.jpg" alt="'.$_REQUEST['Valor'].'">"';
                }
            }
        }else{ 
            echo "Favor coloque el valor en %";
        }
    }else{
?>
        <form action="lab41.php" method = "POST">
            Intruduzca el valor en % de desempeño de las ventas: <input type="number" name="Valor" min="0" max="100" ><br>
            <input type="SUBMIT" name="enviar" value="Enviar datos">
        </form>
<?php
    }
?>
</body>
</html>