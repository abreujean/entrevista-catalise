# Elevador FIFO com SplQueue

## Visão Geral

Este projeto implementa uma classe `Elevador` em PHP que simula o funcionamento de um elevador, atendendo a chamados de andares em uma ordem estritamente FIFO (First-In, First-Out). Para isso, utiliza a estrutura de dados `SplQueue`, nativa do PHP.

- **`catalise.php`**: Contém a classe `Elevador`.
- **`teste_elevador.php`**: Script para demonstrar o uso da classe e validar o comportamento FIFO via terminal.

## Requisitos

- PHP CLI (versão 7.4 ou superior).

## Como Usar

Para executar a demonstração, clone o repositório e execute o script de teste no seu terminal:

```bash
php teste_elevador.php
```

### Exemplo de Saída

A execução do script produzirá a seguinte saída, que demonstra o atendimento dos chamados na ordem em que foram recebidos (7, depois 3, depois 10):

```
=== Teste Completo do Elevador (FIFO) ===

Elevador criado. Andar atual: 0
-------------------------------------------
Adicionando chamados...
Chamados pendentes: 7, 3, 10

Próximo movimento...
Movendo do andar 0 para o andar 7...
Chegou ao andar 7.
Chamados restantes: 2
Fila de chamados restantes: 3, 10

Próximo movimento...
Movendo do andar 7 para o andar 3...
Chegou ao andar 3.
Chamados restantes: 1
Fila de chamados restantes: 10

Próximo movimento...
Movendo do andar 3 para o andar 10...
Chegou ao andar 10.
Chamados restantes: 0
Fila de chamados restantes: Nenhum

-------------------------------------------
Todos os chamados foram atendidos.
Andar final: 10
```

## Classe `Elevador`

- **`__construct(int $capacidade)`**: Cria uma nova instância do elevador. Inicializa a fila de chamados, define o andar atual como 0 e armazena a capacidade.

- **`chamar(int $andar): void`**: Adiciona um novo andar à fila de chamados. Lança uma `InvalidArgumentException` se o andar for negativo.

- **`mover(): void`**: Atende ao próximo chamado da fila. Se a fila estiver vazia, exibe uma mensagem. Caso contrário, move o elevador para o próximo andar, atualiza o andar atual e exibe o status.

- **`getAndarAtual(): int`**: Retorna o número do andar em que o elevador está no momento.

- **`getChamadosPendentes(): SplQueue`**: Retorna uma **cópia** da fila de chamados (`clone`), garantindo que a fila original não possa ser modificada externamente.