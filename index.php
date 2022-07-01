<?php
$tituloPagina = "Sistema de notificación judicial";
$estilosWeb = ['css/estilos.css'];
include_once 'templates/cabeceras.inc.php'
?>

  <!--menú superior-->
  <nav class="menuPrincipal">
    <a href="">
      Inicio
    </a>
    <a href="">
      Consejo de la judicatura
    </a>
    <a href="">
      Transparencia
    </a>
    <a class="btn-sadsad-popup" id="btn-abrir-popup">
      Ingresar
    </a>
  </nav>

  <!--Sección ventana desplegable para loggin -->
  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h3>Ingreso al sistema</h3>
      <h4>por favor ingrese sus credenciales.</h4>
      <form method="post" action="procesar.php">
        <div class="contenedor-inputs">
          <input type="text" name="usuario" id="usuario" placeholder="usuario">
          <input type="password" name="contraseña" id="contraseña" placeholder="contraseña">
        </div>
        <input type="submit" class="btn-submit" value="Ingresar">
      </form>
    </div>
  </div>


  <section class="sliderPrincipal">
    <img alt="Slider" src="images/slide1.png" title="sliderPrincipal">
    </img>
  </section>


  <main>
    <h2 class=" h2Home">
      Búsqueda de procesos judiciales
    </h2>
    <div id='search-box'>
      <form action='/search' id='search-form' method='get' target='_top'>
        <input id='search-text' name='q' placeholder='Ingresa el código de proceso' type='text'/>

      </form>
    </div>
  </main>

  <footer class="piePagina">
    <h6>
      Derechos reservados 2022
    </h6>
  </footer>

<?php
$scriptsWeb = [
  'js/popup.js'
];

include_once 'templates/cierre.inc.php'
?>