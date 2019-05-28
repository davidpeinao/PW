<?php
    include_once("libros.class.inc.php");
    session_start();
    $filas = Libro::getLibros();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    <link rel="stylesheet" href="css/mis_libros.css" />

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>

  <body>
    <header>
      <section class="columna">
        <a href="index.php">
          <img alt="logo" class="logo" src="images/library.svg" />
        </a>
      </section>
      <section class="columna">
        <h1 class="center titulo">Nombre de la aplicacion</h1>
      </section>
      <section class="columna">
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

    <main>
      <section class="izquierda">
        <h4>Libros leídos</h4>
        <section class="contenedor_libros">
        <?php

            foreach($filas as $fila){
              echo '<article>
              <img alt="libro" src="images/libro1.jpg" />
              <h5>
                <a href="'. $fila["titulo"] . '.php"> '. $fila["titulo"] . '</a>
                <br />
                '. $fila["autor"] . '
              </h5>
            </article>';
            }
        ?>
          <article>
            <img alt="libro" src="images/libro1.jpg" />
            <h5>
              <a href="libroleido1.html">El señor de los anillos parte 3 </a>
              <br />
              autor1
            </h5>
          </article>
          <article>
            <img alt="libro" src="images/libro2.jpg" />
            <h5>
              <a href="libroleido2.html">Libro 2 </a> <br />
              autor2
            </h5>
          </article>
          <article>
            <img alt="libro" src="images/libro3.jpg" />
            <h5>
              libro3 <br />
              autor3
            </h5>
          </article>
          <article>
            <img alt="libro" src="images/libro4.jpg" />
            <h5>
              libro4 <br />
              autor4
            </h5>
          </article>
          <article>
            <img alt="libro" src="images/libro5.jpg" />
            <h5>
              libro5 <br />
              autor5
            </h5>
          </article>
        </section>
      </section>

      <section class="derecha">
        <h4>Últimos libros</h4>
        <section class="contenedor_libros">
          <h4>
            <a href="libro1.html">Titulo libro 1</a><br />
            <a href="libro2.html">Titulo libro 2</a><br />
            <a href="#">Titulo libro 3</a><br />
          </h4>
          <h5>
            <a href="alta_libro.php" class="alta"
              >Dar de alta un nuevo libro</a
            >
          </h5>
        </section>
      </section>
    </main>

    <footer>
      <h2>
        <a href="mailto:davidpeinado@correo.ugr.es">Contacto</a> -
        <a href="como_se_hizo.pdf">Como se hizo</a>
      </h2>
    </footer>
  </body>
</html>
