<?php

$server_host = $_SERVER['HTTP_USER_AGENT'];

if (str_contains($server_host,"Firefox")) {
    echo "<a href = 'codigo.html' >pagina web</a>";

}else{
    echo "No tienes firefox";
}

?>