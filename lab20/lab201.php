<Html>
<head>
<title>Laboratorio 20</title>
</head>
<Body>
<FORM ACTION="lab201.php" METHOD="POST">
Nombre: <INPUT TYPE="TEXT" NAME="nombre" required><br>
Apellido: <INPUT TYPE="TEXT" NAME="apellido" required><br>
Email: <INPUT TYPE="email" NAME="email"><br>
Edad: <INPUT TYPE= "number" NAME="edad" min="0" max="120"><br><br>
<INPUT TYPE="SUBMIT" NAME="guardar" VALUE="Guardar datos">
</FORM>
<?PHP
    include ("UsuariosMDB.php");
    $usrs = new UsuariosMDB ();
    if (array_key_exists('guardar', $_POST)) {
        $usrs->insertarRegistro($_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['email'],$_REQUEST['edad']); 
        echo "Registro insertado exitosamente <br><br>";
    }
    echo "Registros en la coleccion usuarios: <br>";
    $usrs->obtenerRegistros()
?>