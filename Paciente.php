<?php
class Paciente {
    public $nombre;
    public $dni;
    public $urgencia;

    public function __construct($nombre, $dni, $urgencia) {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->urgencia = $urgencia;
    }
}
