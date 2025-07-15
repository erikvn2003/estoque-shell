# 📄 Explicação dos Arquivos - Sistema Estoque Shell

Este documento detalha a função de cada arquivo presente no sistema de controle de estoque para o posto Shell.

## Arquivos do Projeto

| Arquivo               | Descrição                                                                                           |
|-----------------------|------------------------------------------------------------------------------------------------------|
| `index.html`          | Página inicial de login. Usuário informa nome e senha para acessar o sistema.                       |
| `login.php`           | Valida os dados do login e redireciona para a tela principal (`estoque.php`) em caso de sucesso.   |
| `estoque.php`         | Tela principal do sistema: exibe os produtos, permite cadastrar, dar baixa e excluir produtos.      |
| `cadastrar.php`       | Cadastra novos produtos ou soma com os existentes se o código for igual e os dados também.          |
| `baixar.php`          | Realiza a baixa de produtos (saída). Reduz a quantidade conforme informado.                         |
| `excluir.php`         | Remove um produto do estoque. Antes, confirma se o usuário realmente deseja excluir.                |
| `logout.php`          | Encerra a sessão atual do usuário e retorna à tela de login.                                        |
| `conexao.php`         | Contém os dados e comandos para conectar ao banco de dados MySQL (`estoque_posto`).                |
| `style.css`           | Arquivo com o estilo visual (cores vermelho e amarelo da Shell, formatações, botões e tabelas).     |
| `shell-logo.png`      | Imagem da logomarca da Shell exibida na tela de login.                                              |

---

## Observações

- Todos os arquivos PHP dependem do `conexao.php` para acessar o banco.
- A sessão é iniciada com `session_start()` para garantir que o login esteja ativo.
- A estética segue o padrão de cores da Shell (vermelho e amarelo).

