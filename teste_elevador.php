<?php
require_once 'catalise.php';

echo "=== Teste do Elevador ===\n";

$elevador = new Elevador(10);
$elevador->chamar(5);
$elevador->chamar(2);

echo "Andar atual: " . $elevador->getAndarAtual() . "\n";
$elevador->mover();
echo "Andar após mover: " . $elevador->getAndarAtual() . "\n";