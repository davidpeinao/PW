<?php
    session_start();
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
    <link rel="stylesheet" href="css/index.css" />

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>

  <body>
    <header>
      <section>
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


    <main>
      <section class="row">
        <section class="six columns" id="indexizquierda">
          <img
            id="fondo"
            src="images/blur-book-stack-books-590493.jpg"
            alt="libros"
          />
        </section>
        <!-- Book column-->
        <section class="six columns" id="indexderecha">
          <h1 class="center">Libros mejor valorados</h1>
          <section class="row">
            <article class="five columns">
              <img alt="libro" src="images/book-1424031.jpg" />
            </article>
            <article class="six columns" id="librosindex">
              <h5 class="right">Titulo 1</h5>
              <h5 class="right">Autor 1</h5>
            </article>
          </section>
          <section class="row">
            <article class="five columns">
              <img alt="libro" src="images/book-1424031.jpg" />
            </article>
            <article class="six columns" id="librosindex">
              <h5 class="right">Titulo 1</h5>
              <h5 class="right">Autor 1</h5>
            </article>
          </section>
          <section class="row">
            <article class="five columns">
              <img alt="libro" src="images/book-1424031.jpg" />
            </article>
            <article class="six columns" id="librosindex">
              <h5 class="right">Titulo 1</h5>
              <h5 class="right">Autor 1</h5>
            </article>
          </section>
        </section>
        <!-- Book column-->
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
