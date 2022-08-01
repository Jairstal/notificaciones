<?php
session_start();

extract($_POST);
$nombres  = $_POST['usuario'];
$password = $_POST['contraseña'];
include ("configdb.php");
include ("mysql.php");

$miconexion = new clase_mysqli;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
$miconexion->consulta("select * from usuario where username='$nombres' and password='$password'");

$result=$miconexion->consulta_lista();

// Validar si $username and $password son correctos $count devuelve 1

if (!empty($result)) {

    $_SESSION['nombre'] = $list[1];
    $_SESSION['apellido'] = $list[2]; 
     header("Location: ../secretaria/index.php");

} else {
    echo "<script> alert(' Los datos son incorrectos');
window.location= 'http://localhost/proyectoweb/notificaciones/index.html'
</script>";
}
