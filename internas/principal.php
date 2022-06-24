<?php
$tituloPagina = "Principal";
$estilosWeb = ['../css/estilos2.css'];
include_once '../templates/cabeceras.inc.php';
include_once '../templates/barraNavegacion.inc.php';
include_once '../templates/menuLateral.inc.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,
        initial-scale=1" name="viewport">
    <title>
        Principal dashboard
    </title>
</head>
<footer class="piePagina">
    <img src="../images/escudo.jpg">
    <p>Dirección: 12 de Octubre N24-563 y Francisco Salazar<br>
        Copyright © 2011 Consejo de la Judicatura</p>
    <div class="redes_sociales">
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
    </div>
</footer>
<?php
$scriptsWeb = ['../js/persona.js'];
include_once '../templates/cierre.inc.php';
?>

</html>