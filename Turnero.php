<?php
require_once __DIR__ . '/Paciente.php';

class Turnero {
    private $cola;

    public function __construct() {
        $this->cola = new SplPriorityQueue();
    }

    public function solicitarTurno(Paciente $paciente) {
        $this->cola->insert($paciente, 6 - $paciente->urgencia);
    }

    public function llamarSiguiente() {
        return $this->cola->isEmpty() ? null : $this->cola->extract();
    }

    public function hayTurnos() {
        return !$this->cola->isEmpty();
    }
}
