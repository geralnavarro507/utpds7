<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 13</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Recuperar valor de una Cookie</H1>

<?PHP 
  if(isset($_COOKIE['user']))
    echo "<h2>Bienvenido ".$_COOKIE['user']."!</h2><br>";
  else
    echo "<h2>Bienvenido invitado!</h2><br>";
?>
  <a href='lab131.php'>...Regresar</a>&nbsp;
  <a href='lab134.php'>Continuar...</a>
</BODY>
</HTML>