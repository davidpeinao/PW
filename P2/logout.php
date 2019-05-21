<?php
session_start();
$_SESSION['nombre'] = null;
header("Location: index.php");
exit;
?>