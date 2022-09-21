<?php

$temperaturas = array(2,22,11,20,5,26,21,27,40,34,30);
asort($temperaturas);

$minimo = array_slice($temperaturas,0,5);

echo "<br> Minimo: <br>";

print_r($minimo);

rsort($temperaturas);

echo "<br> Maximo: <br>";

$maximo= array_slice($temperaturas,0,5);

print_r($maximo);

$media = array_sum($temperaturas)/count($temperaturas);

echo "<br> Media: <br>";

print_r($media);

?>