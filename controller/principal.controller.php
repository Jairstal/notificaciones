<?php

require_once '../model/Audiencia.model.php';

class PrincipalController {
  private $model;

  public function __construct() {
    $this->model = new AudienciaModel();
  }

  public function getNumberOfAudiencias() {
    return $this->model->getTotalAudiencias();
  }

  public function getNumberOfAudienciasNormal() {
    $pastToday = date_create()->add(new DateInterval('P1D'));
    return $this->model->getNumberOfAudienciasPerDate($pastToday);
  }

  public function getNumberOfAudienciasPorCaducar() {
    $today = date_create();
    $pastToday = date_create()->add(new DateInterval('P1D'));
    return $this->model->getNumberOfAudienciasPerDate($today, false, $pastToday);
  }

  public function getNumberOfAudienciasCaducados() {
    return $this->model->getNumberOfAudienciasPerDate(date_create(), true);
  }

  public function getAudiencias() {
    $audiencias = $this->model->getAudiencias();
    return $audiencias;
  }

  public function getAudienciasPerDate() {
    $audienciasOrdered = [
      "hoy" => [],
      "manana" => []
    ];

    $audiencias = $this->model->getAudiencias();

    $today = date_create();
    $today->setTime(0, 0, 0);

    $manana = date_create()->setTime(0, 0, 0)->add(new DateInterval('P1D'));
    $pasadoManana = date_create()->setTime(0, 0, 0)->add(new DateInterval('P2D'));

    foreach ($audiencias as $audiencia) {
      $fecha = $audiencia->getFecha();

      if ($fecha < $today) {
        $audienciasOrdered["pasado"][] = $audiencia;

      } else if ($fecha < $manana) {
        $audienciasOrdered["hoy"][] = $audiencia;

      } else if ($fecha < $pasadoManana) {
        $audienciasOrdered["manana"][] = $audiencia;

      } else {
        $dateStr = $fecha->format("Y-m-d");
        $audienciasOrdered[$dateStr][] = $audiencia;
      }
    }

    return $audienciasOrdered;
  }
}