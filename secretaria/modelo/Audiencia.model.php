<?php

require_once 'AudienciaShort.entity.php';
require_once 'dll/Conexion.php';

class AudienciaModel
{

  private PDO $db;

  public function __construct()
  {
    $this->db = Conexion::obtenerConexion();
  }

  public function getAudiencias()
  {
    $audienciasDict = [];

    try {
      $sql = "
  SELECT
      a.idaudiencia,
      CONCAT(p.codigo, '-', tp.proceso) as proceso,
      a.tipo,
      a.fecha,
      a.hora,
      a.edificio,
      a.sala,
      CONCAT(p2.nombres, ' ', p2.apellidos) as nombre,
      r.nombre as cargo,
      p.idproceso
  FROM
      audiencia as a
      JOIN proceso p on a.proceso_idproceso = p.idproceso
      JOIN persona_has_proceso php on p.idproceso = php.proceso_idproceso
      JOIN persona p2 on php.persona_idpersona = p2.idpersona
      JOIN persona_has_rol php2 on p2.idpersona = php2.persona_idpersona
      JOIN rol r on php2.rol_idrol = r.idrol
      JOIN tipo_proceso tp on p.tipo = tp.idproceso
  WHERE
      php2.rol_idrol IN (1, 3)
      AND a.fecha >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY)
  ORDER BY a.fecha ASC";

      $rows = $this->db->query($sql);
      $timeFormat = "Y-m-d H:i:s";
      foreach ($rows as $row) {

        if (array_key_exists($row['idaudiencia'], $audienciasDict)) {
          $audienciasDict[$row['idaudiencia']]->addPerson($row['nombre'], $row['cargo']);
        } else {
          $audienciasDict[$row['idaudiencia']] = new AudienciaShort(
            $row['idaudiencia'],
            $row['proceso'],
            $row['tipo'],
            date_create_from_format($timeFormat, $row['fecha']),
            date_create_from_format($timeFormat, $row['hora']),
            $row['edificio'],
            $row['sala'],
            intval($row['idproceso'])
          );

          $audienciasDict[$row['idaudiencia']]->addPerson($row['nombre'], $row['cargo']);
        }
      }
    } catch (PDOException $ex) {
      echo 'ERROR' . $ex->getMessage();
    }

    $audiencias = [];
    foreach ($audienciasDict as $clave => $audiencia) {
      $audiencias[] = $audiencia;
    }

    return $audiencias;
  }

  public function getTotalAudiencias()
  {
    try {
      $sql = "SELECT COUNT(a.idaudiencia) as total FROM audiencia as a";
      $rows = $this->db->query($sql);
      $row = $rows->fetch();
      return intval($row['total']);
    } catch (PDOException $ex) {
      echo 'ERROR' . $ex->getMessage();
      return 0;
    }
  }

  public function getNumberOfAudienciasPerDate(Datetime $date, bool $before = false, DateTime $endDate = null)
  {
    $dateStr = $date->format("Y-m-d");
    $sql = "";

    if ($endDate != null and !$before) {
      $endDateStr = $endDate->format("Y-m-d");
      $sql = "SELECT COUNT(a.idaudiencia) as total FROM audiencia as a WHERE a.fecha BETWEEN '$dateStr' AND '$endDateStr'";
    } else {
      $option = $before ? "<" : ">=";
      $sql = "SELECT COUNT(a.idaudiencia) as total FROM audiencia as a WHERE a.fecha {$option} '{$dateStr}'";
    }

    try {
      $rows = $this->db->query($sql);
      $row = $rows->fetch();
      return intval($row['total']);
    } catch (PDOException $ex) {
      echo 'ERROR' . $ex->getMessage();
      return 0;
    }
  }
}
