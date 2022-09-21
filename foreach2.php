<?php

$color = array('blanco'=>'blanco.html', 'verde' => 'verde.html', 'rojo' => 'rojo.html');

echo "<ul>";

foreach ($color as $key => $value) {
   
    print_r("<li>"."<a href='".$value."'>".$key."</a></li>");
}
echo "</ul>";

?>