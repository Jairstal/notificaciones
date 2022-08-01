
<?php
session_start();

require_once "modelo/personaModel.php";
require_once "modelo/procesoModel.php";
require_once 'modelo/audiencia1Model.php';
require_once 'modelo/notificacionModel.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;

function nombres()
{
    $value = $_SESSION['nombre'];
    $value2 = $_SESSION['apellido'];
    $user = $value;
    return $value;
}

function fecha()
{
    date_default_timezone_set('America/Guayaquil');
    $myDate = date("d-m-y");
    return $myDate;
}

function hora()
{
    $hora = new DateTime("now", new DateTimeZone('America/Guayaquil'));
    return $hora;
}


class funcionesController
{
    /*variables de conexoion*/
    var $BaseDatos;
    var $Servidor;
    private $model;
    private $modelPersona;
    private $modelAudiencia;
    private $modelNotificacion;


    public function __CONSTRUCT()
    {
        $this->model = new procesoModel();
        $this->modelPersona = new personaModel();
        $this->modelAudiencia = new audiencia1Model();
        $this->modelNotificacion = new notificacionModel();
    }


    public function Index()
    {
        require_once 'vistas/principal.php';
    }

    public function proceso()
    {
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        require_once 'vistas/proceso.php';
    }

    public function audiencia()
    {
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        require_once 'vistas/lista_procesoAudiencia.php';
    }


    public function buscarcedula($dni)
    {
        $user = new personaModel();
        $userResponse = $user->BuscarPersonaDNI($dni);
        return $userResponse;
    }

    public function RegistrarProcess()
    {
        $proceso = new procesoModel();

        if (isset($_POST['codproces']) && isset($_POST['tipoUser'])) {
            $proceso->setcodigo($_POST['codproces']);
            $proceso->setfech_creacion($_POST['fecha']);
            $proceso->settipo($_POST['tipoUser']);
            $proceso->setdescripcion($_POST['descripcion']);
            $proceso->setestado('0');
            $procesoResponse = $proceso->InsertarProceso();
            //echo  $userResponse . " response"; //BORRAR
            if ($procesoResponse == 1) // exitoso
            {
                header('Location: index.php?c=funciones&a=ListarProcess');
            } else {
                echo "<h1>Error al crear proceso.</h1>";
            }
        }
    }

    public function ListarProcess()
    {
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        require_once 'vistas/lista_proceso.php';
    }

    public function actualizarProceso()
    {
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        $data = $procesoModel->BuscarProcesoId($_REQUEST['id']);
        require_once 'vistas/actualizar_proceso.php';
    }
    public function editarProcess()
    {
        $proceso = new procesoModel();

        if (isset($_POST['codproces']) && isset($_POST['tipoUser'])) {
            $proceso->setidproceso($_POST['id']);
            $proceso->setcodigo($_POST['codproces']);
            $proceso->setfech_creacion($_POST['fecha']);
            $proceso->settipo($_POST['tipoUser']);
            $proceso->setdescripcion($_POST['descripcion']);
            $procesoResponse = $proceso->ActualizarProceso();
            //echo  $userResponse . " response"; //BORRAR
            if ($procesoResponse == 1) // exitoso
            {
                header('Location: index.php?c=funciones&a=ListarProcess');
            } else {
                echo "<h1>Error al actualizar proceso.</h1>";
            }
        }
    }

    public function eliminarProceso()
    {
        $proceso = new procesoModel();
        $tiposProceso = $proceso->ListarTipoProcesos();
        $proceso->EliminarProceso($_REQUEST['id']);
        require_once 'vistas/lista_proceso.php';
    }
    public function verProceso()
    {
        $id_proceso = $_REQUEST['id'];
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        require_once 'vistas/lista_personas.php';
    }




    ////////////////////////////
    //   Funciones de Persona
    /////////////////////////////////



    public function ListarPersonas($id)
    {
        $id_proceso = $id;
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        require_once 'vistas/lista_personas.php';
    }

    public function agregarPersona()
    {
        $persona = new personaModel();
        $procesoModel = new procesoModel();
        $tiposProceso = $procesoModel->ListarTipoProcesos();
        $roles = $persona->ObtenerRol();
        $id_proceso = $_REQUEST['id'];
        require_once 'vistas/agregar_persona.php';
    }

