<?php
    session_start();
    include_once("libros.class.inc.php");
    $libro = Libro::getLibro($_GET['tituloLibro']);
    $titulo = $libro->getValor('titulo');
    $autor = $libro->getValor('autor');
    $editorial = $libro->getValor('editorial');
    $anio = $libro->getValor('anio');
    $edicion = $libro->getValor('edicion');
    $descripcion = $libro->getValor('descripcion');
    $opinion = $libro->getValor('opinion');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8" />
    <title>Indice</title>
    <meta name="description" content="Indice" />
    <meta name="author" content="David Peinado" />

    <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link
      href="//fonts.googleapis.com/css?family=Raleway:400,300,600"
      rel="stylesheet"
      type="text/css"
    />

    <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link rel="stylesheet" href="css/libro_leido.css" />

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>

  <body>
    <header>
      <section class="row">
        <section class="three columns">
          <a href="index.php">
            <img alt="libro" id="logo" src="images/library.svg" />
          </a>
        </section>
        <section class="six columns">
          <h1 class="center titulo">Nombre de la aplicacion</h1>
        </section>
        <section class="three columns">
        <?php
        if (!empty($_SESSION['nombre'])){
            echo '<h5 class="center titulo">
            Bienvenido/a ' . $_SESSION['nombre'] . ' <br />
                <a href="logout.php">Desconectarse</a>
              </h5>
              </section>
            </section>
            </header>
            <!-- Navigation bar-->
            <nav>
              <ul>
                <li class="different"><a href="mis_libros.php">Mis Libros</a></li>
                <li class="different"><a href="mis_datos.php">Mis Datos</a></li>
                <li class="different"><a href="foro.php">Foro</a></li>
                <li class="different">
                  <a href="recomendaciones_u1.php">Mis Recomendaciones</a>
                </li>
              </ul>
            </nav>
            <!-- Navigation bar-->';
        }
        else {
          echo '<form class="formulario-login" method="POST" action="login.php">
            <section class="row">
                  <section class="five columns">
                    <label>Usuario</label>
                    <input
                      class="u-full-width"
                      name="usuario"
                      type="text"
                      required
                    />
                  </section>
                  <section class="five columns">
                    <label>Contraseña</label>
                    <input
                      class="u-full-width"
                      name="password"
                      type="password"
                      required
                    />
                  </section>
                </section>
                <br />
                <input type="submit" name="submitUsuario" value="Enviar" /><br />
                <a href="alta_usuario.html">Formulario de registro</a>
              </form>
              </section>
            </section>
          </header>';
        }
    ?>

    <!-- Section-->
    <main>
      <section class="container">
        <img alt="libro" id="libro" src="images/libro1.jpg" />
        <section class="container" id="metadata">
          <h5>
            <span>Titulo: </span><span><?php echo $titulo?></span><br />
            <span>Autor: </span><span><?php echo $autor?></span><br />
            <span>Editorial: </span><span><?php echo $editorial?></span><br />
            <span>Año: </span><span><?php echo $anio?></span><br />
            <span>Edición: </span><span><?php echo $edicion?></span>
          </h5>
        </section>
        <section class="container" id="data">
          <label>Descripción:</label>
          <textarea readonly id="descripcion" name="descripcion" rows="20">
          <?php echo $descripcion?>
      </textarea
          >
          <label>Opinión:</label>
          <textarea readonly id="opinion" name="opinion" rows="20">
          <?php echo $opinion?>
      </textarea
          >

          <section class="vertical-align">
            <label>Mi valoración:</label>
            <section class="btns" id="valoracion">
              <label>
                <input name="button-group" type="radio" />
                <span class="btn first">Pésimo</span>
              </label>
              <label>
                <input name="button-group" type="radio" />
                <span class="btn">Malo</span>
              </label>
              <label>
                <input checked name="button-group" type="radio" />
                <span class="btn">Bueno</span>
              </label>
              <label>
                <input name="button-group" type="radio" />
                <span class="btn">Muy bueno</span>
              </label>
              <label>
                <input name="button-group" type="radio" />
                <span class="btn last">Excelente</span>
              </label>
            </section>
          </section>
        </section>
      </section>
    </main>
    <!-- Section-->

    <footer>
      <h2>
        <a href="mailto:davidpeinado@correo.ugr.es">Contacto</a> -
        <a href="como_se_hizo.pdf">Como se hizo</a>
      </h2>
    </footer>
  </body>
</html>
