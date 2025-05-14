<?php
class Medicamento {
    public static function buscar($nombre) {
        $data = json_decode(file_get_contents(__DIR__ . '/../data/medicamentos.json'), true);
        foreach ($data as $med) {
            if (strcasecmp($med['nombre'], $nombre) === 0) {
                return $med;
            }
        }
        return null;
    }
}
