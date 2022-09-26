<?php

function partlist(){
    $array = array("hola","buenos","dias","miguel");

    for ($i=1; $i <= count($array); $i++) { 

        print_r( array_slice($array, 0,$i)); 

        print_r(array_slice($array, $i));
        
    }
  

}
partlist();
?>


