<?php
final class ClaseBase {
    public function test() {
        echo "ClaseBase::test() llamada\n";
    }
    // Aquí da igual si se declara el método como
    // final o no
    final public function moreTesting() {
        echo "ClaseBase::moreTesting() llamada\n";
    }
}
class ClaseHijo extends ClaseBase {
}
/*
La salida de la aplicación muestra un error:
Fatal error: Class ClaseHijo may not inherit from final class (ClaseBase) in C:\xampp\htdocs\utpds7\lab6\lab66.php on line 13

Esto ocurre porque la clase ClaseBase fue declarada como una clase final, 
indicando que no puede ser heredada por otra clase 
y se trata de utilizar la herencia al declarar la clase ClaseHijo e intentar heredar de ClaseBase
*/
?>
