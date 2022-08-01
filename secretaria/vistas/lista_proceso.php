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
                        <th style="width:1fr;">Codigo Proceso</th>
                        <th style="width:1.5fr;">Fecha creación</th>
                        <th style="width:1fr;">Tipo</th>
                        <th style="width:3fr;">Descripcion</th>
                        <th style="width:1fr;">Implicados</th>
                        <th style="width:3fr;">Acciones</th>
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
                                <a class="btn btn-icon" href="?c=funciones&a=agregarPersona&id=<?php echo $r['0']; ?>">
                                    <i class="far fa-address-card"></i>
                                </a>
                            </td>
                            <td class="table-column-btns">
                                <a class="btn btn-icon btn-info" href="?c=funciones&a=verProceso&id=<?php echo $r['0']; ?>">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a class="btn btn-icon btn-success" href="?c=funciones&a=actualizarProceso&id=<?php echo $r['0']; ?>">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-icon btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=funciones&a=eliminarProceso&id=<?php echo $r['0']; ?>">
                                    <i class="far fa-trash-alt"></i>
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
