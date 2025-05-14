<?php
require_once __DIR__ . '/../classes/Turnero.php';
session_start();

if (!isset($_SESSION['turnero'])) {
    $_SESSION['turnero'] = serialize(new Turnero());
}

$turnero = unserialize($_SESSION['turnero']);
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($data['accion'] === 'solicitar') {
        $paciente = new Paciente($data['nombre'], $data['dni'], $data['urgencia']);
        $turnero->solicitarTurno($paciente);
        $_SESSION['turnero'] = serialize($turnero);
        echo json_encode(["mensaje" => "Turno solicitado"]);
    } elseif ($data['accion'] === 'llamar') {
        if ($turnero->hayTurnos()) {
            $p = $turnero->llamarSiguiente();
            $_SESSION['turnero'] = serialize($turnero);
            echo json_encode(["mensaje" => "Paciente llamado", "nombre" => $p->nombre, "urgencia" => $p->urgencia]);
        } else {
            echo json_encode(["mensaje" => "No hay turnos disponibles"]);
        }
    }
}
