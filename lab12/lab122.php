<?PHP
  session_start();
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 12</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Manejo de Sesiones</H1>
<h2>Paso 2: se accede a la variable de sesion almacenada y se destruye</h2>
<?PHP
  if(isset($_SESSION['var'])){
    $var = $_SESSION['var'];
    print("<p>Valor de la variable se sesion: $var</p>\n"); 
    unset($_SESSION['var']);
    print("<a href='lab123.php'>Paso 3</a>"); 
  }else{
    print("Sesion no iniciada, ir al <a href='lab121.php'>paso 1</a> para iniciar la sesion"); 
  }  
?>
</BODY>
</HTML>