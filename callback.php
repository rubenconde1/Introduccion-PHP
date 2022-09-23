<?php

use function PHPSTORM_META\map;

$array = array("hola","sistema","futbol","basket","volleyball");

function longitud($cadena){

    return strlen($cadena);


}

$len=array_map('longitud',$array);
print_r(max($len));
echo "<br>";
print_r(min($len));


?>