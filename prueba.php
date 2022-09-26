<?php



$alumnos = [

    ["nombre" => "Pepe", "edad" => 20],

    ["nombre" => "Pedro", "edad" => 21],

    ["nombre" => "Andrés", "edad" => 22],

    ["nombre" => "Ana", "edad" => 23],

    ["nombre" => "Lola", "edad" => 20]

];

print_r($alumnos);

echo '<br>';



$filtrarPor = strtolower($_GET["filtrarPor"] ?? "Pepe");



$filtrados = array_filter($alumnos, 

    function($alumno) use ($filtrarPor){

        return strpos(strtolower($alumno["nombre"]), $filtrarPor) !== FALSE;

    });

print_r($filtrados);

?>