<?php

require_once 'modelo/Audiencia.model.php';

class PrincipalController
{
  private $model;

  public function __construct()
  {
    $this->model = new AudienciaModel();
  }

  public function getNumberOfAudiencias()
  {
    return $this->model->getTotalAudiencias();
  }

  public function getNumberOfAudienciasNormal()
  {
    $nextMonths = date_create()->setDate(date_create()->format('Y'), date_create()->format('m'), 1);
    $nextMonths->add(new DateInterval('P1M'));
    return $this->model->getNumberOfAudienciasPerDate($nextMonths);
  }

  public function getNumberOfAudienciasPorCaducar()
  {
    $firstDayMonth = date_create()->setDate(date_create()->format('Y'), date_create()->format('m'), 1);
    $finalDayMonth = date_create()->setDate(date_create()->format('Y'), date_create()->format('m'), 1)->add(new DateInterval('P1M'))->sub(new DateInterval('P1D'));
    return $this->model->getNumberOfAudienciasPerDate($firstDayMonth, false, $finalDayMonth);
  }

  public function getNumberOfAudienciasCaducados()
  {
    $firstDayMonth = date_create()->setDate(date_create()->format('Y'), date_create()->format('m'), 1);
    return $this->model->getNumberOfAudienciasPerDate($firstDayMonth, true);
  }

  public function getAudiencias()
  {
    $audiencias = $this->model->getAudiencias();
    return $audiencias;
  }

  public function getAudienciasPerDate()
  {
    $audienciasOrdered = [];

    $audiencias = $this->model->getAudiencias();

    foreach ($audiencias as $audiencia) {
      $fecha = $audiencia->getFecha();
      $dateStr = $fecha->format("Y-m");
      $audienciasOrdered[$dateStr][] = $audiencia;
    }

    return $audienciasOrdered;
  }
}
