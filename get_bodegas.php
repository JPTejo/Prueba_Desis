<?php
$conn = new mysqli("localhost", "root", "", "prueba_desis");
$result = $conn->query("SELECT id, nombre FROM bodegas");
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
}
