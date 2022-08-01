<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['css/dashboard.css'];
include_once 'templates/cabeceras.inc.php';
include_once 'templates/barraNavegacion.inc.php';
include_once 'templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    
    <div class="formulario">
        <h1>Proceso </h1>
        <div class="tabla-contenedor">
            <table>
                <thead>
                    <tr>
                        <th style="width:180px;">Codigo Proceso</th>
                        <th style="width:120px;">Fecha creación</th>
                        <th style="width:120px;">Tipo</th>
                        <th style="width:120px;">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->model->ListarProcesoId($id_proceso) as $r) {
                        //var_dump($r);
                        //die();
                    ?>
                        <tr>
                            <td><?php echo $r['1'] ?></td>
                            <td><?php echo $r['2']; ?></td>
                            <td><?php echo $tiposProceso[$r['3']] ?></td>
                            <td><?php echo $r['4']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <h1>Implicados</h1>
        <a class="btn" href="?c=funciones&a=agregarPersona&id=<?php echo $id_proceso; ?>">Agregar Implicados</a>
        <div class="formulario">
            <div class="tabla-contenedor">
                <table>
                    <thead>
                        <tr>
                            <th style="width:1fr;">Nombres</th>
                            <th style="width:1fr;">Apellidos</th>
                            <th style="width:1fr;">Rol</th>
                            <th style="width:0.5fr;">Cedula</th>
                            <th style="width:0.5fr;">Celular 1</th>
                            <th style="width:0.5fr;">Celular 2</th>
                            <th style="width:1fr;">Correo</th>
                            <th style="width:1fr;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->modelPersona->ListarPersonas($id_proceso) as $r) {

                        ?>
                            <tr>
                                <td><?php echo $r['1'] ?></td>
                                <td><?php echo $r['2']; ?></td>
                                <td><?php echo $r['7']; ?></td>
                                <td><?php echo $r['3']; ?></td>
                                <td><?php echo $r['4']; ?></td>
                                <td><?php echo $r['5'] ?></td>
                                <td><?php echo $r['6']; ?></td>
                                <td class="table-column-btns">
                                    <a class="btn btn-icon btn-warning" href="?c=funciones&a=notificarCustom&idPersona=<?php echo $r['0']; ?>&nombre=<?php echo $r['1']; ?>&apellido=<?php echo $r['2']; ?>&rol=<?php echo $r['7']; ?> &correo=<?php echo $r['6']; ?>&celular=<?php echo $r['4']; ?>&idProceso=<?php echo $id_proceso ?>" >
                                        <i class="far fa-bell"></i>
                                    </a>
                                    <a class="btn btn-icon btn-success" href="?c=funciones&a=actualizarPersona&idPersona=<?php echo $r['0']; ?>&idProceso=<?php echo $id_proceso ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a class="btn btn-icon btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=funciones&a=eliminarPersona&idPersona=<?php echo $r['0']; ?>&idProceso=<?php echo $id_proceso ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h1>Audiencias</h1>
        <a class="btn" href="?c=funciones&a=agregarAudiencia&id=<?php echo $id_proceso; ?>">Nueva Audiencia</a>
        <div class="formulario">
            <div class="tabla-contenedor">
                <table>
                    <thead>
                        <tr>
                            <th style="width:0.5fr;">Fecha</th>
                            <th style="width:0.5fr;">Tipo</th>
                            <th style="width:60%;">Observación</th>
                            <th style="width:0.5fr;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (empty($this->modelAudiencia->ListarAudiencias($id_proceso))) {
                        ?>
                            <tr>
                                <td>No hay audiencias</td>
                            </tr>
                            <?php } else {
                            foreach ($this->modelAudiencia->ListarAudiencias($id_proceso) as $a) {

                            ?>
                                <tr>
                                    <td><?php echo $a['2'] ?></td>
                                    <td><?php echo $a['1']; ?></td>
                                    <td><?php echo $a['7']; ?></td>
                                    <td class="table-column-btns">
                                        <a class="btn btn-icon btn-success" href="?c=funciones&a=actualizarPersona&idPersona=<?php echo $a['0']; ?>&idProceso=<?php echo $id_proceso ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-icon btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=funciones&a=eliminarPersona&idPersona=<?php echo $r['0']; ?>&idProceso=<?php echo $id_proceso ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php  }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php
include_once 'templates/footer.inc.php';
include_once 'templates/cierre.inc.php';
?>
