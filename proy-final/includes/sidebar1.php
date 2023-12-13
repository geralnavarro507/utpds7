<div class="container-full">
    
    <div class="row m-0">
        <div class="col-2">
            <div class="fixed-left offcanvas offcanvas-start show bg-success-subtle" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel" style="--bs-offcanvas-width: 15% !important;">
                <div class="offcanvas-header text-center">
                    <a href="home.php" class="text-reset text-decoration-none">
                        <h5 class="offcanvas-title" id="offcanvasDarkLabel">
                            <i style="font-size: 3em; color:#198754;" class="bi bi-calendar3"></i>
                            Planificador<br>De Horarios
                        </h5>
                    </a>
                    
                </div>
                <div class="offcanvas-body">
                    <div class="d-grid gap-2 m-1">
                        <a id="myInput" href="configuracion.php" class="btn btn-success lg">
                            <i class="bi bi-tools"></i> Configuración
                        </a>
                    </div>
                    <div class="d-grid gap-2 m-1">
                        <a id="myInput" href="departamentos.php" class="btn btn-success lg">
                            <i class="bi bi-building"></i> Departamentos
                        </a>
                    </div>
                    <div class="d-grid gap-2 m-1">
                        <a id="myInput" href="empleados.php" class="btn btn-success lg">
                            <i class="bi bi-people-fill"></i> Empleados
                        </a>
                    </div>
                    <div class="d-grid gap-2 m-1 text-left">
                        <a id="myInput" href="horarios.php" class="btn btn-success lg text-left">
                            <i class="bi bi-calendar-date"></i> Horario
                        </a>
                    </div>
                    <div class="d-grid gap-2 m-1">
                        <a id="myInput" href="reportes.php" class="btn btn-success lg">
                            <i class="bi bi-table me-1"></i> Reportes
                        </a>
                    </div>
                    
                </div>
                <div class="offcanvas-footer text-center mb-2">
                    <!-- Botón de cierre de sesión -->
                    <form method="post" action="logout.php">
                        <button class="btn btn-danger lg" type="submit">
                            <i class="bi bi-door-closed me-1"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-10 row">