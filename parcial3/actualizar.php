<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 9.1</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Actualizar noticia</H1>
<?PHP
require_once("class/noticias.php");
?>
<br><br>
<div class="container" style="max-width: max-content;">
    <div class="container text-center">
        <div class="card" style="width: 50%;">

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $obj_noticia = new noticia ();
                $noticias = $obj_noticia->actualizar_noticias ($_REQUEST['id'],$_REQUEST['categoria'],$_REQUEST['fecha'],$_REQUEST['imagen'],$_REQUEST['texto'],$_REQUEST['titulo']); 
                header('Location: lab91.php');  
            ?>
                <?php
            } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $obj_noticia2 = new noticia();
                $noticias2= $obj_noticia2->consultar_noticias_por_id ($_REQUEST['noticia']);
                foreach ($noticias2 as $resultado2) {
                    $id = $resultado2['id'];
                    $titulo = $resultado2['titulo'];
                    $texto = $resultado2['texto'];
                    $categoria = $resultado2['categoria'];
                    $fecha = $resultado2['fecha'];
                    $imagen = $resultado2['imagen'];
                }
                ?>
                <form action="actualizar.php" method="post" class="was-validated" >
                    <input id="myid" name="id" type="hidden" value="<?php if(isset($_GET['noticia'])){echo $_GET['noticia'];} ?>">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input name="titulo" type="text" class="form-control" placeholder="titulo"  
                                aria-label="titulo" value="<?php echo $titulo ?>" required>
                        </li>
                        <li class="list-group-item">
                            <input name="texto" type="text" class="form-control" placeholder="texto"
                                aria-label="texto" value="<?php echo $texto ?>" required>
                        </li>
                        <li class="list-group-item">
                            <select name="categoria" class="form-control" aria-label="categoria" required>
                                <option value="" disabled>categoria...</option>
                                <option value="promociones" <?php if ($categoria=="promociones"){echo "selected";}?>>promociones</option>
                                <option value="ofertas" <?php if ($categoria=="ofertas"){echo "selected";}?>>ofertas</option>
                                <option value="costas" <?php if ($categoria=="costas"){echo "selected";}?>>costas</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <input name="fecha" type="date" class="form-control" placeholder="fecha" aria-label="fecha" value="<?php echo $fecha ?>" required>
                        </li>
                        <li class="list-group-item">
                            <select name="imagen" class="form-control" aria-label="imagen" required>
                                <option value="">imagen...</option>
                                <option value="apartamento8.jpg" <?php if ($imagen=="apartamento8.jpg"){echo "selected";}?>>apartamento8.jpg</option>
                                <option value="apartamento9.jpg" <?php if ($imagen=="apartamento9.jpg"){echo "selected";}?>>apartamento9.jpg</option>
                                <option value="iconotexto.gif" <?php if ($imagen=="iconotexto.gif"){echo "selected";}?>>iconotexto.gif</option>
                                <option value="puntoamarillo.gif" <?php if ($imagen=="puntoamarillo.gif"){echo "selected";}?>>puntoamarillo.gif</option>
                                <option value="punto.gif" <?php if ($imagen=="punto.gif"){echo "selected";}?>>punto.gif</option>
                            </select>
                        </li>
                    </ul>
                    <a id="myInput" href="lab91.php" class="btn btn-secondary lg">
                        <i class="bi bi-arrow-left"></i> Retornar
                    </a>
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <?php
            } else {
                echo "Solicitud no válida";
            }
            ?>
        </div>
    </div>
</div>

</BODY>
</HTML>