<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'conexion.php';


$sql = "SELECT id, nombre FROM bodegas ORDER BY nombre ASC";
$resultado = $conexion->query($sql);

$bodegas = [];

while ($fila = $resultado->fetch_assoc()) {
    $bodegas[] = $fila;
}

echo json_encode($bodegas);
?>
