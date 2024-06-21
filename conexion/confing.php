<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$db = "hbarbershop";

$mysqli = new mysqli($servidor, $usuario, $password,  $db);
$estado = 1;

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
?>