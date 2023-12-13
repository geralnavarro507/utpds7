<?PHP
  session_start();
  if(isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])){
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
    $salt = substr($usuario,0,2);
    $clave_crypt = crypt($clave, $salt);
    require_once("class/usuarios.php");
    $obj_usuarios = new usuarios();
    $usuario_valido = $obj_usuarios->validar_usuario($usuario,$clave_crypt);
    foreach ($usuario_valido as $array_resp) {
      foreach ($array_resp as $value) {
        $nfilas=$value;
      }
    }
    if($nfilas > 0){
      $usuario_valido = $usuario;
      $_SESSION['usuario_valido'] = $usuario_valido;
    }
  }

?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 14 - Login al sitio de Noticias</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>
<BODY>
<?php
  if(isset($_SESSION['usuario_valido'])){
?>
<H1>Gestion de noticias</H1>
<hr>
<ul>
    <li><a href="lab142.php">Listar todas las noticias</a></li>
    <li><a href="lab143.php">Listar noticias por partes</a></li>
    <li><a href="lab144.php">Buscar noticias</a></li>
</ul>
<hr>
<p>[ <a href="logout.php">Desconectar</a> ]</p>
<?php
}
//intento de entrar fallido
else if (isset($usuario)){
  print("<br><br>\n");
  print("<p align='CENTER'>Acceso no autorizado</p>\n");
  print("<p align='CENTER'>[ <a href='login.php'>Conectar</a> ]</p>\n");
}
//sesión no iniciada
else{
  print("<br><br>\n");
  print("<p class='parrafocentrado'>Esta zona tiene el accesso restringido.<br>". 
  " Para entrar debe identificarse</p>\n");

  

  print("<FORM CLASS='entrada' NAME='login' ACTION='login.php' METHOD='POST'>\n");
  print("<P><LABEL class='etiqueta-entrada'>Usuario:</LABEL>\n");
  print("   <INPUT TYPE='TEXT' NAME='usuario' SIZE='15'></P>\n"); 
  print("<P><LABEL class='etiqueta-entrada'>Clave:</LABEL>\n"); 
  print("   <INPUT TYPE='PASSWORD' NAME='clave' SIZE='15'></P>\n"); 
  print("<P><INPUT TYPE='SUBMIT' VALUE='entrar'></P>\n");
  print("</FORM>\n");
  print("<P CLASS='parrafocentrado'>NOTA: si no dispone de identificacion o tiene problemas " . 
  "para entrar<BR>pongase en contacto con el ".
  "<A HREF='mailto: webmaster@localhost'>administrador</A> del sitio</P>\n");
}
?>
</BODY>
</HTML>