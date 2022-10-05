
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>
<body>
    Hola <?php echo $_POST["nombreusuario"]; ?><br>
    Tu email es: <?php echo $_POST["email"]; ?><br>
    Contraseña:<?php echo $_POST["contraseña"];?><br>
    Confirmar contraseña: <?php echo $_POST["confirmar"];?><br>
    
</body>
</html>