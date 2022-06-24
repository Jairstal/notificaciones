<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['../css/estilos2.css'];
include_once '../templates/cabeceras.inc.php';
include_once '../templates/barraNavegacion.inc.php';
include_once '../templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    <h2 class="titulo-principal">Registrar nuevo proceso</h2>

    <div class="tarjeta bg-gray">

        <form class="formulario" method="post" action="procesar.php">

            <div class="grupoInput">
                <label for="nombre">Nombre:</label>
                <input class="w-100" type="text" name="nombre" id="nombre" placeholder="ingrese nombre del proceso">
            </div>
            <div class="grupoInput">
                <label for="fecha">Fecha:</label>
                <input type=date name="fecha" id="fecha">
            </div>
            <div class="grupoInput">
                <label for="tipoUser">Tipo:</label>
                <select id="tipoUser" name="tipoUser">
                    <option> -- </option>
                    <option value="1">Penal</option>
                    <option value="2">Transito</option>
                </select>
            </div>

            <div class="grupoInput">
                <label for="codproces">Numero proceso:</label>
                <input type="text" name="codproces" id="codproces" placeholder="0000-0000-00">
            </div>

            <div class="grupoInput">
                <label for="btnAgregar">Inmplicados:</label>
                <input class="btn" type="button" value="Agregar">
            </div>

            <div class="tabla-implicados">
                <table>
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Villavicencio Hector Daniel</td>
                            <td>Juez</td>
                            <td>
                                <a class="btn" href="#">Notificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Alvarado Aurelio Alejandro</td>
                            <td>Ab. Defensor</td>
                            <td>
                                <a class="btn" href="#">Notificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Celi Andrade Maria Jose</td>
                            <td>Ab. Acusador</td>
                            <td>
                                <a class="btn" href="#">Notificar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="descripcion-caso tarjeta bg-white">
                <label for="descripcion">Descripcion del caso:</label>
                <textarea name="descripcion" id="descripcion" rows=" 10" placeholder="Escriba la descripción del caso.."></textarea>
            </div>

            <div class="grupo-botones">
                <input class="btn" type="reset" value="Cancelar">
                <input class="btn" type="submit" value="Registrar">
            </div>

        </form>

        <!--Sección ventana desplegable para loggin 
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
        </div>-->
    </div>

</main>

<footer class="piePagina">
    <img src="../images/escudo.jpg">
    <p>Dirección: 12 de Octubre N24-563 y Francisco Salazar<br>
        Copyright © 2011 Consejo de la Judicatura</p>
    <div class="redes_sociales">
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
    </div>
</footer>


<?php
$scriptsWeb = ['../js/persona.js'];
include_once '../templates/cierre.inc.php';
?>