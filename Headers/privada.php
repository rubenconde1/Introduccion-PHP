
<?php
    $dejameentrar = $_GET['permiso'] ?? 0 ;

    if (1 == $dejameentrar){
        echo "Bienvenido";
    } else {
        //redireccionar
        header('Location: login.php');
    }
?>
