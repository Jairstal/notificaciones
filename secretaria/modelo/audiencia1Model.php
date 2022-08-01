<?php
require_once "../db/configdb.php";
require_once "../db/mysql.php";

class audiencia1Model 
{
  private $idaudiencia;
  private $tipo;
  private $fecha;
  private $hora;
  private $edificio;
  private $direccion;
  private $sala;
  private $observacion;
 
  #region Set y Get
   public function getidaudiencia(){
    return $this->idaudiencia;
  }
   public function gettipo(){
    return $this->tipo;
  }
   public function getfecha(){
    return $this->fecha;
  }
   public function gethora(){
    return $this->hora;
  }
    public function getedificio(){
    return $this->edificio;
  }
   public function getdireccion(){
    return $this->direccion;
  }
    public function getsala(){
    return $this->sala;
  }
   public function getobservacion(){
    return $this->observacion;
  }

  public function setidaudiencia($idaudiencia){
    $this->idaudiencia = $idaudiencia;
  }
  public function settipo($tipo){
    $this->tipo = $tipo;
  }
   public function setfecha($fecha){
    $this->fecha = $fecha;
  }
  public function sethora($hora){
    $this->hora = $hora;
  }
   public function setedificio($edificio){
    $this->edificio = $edificio;
  }
   public function setdireccion($direccion){
    $this->direccion = $direccion;
  }
   public function setsala($sala){
    $this->sala = $sala;
  }
 
  public function setobservacion($observacion){
    $this->observacion = $observacion;
  }

  /* idpersona
nombres
apellidos
celular
celular2
correo
ciudad
direccion
twitter


   $sql = "SELECT * FROM persona WHERE dni='$dni'";
    $result = mysqli_query($conect, $sql);
  -->*/
  public function InsertarAudiencia($id_proceso) {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("insert into audiencia values('','$this->tipo','$this->fecha','$this->hora',
      '$this->edificio','$this->direccion','$this->sala','$this->observacion','$id_proceso')");

    //$this->Disconnect();
    return $resSQL;
  }


    public function ListarAudiencias($id_proceso) {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from audiencia where proceso_idproceso ='$id_proceso'");
    $resSQL=$miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

     public function BuscarAudienciaId($id_audiencia) {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from audiencia where idaudiencia ='$id_audiencia'");
    $resSQL=$miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

    public function ObtenerAudiencia() {
    $miconexion = new clase_mysqli;
    $id;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("SELECT MAX(idaudiencia) AS id FROM audiencia");
      if ($row = mysqli_fetch_row($resSQL)) {
     $id = trim($row[0]);
}
    //$this->Disconnect();
    return $id;
  }

    public function ActualizarProceso() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("update proceso set  codigo = '$this->codigo', 
      fech_creacion= '$this->fech_creacion', tipo = '$this->tipo', descripcion= '$this->descripcion' 
      where idproceso = '$this->idproceso'");

    //$this->Disconnect();
    return $resSQL;
  }

    public function EliminarProceso($id) {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta(" delete from proceso where idproceso ='$id'");
    //$this->Disconnect();
    return $resSQL;
  }

}
