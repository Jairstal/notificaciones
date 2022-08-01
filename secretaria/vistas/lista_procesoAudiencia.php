<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    <h1>Procesos </h1>
    <div class="formulario">
        <div class="tabla-contenedor">
            <table>
                <thead>
                    <tr>
                        <th style="width:180px;">Codigo Proceso</th>
                        <th style="width:120px;">Fecha creación</th>
                        <th style="width:120px;">Tipo</th>
                        <th style="width:120px;">Descripcion</th>
                        <th style="width:120px;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->model->ListarProceso() as $r) { ?>
                        <tr>
                            <td><?php echo $r['1']; ?></td>
                            <td><?php echo $r['2']; ?></td>
                            <td><?php echo $tiposProceso[$r['3']] ?></td>
                            <td><?php echo $r['4']; ?></td>
                            <td class="table-column-btns">
                                <a class="btn btn-icon btn-info" href="?c=funciones&a=verProceso&id=<?php echo $r['0']; ?>">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</main>

<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>