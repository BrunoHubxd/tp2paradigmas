<?php
class Relaciones {
    public static function obtenerPacientes($medico) {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/relaciones.json'), true);
        return $data[$medico] ?? [];
    }
}
