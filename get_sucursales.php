<?php
$conn = new mysqli("localhost", "root", "", "prueba_desis");
$id = intval($_POST['id_bodega']);
$result = $conn->query("SELECT id, nombre FROM sucursales WHERE id_bodega = $id");
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
}
