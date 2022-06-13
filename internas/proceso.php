<!DOCTYPE html>
<html>

<?php

$nombre = $_GET["nombre22"];
$apellido = $_GET["apellido22"];

?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width,
        initial-scale=1" name="viewport">
    <title>
        Principal dashboard
    </title>
    <link href="..//css/estilos.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>

<body>
    <nav class="menuPrincipal">
        <a href="">
            JAAAAAAA
        </a>
        <a href="">
            Consejo de la judicatura
        </a>
        <a href="">
            Transparencia
        </a>
        <a >
            Bienvenido/a <?php echo "$nombre $apellido"; ?>
        </a>
    </nav>
    <aside>
        <img  src="../images/logowhite.png" >
        <nav class="menuLateral">
        <li href="/proceso.php">
            Registrar proceso
</li>
        <li href="">
            Registrar audiencia
</li>
        <li href="">
            Salir
</li>

    </nav>
    </aside>

</body>
</html>

