<!-- //Ejercicio 1 -->

<?php

$nombres = array(
    'Adrian','Miguel','Oscar','Pol'
);

?>

<!-- //Ejercicio 2 -->

<?php

echo count($nombres);

?>

<!-- //Ejercicio 3 -->

<?php

echo implode(" ",$nombres);

?>

<!-- //Ejercicio 4 -->

<?php

asort($nombres);
foreach ($nombres as $key => $val) {
    echo "$key = $val\n";
}

?>

<!-- //Ejercicio 5 -->

<?php
 
print_r(array_reverse($nombres));

?>

<!-- //Ejercicio 6 -->

<?php

print_r(array_search('Pol',$nombres));

?>

<!-- //Ejercicio 7 -->

<?php

$alumnos = [
    ["nombre"=> "Adrian", "edad" =>19 ,"id"=>22],
    ["nombre"=> "Juan", "edad" =>43 ,"id"=>42],
    ["nombre"=> "Pol", "edad" =>18 ,"id"=>12],
    ["nombre"=> "Oscar", "edad" =>21 ,"id"=>32]
]
?>

<!-- //Ejercicio 8 -->
<?php
$s = '<table border="1">';
foreach ( $alumnos as $r ) {
        $s .= '<tr>';
        foreach ( $r as $v ) {
                $s .= '<td>'.$v.'</td>';
        }
        $s .= '</tr>';
}
$s .= '</table>';
echo $s;

?>

<!-- //Ejercicio 9 -->

<?php

print_r(array_column($alumnos,'nombre'));

?>


<!-- //Ejercicio 10 -->

<?php

$numeros = array(
    1,2,3,4,5,6,7,8,9,10
);

print_r(array_sum($numeros));

?>


