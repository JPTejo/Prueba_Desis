<?php
$conn = new mysqli("localhost", "root", "", "prueba_desis");
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$bodega = $_POST['bodega'];
$sucursal = $_POST['sucursal'];
$moneda = $_POST['moneda'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$materiales = implode(", ", $_POST['material']);

$stmt = $conn->prepare("INSERT INTO productos (codigo, nombre, id_bodega, id_sucursal, id_moneda, precio, descripcion, materiales)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiidss", $codigo, $nombre, $bodega, $sucursal, $moneda, $precio, $descripcion, $materiales);
$stmt->execute();

echo "Producto guardado exitosamente.";
