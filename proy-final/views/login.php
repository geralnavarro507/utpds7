<?php
    require_once '../controllers/AppController.php';
    //require_once 'session.php';
    $appController = new AppController();

    // Procesar el formulario de inicio de sesión
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        $appController->autenticarUsuario($usuario, $contrasena);
    }
    include('../includes/header.php');
?>

    <div class="container">
    <div class="row align-middle">
        <div class="col-12 col-sm-8 offset-sm-2 col-lg-4 offset-lg-4 text-center pt-4 mt-5 bg-body-secondary">
            <form class="form-signin align-middle " method="post" action="">

                <i style="font-size: 6em; color:#198754;" class="bi bi-calendar3"></i>

                <h2 class=" font-weight-normal">Planificador<br>De Horarios</h2>

                <div class="form-floating">
                    <input type="user" name="usuario" class="form-control" id="floatingInput" placeholder="Usuario">
                    <label for="floatingInput">Usuario</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="contrasena" class="form-control" id="floatingPassword" placeholder="Contraseña">
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <div class="d-grid gap-1">
                    <button class="btn btn-lg btn-success btn-block mt-2" type="submit">Iniciar Sesión</button>
                    <p class="mt-2 text-muted">&copy; <?php echo date("Y"); ?> Geral Navarro</p>
                </div>

            </form>
        </div>
    </div>

</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['error'])){
            echo '<div class="alert alert-danger" role="alert">
                    Error: Usuario u contraseña incorrecto. './*date("d/m/Y")." ".date("h:i:sa")*/''.'
                </div>';
        }else{
            if(isset($_GET['logout'])){
                echo '<div class="alert alert-warning" role="alert">
                        Sesión cerrada correctamente.
                    </div>';
            }
            
        }
    }
    include('../includes/footer.php');
?>