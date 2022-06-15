<!DOCTYPE html>
<html>

<?php
include 'funciones.php';
$completo = nombres();
$fecha = fecha();
$hora = hora();
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,
        initial-scale=1" name="viewport">
    <title>
        Principal dashboard
    </title>
    <link href="..//css/estilos.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>

<body>
    <nav class="menuPrincipal">
        <h4>
            Fecha de hoy:
            <?php echo $fecha ?>
        </h4>
        <h4>
            Hora:
            <?php echo $hora->format('h:i:s A'); ?>
        </h4>
        <h4>
            Bienvenido/a hgytv8yus
            <?php echo $completo ?>
        </h4>
    </nav>
    <aside>
        <img src="../images/logowhite.png">
        <nav class="menuLateral">


            <li><a href="proceso.php?variable=<?php $completo;?>">

                    Registrar proceso</a></li>
            <li><a href="prueba.php">
                    Registrar audiencia</a></li>
            <li><a href="">
                    Salir</a></li>
    </aside>

    <form method="post" action="procesar.php">

        <div class="grupoInput">
        <div class="grupoInput">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="ingrese nombre del proceso">
            </div>
            <div class="grupoInput">
                    <label for="hora">Hora:</label>
                    <input type=time name="hora" id="hora">
                </div>
        <div class="grupoInput">
                    <label for="fecha">Fecha inicio:</label>
                    <input type=date name="fecha" id="fecha">
                </div>
            <label for="tipoUser">Tipo proceso:</label>
            <select id="tipoUser" name="tipoUser">
                <option> -- </option>
                <option value="1">Penal</option>
                <option value="2">Transito</option>
            </select>
            </div>

            <div class="grupoInput">
                <label for="codproces">Codigo proceso:</label>
                <input type="text" name="codproces" id="codproces" placeholder="ingrese codigo proceso">
            </div>

                
    </form>
    <form method="post" action="prueba.php">

        <div class="grupoInput">

    <div class="grupoInput">
    <label for="cedula">Cédula:</label>
    <input type="text" name="cedula" id="cedula" placeholder="ingrese cédula implicado"></div>
    <button value="Buscar" class="btn-sadsad-popup" id="btn-abrir-popup">Buscar</button>
    
    </form>

      <!--Sección ventana desplegable para loggin -->
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h4>Registro de implicados.</h4>
            <form method="post" action="procesar.php">
                <div class="contenedor-inputs">
                    <input type="text" name="nombte" id="nombre" placeholder="nombres">
                    <input type="text" name="apellidos" id="apellidos" placeholder="apellidos">
                </div>
                <input type="submit">
            </form>
        </div>
    </div>





</body>
<script src="persona.js"></script>

</html>

