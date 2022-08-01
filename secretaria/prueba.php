<?php


?>

<!DOCTYPE html>
<html>

<?phpif ($count == 1) {?>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h4>Registro de implicados.</h4>
            <form method="post" action="procesar.php">
                <div class="contenedor-inputs">
                    <input type="text" name="nombres" id="nombres" value=<?php echo $nombres ?>>
                    <input type="text" name="apellidos" id="apellidos" value=<?php echo $apellidos ?> >
                    <input type="text" name="cedula" id="cedula" value=<?php echo $cedula ?>>
                    <input type="text" name="celular" id="celular" value=<?php echo $celular ?> >
                    <input type="text" name="celular2" id="celular2" value=<?php echo $celular2 ?>>
                    <input type="text" name="correo" id="correo" value=<?php echo $correo ?> >
                    <input type="text" name="ciudad" id="ciudad" value=<?php echo $ciudad ?>>
                    <input type="text" name="direccion" id="direccion" value=<?php echo $direccion ?> >
                    <input type="text" name="twitter" id="twitter" value=<?php echo $twitter ?> >
                </div>
                <input type="submit">
            </form>
        </div>
    </div>


    <?php}else {?>


        <?php}?>

<<script src="persona.js"></script>

</html>
