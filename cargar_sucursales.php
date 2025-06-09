<?php
require __DIR__ . '/conexion.php';

header('Content-Type: application/json');

$query = "SELECT id, nombre FROM sucursales";
$resultado = mysqli_query($conexion, $query);

$sucursales = array();

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $sucursales[] = $fila;
    }
    echo json_encode($sucursales);
} else {
    echo json_encode(['error' => 'Error al consultar las sucursales']);
}
?>
