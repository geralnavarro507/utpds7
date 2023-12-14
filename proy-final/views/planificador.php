<?php
    require_once '../controllers/PlanificadorController.php';
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
      <h2 id="id_titulointerno" class="text-center align-middle mt-2">PLANIFICADOR</h2>
      <p style="height: 10px;" id="id_cantregistros"></p>
      <form class="form-inline" role="form" action="planificador.php" method="post">

        <div class="input-group col pl-0 pr-0 mr-0 ml-0"> 
          <div class="input-group-prepend col-1 pl-0 pr-0 mr-0 ml-0">
            <span class="input-group-text col-12">Parametro</span>
          </div>
          <div class="col">
            <input name="anio" class="form-control col-12" type="number" id="id_anio" placeholder="Año...">
          </div>
          <div class="col">
            <select name="mes" id="id_mes" class="form-control col-12">
              <option value="" disables>Mes...</option>
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>

            </select>
          </div>
          <div class="input-group-prepend col-1 pl-0 pr-0 mr-0 ml-0">
            <span class="input-group-text col-12">Modalidad</span>
          </div>
          <div class="col">
            <select name="crud" id="id_crud" class="form-control col-12">
              <option value="C">Generar</option>
              <option value="D">Borrar</option>
            </select>
          </div>
          <div class="col-4 ms-1"> 
            <button type="button" class="btn btn-secondary ladda-button" id="id_buscar" data-toggle="tooltip" data-placement="top" title="buscar" onclick=f_buscar()>
                <i class="bi bi-search"></i>
                <span class="sr-only ladda-label"></span>Buscar
            </button> 
            <button type="button" class="btn btn-secondary ladda-button" id="id_borrar" data-toggle="tooltip" data-placement="top" title="refrescar" onclick=f_borrar()>
                <i class="bi bi-eraser"></i>
                <span class="sr-only ladda-label"></span>Refrescar
            </button>     
            <!--button type="button" class="btn btn-secondary ladda-button" id="id_cancelar" data-toggle="tooltip" data-placement="top" title="Borrar Planificación" onclick=f_borrar_turnos()>
                <i class="bi bi-calendar-x"></i>
                <span class="sr-only ladda-label"></span>Borrar
            </button-->     
            <!--button type="submit" class="btn btn-secondary ladda-button" id="id_generar" data-toggle="tooltip" data-placement="top" title="Generar Planificación" onclick=f_borrar_turnos()>
                <i class="bi bi-calendar3"></i>
                <span class="sr-only ladda-label"></span>Generar
            </button--> 
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-calendar3"></i>
                <span class="sr-only ladda-label"></span>  
                Aplicar
            </button>
            <!--button type="button" class="btn btn-secondary ladda-button" id="id_guardar" data-toggle="tooltip" data-placement="top" title="guardar">
                <i class="bi bi-floppy"></i>
                <span class="sr-only ladda-label"></span>
            </button--> 
            </div>
        </div>

      </form>
      <div class='table-responsive'>
      <table id='id_table1' class='table table-fixed table-hover table-striped table-bordered table-sm' style="width:100%">
        <thead>
          <tr class="text-left align-middle table-secondary" id="id_trth1">
            <th>Departamento</th>
            <th>Empleado</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            <th>Domingo</th>

          </tr>
        </thead>
        <tbody id="id_tbody1">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $anio = '';
                    $mes = '';
                    $crud = '';
                    if(isset($_POST['anio'])){
                        $anio = $_POST['anio'];
                    }
                    if(isset($_POST['mes'])){
                        $mes = $_POST['mes'];
                    }
                    if(isset($_POST['crud'])){
                      $crud = $_POST['crud'];
                  }
                    $controller = new PlanificadorController();
                    if($crud=="C"){
                      echo $controller->GeneraTurnos($anio,$mes);
                    }else{
                      header('Location: planificador.php');
                    }
                    
                    //
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