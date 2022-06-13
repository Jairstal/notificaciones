<?php
//enlace a la base de datos
$conect= new mysqli("localhost","root","","notificaciondb");

$sql="delete from usuarios where id=1";

if (!$sql) {

    echo "error de conexión";
    
}else{
    echo"se conectó correctamente";
}
?>