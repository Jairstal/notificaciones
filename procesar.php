<?php
session_start();
$conect = new mysqli("localhost", "root", "", "notificaciondb");
extract($_POST);
$nombres = $_POST['usuario'];
$password = $_POST['contraseña'];
$sql = "SELECT * FROM usuario WHERE username='$nombres' and password='$password' ";
//Para que se muestren las tildes correctamente
$result = mysqli_query($conect, $sql);
$count = mysqli_num_rows($result);
$nombre2 = "";
$apellido2 = "";

while ($fila = mysqli_fetch_assoc($result)) {
    $nombre2 = $fila['nombre'];
    $apellido2 = $fila['apellido'];
    echo "ingrese";
}

// Validar si $username and $password son correctos $count devuelve 1

if ($count == 1) {

    $_SESSION['nombre'] = $nombre2;
    $_SESSION['apellido'] = $apellido2;
    header("Location: internas/principal.php");

} else {
    echo "<script>
alert(' Los datos son incorrectos');
window.location= 'http://localhost/proyectoweb/notificaciones/index.html'
</script>";
}
