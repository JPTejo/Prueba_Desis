<?php
$host = "localhost";
$user = "root";
$password = ""; // Si tienes contraseña, escríbela aquí
$database = "prueba_desis"; 

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
