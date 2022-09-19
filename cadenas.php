<!-- //Ejercicio 1 -->

<?php
$nombre=$_GET["nombre"]?? "Adrian";

$separador = trim($nombre, "/");

echo $separador;
?>

<!-- //Ejercicio 2 -->

<?php

$nombre=$_GET["nombre"]?? "Adrian";
$longitud = strlen($nombre);

echo $longitud;

?>

<!-- //Ejercicio 3 -->

<?php

$nombre=$_GET["nombre"]?? "Adrian";
$Mayusculas =strtoupper($nombre);

echo $Mayusculas;
?>

<!-- //Ejercicio 4 -->

<?php

$nombre=$_GET["nombre"]?? "Adrian";
$Minusculas =strtolower($nombre);

echo $Minusculas;
?>


<!-- //Ejercicio 5 -->

<!-- <?php

$nombre=$_GET["nombre"]?? "Adrian";

$prefijo = $_Get["prefijo"];

?> -->

<!-- //Ejercicio 6 -->

<?php

echo substr_count(strtolower($nombre),"a");

?>

<!-- //Ejercicio 7 -->

<?php

if (str_contains(strtolower($nombre),"a")) {

echo stripos(strtolower($nombre),"a");

} else

echo "No hay a en el nombre";



?>

<!-- //Ejercicio 8 -->
<?php

echo str_ireplace("o",0,$nombre);

?>


