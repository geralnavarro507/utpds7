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
<h2>Paso 1: se crea la variable de sesion y se almacena</h2>
<?PHP
  $var = "Ejemplo Sesiones";
  $_SESSION['var'] = $var;
  print("<p>Valor de la variable se sesion: $var</p>\n"); 
?>
<a href="lab122.php">Paso 2</a>
</BODY>
</HTML>