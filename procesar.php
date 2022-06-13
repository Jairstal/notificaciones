<?php
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
    echo $nombre2, $apellido2;
}

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    echo "entre";

    header("Location: internas/principal.php?nombre22=$nombre2&apellido22=$apellido2");

} else {
    echo "<script>
alert(' Los datos son incorrectos');
window.location= 'http://localhost/proyectoweb/notificaciones/index.html'
</script>";
}
