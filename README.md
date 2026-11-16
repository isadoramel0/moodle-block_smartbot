# SmartBot (block_smartbot)

Plugin de bloco para Moodle que apresenta uma janela visual de conversa sobre o
Campus Virtual da UFLA. A interface é apenas demonstrativa: não envia mensagens
nem se integra a uma IA.

## Requisitos

- Moodle 4.1 ou superior.

## Instalação

### Via Git

```bash
cd /caminho/para/moodle/blocks
git clone https://github.com/isadoramel0/moodle-block_smartbot.git smartbot
```

### Manual

1. Baixe o código e extraia-o em `blocks/smartbot` dentro da instalação do Moodle.
2. Garanta que o servidor web tenha permissão de leitura sobre os arquivos.

### Finalizando a instalação

Acesse **Administração do site > Notificações** e siga as instruções na tela,
ou execute pela linha de comando:

```bash
sudo -u www-data php admin/cli/upgrade.php
sudo -u www-data php admin/cli/purge_caches.php
```

## Configuração

Em **Administração do site > Plugins > Blocos > SmartBot** é possível definir o
nome exibido no cabeçalho do chatbot.

## Uso

Para usuários autenticados, o botão flutuante do SmartBot aparece em todas as
páginas do Moodle. Clique nele para abrir a janela visual do chat; o botão X
fecha a janela. Adicionar o bloco a uma página exibe também uma breve
apresentação do SmartBot.

## Licença

GNU GPL v3 ou posterior. Consulte o arquivo [LICENSE](LICENSE).
