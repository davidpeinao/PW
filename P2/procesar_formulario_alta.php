<?php
session_start();
require_once("usuarios.class.inc.php");
Usuario::crearUsuario($_POST);
$_SESSION['nombre'] = $_POST['usuario'];
$_SESSION['password'] = $_POST['password'];
header("Location: index.php");
exit;
?>