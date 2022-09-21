<?php


$array=array("Juan"=>"guapo","María"=>"inteligente","Andrés"=>"fuerte","Rosa"=>"obediente");

function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

?>