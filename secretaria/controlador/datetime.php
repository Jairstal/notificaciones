
<?php
session_start();
$_SESSION['nombre'];

function fecha()
{
    date_default_timezone_set('America/Guayaquil');
    $myDate = date("d-m-y");
    return $myDate;
}

function hora()
{

    $hora = new DateTime("now", new DateTimeZone('America/Guayaquil'));
    return $hora;
}
