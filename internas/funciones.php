<?php
session_start();

function nombres()
{
    $value = $_SESSION['nombre'];
    $value2 = $_SESSION['apellido'];
    $user = $value . $value2;
    return $user;
}
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
