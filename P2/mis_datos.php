<?php
    session_start();
    require_once('usuarios.class.inc.php');
    include_once("libros.class.inc.php");
    $usuario = Usuario::getUsuario($_SESSION['nombre']);
    $password = $usuario->getValor('password');
    $email = $usuario->getValor('email');
    $ciudad = $usuario->getValor('ciudad');
    $frase_perfil = $usuario->getValor('frase_perfil');
    $imagen_perfil = $usuario->getValor('imagen_perfil');
    $libros = Libro::getLibrosUsuario($_SESSION['nombre']);

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
    <link rel="stylesheet" href="css/mis_datos.css" />

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <script>
    function validarFormulario(){
        
        if (document.forms["modificar-datos"]["password"].value == ""){
            alert("Debes introducir tu contraseña actual para validar los cambios");
            return false;
        }
        
        var newpassword = document.forms["modificar-datos"]["newpassword"].value;
        if (newpassword.length != 0 && newpassword.length < 6) {
            alert("Tu nueva contraseña tiene que tener al menos 6 caracteres");
            return false;
        }

        var newpasswordrepeat =
          document.forms["modificar-datos"]["newpasswordrepeat"].value;
        if (newpassword.length != 0 && newpassword != newpasswordrepeat) {
            alert("Las contraseñas que has introducido no son iguales");
            return false;
        }

        var email = document.forms["modificar-datos"]["email"].value;
        if (email.indexOf(' ') > -1){
            alert("Un email no puede contener espacios en blanco");
            return false;
        }
        else if (email.indexOf('@') < 1){
            alert("Un email debe tener un formato: xxx@xxx");
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
              </h5>';
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
            </form>';
        }
    ?>
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
    <!-- Navigation bar-->

    <!-- Section-->
    <main>
      <section class="container" style="height:1200px;">
        <section class="container" id="metadata">
          <section class="fila">
            <img alt="libro" id="imagen" src="<?php echo $imagen_perfil ?>" />
            <section class="ventanalibros" id="ventanalibros"
              style="background-color:powderblue;
                    padding:10px;
                    margin:10px;
                    display:none;">
              Libros subidos por el usuario:
              <?php
                  foreach($libros as $libro){
                    echo '
                      <br />
                      '. $libro["titulo"] . '
                  ';
                  }
              ?>
            </section>
        </section>
        
          <form name="modificar-datos" onsubmit="return validarFormulario()" method="POST" action="modificar_datos.php">
            <label id="data">Contraseña: </label>
            <input
              class="u-full-width"
              name="password"
              type="password"
            />
            <label id="data">Email: </label>
            <input
              class="u-full-width"
              name="email"
              type="text"
              value="<?php echo $email ?>"
            />
            <label id="data">Ciudad: </label>
            <input
              class="u-full-width"
              name="ciudad"
              type="text"
              value="<?php echo $ciudad ?>"
            />
            <label id="data">Frase de perfil: </label>
            <input
              class="u-full-width"
              name="frase_perfil"
              type="text"
              value="<?php echo $frase_perfil ?>"
            />
            <label id="data">Nueva cont: </label>
            <input
              class="u-full-width"
              name="newpassword"
              type="password"
            />
            <label id="data">Repite cont: </label>
            <input
              class="u-full-width"
              name="newpasswordrepeat"
              type="password"
            />
            <input type="submit" value="Cambiar" />
          </form>
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



  <script>
      document.getElementById("imagen").addEventListener("mouseover", mouseOver);
      document.getElementById("imagen").addEventListener("mouseout", mouseOut);
      var ventana = document.getElementById("ventanalibros");

      function mouseOver() {
        ventana.style.display = "block";
      }

      function mouseOut() {
        ventana.style.display = "none";
      }
    </script>


</html>
