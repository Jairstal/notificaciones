
<!DOCTYPE html>
<html>

<?php
include 'funciones.php';
$completo = nombres();
$fecha = fecha();
$hora = hora();

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
        <h4>
        Fecha de hoy: <?php echo $fecha ?>
        </h4>
        <h4>
        Hora: <?php echo $hora->format('h:i:s A'); ?>
        </h4>
        <h4 >
            Bienvenido/a <?php echo $completo ?>
        </h4>
    </nav>
    <aside>
        <img  src="../images/logowhite.png" >
        <nav class="menuLateral">

        <li><a href="proceso.php?variable=<?php $completo;?>">

            Registrar proceso</a></li>
        <li><a href="audiencias.php">
            Registrar audiencia</a></li>
        <li><a href="">
            Salir</a></li>


    </nav>
    </aside>

</body>


</html>


