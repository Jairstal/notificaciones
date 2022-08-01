<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';

?>

<main class="contenedor-principal">
    <h1>Enviar notificación personalizada</h1>
    <div class="formulario">
        <div class="formulario-contenedor">
            <form method="post" action="?c=funciones&a=obtenerCustom" enctype="multipart/form-data">
                <input type="hidden" name="idpe" value="<?php echo $id_persona; ?>">
                <input type="hidden" name="idpro" value="<?php echo $id_proceso ; ?>">

                <div class="grupoInput">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" readonly >
                </div>
                <div class="grupoInput">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo $apellido ?>"r eadonly>
                </div>
                <div class="grupoInput">
                    <label for="rol">Rol:</label>
                    <input type="text" name="rol" value="<?php echo $rol2 ?>" readonly>
                </div>
                <div class="grupoInput">
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" value="<?php echo $correo ?>" readonly>
                </div>
                <div class="grupoInput">
                    <label for="celular">Celular:</label>
                    <input type="text" name="celular" value="<?php echo $celular ?>" readonly>
                </div>
                 <label for="descripcion">Notificación a enviar:</label>
                <div class="descripcion-caso tarjeta bg-white">
                    <textarea name="descripcion" id="descripcion" rows=" 6" style="width: 100%" placeholder="Redacte su mensaje.."></textarea>
                </div>
                <div class="grupoInput">
                    <label for="archivo">Adjuntar:</label>
                    <input type="file" name="archivo" >
                </div>


                <a class="btn btn-primary btn-submit" href="<?=$_SERVER["HTTP_REFERER"]?>">Regresar</a>
                <input type="submit" class="btn btn-primary btn-submit" value="Enviar">
            </form>
        <!--Sección js para despliegue formulario -->
        </div>
    </div>
</main>

<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>