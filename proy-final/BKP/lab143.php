<?PHP
  session_start();
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 11.1</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Consulta de noticias</H1>
<?PHP
if(isset($_SESSION['usuario_valido'])){
    require_once("class/noticias.php");

    $pagina = 1;
    if(isset($_GET['pag'])){
        $pagina = $_GET['pag'];
    }
    $obj_noticia = new noticia ();
    $totaltemp = $obj_noticia->consultar_noticias();
    $total = count($totaltemp);
    //--
    $obj_noticia = new noticia ();
    $noticias = $obj_noticia->consultar_noticias_pag($pagina);
    $nfilas=count($noticias);
    $desde=($pagina*5)-4;
    $hasta=($desde+$nfilas)-1;
    if($pagina>1){
        $anterior="<a href='lab111.php?pag=".($pagina-1)."'>Anterior</a>";
    }else{
        $anterior="Anterior";
    }
    $ultimapag = ceil($total/5);
    if($ultimapag>$pagina){
        $siguiente="<a href='lab111.php?pag=".($pagina+1)."'>Siguiente</a>";
    }else{
        $siguiente="Siguiente";
    }
    if($total>0){
        echo "<span>Mostrando noticias de ".$desde." a ".$hasta.". [ ".$anterior." ] | [ ".$siguiente." ] <span>";
    }
    if ($nfilas > 0) {
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<TH>Titulo</TH>\n");
        print ("<TH>Texto</TH>\n");
        print ("<TH>Categoria</TH>\n");
        print ("<TH>Fecha</TH>\n");
        print ("<TH>Imagen</TH>\n");
        print ("</TR>\n");
    
        foreach ($noticias as $resultado) {
            print ("<TR>\n");
            print ("<TD>" .$resultado['titulo'] ."</TD>\n");
            print ("<TD>". $resultado['texto'] ."</TD>\n");
            print ("<TD>" .$resultado['categoria'] . "</TD>\n");
            print ("<TD>" .date("j/n/Y", strtotime($resultado['fecha']))."</TD>\n");
            if ($resultado['imagen'] != "") {
                print ("<TD><A TARGET='_blank' HREF='img/".$resultado['imagen'] .
                "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
            }else{
                print ("<TD>&nbsp;</TD>\n");
            }
            print ("</TR>\n");
        }
        print ("</TABLE>\n");
    }else{
        print("No hay noticias disponibles");
    }
    print("<p>[ <a href='login.php'>Menú Principal</a> ]</p>");
}else{
    print("<br><br>\n");
    print("<p align='CENTER'>Acceso no autorizado</p>\n");
    print("<p align='CENTER'>[ <a href='login.php' target='_top'>Conectar</a> ]</p>\n");
}

?>
</BODY>
</HTML>