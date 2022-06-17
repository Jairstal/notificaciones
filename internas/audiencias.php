<?php
$tituloPagina = "Pricipal Dashboard";
$estilosWeb = ['../css/estilos2.css'];
include_once '../templates/cabeceras.inc.php';
include_once '../templates/barraNavegacion.inc.php';
include_once '../templates/menuLateral.inc.php';
?>

<main class="contenedor-principal">
    <h2 class="titulo-principal">Registrar nueva audiencia</h2>

    <div class="tarjeta bg-gray">

        <form class="formulario" method="post" action="procesar.php">

            <div class="grupoInput">
                <label for="nombre">Nombre:</label>
                <input class="w-100" type="text" name="nombre" id="nombre" placeholder="ingrese nombre del proceso">
            </div>
            <div class="grupoInput">
                <label for="fecha">Fecha:</label>
                <input type=date name="fecha" id="fecha">
                
                <label for="fecha">Hora:</label>
                <input type=time name="hora" id="hora">
                
            </div>
            <div class="grupoInput">
                <label for="tipoUser">Tipo:</label>
                <select id="tipoUser" name="tipoUser">
                    <option> -- </option>
                    <option value="1">Penal</option>
                    <option value="2">Transito</option>
                </select>
                <label for="tipoUser">Edificio:</label>
                <select id="tipoUser" name="tipoUser">
                    <option> -- </option>
                    <option value="1">Judicatura</option>
                </select>
            </div>

            <div class="grupoInput">
                <label for="codproces">Codigo:</label>
                <input type="text" name="codproces" id="codproces" placeholder="0000-0000-00">
                <label for="tipoUser">Sala:</label>
                <select id="tipoUser" name="tipoUser">
                    <option> -- </option>
                    <option value="1">P2-2</option>
                </select>
            </div>

            <div class="grupoInput">
                <label for="btnAgregar">Inmplicados:</label>
            </div>

            <div class="tabla-implicados">
                <table>
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><input type="checkbox" name="sel_1" id=""></td>
                            <td>Villavicencio Hector Daniel</td>
                            <td>Juez</td>
                            <td>
                                <a class="btn" href="#">Notificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td><input type="checkbox" name="sel_1" id=""></td>
                            <td>Alvarado Aurelio Alejandro</td>
                            <td>Ab. Defensor</td>
                            <td>
                                <a class="btn" href="#">Notificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td><input type="checkbox" name="sel_1" id=""></td>
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
                <label for="descripcion">Observaciones:</label>
                <textarea name="descripcion" id="descripcion" rows=" 10" placeholder="Audicencia del proceso PENAL por el delito de acidente de tránsito en la ciudad de Loja, primera audiencia de formulación de cargos y medidas precautelares...."></textarea>
            </div>

            <div class="grupo-botones">
                <input class="btn" type="reset" value="Cancelar">
                <input class="btn" type="submit" value="Registrar">
            </div>

        </form>

    </div>

</main>

<footer class="piePagina">
    <p>Este el footer</p>
</footer>

<?php
$scriptsWeb = ['../js/persona.js'];
include_once '../templates/cierre.inc.php';
?>