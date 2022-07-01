<?php

class AudienciaShort {
  private int $id;
  private string $proceso;
  private string $tipo;
  private DateTime $fecha;
  private DateTime $hora;
  private string $edificio;
  private int $sala;
  private string $procesado;
  private string $juez;

  public function __construct($id, $proceso, $tipo, $fecha, $hora, $edificio, $sala) {
    $this->id = $id;
    $this->proceso = $proceso;
    $this->tipo = $tipo;
    $this->fecha = $fecha;
    $this->hora = $hora;
    $this->edificio = $edificio;
    $this->sala = $sala;
  }

  public function addPerson(string $nombre, string $cargo) {
    if ($cargo == 'Juez') {
      $this->juez = $nombre;
    } else {
      $this->procesado = $nombre;
    }
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getProceso(): string {
    return $this->proceso;
  }

  /**
   * @return string
   */
  public function getTipo(): string {
    return $this->tipo;
  }

  /**
   * @return DateTime
   */
  public function getFecha(): DateTime {
    return $this->fecha;
  }

  /**
   * @return DateTime
   */
  public function getHora(): DateTime {
    return $this->hora;
  }

  /**
   * @return string
   */
  public function getEdificio(): string {
    return $this->edificio;
  }

  /**
   * @return int
   */
  public function getSala(): int {
    return $this->sala;
  }

  /**
   * @return string
   */
  public function getProcesado(): string {
    return $this->procesado;
  }

  /**
   * @return string
   */
  public function getJuez(): string {
    return $this->juez;
  }


}