    public function RegistrarPersona()
    {
        $persona = new personaModel();

        if (isset($_POST['nombres']) && isset($_POST['apellidos'])) {
            $persona->setnombres($_POST['nombres']);
            $persona->setapellidos($_POST['apellidos']);
            $persona->setdni($_POST['cedula']);
            $persona->setcelular($_POST['celular1']);
            $persona->setcelular2($_POST['celular2']);
            $persona->setcorreo($_POST['correo']);
            $persona->setciudad($_POST['ciudad']);
            $persona->setdireccion($_POST['direccion']);
            $persona->settwitter($_POST['twitter']);
            $id_proceso = $_POST['id'];
            $id_rol = $_POST['rolPersona'];
            $id_persona = $persona->CreateUser();
            $personaResponse = $persona->AgregarPP($id_proceso, $id_persona);
            $personaResponse1 = $persona->AgregarPR($id_persona, $id_rol);

            //echo  $userResponse . " response"; //BORRAR
            if ($personaResponse == 1) // exitoso
            {
                // header('Location: index.php?c=funciones&a=ListarPersonas&id=$id_proceso');
                $this->ListarPersonas($id_proceso);
            } else {
                echo "<h1>Error al crear proceso.</h1>";
            }
        }
    }

    public function actualizarPersona()
    {
        $persona = new personaModel();

        $data = $persona->BuscarPersonaId($_REQUEST['idPersona']);
        $roles = $persona->ObtenerRol();
        $id_proceso = $_REQUEST['idProceso'];
        require_once 'vistas/actualizar_persona.php';
    }
    public function editarPersona()
    {
        $persona = new personaModel();

        if (isset($_POST['nombres']) && isset($_POST['apellidos'])) {
            $persona->setidpersona($_POST['idPersona']);
            $persona->setnombres($_POST['nombres']);
            $persona->setapellidos($_POST['apellidos']);
            $persona->setdni($_POST['cedula']);
            $persona->setcelular($_POST['celular1']);
            $persona->setcelular2($_POST['celular2']);
            $persona->setcorreo($_POST['correo']);
            $persona->setciudad($_POST['ciudad']);
            $persona->setdireccion($_POST['direccion']);
            $persona->settwitter($_POST['twitter']);
            $id_rol = $_POST['rolPersona'];
            $id_proceso = $_POST['idProceso'];
            $personaResponse = $persona->ActualizarPersona();
            $personaResponse1 = $persona->ActualizarPR($id_rol);

            //echo  $userResponse . " response"; //BORRAR
            if ($personaResponse1 == 1) // exitoso
            {
                // header('Location: index.php?c=funciones&a=ListarPersonas&id=$id_proceso');
                $this->ListarPersonas($id_proceso);
            } else {
                echo "<h1>Error al crear proceso.</h1>";
            }
        }
    }

    public function eliminarPersona()
    {
        $persona = new personaModel();
        $id_proceso = $_REQUEST['idProceso'];
        $persona->EliminarPersona($_REQUEST['idPersona']);
        $this->ListarPersonas($id_proceso);
    }

    ////////////////////////////
    //   Funciones de Audiencia
    /////////////////////////////////

    public function agregarAudiencia()
    {
        $audiencia = new audiencia1Model();
        $id_proceso = $_REQUEST['id'];
        require_once 'vistas/agregar_audiencia.php';
    }

    public function RegistrarAudiencia()
    {
        $audiencia = new audiencia1Model();
        

        if (isset($_POST['fecha']) && isset($_POST['hora'])) {

            $fecha=($_POST['fecha']);
            $hora=($_POST['hora']);
            $combined = $fecha. ' ' . $hora;

            
            $audiencia->settipo($_POST['tipoAudiencia']);
            $audiencia->setfecha($combined);
            $audiencia->sethora($_POST['hora']);
            $audiencia->setedificio($_POST['edificio']);
            $audiencia->setdireccion($_POST['direccion']);
            $audiencia->setsala($_POST['sala']);
            $audiencia->setobservacion($_POST['observacion']);

            $id_proceso = $_POST['id'];
            $audienciaResponse = $audiencia->InsertarAudiencia($id_proceso);

            //echo  $userResponse . " response"; //BORRAR
            if ($audienciaResponse == 1) // exitoso
            {
                // header('Location: index.php?c=funciones&a=ListarPersonas&id=$id_proceso');
                $this->notificarPersonas($id_proceso);
            } else {
                echo "<h1>Error al crear proceso.</h1>";
            }
        }
    }
    public function notificarPersonas($id)
    {
        $audiencia = new audiencia1Model();
        $id_proceso = $id;
        $id_audiencia = $audiencia->ObtenerAudiencia();

        require_once 'vistas/notificar_personas.php';
    }


