<?php
require_once __DIR__ . '/../classes/Medicamento.php';

$nombre = $_GET['nombre'] ?? '';
$med = Medicamento::buscar($nombre);

if ($med) {
    echo json_encode(["encontrado" => true, "nombre" => $med['nombre'], "cantidad" => $med['cantidad']]);
} else {
    echo json_encode(["encontrado" => false]);
}
