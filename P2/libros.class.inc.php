<?php
require_once("dataObject.class.inc.php");
class Libro extends DataObject {
    protected $datos = array( 
        "titulo" => null, 
        "autor" => null,
        "editorial" => null, 
        "anio" => null,
        "edicion" => null,
        "descripcion" => null,
        "opinion" => null,
        "valoracion" => null,
        "creador" => null,
        ); 
    public static function getLibros() {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_LIBROS . "";
        try {
            $st = $conexion->prepare($sql);
            $st->execute();
            $filas = $st->fetchAll();
            parent::desconectar($conexion);
            return $filas;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: ".$e->getMessage());
        }
    }
    
    public static function crearLibro($datosLibro) {
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_LIBROS . " VALUES (:titulo, :autor, :editorial, :anio,
            :edicion, :descripcion, :opinion, :valoracion, :creador)";
        $sentencia = $conexion->prepare($sql);
        try {
            $sentencia->bindValue(":titulo", $datosLibro["titulo"]);
            $sentencia->bindValue(":autor", $datosLibro["autor"]);
            $sentencia->bindValue(":editorial", $datosLibro["editorial"]);
            $sentencia->bindValue(":anio", $datosLibro["anio"]);
            $sentencia->bindValue(":edicion", $datosLibro["edicion"]);
            $sentencia->bindValue(":descripcion", $datosLibro["descripcion"]);
            $sentencia->bindValue(":opinion", $datosLibro["opinion"]);
            $sentencia->bindValue(":valoracion", $datosLibro["valoracion"]);
            $sentencia->bindValue(":creador", $datosLibro["creador"]);
            
            $sentencia->execute();
            parent::desconectar($conexion);
            Libro::crearPaginaLibro($datosLibro);
        } catch (PDOException $e){
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }

    public static function crearPaginaLibro($datosLibro) {
        $contenido = '<!DOCTYPE html>
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
                  <h5 class="center titulo">
                    Usuario <br />
                    <a href="index.php">Desconectarse</a>
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
            <!-- Navigation bar-->
        
            <!-- Section-->
            <main>
              <section class="container">
                <img alt="libro" id="libro" src="images/libro1.jpg" />
                <section class="container" id="metadata">
                  <h5>
                    <span>Titulo: </span><span>'. $datosLibro["titulo"] . ' </span><br />
                    <span>Autor: </span><span>'. $datosLibro["autor"] . '</span><br />
                    <span>Editorial: </span><span>'. $datosLibro["editorial"] . '</span><br />
                    <span>Año: </span><span>'. $datosLibro["anio"] . '</span><br />
                    <span>Edición: </span><span>'. $datosLibro["edicion"] . '</span>
                  </h5>
                </section>
                <section class="container" id="data">
                  <label>Descripción:</label>
                  <textarea readonly id="descripcion" name="descripcion" rows="20">
                  '. $datosLibro["descripcion"] . '
              </textarea
                  >
        
                  <label>Opinión:</label>
                  <textarea readonly id="opinion" name="opinion" rows="20">
                  '. $datosLibro["opinion"] . '
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
        ';
        $file = $datosLibro["titulo"] . ".php"; 
        echo "$file";
        $open = fopen($file, "w"); 
        fwrite($open, $contenido); 
        fclose($open); 
    }

    public static function actualizarDatos($usuario, $datosLibro) {
        $conexion = parent::conectar();
        if($datosLibro["newpassword"] == ""){
        $sql = "UPDATE " . TABLA_LIBROS . " SET email = :email,
                                            ciudad = :ciudad,
                                            frase_perfil = :frase_perfil,
                                            WHERE nombre = :nombre";
        }
        else {
        $sql = "UPDATE " . TABLA_LIBROS . " SET password = :newpassword,
                                        email = :email,
                                        ciudad = :ciudad,
                                        frase_perfil = :frase_perfil,
                                        WHERE nombre = :nombre";
        }
        try {
            $sentencia = $conexion->prepare($sql);           
            $sentencia->bindValue(":nombre", $usuario);
            $sentencia->bindValue(":newpassword", hash('sha512', $password));
            foreach($datosLibro as $key => $value) {
                if (!empty($value)){
                    $sentencia->bindValue(":".$key, $value);
                }
                else{
                    $sentencia->bindValue(":".$key, null);
                }
                
            }
            $sentencia->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Petición fallida: ".$e->getMessage());
        }
    }
}
?>