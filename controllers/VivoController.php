<?php
require_once __DIR__ . '/../services/CapturaPantallaVivoService.php';

class VivoController {
    private $service;

    public function __construct($db) {
        $this->service = new CapturaPantallaVivoService($db);
    }

    public function getAll() {
        echo json_encode($this->service->getAll());
    }

    public function getArequipa() {
        $list = $this->service->getListArequipaVivo();
        echo json_encode($list, JSON_UNESCAPED_UNICODE);
    }

    public function getProvincia() {
        $list = $this->service->getListProvinciaVivo();
        echo json_encode($list, JSON_UNESCAPED_UNICODE);
    }


    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data["id"]) && $data["id"] != 0) {
            http_response_code(400);
            echo json_encode(["error" => "El ID debe ser 0 o no enviado para crear un nuevo registro."]);
            return;
        }
        $this->service->save($data);
        echo json_encode(["message" => "Registro creado correctamente"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        echo json_encode(["message" => "Registro eliminado correctamente"]);
    }

    public function update() {
        header('Content-Type: application/json; charset=utf-8');

        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input || !isset($input['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos inválidos o falta el ID.']);
            return;
        }

        // Buscar el registro actual
        $vivo = $this->service->getById($input['id']);
        if (!$vivo) {
            http_response_code(404);
            echo json_encode(['error' => 'Registro no encontrado.']);
            return;
        }

        // Actualizar los campos permitidos
        $campos = [
            'ano', 'mes', 'provincia', 'zona', 'compra', 'tipo_cliente', 'nombre',
            'grs', 'rp', 'renzo', 'fafo', 'santa_angela', 'jorge_pan', 'mirian_g', 'vasquez',
            'san_joaquin', 'fortunato', 'rosario', 'perca', 'gamboa', 'asoc_sondor',
            'pollo_lima', 'otras_granjas_chicas',
            'potencial_minimo', 'potencial_maximo', 'condicion_ptmin', 'condicion_ptmax',
            'observaciones'
        ];

        foreach ($campos as $campo) {
            if (isset($input[$campo])) {
                $vivo[$campo] = $input[$campo];
            }
        }

        // Guardar cambios
        $actualizado = $this->service->updateVivo($vivo);

        if ($actualizado) {
            echo json_encode(['message' => 'Registro actualizado correctamente', 'data' => $vivo]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error al actualizar el registro.']);
        }
    }

}
?>
