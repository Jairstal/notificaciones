<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    <h1>Registrar nuevo proceso</h1>

    <div class="tarjeta bg-gray">
        <div class="formulario-contenedor">
            <form method="post" action="?c=funciones&a=RegistrarProcess">

                <div class="grupoInput">
                    <label for="codproces">Codigo proceso:</label>
                    <input style="width: 20rem;" type="text" name="codproces" id="codproces" placeholder="ingrese codigo proceso">

                </div>
                <div class="grupoInput">
                    <label for="fecha">Fecha inicio:</label>
                    <input type=date name="fecha" id="fecha">
                </div>
                <div class="grupoInput">
                    <label for="tipoUser">Tipo:</label>
                    <!-- Nuevo selector de tipo de proceso, obtiene los tipos de la base de datos de forma automatica -->
                    <select id="tipoUser" name="tipoUser" require>
                        <option selected disabled> -- </option>
                        <!-- Recorremos la lista de tipos de procesos, por cada una se renderiza una etiqueta html 'option'
                    con el valor del tipo de proceso y su nombre -->
                        <?php foreach ($tiposProceso as $key => $value) { ?>
                            <option value=<?php echo $key ?>><?php echo $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <label for="descripcion">Descripcion del caso:</label>
                <div class="descripcion-caso tarjeta bg-white">
                    <textarea name="descripcion" id="descripcion" rows=" 6" style="width: 100%" placeholder="Escriba la descripción del caso.."></textarea>
                </div>

                <div class="grupo-botones">
                    <a class="btn " href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a>
                    <input class="btn" type="submit" value="Ingresar">
                </div>

            </form>
        </div>
    </div>

</main>

<?php
$scriptsWeb = ['js/persona.js'];
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>