    public function notificarCustom()
    {
        $id_persona = $_REQUEST['idPersona'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $rol2 = $_REQUEST['rol'];
        $correo = $_REQUEST['correo'];
        $celular = $_REQUEST['celular'];

        $id_proceso = $_REQUEST['idProceso'];

        require_once 'vistas/notificar_custom.php';
    }

    public function obtenerCustom()
    {
        $notificacion = new notificacionModel();
        $proceso = new procesoModel();
        $id_persona = $_POST['idpe'];
        $id_proceso = $_POST['idpro'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $celular = $_POST['celular'];
        $mensaje = $_POST['descripcion'];
        $archivo= $_FILES['archivo'];
        $id_audiencia = NULL;
        $fecha = date("Y-m-d");
        $codigo;
        $descripcion;
        $dataProceso = $proceso->BuscarProcesoId($id_proceso);
        foreach ($dataProceso as $pr) {
            $codigo = $pr['1'];
            $descripcion = $pr['4'];
        }
        $res = $this->enviarCorreoCustom($id_proceso, $nombre, $apellido, $correo, $mensaje, $codigo, $descripcion,$archivo);
        $res2 = $this->enviarWhatsappCustom($nombre, $apellido, $celular, $mensaje, $codigo, $descripcion);
        if ($res == 1 && $res2 == 1) {
            $notificacion->setproceso_idproceso($id_proceso);
            $notificacion->setaudiencia_idaudiencia($id_audiencia);
            $notificacion->setpersona_idpersona($id_persona);
            $notificacion->setfecha($fecha);
            $notificacion->setestado("enviado");
            $notificacionResponse = $notificacion->CreateNotificacion2();
        }
        $this->audiencia();
    }

    public function notificarProceso()
    {

        $id_proceso = $_REQUEST['idPersona'];
        $id_proceso = $_REQUEST['idProceso'];
        if (isset($id_proceso) && isset($id_proceso)) {
            echo "<script> alert(' Se ha notificado correctamente');
window.location= 'https://localhost/ProyectoWebLocal/notificaciones/secretaria/index.php?c=funciones&a=audiencia'
</script>";
        } else {
            echo "<h1>Error al crear proceso.</h1>";
        }
    }

    public function notificarAudiencia()
    {

        $notificacion = new notificacionModel();
        $id_proceso = $_REQUEST['idProceso'];
        $id_audiencia = $_REQUEST['idAudiencia'];
        $fecha = date("Y-m-d");
        foreach ($_POST['implicados'] as $id_persona) {
            $res = $this->enviarCorreo($id_persona, $id_proceso, $id_audiencia);
            $res2 = $this->enviarWhatsapp($id_persona, $id_proceso, $id_audiencia);
            if ($res == 1 && $res2 == 1) {
                $notificacion->setproceso_idproceso($id_proceso);
                $notificacion->setaudiencia_idaudiencia($id_audiencia);
                $notificacion->setpersona_idpersona($id_persona);
                $notificacion->setfecha($fecha);
                $notificacion->setestado("enviado");
                $notificacionResponse = $notificacion->CreateNotificacion();
            }
        }
        $this->audiencia();
    }

    public function enviarCorreo($id_persona, $id_proceso, $id_audiencia)
    {
        require '../vendor/autoload.php';
        $persona = new personaModel();
        $proceso = new procesoModel();
        $audiencia = new audiencia1Model();


        $dataPersona = $persona->BuscarPersonaId($id_persona);
        $dataProceso = $proceso->BuscarProcesoId($id_proceso);
        $dataAudiencia = $audiencia->BuscarAudienciaId($id_audiencia);

        $correo;
        $nombrePersona;
        $descripcion;
        $tipo;
        $fecha;
        $hora;
        $edificio;
        $direccion;
        $sala;
        $codigo;
        foreach ($dataPersona as $p) {
            $nombrePersona = $p['1'];
            $correo = $p['6'];
        }
        foreach ($dataProceso as $pr) {
            $codigo = $pr['1'];
            $descripcion = $pr['4'];
        }
        foreach ($dataAudiencia as $a) {
            $tipo = $a['1'];
            $fecha = $a['2'];
            $hora = $a['3'];
            $edificio = $a['4'];
            $direccion = $a['5'];
            $sala = $a['6'];
        }

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jairostalin18@gmail.com';
            $mail->Password = 'fzkwzcqcvwfehtlh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('jairostalin18@gmail.com');
            $mail->addAddress($correo, 'Receptor');
            // $mail->addCC('concopia@gmail.com');

            // $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

            $mail->isHTML(true);
            $mail->Subject = "Notificacion del proceso $codigo";
            $mail->Body = "Sr/a. $nombrePersona,
            Por medio del presente se le notifica su presencia en la audiencia a desarrollarse:
            Proceso:$descripcion
            Audiencia:$tipo
            Fecha y hora: $fecha
            Edificio: $edificio
            Direccion: $direccion
            Sala: $sala";
            $mail->send();
            return 1;
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
            return 0;
        }
    }

    public function enviarCorreoCustom($id_proceso, $nombre, $apellido, $correo, $mensaje, $codigo, $descripcion,$archivo)
    {
        require '../vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jairostalin18@gmail.com';
            $mail->Password = 'fzkwzcqcvwfehtlh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('jairostalin18@gmail.com');
            $mail->addAddress($correo, 'Receptor');
            // $mail->addCC('concopia@gmail.com');

            // $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

            $mail->isHTML(true);
            $mail->Subject = "Notificacion del proceso $codigo";
            $mail->Body = "Sr/a $nombre $apellido, acerca del proceso $codigo sobre $descripcion se informa:
    $mensaje";
    $mail->addAttachment($archivo['tmp_name'],$archivo['name'] );
            $mail->send();
            return 1;
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
            return 0;
        }
    }



