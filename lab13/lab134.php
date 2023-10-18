<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 13</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Eliminar Cookies</H1>
<?PHP 
  if(isset($_COOKIE['user'])){
    setcookie('user',"", time() + 60 * 5);
    echo "<h3>La cookie 'user' ha sido eliminada satisfactoriamente</h3><br>";
  }else{
    echo "<h3>La cookie 'user' no existe</h3><br>";
  }
  if(isset($_COOKIE['contador'])){
    setcookie('contador',$_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
    echo "<h3>La cookie 'contador' ha sido eliminada satisfactoriamente</h3><br>";
  }else{
    echo "<h3>La cookie 'contador' no existe</h3><br>";
  }
    setcookie('contador',$_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
    
?>
  <a href='lab131.php'>Volver al contador de visitas</a>&nbsp;
  <a href='lab132.php'>Volver al saludo a usuario</a>
</BODY>
</HTML>