<?php

    $language = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

	if ($language == "en"){
		$content = "This page is in English";
        
    }else{
		$content = "Esta página está en Castellano (Idioma por defecto)";
       
    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
</head>    
<body>
   
    <?= $content ?>
</body>
</html>