<?php
require_once "../db/configdb.php";
require_once "../db/mysql.php";

class personaModel
{
  private $idpersona;
  private $nombres;
  private $apellidos;
  private $dni;
  private $celular;
  private $celular2;
  private $correo;
  private $ciudad;
  private $direccion;
  private $twitter;

  #region Set y Get
  public function getnombres()
  {
    return $this->nombres;
  }
  public function getapellidos()
  {
    return $this->apellidos;
  }
  public function getdni()
  {
    return $this->dni;
  }
  public function getcelular()
  {
    return $this->celular;
  }
  public function getcelular2()
  {
    return $this->celular2;
  }
  public function getcorreo()
  {
    return $this->correo;
  }
  public function getciudad()
  {
    return $this->ciudad;
  }
  public function getdireccion()
  {
    return $this->direccion;
  }
  public function gettwitter()
  {
    return $this->twitter;
  }

  public function setidpersona($idpersona)
  {
    $this->idpersona = $idpersona;
  }
  public function setnombres($nombres)
  {
    $this->nombres = $nombres;
  }
  public function setapellidos($apellidos)
  {
    $this->apellidos = $apellidos;
  }
  public function setdni($dni)
  {
    $this->dni = $dni;
  }
  public function setcelular($celular)
  {
    $this->celular = $celular;
  }
  public function setcelular2($celular2)
  {
    $this->celular2 = $celular2;
  }
  public function setcorreo($correo)
  {
    $this->correo = $correo;
  }
  public function setciudad($ciudad)
  {
    $this->ciudad = $ciudad;
  }
  public function setdireccion($direccion)
  {
    $this->direccion = $direccion;
  }
  public function settwitter($twitter)
  {
    $this->twitter = $twitter;
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
  public function CreateUser()
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL = $miconexion->consulta("insert into persona values('','$this->nombres','$this->apellidos','$this->dni','$this->celular','$this->celular2','$this->correo','$this->ciudad','$this->direccion','$this->twitter')");
    $resSQL1 = $miconexion->consulta("SELECT MAX(idpersona) AS id FROM persona");
    if ($row = mysqli_fetch_row($resSQL1)) {
      $id = trim($row[0]);
    }
    //$this->Disconnect();
    return $id;
  }

  public function AgregarPP($id_proceso, $id_persona)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL = $miconexion->consulta("insert into persona_has_proceso values('$id_persona','$id_proceso')");
    //$this->Disconnect();
    return $resSQL;
  }

  public function AgregarPR($id_persona, $id_rol)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL = $miconexion->consulta("insert into persona_has_rol values('$id_persona','$id_rol')");
    //$this->Disconnect();
    return $resSQL;
  }
  public function ListarPersonas($id_proceso)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select u.persona_idpersona, p.nombres, p.apellidos, p.dni, p.celular, p.celular2, p.correo, r.nombre from persona_has_proceso u, persona p, persona_has_rol pr, rol r where u.proceso_idproceso = '$id_proceso' and p.idpersona = u.persona_idpersona and pr.persona_idpersona=p.idpersona and r.idrol = pr.rol_idrol");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

  public function ObtenerRol()
  { 
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from rol");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }
  public function BuscarPersonaId($id)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from persona p, persona_has_rol u, rol r where p.idpersona ='$id' and u.persona_idpersona = '$id' and r.idrol = u.rol_idrol");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

  public function BuscarPersonaDNI($dni)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("select * from persona p, persona_has_rol u, rol r where p.dni ='$dni' and u.persona_idpersona = p.idpersona and r.idrol = u.rol_idrol");
    $resSQL = $miconexion->verconsulta();
    //$this->Disconnect();
    return $resSQL;
  }

  public function ActualizarPersona()
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL = $miconexion->consulta("update persona 
      set  nombres = '$this->nombres', apellidos= '$this->apellidos', dni= '$this->dni', celular= '$this->celular',celular2= '$this->celular2',correo= '$this->correo', ciudad= '$this->ciudad',direccion ='$this->direccion', twitter= '$this->twitter'
      where idpersona = '$this->idpersona'");

    //$this->Disconnect();
    return $resSQL;
  }
  public function ActualizarPR($id_rol)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $id;
    $resSQL = $miconexion->consulta("update persona_has_rol set rol_idrol = '$id_rol'
      where persona_idpersona = '$this->idpersona'");
    //$this->Disconnect();
    return $resSQL;
  }

  public function EliminarPersona($id)
  {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $res = $miconexion->consulta("DELETE FROM persona_has_proceso WHERE persona_has_proceso.persona_idpersona = $id");
    $res = $miconexion->consulta("DELETE FROM persona_has_rol WHERE persona_has_rol.persona_idpersona = $id");
    $res = $miconexion->consulta("DELETE FROM persona WHERE persona.idpersona = $id");
    //$resSQL = $miconexion->consulta(" delete persona.*  from persona JOIN persona_has_proceso
    //ON persona_has_proceso.persona_idpersona = persona.idpersona where persona.idpersona ='$id'");
    //$this->Disconnect();
    return $res;
  }
}
