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
    <link rel="stylesheet" href="css/alta_libro.css" />

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <script>
      function validarFormulario() {
        var campos = ["titulo", "autor", "anio", "edicion", "descripcion", "opinion" ];
        for (campo of campos) {
          if (document.forms["formulario-alta-libro"][campo].value == "") {
            alert("El campo " + campo + " debe ser rellenado");
            return false;
          }
        }
        var titulo = document.forms["formulario-alta-libro"]["titulo"].value;
        if (titulo.length > 100) {
          alert(
            "El campo " + titulo + " no puede contener mas de 100 caracteres "
          );
          return false;
        }

        var autor = document.forms["formulario-alta-libro"]["autor"].value;
        if (autor.length > 50) {
          alert(
            "El campo " + campo + " no puede contener mas de 50 caracteres "
          );
          return false;
        }

        var anio = document.forms["formulario-alta-libro"]["anio"].value;
        if (anio.length > 4 || isNaN(anio)) {
          alert(
            "El campo " + anio + " no puede contener mas de 4 caracteres y debe ser un numero"
          );
          return false;
        }

        var edicion = document.forms["formulario-alta-libro"]["edicion"].value;
        if (edicion.length > 10) {
          alert(
            "El campo " + edicion + " no puede contener mas de 10 caracteres "
          );
          return false;
        }

        var descripcion = document.forms["formulario-alta-libro"]["descripcion"].value;
        if (descripcion.length > 1000) {
          alert(
            "El campo " + descripcion + " no puede contener mas de 1000 caracteres "
          );
          return false;
        }

        var opinion = document.forms["formulario-alta-libro"]["opinion"].value;
        if (opinion.length > 1000) {
          alert(
            "El campo " + opinion + " no puede contener mas de 1000 caracteres "
          );
          return false;
        }

      }
    </script>

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
        <form
            class="formulario-alta-libro"
            name="formulario-alta-libro"
            action="procesar_formulario_alta_libro.php"
            method="POST"
            onsubmit="return validarFormulario()"
          >
          <section class="container" id="metadata">
            <label id="data">Titulo: </label>
            <input class="u-full-width" name="titulo" type="text" required />
            <label id="data">Autor: </label>
            <input class="u-full-width" name="autor" type="text" required />
            <label id="data">Editorial: </label>
            <select id="data" name="editorial">
              <option value="Editorial 1">Editorial 1</option>
              <option value="Editorial 2">Editorial 2</option>
              <option value="Editorial 3">Editorial 3</option>
              <option value="Editorial 4">Editorial 4</option>
              <option value="Editorial 5">Editorial 5</option>
            </select>
            <label id="data">Año: </label>
            <input class="u-full-width" name="anio" type="number" required />
            <label id="data">Edición: </label>
            <input class="u-full-width" name="edicion" type="text" required />
          </section>
          <section class="container" id="data">
            <label id="data">Descripción:</label>
            <textarea
              id="descripcion"
              name="descripcion"
              rows="20"
              placeholder="Escribe la descripción aquí..."
              required
            ></textarea>

            <label id="data">Opinión:</label>
            <textarea
              id="opinion"
              name="opinion"
              rows="20"
              placeholder="Escribe tu opinión aquí..."
              required
            ></textarea>

            <section class="vertical-align">
              <label>Mi valoración:</label>
              <section class="btns" id="valoracion">
                <label>
                  <input name="valoracion" type="radio" value="Pésimo" />
                  <span class="btn first">Pésimo</span>
                </label>
                <label>
                  <input name="valoracion" type="radio" value="Malo" />
                  <span class="btn">Malo</span>
                </label>
                <label>
                  <input
                    checked
                    name="valoracion"
                    type="radio"
                    value="Bueno"
                  />
                  <span class="btn">Bueno</span>
                </label>
                <label>
                  <input name="valoracion" type="radio" value="Muy bueno" />
                  <span class="btn">Muy bueno</span>
                </label>
                <label>
                  <input name="valoracion" type="radio" value="Excelente" />
                  <span class="btn last">Excelente</span>
                </label>
              </section>
              <input type="hidden" name="creador" value="<?php echo $_SESSION['nombre'] ?>" />
              <input type="submit" value="Enviar" />
              
            </section>
          </section>
        </form>
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
