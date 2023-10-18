<?PHP
  if(array_key_exists('enviar',$_POST)){
    $expire=time()+60*5;
    setcookie('user',$_REQUEST['visitante'] , $expire);
    header("Refresh:0");
  }
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 13</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Creación de Cookies</H1>
<h2>La Cookie "User" tendrá solo 5 minutos de duración</h2>
<?PHP 
  if(isset($_COOKIE['user'])){
    print("<br>Hola <b>".$_COOKIE['user']."</b> gracias por visitar nuestro sitio web <br>"); 
  }else{
?>
  <form name="formcookie" method="post" action="lab132.php">
  <br>Hola, primera vez que te vemos por nuestro sitio web ¿como te llamas?
  <input type="text" name="visitante">
  <input name="enviar" value="Gracias por identificate" type="submit"><br>
  </form>
  <?PHP
    }
  ?>
  <br><a href='lab133.php'>Continuar...</a>
</BODY>
</HTML>