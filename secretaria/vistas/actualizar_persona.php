<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';

?>

<main class="contenedor-principal">
    <h1>Editar Persona </h1>
    <div class="formulario">
        <div class="formulario-contenedor">
            <form method="post" action="?c=funciones&a=editarPersona">
                <input type="text" name="idProceso" value="<?php echo $id_proceso; ?>">
                <?php
                foreach ($data as $r) { ?>
                    <input type="hidden" name="idPersona" value="<?php echo $r['0']; ?>">
                    <div class="grupoInput">
                        <label for="nombres">Nombres:</label>
                        <input type="text" name="nombres" value="<?php echo $r['1']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="<?php echo $r['2']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="cedula">Cedula:</label>
                        <input type="text" name="cedula" value="<?php echo $r['3']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="celular1">Celular 1:</label>
                        <input type="text" name="celular1" value="<?php echo $r['4']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="celular2">Celular 2:</label>
                        <input type="text" name="celular2" value="<?php echo $r['5']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="correo">Correo:</label>
                        <input type="email" name="correo" value="<?php echo $r['6']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" name="ciudad" value="<?php echo $r['7']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" value="<?php echo $r['8']; ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="twitte">Twitter:</label>
                        <input type="text" name="twitter" value="<?php echo $r['9']; ?>">
                    </div>
                    <div class="grupoInput">

                        <label for="tipoUser">Rol:</label>
                        <select id="rol" name="rolPersona">
                            <option value=<?php echo $r['11']; ?>> <?php echo $r['13']; ?></option>
                            <option> -- </option>
                            <?php foreach ($roles as $r) {
                            ?>
                                <option value=<?php echo $r['0']; ?>><?php echo $r['1']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <a class="btn btn-primary btn-submit" href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a>
                    <input type="submit" class="btn btn-primary btn-submit" value="Actualizar">


                <?php  } ?>


            </form>
            <!--Sección js para despliegue formulario -->

        </div>
    </div>

</main>


<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>