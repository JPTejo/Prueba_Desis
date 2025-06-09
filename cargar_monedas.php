<?php
require __DIR__ . '/conexion.php';

header('Content-Type: application/json');

$query = "SELECT id, nombre FROM monedas";
$resultado = mysqli_query($conexion, $query);

$monedas = array();

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $monedas[] = $fila;
    }
    echo json_encode($monedas);
} else {
    echo json_encode(['error' => 'Error al consultar las monedas']);
}
?>
