<?php
include_once 'controlador/funciones.php';
$completo = nombres();
$fecha = fecha();
$hora = hora();
?>

<nav class="menuPrincipal">
    <h4>
        Fecha de hoy:
        <?php echo $fecha ?>
    </h4>
    <h4>
        Hora:
        <?php echo $hora->format('h:i:s A'); ?>
    </h4>
    <h4>
        Bienvenido/a
        <?php echo $completo ?>
    </h4>
</nav>