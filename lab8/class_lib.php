<?php
class Factorial{
    protected $numero_calc;
    function __construct($d){
        $this->numero_calc = $d;
    }

    function calc_factorial(){
        $valor = $this->numero_calc;
        $factorial = $valor;
        for ($i=$valor-1; $i > 0; $i--) { 
            $factorial = $factorial * $i;
        }
        return $factorial;
    }
}
class Semaforo {
    protected $valor;
    function __construct($v){
        $this->valor = $v;
    }

    function GetImagen(){
        $valor = $this->valor;

        if($valor != ""){
            if($valor>79){
                return '<img src="semaforo-verde.jpg" alt="'.$valor.'">"';
                
            }else{
                if($valor>49 && $valor<80){
                    return '<img src="semaforo-amarillo.jpg" alt="'.$valor.'">"';
                }else{
                    return '<img src="semaforo-rojo.jpg" alt="'.$valor.'">"';
                }
            }
        }else{ 
            return "Favor coloque el valor en %";
        }
    }
}
class ManejoArreglo {
    public $arreglo = array();

    function CargaArreglo(){
        while (count($this->arreglo)<20) {
            $num_rand = rand(1,500);
            if(!in_array($num_rand, $this->arreglo)){
                array_push($this->arreglo, $num_rand);
            }  
        }
        return $this->arreglo;
    }

    function ObtenerUltimo(){
        return end($this->arreglo);
    }

    function ObtenerIndice(){
        return array_search(end($this->arreglo), $this->arreglo);
    }
}
?>