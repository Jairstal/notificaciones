<?php

$conect = new mysqli("localhost", "root", "", "notificaciondb");
$cedula = $_POST["cedula"];
$sql = "SELECT * FROM persona WHERE dni='$cedula'";
$result = mysqli_query($conect, $sql);
$count = mysqli_num_rows($result);

$direccion = "";
$celular = "";

while ($fila = mysqli_fetch_assoc($result)) {
    $celular = $fila['celular'];
    $direccion = $fila['direccion'];
}
?>

<!DOCTYPE html>
<html>

<?php if ($count == 1) { ?>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h4>Registro de implicados.</h4>
            <form method="post" action="procesar.php">
                <div class="contenedor-inputs">
                    <input type="text" name="nombte" id="nombre" value=<?php echo $celular ?>>
                    <input type="text" name="apellidos" id="apellidos" placeholder="apellidos">
                </div>
                <input type="submit">
            </form>
        </div>
    </div>

<?php } ?>

<script src="persona.js">
</script>

</html>