<?php
require_once "../db/configdb.php";
require_once "../db/mysql.php";

class procesoModel
{
  private $idproceso;
  private $codigo;
  private $fech_creacion;
  private $tipo;
  private $descripcion;
  private $estado;

  #region Set y Get
  public function getidproceso()
  {
    return $this->idproceso;
  }
  public function getcodigo()
  {
    return $this->codigo;
  }
  public function getfech_creacion()
  {
    return $this->fech_creacion;
  }
  public function gettipo()
  {
    return $this->tipo;
  }
  public function getdescripcion()
  {
    return $this->descripcion;
  }
  public function getestado()
  {
    return $this->estado;
  }

  public function setidproceso($idproceso)
  {
    $this->idproceso = $idproceso;
  }
  public function setcodigo($codigo)
  {
    $this->codigo = $codigo;
  }
  public function setfech_creacion($fech_creacion)
  {
    $this->fech_creacion = $fech_creacion;
  }
  public function settipo($tipo)
  {
    $this->tipo = $tipo;
  }
  public function setdescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }
  public function setestado($estado)
  {
    $this->estado = $estado;
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
  public function InsertarProceso()
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("insert into proceso values(NULL,'$this->codigo','$this->fech_creacion','$this->tipo','$this->descripcion','$this->estado')");

    //$this->Disconnect();
    return $resSQL;
  }
  public function ListarProceso()
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from proceso");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

  public function ListarProcesoId($id)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from proceso where idproceso ='$id'");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

  public function BuscarProcesoId($id)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from proceso where idproceso ='$id'");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

  public function ActualizarProceso()
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("update proceso set  codigo = '$this->codigo', 
      fech_creacion= '$this->fech_creacion', tipo = '$this->tipo', descripcion= '$this->descripcion' 
      where idproceso = '$this->idproceso'");

    //$this->Disconnect();
    return $resSQL;
  }

  public function EliminarProceso($id)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta(" delete from proceso where idproceso ='$id'");
    //$this->Disconnect();
    return $resSQL;
  }

  // Metodo que trae los tipos de proceso de la base de datos y lo retorna en un array
  public function ListarTipoProcesos()
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from tipo_proceso");
    $rows = $miconexion->verconsulta();

    $tiposProcesos = [];

    // Recorro el array de resultados y lo guardo en un array de tipos de proceso
    foreach ($rows as $row) {
      $tiposProcesos[$row[0]] = $row[1];
    }

    return $tiposProcesos;
  }
}
