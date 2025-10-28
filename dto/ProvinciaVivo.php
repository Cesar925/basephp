<?php

class ProvinciaVivo {
    public int $id;
    public int $ano;
    public string $mes;
    public ?string $provincia;
    public ?string $zona;
    public ?string $compra;
    public ?string $tipo_cliente;
    public ?string $nombre;

    // campos para Provincia
    public int $grs;
    public int $rp;
    public int $renzo;
    public int $fafo;
    public int $santa_angela;
    public int $jorge_pan;
    public int $mirian_g;
    public int $vasquez;
    public int $san_joaquin;
    public int $fortunato;
    public int $rosario;
    public int $perca;
    public int $gamboa;
    public int $asoc_sondor;
    public int $otras_granjas_chicas;

    public int $potencial_minimo;
    public int $potencial_maximo;
    public ?string $condicion_ptmax;
    public ?string $observaciones;

    public static function fromArray(array $r): ProvinciaVivo {
        $d = new ProvinciaVivo();

        $d->id = (int)($r['id'] ?? 0);
        $d->ano = (int)($r['ano'] ?? 0);
        $d->mes = $r['mes'] ?? '';
        $d->provincia = $r['provincia'] ?? null;
        $d->zona = $r['zona'] ?? null;
        $d->compra = $r['compra'] ?? null;
        $d->tipo_cliente = $r['tipo_cliente'] ?? null;
        $d->nombre = $r['nombre'] ?? null;

        $d->grs = (int)($r['grs'] ?? 0);
        $d->rp = (int)($r['rp'] ?? 0);
        $d->renzo = (int)($r['renzo'] ?? 0);
        $d->fafo = (int)($r['fafo'] ?? 0);
        $d->santa_angela = (int)($r['santa_angela'] ?? 0);
        $d->jorge_pan = (int)($r['jorge_pan'] ?? 0);
        $d->mirian_g = (int)($r['mirian_g'] ?? 0);
        $d->vasquez = (int)($r['vasquez'] ?? 0);
        $d->san_joaquin = (int)($r['san_joaquin'] ?? 0);
        $d->fortunato = (int)($r['fortunato'] ?? 0);
        $d->rosario = (int)($r['rosario'] ?? 0);
        $d->perca = (int)($r['perca'] ?? 0);
        $d->gamboa = (int)($r['gamboa'] ?? 0);
        $d->asoc_sondor = (int)($r['asoc_sondor'] ?? 0);
        $d->otras_granjas_chicas = (int)($r['otras_granjas_chicas'] ?? 0);

        $d->potencial_minimo = (int)($r['potencial_minimo'] ?? 0);
        $d->potencial_maximo = (int)($r['potencial_maximo'] ?? 0);
        $d->condicion_ptmax = $r['condicion_ptmax'] ?? null;
        $d->observaciones = $r['observaciones'] ?? null;

        return $d;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'ano' => $this->ano,
            'mes' => $this->mes,
            'provincia' => $this->provincia,
            'zona' => $this->zona,
            'compra' => $this->compra,
            'tipo_cliente' => $this->tipo_cliente,
            'nombre' => $this->nombre,
            'grs' => $this->grs,
            'rp' => $this->rp,
            'renzo' => $this->renzo,
            'fafo' => $this->fafo,
            'santa_angela' => $this->santa_angela,
            'jorge_pan' => $this->jorge_pan,
            'mirian_g' => $this->mirian_g,
            'vasquez' => $this->vasquez,
            'san_joaquin' => $this->san_joaquin,
            'fortunato' => $this->fortunato,
            'rosario' => $this->rosario,
            'perca' => $this->perca,
            'gamboa' => $this->gamboa,
            'asoc_sondor' => $this->asoc_sondor,
            'otras_granjas_chicas' => $this->otras_granjas_chicas,
            'potencial_minimo' => $this->potencial_minimo,
            'potencial_maximo' => $this->potencial_maximo,
            'condicion_ptmax' => $this->condicion_ptmax,
            'observaciones' => $this->observaciones,
        ];
    }
}
