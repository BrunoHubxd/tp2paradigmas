<?php
require_once __DIR__ . '/../classes/Relaciones.php';

$medico = $_GET['medico'] ?? '';
$pacientes = Relaciones::obtenerPacientes($medico);

echo json_encode(["pacientes" => $pacientes]);
