<?php
require_once 'Resumible.php';
require_once 'Documento.php';
require_once 'Libro.php';
require_once 'Revista.php';
require_once 'Socio.php';

class Biblioteca
{
    private string $nombre;
    private array $documentos = [];   // clave = código del documento
    private array $socios = [];       // clave = ID del socio

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    // ---------- ALTAS ----------

    // Método privado único: acepta el tipo ABSTRACTO Documento
    private function incluirDocumento(Documento $documento): void
    {
        $this->documentos[$documento->getCodigo()] = $documento;
    }

    public function incluirLibro(string $titulo, float $precio, int $paginas): void
    {
        $codigo = count($this->documentos) + 1;
        $this->incluirDocumento(new Libro($titulo, $codigo, $precio, false, $paginas));
    }

    public function incluirRevista(string $titulo, float $precio, int $numero): void
    {
        $codigo = count($this->documentos) + 1;
        $this->incluirDocumento(new Revista($titulo, $codigo, $precio,false ,$numero));
    }

    public function incluirSocio(string $nombre, int $cupo = 2): void
    {
        $id = count($this->socios) + 1;
        $this->socios[$id] = new Socio($id, $nombre, $cupo);
    }

    // ---------- PRÉSTAMOS ----------

    public function prestarDocumento(int $idSocio, int $codigo): void
    {
        if (!isset($this->socios[$idSocio])) {
            throw new Exception('No existe el socio con ID ' . $idSocio);
        }
        if (!isset($this->documentos[$codigo])) {
            throw new Exception('No existe el documento con código ' . $codigo);
        }
        $this->socios[$idSocio]->prestar($this->documentos[$codigo]);   // delega
    }

    public function devolverDocumento(int $idSocio, int $codigo): void
    {
        if (!isset($this->socios[$idSocio])) {
            throw new Exception('No existe el socio con ID ' . $idSocio);
        }
        $this->socios[$idSocio]->devolver($codigo);                     // delega
    }

    // ---------- LISTADOS ----------

    // Un único listar() para todo: recibe un array de objetos Resumible
    private function listar(string $cabecera, array $elementos): string
    {
        $texto = $cabecera . "\n";
        foreach ($elementos as $elemento) {
            $texto .= $elemento->muestraResumen() . "\n";   // polimorfismo
        }
        return $texto;
    }

    public function listarDocumentos(): string
    {
        return $this->listar('Documentos de ' . $this->nombre . ' (' . count($this->documentos) . '):', $this->documentos);
    }

    public function listarSocios(): string
    {
        return $this->listar('Socios de ' . $this->nombre . ' (' . count($this->socios) . '):', $this->socios);
    }

    // ---------- ORDENAR Y FILTRAR ----------

    // Burbuja, de menor a mayor precio. Devuelve un array NUEVO numerado desde 0
    public function ordenarPorPrecio(): array
    {
        $a = array_values($this->documentos);       // copia 0,1,2... (no toca el array de la biblioteca)
        $n = count($a);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - 1 - $i; $j++) {
                if ($a[$j]->getPrecio() > $a[$j + 1]->getPrecio()) {
                    $aux = $a[$j];
                    $a[$j] = $a[$j + 1];
                    $a[$j + 1] = $aux;
                }
            }
        }
        return $a;
    }

    // usort + strcasecmp. Devuelve un array NUEVO numerado desde 0
    public function ordenarPorTitulo(): array
    {
        $a = array_values($this->documentos);
        usort($a, fn($x, $y) => strcasecmp($x->getTitulo(), $y->getTitulo()));
        return $a;
    }

    // Solo los documentos que implementan Renovable
    public function renovables(): array
    {
        $resultado = [];
        foreach ($this->documentos as $documento) {
            if ($documento instanceof Renovable) {
                $resultado[] = $documento;
            }
        }
        return $resultado;
    }
}