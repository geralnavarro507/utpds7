<?php
require_once('modelo.php');

class noticia extends modeloCredencialesBD{

    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct(){
        parent::__construct();
    }

    public function consultar_noticias(){
        $instruccion = "CALL sp_listar_noticias()";

        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
            
        }
    }

    public function consultar_noticias_filtro($campo, $valor) {
        $instruccion = "CALL sp_listar_noticias_filtro('".$campo."', '".$valor."')";
        $consulta=$this->_db->query($instruccion); 
        $resultado=$consulta->fetch_all (MYSQLI_ASSOC);
        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->db->close();
        }
    }

    public function actualizar_noticias($param_id,$categoria,$param_fecha,$param_imagen,$param_texto,$param_titulo){
        $instruccion = "CALL sp_actualizar_noticia('".$param_id."','".$categoria."','".$param_fecha."','".$param_imagen."','".$param_texto."','".$param_titulo."')";

        if ($this->_db->query($instruccion) === TRUE) {
            //echo "La consulta se ejecutó con éxito.";
        } else {
            echo "Error al ejecutar la consulta: " . $this->_db->error;
        }
        //return $resultado;
        //$resultado->close();
        //$this->_db->close();
/*
        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            echo "Fallo al actualizar las noticias";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
            
        }*/
    }

    public function consultar_noticias_por_id($id) {
        $instruccion = "CALL sp_consultar_noticias_por_id('".$id."')";
        $consulta=$this->_db->query($instruccion); 
        $resultado=$consulta->fetch_all (MYSQLI_ASSOC);
        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->db->close();
        }
    }

}
?>