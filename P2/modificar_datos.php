<?php
session_start();
require_once("usuarios.class.inc.php");
$validado = Usuario::validarLogin($_SESSION['nombre'], $_POST['password']);
if ($validado) {
    Usuario::actualizarDatos($_SESSION['nombre'], $_POST);
    header("Location: perfil.php");
    exit;
}
else {
    header("Location: index.php");
    exit;
}
?>