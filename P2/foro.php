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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link rel="stylesheet" href="css/foro.css" />

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
        <h1 class="titulo-foro">Bienvenid@ al foro</h1>
        <h2 class="subtitulo-foro">
          Lee los últimos temas de interés, <br />
          da tu opinión acerca de los libros que quieras o abre tu propio hilo
          si tienes algo que quieras contarnos.
        </h2>

        <section class="titulo_boton">
          <form action="crear_hilo.html">
            <input type="submit" name="crear_hilo" value="Crear hilo" />
          </form>
          <h2 class="center">Últimos temas</h2>
        </section>

        <section class="feed">
          <ul>
            <li>
              <a href="hilo_1.html">
                <h5 class="tema">Tema 1</h5>
                <h5 class="actividad">Hace 1 min</h5>
                <h5 class="visitas">392 visitas</h5>
              </a>
            </li>
            <li>
              <a href="hilo_1.html">
                <h5 class="tema">Tema 2</h5>
                <h5 class="actividad">Hace 3 min</h5>
                <h5 class="visitas">55 visitas</h5>
              </a>
            </li>
            <li>
              <a href="hilo_1.html">
                <h5 class="tema">Tema 3</h5>
                <h5 class="actividad">Hace 3 min</h5>
                <h5 class="visitas">542 visitas</h5>
              </a>
            </li>
            <li>
              <a href="hilo_1.html">
                <h5 class="tema">Tema 4</h5>
                <h5 class="actividad">Hace 6 min</h5>
                <h5 class="visitas">42 visitas</h5>
              </a>
            </li>
            <li>
              <a href="hilo_1.html">
                <h5 class="tema">Tema 5</h5>
                <h5 class="actividad">Hace 12 min</h5>
                <h5 class="visitas">3 visitas</h5>
              </a>
            </li>
          </ul>
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
