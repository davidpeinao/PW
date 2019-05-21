<?php
session_start();
require_once("usuarios.class.inc.php");
$validado = Usuario::validarLogin($_POST['usuario'], $_POST['password']);
if ($validado) {
    $_SESSION['nombre'] = $_POST['usuario'];
    header("Location: index.php");
    exit;
}
else {
    header("Location: index.php");
    exit;
}
?>