<?PHP
  if(isset($_COOKIE['contador'])){
    setcookie('contador',$_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
    $mensaje = 'Gracias por visitarnos. Número de visitas: ' . $_COOKIE['contador']; 
  }else{
    //caduca en un año
    setcookie('contador',1, time() + 365 * 24 * 60 * 60);
    $mensaje = 'Bienvenido a nuestro sitio web'; 
  } 
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 13</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Contador de visitas con Cookies</H1>
<p>
  <h3><?PHP echo $mensaje; ?></h3>
</p>
</BODY>
</HTML>