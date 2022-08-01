<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';

?>

<main class="contenedor-principal">
    <h1>Registrar nueva audiencia</h1>
    <div class="formulario">
        <div class="formulario-contenedor">
            <form method="post" action="?c=funciones&a=RegistrarAudiencia">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="grupoInput">
                    <label for="fecha">Fecha:</label>
                    <input type=date name="fecha">
                </div>
                <div class="grupoInput">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipoAudiencia">
                        <option> -- </option>
                        <option value="Unica">Única</option>
                        <option value="Formulacion de cargos">Formulación de cargos</option>
                        <option value="Formulacion de cargos">De Juicio</option>
                    </select>
                </div>
                <div class="grupoInput">
                    <label for="hora">Hora:</label>
                    <input type="time" name="hora">
                </div>
                <div class="grupoInput">
                    <label for="edificio">Edificio:</label>
                    <input type="text" name="edificio">
                </div>
                <div class="grupoInput">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion">
                </div>
                <div class="grupoInput">
                    <label for="sala">Sala:</label>
                    <input type="text" name="sala">
                </div>
                <div class="grupoInput">
                    <label for="observacion">Observación:</label>
                    <textarea name="observacion" rows="2"></textarea>
                </div>
                <a class="btn btn-primary btn-submit" href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a>

                <input type="submit" class="btn btn-primary btn-submit" value="Agregar">
        </div>





        </form>
        <!--Sección js para despliegue formulario -->


    </div>
    </div>

</main>

<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>