<?php

class AudienciaShort
{
  private int $id;
  private string $proceso;
  private string $tipo;
  private DateTime $fecha;
  private DateTime $hora;
  private string $edificio;
  private string $sala;
  private string $procesado;
  private string $juez;
  private int $idProceso;

  public function __construct($id, $proceso, $tipo, $fecha, $hora, $edificio, $sala, $idproceso = -1)
  {
    $this->id = $id;
    $this->proceso = $proceso;
    $this->tipo = $tipo;
    $this->fecha = $fecha;
    $this->hora = $hora;
    $this->edificio = $edificio;
    $this->sala = $sala;
    $this->idProceso = $idproceso;
  }

  public function addPerson(string $nombre, string $cargo)
  {
    if ($cargo == 'Juez') {
      $this->juez = $nombre;
    } else {
      $this->procesado = $nombre;
    }
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getProceso(): string
  {
    return $this->proceso;
  }

  /**
   * @return string
   */
  public function getTipo(): string
  {
    return $this->tipo;
  }

  /**
   * @return DateTime
   */
  public function getFecha(): DateTime
  {
    return $this->fecha;
  }

  /**
   * @return DateTime
   */
  public function getHora(): DateTime
  {
    return $this->hora;
  }

  /**
   * @return string
   */
  public function getEdificio(): string
  {
    return $this->edificio;
  }

  /**
   * @return string
   */
  public function getSala(): string
  {
    return $this->sala;
  }

  /**
   * @return string
   */
  public function getProcesado(): string
  {
    if (isset($this->procesado)) {
      return $this->procesado;
    }
    return "N/A";
  }

  /**
   * @return string
   */
  public function getJuez(): string
  {
    if (isset($this->juez)) {
      return $this->juez;
    }
    return "N/A";
  }

  /**
   * @return int
   */
  public function getIdProceso(): int
  {
    return $this->idProceso;
  }
}
