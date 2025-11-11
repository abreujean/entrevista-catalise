<?php

class Elevador
{
    private $filaChamados;
    private $andarAtual;
    private $capacidade;

    public function __construct(int $capacidade)
    {
        $this->capacidade = $capacidade;
        $this->andarAtual = 0;
        $this->filaChamados = new SplQueue();
    }

    public function chamar(int $andar): void
    {
        if ($andar < 0) {
            throw new InvalidArgumentException('Andar inválido: deve ser maior ou igual a 0.');
        }
        
        $this->filaChamados->enqueue($andar);
    }

    public function mover(): void
    {
        if ($this->filaChamados->isEmpty()) {
            echo "Não há chamados pendentes.\n";
            return;
        }

        $proximoAndar = $this->filaChamados->dequeue();
        echo "Movendo do andar {$this->andarAtual} para o andar {$proximoAndar}...\n";
        $this->andarAtual = $proximoAndar;
        echo "Chegou ao andar {$this->andarAtual}.\n";
        echo "Chamados restantes: " . $this->filaChamados->count() . "\n";
    }

    public function getAndarAtual(): int
    {
        return $this->andarAtual;
    }

    public function getChamadosPendentes(): SplQueue
    {
        // Retorna uma cópia para proteger a fila original
        return clone $this->filaChamados;
    }
}