    public function enviarWhatsapp($id_persona, $id_proceso, $id_audiencia)
    {
        require_once '../vendor/autoload.php';
        $persona = new personaModel();
        $proceso = new procesoModel();
        $audiencia = new audiencia1Model();


        $dataPersona = $persona->BuscarPersonaId($id_persona);
        $dataProceso = $proceso->BuscarProcesoId($id_proceso);
        $dataAudiencia = $audiencia->BuscarAudienciaId($id_audiencia);

        $celular;
        $nombrePersona;
        $descripcion;
        $tipo;
        $fecha;
        $hora;
        $edificio;
        $direccion;
        $sala;
        $codigo;
        foreach ($dataPersona as $p) {
            $nombrePersona = $p['1'];
            $celular = $p['4'];
        }
        foreach ($dataProceso as $pr) {
            $codigo = $pr['1'];
            $descripcion = $pr['4'];
        }
        foreach ($dataAudiencia as $a) {
            $tipo = $a['1'];
            $fecha = $a['2'];
            $hora = $a['3'];
            $edificio = $a['4'];
            $direccion = $a['5'];
            $sala = $a['6'];
        }
        // Find your Account SID and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = 'ACb26b97347e8b1931b26d602ec8ca3f0a';
        $token = 'e8854c571c3c7c932e78b57ed15e1436';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        // A Twilio number you own with SMS capabilities

        $twilio = new Client($sid, $token);
        $message = $twilio->messages
            ->create(
                'whatsapp:+593980790256',
                array(
                    'from' => "whatsapp:+14155238886",
                    'body' => "Sr/a.  $nombrePersona,
                    Por medio del presente se le informa de la audiencia a desarrollarse:
                    Proceso:$descripcion
                    Audiencia:$tipo
                    Fecha y hora: $fecha
                    Edificio: $edificio
                    Direccion: $direccion
                    Sala: $sala"
                )
            );
        return 1;
    }

    public function enviarWhatsappCustom( $nombre, $apellido, $celular, $mensaje, $codigo, $descripcion)
    {
        require_once '../vendor/autoload.php';
        // Find your Account SID and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = 'ACb26b97347e8b1931b26d602ec8ca3f0a';
        $token = 'e8854c571c3c7c932e78b57ed15e1436';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        // A Twilio number you own with SMS capabilities

        $twilio = new Client($sid, $token);
        $message = $twilio->messages
            ->create(
                'whatsapp:+593980790256',
                array(
                    'from' => "whatsapp:+14155238886",
                    'body' => 
                    "Sr/a $nombre $apellido,
acerca del proceso $codigo sobre $descripcion se informa:
                            
    $mensaje"

                )
            );
        return 1;
    }
}
