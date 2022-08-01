<?php
require_once "../db/configdb.php";
require_once "../db/mysql.php";

class notificacionModel 
{
  private $idnotificacion;
  private $proceso_idproceso;
  private $audiencia_idaudiencia;
  private $persona_idpersona;
  private $fecha;
  private $estado;
  
  #region Set y Get
    public function getidnotificacion(){
    return $this->idnotificacion;
  }
   public function getproceso_idproceso(){
    return $this->proceso_idproceso;
  }
   public function getaudiencia_idaudiencia(){
    return $this->audiencia_idaudiencia;
  }
  public function getpersona_idpersona(){
    return $this->persona_idpersona;
  }
    public function getfecha(){
    return $this->fecha;
  }
   public function getestado(){
    return $this->estado;
  }


  public function setidnotificacion($idnotificacion){
    $this->idnotificacion = $idnotificacion;
  }
  public function setproceso_idproceso($proceso_idproceso){
    $this->proceso_idproceso = $proceso_idproceso;
  }
   public function setaudiencia_idaudiencia($audiencia_idaudiencia){
    $this->audiencia_idaudiencia = $audiencia_idaudiencia;
  }
  public function setpersona_idpersona($persona_idpersona){
    $this->persona_idpersona = $persona_idpersona;
  }
   public function setfecha($fecha){
    $this->fecha = $fecha;
  }
  public function setestado($estado){
    $this->estado = $estado;
  }
  

/*
   $sql = "SELECT * FROM persona WHERE dni='$dni'";
    $result = mysqli_query($conect, $sql);
  -->*/
  public function CreateNotificacion() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL=$miconexion->consulta("insert into notificacion values('','$this->proceso_idproceso','$this->audiencia_idaudiencia','$this->persona_idpersona','$this->fecha','$this->estado')");
    //$this->Disconnect();
    return $resSQL;
  }
    public function CreateNotificacion2() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL=$miconexion->consulta("insert into notificacion values('','$this->proceso_idproceso', NULL ,'$this->persona_idpersona','$this->fecha','$this->estado')");
    //$this->Disconnect();
    return $resSQL;
  }

  public function AgregarNotificacion($id_proceso,$id_persona) {
      $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL=$miconexion->consulta("insert into persona_has_proceso values('$id_persona','$id_proceso')");
    //$this->Disconnect();
    return $resSQL;

  }
}
