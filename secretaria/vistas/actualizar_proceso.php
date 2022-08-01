<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    <h1>Actualizar Proceso</h1>
    <div class="formulario">
        <div class="formulario-contenedor">
            <form method="post" action="?c=funciones&a=editarProcess">
                <?php foreach ($data as $r) {
                    $timestamp = strtotime($r['2']);
                    $newDate = date("Y-m-d", $timestamp); ?>
                    <input type="hidden" name="id" value="<?php echo $r['0'] ?>">
                    <div class="grupoInput">
                        <label for="codproces">Codigo proceso:</label>
                        <input type="text" name="codproces" value="<?php echo $r['1'] ?>">
                    </div>
                    <div class="grupoInput">
                        <label for="fecha">Fecha inicio:</label>
                        <input type="date" name="fecha" value="<?php echo $newDate ?>">
                    </div>
                    <div class="grupoInput">

                        <label for="tipoUser">Tipo proceso:</label>
                        <select id="tipoUser" name="tipoUser">
                            <?php foreach ($tiposProceso as $key => $value) {
                                if ($key == $r['3']) { ?>
                                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="grupoInput">
                        <label for="descripcion">Descripción:</label>
                        <input type=text name="descripcion" value="<?php echo $r['4'] ?>">
                    </div>
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