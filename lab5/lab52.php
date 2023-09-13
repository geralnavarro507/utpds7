<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'])){
    $errors;
    $file_size = $_FILES['nombre_archivo_cliente']['size'];
    //$file_ext=strtolower(end(explode('.',$_FILES['nombre_archivo_cliente']['name'])));

    $tmp = explode('.', $_FILES['nombre_archivo_cliente']['name']);
    $file_ext = end($tmp);

    $expensions= array("jpeg","jpg","png","gif");
    if(in_array($file_ext,$expensions)=== false){
        $errors="Formato invalido, solo se permiten imagenes jpg, jpeg, gif y png";
    }else{
        if($file_size > 1048576 ) {
           $errors='Tamaño invalido, solo se permite 1 MB Maximo';
        }
    }
    if(empty($errors)) {
        $nombreDirectorio = "archivos/";
        $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto = $nombreDirectorio . $nombrearchivo;
        if (is_file($nombreCompleto)){
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiara el nombre a $nombrearchivo <br><br>";
        }
        move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'],$nombreDirectorio . $nombrearchivo);
        echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
    }else{
        echo $errors;
    }
}
else
    echo "No se ha podido subir el archivo <br>";
?>