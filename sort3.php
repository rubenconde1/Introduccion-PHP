<?php

$array=array("Juan"=>"guapo","María"=>"inteligente","Andrés"=>"fuerte","Rosa"=>"obediente");

function cmp($a, $b) {
    if (strlen($a) == strlen($b)) {
        return 0;
    }
    return (strlen($a)> strlen($b)) ? 1 : -1;
}
uasort($array, 'cmp');
print_r($array);
?>