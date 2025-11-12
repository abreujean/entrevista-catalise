<?php
require_once 'catalise.php';

function imprimir_pendentes(SplQueue $fila): string
{
    if ($fila->isEmpty()) {
        return "Nenhum";
    }
    return implode(', ', iterator_to_array($fila, false));
}

echo "=== Teste Completo do Elevador (FIFO) ===\n\n";

// 1. Cria o elevador
$elevador = new Elevador(10);
echo "Elevador criado. Andar atual: " . $elevador->getAndarAtual() . "\n";
echo "-------------------------------------------\n";

// 2. Adiciona chamados à fila
echo "Adicionando chamados...\n";
$elevador->chamar(7);
$elevador->chamar(3);
$elevador->chamar(10);

$pendentes = $elevador->getChamadosPendentes();
echo "Chamados pendentes: " . imprimir_pendentes($pendentes) . "\n\n";

// 3. Move o elevador para atender os chamados na ordem de chegada
while (!$elevador->getChamadosPendentes()->isEmpty()) {
    echo "Próximo movimento...\n";
    $elevador->mover();
    $pendentes = $elevador->getChamadosPendentes();
    echo "Fila de chamados restantes: " . imprimir_pendentes($pendentes) . "\n\n";
}

echo "-------------------------------------------\n";
echo "Todos os chamados foram atendidos.\n";
echo "Andar final: " . $elevador->getAndarAtual() . "\n";