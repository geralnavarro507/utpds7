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
<h2>Paso 3: la variable ya ha sido destriuda y su valor se ha perdido</h2>
<?PHP
  if(isset($_SESSION['var'])){
    $var = $_SESSION['var'];
  }else{
    $var = ""; 
  }  
  print("<p>Valor de la variable se sesion: $var</p>\n"); 
  session_destroy();
?>
<a href='lab121.php'>Volver al paso 1</a>
</BODY>
</HTML>