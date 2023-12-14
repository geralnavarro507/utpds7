<?php
    require_once '../controllers/EmpleadoController.php';
    //require_once 'session.php';
    
    if (!verificarSesion()) {
        // Redirigir a la página de inicio de sesión si no hay sesión activa
        header('Location: login.php');
        exit();
    }
    /*
    $name = basename(__FILE__);
    $router->mostrarMenu();*/
    include('../includes/header.php');
    include('../includes/sidebar1.php');


?>
    <div class="container bg-white mt-4" id="id_div1">
      <h2 id="id_titulointerno" class="text-center align-middle mt-2">EMPLEADOS</h2>
      <p style="height: 10px;" id="id_cantregistros"></p>
      <form class="form-inline" role="form">

        <div class="input-group col pl-0 pr-0 mr-0 ml-0"> 
          <div class="input-group-prepend col-1 pl-0 pr-0 mr-0 ml-0">
            <span class="input-group-text col-12">Filtrar</span>
          </div>
          <div class="col-2">
            <input  class="form-control col-12" type="text" id="id_codigo" placeholder="código...">
          </div>
          <div class="col">
            <input  class="form-control col-12" type="text" id="id_descripcion" placeholder="Nombre...">
          </div>
          <div class="col-3 ms-1"> 
            <button type="button" class="btn btn-secondary ladda-button" id="id_buscar" data-toggle="tooltip" data-placement="top" title="buscar" onclick=f_buscar()>
                <i class="bi bi-search"></i>
                <span class="sr-only ladda-label"></span>
            </button> 
            <button type="button" class="btn btn-secondary ladda-button" id="id_borrar" data-toggle="tooltip" data-placement="top" title="borrar" onclick=f_borrar()>
                <i class="bi bi-eraser"></i>
                <span class="sr-only ladda-label"></span>
            </button>     
            <button type="button" class="btn btn-secondary ladda-button" id="id_agregar" data-toggle="tooltip" data-placement="top" title="agregar">
                <i class="bi bi-plus"></i>
                <span class="sr-only ladda-label"></span>
            </button> 
            <button type="button" class="btn btn-secondary ladda-button" id="id_guardar" data-toggle="tooltip" data-placement="top" title="guardar">
                <i class="bi bi-floppy"></i>
                <span class="sr-only ladda-label"></span>
            </button> 
            </div>
        </div>

      </form>
      <div class='table-responsive'>
      <table id='id_table1' class='table table-fixed table-hover table-striped table-bordered table-sm' style="width:100%">
        <thead>
          <tr class="text-left align-middle table-secondary" id="id_trth1">
            <th>Código</th>
            <th>Nombre</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody id="id_tbody1">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $codigo = '';
                    $descripcion = '';
                    if(isset($_GET['codigo'])){
                        $codigo = $_GET['codigo'];
                    }
                    if(isset($_GET['descripcion'])){
                        $descripcion = $_GET['descripcion'];
                    }


                    $controller = new EmpleadoController();
                    echo $controller->getEmpleado($codigo,$descripcion);
                }
            ?>
        
        </tbody>
      </table>
      </div>
    </div>
<?php
    include('../includes/sidebar2.php');
    include('../includes/footer.php');
?>