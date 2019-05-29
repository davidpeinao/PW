<?php
session_start();
require_once("libros.class.inc.php");
Libro::crearLibro($_POST);

header("Location: mis_libros.php");
exit;
?>