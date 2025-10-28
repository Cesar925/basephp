<?php
require_once __DIR__ . '/../repositories/CapturaPantallaVivoRepository.php';
require_once __DIR__ . '/../dto/ArequipaVivo.php';
require_once __DIR__ . '/../dto/ProvinciaVivo.php';

class CapturaPantallaVivoService {
    private $repo;

    public function __construct($db) {
        $this->repo = new CapturaPantallaVivoRepository($db);
    }

    public function getAll() {
        return $this->repo->findAll();
    }

    public function getById($id) {
        return $this->repo->findById($id);
    }

    public function updateVivo(array $vivo) {
        return $this->repo->update($vivo);
    }

    public function getArequipaVivo() {
        return $this->repo->findArequipaVivo();
    }

    public function getProvinciaVivo() {
        return $this->repo->findProvinciaVivo();
    }

    public function save($data) {
        return $this->repo->save($data);
    }

    public function delete($id) {
        return $this->repo->delete($id);
    }

    public function getListArequipaVivo(): array {
        $rows = $this->repo->findArequipaVivo(); // devuelve array de assoc rows
        $out = [];
        foreach ($rows as $r) {
            $dto = ArequipaVivo::fromArray($r);
            $out[] = $dto->toArray(); // o $out[] = $dto si quieres objetos
        }
        return $out;
    }

    public function getListProvinciaVivo(): array {
        $rows = $this->repo->findProvinciaVivo();
        $out = [];
        foreach ($rows as $r) {
            $dto = ProvinciaVivo::fromArray($r);
            $out[] = $dto->toArray();
        }
        return $out;
    }

}
?>
