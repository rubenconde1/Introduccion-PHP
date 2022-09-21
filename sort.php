<?php

//Ordenado por Nombre, ascendente

$edades=array("Juan"=>"31","María"=>"41","Andrés"=>"39","Berta"=>"40");

ksort($edades);

foreach ($edades as $key => $value) {
   
    echo $key ."<br>";
}

echo "<br>";
//Ordenado por Edad, ascendente

asort($edades);

foreach ($edades as $key => $value) {
   
    echo $value ."<br>";
}

echo "<br>";


//Ordenado por Nombre, descendente

krsort($edades);

foreach ($edades as $key => $value) {
   
    echo $key ."<br>";
}

echo "<br>";


//Ordenado por Edad, descendente


arsort($edades);

foreach ($edades as $key => $value) {
   
    echo $value ."<br>";
}

echo "<br>";


?>