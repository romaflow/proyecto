<?php require_once('app/config/me_config.php'); ?>
<?php require_once('app/functions/me_core_functions.php'); ?>

<?php
//echo URL; // prueba
//echo en_core(); // prueba
?>
<?php require_once('app/classes/Persona.php') ?>
<?php 
$miPersona = new Persona('Roly', 'Mamani', 'Masculino');
echo $miPersona->getNombre() . ' ' . $miPersona->getApellidos() . ' ' . $miPersona->getGenero();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
hola

<body>

</body>

</html>