<?php
require_once __DIR__ . '/../models/CapturaPantallaVivo.php';

class CapturaPantallaVivoRepository {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findAll() {
        $query = "SELECT * FROM captura_pantalla_vivo";
        return $this->executeQuery($query);
    }

    public function findArequipaVivo() {
        $query = "SELECT * FROM captura_pantalla_vivo WHERE tipo_proc = 'Arequipa Vivo'";
        return $this->executeQuery($query);
    }

    public function findProvinciaVivo() {
        $query = "SELECT * FROM captura_pantalla_vivo WHERE tipo_proc = 'Provincia Vivo'";
        return $this->executeQuery($query);
    }

    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM captura_pantalla_vivo WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($data) {
    $query = "INSERT INTO captura_pantalla_vivo (
        tipo_proc, ano, mes, provincia, zona, compra, tipo_cliente, nombre,
        grs, rp, renzo, fafo, santa_angela, jorge_pan, mirian_g, vasquez, san_joaquin,
        fortunato, rosario, perca, gamboa, asoc_sondor, pollo_lima, otras_granjas_chicas,
        potencial_minimo, potencial_maximo, condicion_ptmin, condicion_ptmax, observaciones
    ) VALUES (
        :tipo_proc, :ano, :mes, :provincia, :zona, :compra, :tipo_cliente, :nombre,
        :grs, :rp, :renzo, :fafo, :santa_angela, :jorge_pan, :mirian_g, :vasquez, :san_joaquin,
        :fortunato, :rosario, :perca, :gamboa, :asoc_sondor, :pollo_lima, :otras_granjas_chicas,
        :potencial_minimo, :potencial_maximo, :condicion_ptmin, :condicion_ptmax, :observaciones
    )";

    $stmt = $this->conn->prepare($query);

    // Aseguramos que todos los parámetros existan
    $params = [
        ':tipo_proc' => $data['tipo_proc'] ?? null,
        ':ano' => $data['ano'] ?? null,
        ':mes' => $data['mes'] ?? null,
        ':provincia' => $data['provincia'] ?? null,
        ':zona' => $data['zona'] ?? null,
        ':compra' => $data['compra'] ?? null,
        ':tipo_cliente' => $data['tipo_cliente'] ?? null,
        ':nombre' => $data['nombre'] ?? null,
        ':grs' => $data['grs'] ?? null,
        ':rp' => $data['rp'] ?? null,
        ':renzo' => $data['renzo'] ?? null,
        ':fafo' => $data['fafo'] ?? null,
        ':santa_angela' => $data['santa_angela'] ?? null,
        ':jorge_pan' => $data['jorge_pan'] ?? null,
        ':mirian_g' => $data['mirian_g'] ?? null,
        ':vasquez' => $data['vasquez'] ?? null,
        ':san_joaquin' => $data['san_joaquin'] ?? null,
        ':fortunato' => $data['fortunato'] ?? null,
        ':rosario' => $data['rosario'] ?? null,
        ':perca' => $data['perca'] ?? null,
        ':gamboa' => $data['gamboa'] ?? null,
        ':asoc_sondor' => $data['asoc_sondor'] ?? null,
        ':pollo_lima' => $data['pollo_lima'] ?? null,
        ':otras_granjas_chicas' => $data['otras_granjas_chicas'] ?? null,
        ':potencial_minimo' => $data['potencial_minimo'] ?? null,
        ':potencial_maximo' => $data['potencial_maximo'] ?? null,
        ':condicion_ptmin' => $data['condicion_ptmin'] ?? null,
        ':condicion_ptmax' => $data['condicion_ptmax'] ?? null,
        ':observaciones' => $data['observaciones'] ?? null
    ];

    return $stmt->execute($params);
}

    public function update(array $vivo) {
    $sql = "UPDATE captura_pantalla_vivo SET
        ano = :ano,
        mes = :mes,
        provincia = :provincia,
        zona = :zona,
        compra = :compra,
        tipo_cliente = :tipo_cliente,
        nombre = :nombre,
        grs = :grs,
        rp = :rp,
        renzo = :renzo,
        fafo = :fafo,
        santa_angela = :santa_angela,
        jorge_pan = :jorge_pan,
        mirian_g = :mirian_g,
        vasquez = :vasquez,
        san_joaquin = :san_joaquin,
        fortunato = :fortunato,
        rosario = :rosario,
        perca = :perca,
        gamboa = :gamboa,
        asoc_sondor = :asoc_sondor,
        pollo_lima = :pollo_lima,
        otras_granjas_chicas = :otras_granjas_chicas,
        potencial_minimo = :potencial_minimo,
        potencial_maximo = :potencial_maximo,
        condicion_ptmin = :condicion_ptmin,
        condicion_ptmax = :condicion_ptmax,
        observaciones = :observaciones
        WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $params = [
        ':ano' => $vivo['ano'] ?? null,
        ':mes' => $vivo['mes'] ?? null,
        ':provincia' => $vivo['provincia'] ?? null,
        ':zona' => $vivo['zona'] ?? null,
        ':compra' => $vivo['compra'] ?? null,
        ':tipo_cliente' => $vivo['tipo_cliente'] ?? null,
        ':nombre' => $vivo['nombre'] ?? null,
        ':grs' => $vivo['grs'] ?? null,
        ':rp' => $vivo['rp'] ?? null,
        ':renzo' => $vivo['renzo'] ?? null,
        ':fafo' => $vivo['fafo'] ?? null,
        ':santa_angela' => $vivo['santa_angela'] ?? null,
        ':jorge_pan' => $vivo['jorge_pan'] ?? null,
        ':mirian_g' => $vivo['mirian_g'] ?? null,
        ':vasquez' => $vivo['vasquez'] ?? null,
        ':san_joaquin' => $vivo['san_joaquin'] ?? null,
        ':fortunato' => $vivo['fortunato'] ?? null,
        ':rosario' => $vivo['rosario'] ?? null,
        ':perca' => $vivo['perca'] ?? null,
        ':gamboa' => $vivo['gamboa'] ?? null,
        ':asoc_sondor' => $vivo['asoc_sondor'] ?? null,
        ':pollo_lima' => $vivo['pollo_lima'] ?? null,
        ':otras_granjas_chicas' => $vivo['otras_granjas_chicas'] ?? null,
        ':potencial_minimo' => $vivo['potencial_minimo'] ?? null,
        ':potencial_maximo' => $vivo['potencial_maximo'] ?? null,
        ':condicion_ptmin' => $vivo['condicion_ptmin'] ?? null,
        ':condicion_ptmax' => $vivo['condicion_ptmax'] ?? null,
        ':observaciones' => $vivo['observaciones'] ?? null,
        ':id' => $vivo['id']
    ];

    return $stmt->execute($params);
}



    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM captura_pantalla_vivo WHERE id = ?");
        return $stmt->execute([$id]);
    }

    private function executeQuery($query) {
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
