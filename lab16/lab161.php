<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 16.1</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Consulta de Servicio Web de Conversión de Temperatura</H1>
<FORM NAME="FormConv" METHOD="post" ACTION="lab161.php">
<BR/>
Convertir desde <SELECT NAME="temp">
<OPTION value="CtoF" SELECTED>°C a °F
<OPTION value="FtoC">°F a °C
</SELECT> el valor
<input TYPE="number" NAME="valor" step="Any" required>
<INPUT NAME="Convertir" VALUE="Convertir" TYPE="submit" />
</FORM>
 <?PHP
$servicio="https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
$parametros=array();
if (array_key_exists('Convertir', $_POST)) {
    $valor=$_POST['valor']; $temp=$_POST['temp'];
    if ($temp=="CtoF") {
        $parametros ['Celsius']=$valor;
        $cliente = new SoapClient ($servicio, $parametros); 
        $resultObj = $cliente->CelsiusToFahrenheit ($parametros);
        $resultado = $resultObj->CelsiusToFahrenheitResult;
    }else{
        $parametros ['Fahrenheit']=$valor;
        $cliente = new SoapClient ($servicio, $parametros);
        $resultObj = $cliente->FahrenheitToCelsius ($parametros); 
        $resultado = $resultObj->FahrenheitToCelsiusResult;
    }
    print ("<BR>La temperatura $valor".substr($temp,0,1)." es igual a: $resultado".substr($temp, 3,1)); 
}
?> 
</BODY> 
</HTML>