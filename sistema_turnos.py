<?php

class Paciente {
    public $nombre;
    public $dni;
    public $urgencia;

    public function __construct($nombre, $dni, $urgencia) {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->urgencia = $urgencia; // 1 = crítico, 2 = urgente, 3 = común
    }

    public function __toString() {
        return "{$this->nombre} (DNI: {$this->dni}) - Urgencia: {$this->urgencia}";
    }
}

class Turnero {
    private $colaTurnos;
    private $entryFinder;
    private $contador;

    public function __construct() {
        $this->colaTurnos = new SplPriorityQueue();
        $this->entryFinder = [];
        $this->contador = 0;
        $this->colaTurnos->setExtractFlags(SplPriorityQueue::EXTR_DATA);
    }

    public function solicitarTurno($paciente) {
        if (isset($this->entryFinder[$paciente->dni])) {
            echo "Este paciente ya tiene un turno.\n";
            return;
        }

        // Invertimos la prioridad (1 → 3, 2 → 2, 3 → 1) para que SplPriorityQueue funcione como min-heap
        $prioridadInvertida = 3 - $paciente->urgencia + 1;
        $entrada = ['paciente' => $paciente, 'contador' => $this->contador++];

        $this->colaTurnos->insert($entrada, [$prioridadInvertida, -$entrada['contador']]);
        $this->entryFinder[$paciente->dni] = $entrada;

        echo "Turno asignado a {$paciente->nombre} con prioridad {$paciente->urgencia}\n";
    }

    public function llamarSiguiente() {
        while (!$this->colaTurnos->isEmpty()) {
            $entrada = $this->colaTurnos->extract();
            $paciente = $entrada['paciente'];

            if (isset($this->entryFinder[$paciente->dni])) {
                unset($this->entryFinder[$paciente->dni]);
                echo "Llamando a: $paciente\n";
                return $paciente;
            }
        }
        echo "No hay pacientes en espera.\n";
        return null;
    }
}

// Ejemplo de uso:
$turnero = new Turnero();
$p1 = new Paciente("Ana", "123", 2);
$p2 = new Paciente("Luis", "456", 1);
$p3 = new Paciente("Pedro", "789", 3);

$turnero->solicitarTurno($p1);
$turnero->solicitarTurno($p2);
$turnero->solicitarTurno($p3);

$turnero->llamarSiguiente();
$turnero->llamarSiguiente();
$turnero->llamarSiguiente();
$turnero->llamarSiguiente();
