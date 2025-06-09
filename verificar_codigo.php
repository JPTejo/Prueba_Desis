<?php
$conn = new mysqli("localhost", "root", "", "prueba_desis");
$codigo = $_POST['codigo'];
$stmt = $conn->prepare("SELECT id FROM productos WHERE codigo = ?");
$stmt->bind_param("s", $codigo);
$stmt->execute();
$stmt->store_result();
echo $stmt->num_rows > 0 ? 'existe' : 'ok';
