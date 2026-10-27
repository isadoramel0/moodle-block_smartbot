# SmartBot (block_smartbot)

Plugin de bloco para Moodle. Nesta versão inicial, o bloco exibe a frase "Funcionou".

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
campo "Texto de boas-vindas".

## Uso

1. Ative o modo de edição em uma página.
2. Clique em **Adicionar um bloco** e escolha **SmartBot**.
3. O bloco exibirá a frase "Funcionou".

## Licença

GNU GPL v3 ou posterior. Consulte o arquivo [LICENSE](LICENSE).
