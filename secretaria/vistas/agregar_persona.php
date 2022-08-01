<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    <h1>Registro de Implicados </h1>
    <div class="formulario">
        <div class="formulario-contenedor">
            <form method="post" action="?c=funciones&a=RegistrarPersona">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="grupoInput">
                    <label for="nombres">Nombres:</label>
                    <input type="text" name="nombres" placeholder="Juan">
                </div>
                <div class="grupoInput">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" id="fecha" placeholder="Perez">
                </div>
                <div class="grupoInput">
                    <label for="cedula">Cedula:</label>
                    <input type="text" name="cedula" id="fecha" placeholder="0750211559">
                </div>
                <div class="grupoInput">
                    <label for="celular1">Celular 1:</label>
                    <input type="text" name="celular1" id="fecha" placeholder="0999999999">
                </div>
                <div class="grupoInput">
                    <label for="celular2">Celular 2:</label>
                    <input type="text" name="celular2" id="fecha" placeholder="0999999999">
                </div>
                <div class="grupoInput">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" id="fecha" placeholder="example@hotmail.com">
                </div>
                <div class="grupoInput">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="fecha" placeholder="Loja">
                </div>
                <div class="grupoInput">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="fecha" placeholder="Juan de Salinas y sucre">
                </div>
                <div class="grupoInput">
                    <label for="twitte">Twitter:</label>
                    <input type="text" name="twitter" id="fecha" placeholder="@jperez">
                </div>
                <div class="grupoInput">

                    <label for="tipoUser">Rol:</label>
                    <select id="rol" name="rolPersona">
                        <option> -- </option>
                        <?php foreach ($roles as $r) {
                        ?>
                            <option value=<?php echo $r['0']; ?>><?php echo $r['1']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>

                <a class="btn btn-primary btn-submit" href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a>
                <input type="submit" class="btn btn-primary btn-submit" value="Agregar">






            </form>
            <!--Sección js para despliegue formulario -->

        </div>
    </div>

</main>

<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>