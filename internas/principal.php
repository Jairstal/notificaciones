<?php
$tituloPagina = "Principal";
$estilosWeb = ['../css/estilos2.css'];

include_once '../templates/cabeceras.inc.php';
include_once '../templates/barraNavegacion.inc.php';
include_once '../templates/menuLateral.inc.php';

require_once '../controller/principal.controller.php';

$contoler = new PrincipalController();
$totalAudiencias = $contoler->getNumberOfAudiencias();
$numAudienciasNormal = $contoler->getNumberOfAudienciasNormal();
$numAudienciasPorCaducar = $contoler->getNumberOfAudienciasPorCaducar();
$numAudienciasCaducados = $contoler->getNumberOfAudienciasCaducados();
$audienciasOrdered = $contoler->getAudienciasPerDate();
?>

<main class="contenedor-principal">
  <section class="panel">
    <h2 class="panel-title">Procesos registrados</h2>

    <div class="indicadores-circulares">
      <div class="indicador-circular bc-green">
        <p class="titulo">Vigencia normal</p>
        <p class="valor"><?php echo "$numAudienciasNormal/$totalAudiencias" ?></p>
      </div>

      <div class="indicador-circular bc-yellow">
        <p class="titulo">Próx caducar</p>
        <p class="valor"><?php echo "$numAudienciasPorCaducar/$totalAudiencias" ?></p>
      </div>

      <div class="indicador-circular bc-red">
        <p class="titulo">Caducados</p>
        <p class="valor"><?php echo "$numAudienciasCaducados/$totalAudiencias" ?></p>
      </div>
    </div>
  </section>

  <section class="panel">
    <div class="title-input-search">
      <h2 class="panel-title">Próximas audiencias</h2>
      <div class="buscador-audiencias">
        <input type="text" class="input-search" placeholder="Buscar...">
        <button class="btn-search"><i class="fas fa-search"></i></button>
      </div>
    </div>

    <?php foreach ($audienciasOrdered as $key => $audiencias) { ?>

      <h3 class="panel-title"><?php echo $key ?></h3>
      <section class="panel-audiencias">
        <?php foreach ($audiencias as $audiencia) { ?>
          <div class="panel-audiencia">
            <div class="hora">
              <?php echo $audiencia->getFecha()->format("H:i") ?>
            </div>
            <div class="datos">
              <p class="titulo"><?php echo $audiencia->getProceso() ?></p>
              <div class="implicados">
                <p class="procesado">Procesado: <?php echo $audiencia->getProcesado() ?></p>
                <p class="juez">Juez: <?php echo $audiencia->getJuez() ?></p>
              </div>
              <div class="info-audiencia">
                <div class="info-audiencia-titulos">
                  <p>Tipo:</p>
                  <p>Lugar:</p>
                  <p>Conciliación:</p>
                </div>
                <div class="info-audiencia-valores">
                  <p><?php echo $audiencia->getTipo() ?></p>
                  <p><?php echo $audiencia->getEdificio() ?></p>
                  <p><?php echo $audiencia->getSala() ?></p>
                </div>
              </div>
            </div>

            <?php if ($key == "hoy") { ?>
              <div class="audiencia-btn bg-yellow-60">
                <a class="btn-circle bg-yellow" href="#">
                  <i class="fas fa-plus"></i>
                </a>
              </div>
            <?php } else { ?>
              <div class="audiencia-btn bg-green-60">
                <a class="btn-circle bg-green" href="#">
                  <i class="fas fa-plus"></i>
                </a>
              </div>
            <?php } ?>

          </div>
        <?php } ?>
      </section>

    <?php } ?>

  </section>
</main>

<?php
$scriptsWeb = ['../js/persona.js'];

include_once '../templates/footer.inc.php';
include_once '../templates/cierre.inc.php';
?>
