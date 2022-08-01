<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';
?>


<main class="contenedor-principal">
    <h1>Implicados</h1>
    <div class="formulario">
        <div class="tabla-contenedor">
            <table>
                <thead>
                    <tr>
                        <th style="width:120px;">Seleccionar</th>
                        <th style="width:150px;">Nombres</th>
                        <th style="width:150px;">Apellidos</th>
                        <th style="width:120px;">Cedula</th>
                        <th style="width:120px;">Celular 1</th>
                        <th style="width:120px;">Celular 2</th>
                        <th style="width:140px;">Correo</th>
                    </tr>
                </thead>
                <form method="post" action="?c=funciones&a=notificarAudiencia&idProceso=<?php echo $id_proceso?>&idAudiencia=<?php echo $id_audiencia?>">
                <tbody>
                    <?php
                    foreach ($this->modelPersona->ListarPersonas($id_proceso) as $r) {

                    ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $r['0']; ?>" name="implicados[]"></td>
                            <td><?php echo $r['1'] ?></td>
                            <td><?php echo $r['2']; ?></td>
                            <td><?php echo $r['3']; ?></td>
                            <td><?php echo $r['4']; ?></td>
                            <td><?php echo $r['5'] ?></td>
                            <td><?php echo $r['6']; ?></td>
                        </tr>
                    <?php   } ?>

                    <tr>
                        <td>
                            <input type="submit" class="btn btn-primary btn-submit" value="Notificar">
                        </td>
                    </tr>
                </tbody>
                 </form>
            </table>

        </div>
    </div>

</main>


<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>