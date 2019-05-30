<?php
    include_once("libros.class.inc.php");
    session_start();
    $libro = Libro::getLibro($_GET['tituloLibro']);
    $titulo = $usuario->getValor('titulo');
    $autor = $usuario->getValor('titulo');
    $editorial = $usuario->getValor('titulo');
    $anio = $usuario->getValor('titulo');
    $edicion = $usuario->getValor('titulo');
    $descripcion = $usuario->getValor('titulo');
    $opinion = $usuario->getValor('titulo');
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
    <link rel="stylesheet" href="css/libro.css" />

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
        <img alt="libro" id="libro" src="images/libro4.jpg" />
        <section class="container" id="metadata">
          <h5>
            <span>Titulo: </span><span><?php echo ?></span><br />
            <span>Autor: </span><span><?php echo  ?></span><br />
            <span>Editorial: </span><span><?php echo  ?></span><br />
            <span>Año: </span><span><?php echo  ?></span><br />
            <span>Edición: </span><span><?php echo  ?></span>
          </h5>
        </section>
        <section class="container" id="data">
          <label>Descripción:</label>
          <textarea readonly id="descripcion" name="descripcion" rows="20">
        Aquí va la descripción.
      </textarea
          >
          <h5><span>Valoración media: </span><span>X</span></h5>
          <h5>Opiniones:</h5>
          <section class="grid-container">
            <section class="grid-item">
              Usuario <br />
              Opinion
            </section>
            <section class="grid-item">
              Usuario <br />
              Opinion
            </section>
            <section class="grid-item">
              Usuario <br />
              Opinion
            </section>
            <section class="grid-item">
              Usuario <br />
              Opinion
            </section>
            <section class="grid-item">
              Usuario <br />
              Opinion
            </section>
            <section class="grid-item">
              Usuario <br />
              Opinion
            </section>
            <a href="#">Anterior</a>
            <a href="valoracion_libro1.php">Valorar libro</a>
            <a href="#">Siguiente</a>
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
