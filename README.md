
# 🛢️ Sistema de Controle de Estoque - Posto Shell

Este projeto é um sistema web desenvolvido em PHP e MySQL para gerenciar o estoque de produtos de um posto de combustíveis (óleo, palhetas, fluido, etc), com autenticação de usuários e interface nas cores da Shell (vermelho e amarelo).

---

## 🚀 Visão Geral

O sistema permite que usuários façam login para acessar uma área restrita, onde é possível:

- Cadastrar produtos por código externo (7 dígitos)
- Somar quantidades automaticamente quando o código já existe
- Dar baixa individual nos produtos
- Excluir produtos com confirmação
- Visualizar e imprimir relatório do estoque
- Interface amigável nas cores da Shell

---

## ⚙️ Como Executar Localmente

1. Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2. Copie a pasta do projeto para: 

C:\xampp\htdocs\estoque-shell

3. Inicie o Apache e o MySQL pelo painel do XAMPP.
4. Acesse o phpMyAdmin no navegador:

http://localhost/phpmyadmin

5. Crie um banco de dados chamado:

estoque posto

6. Execute o SQL abaixo para criar a tabela de usuários:
```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  senha VARCHAR(50) NOT NULL
);

7. Ajuste as credenciais do banco em includes/conexao.php se necessário.

8. Acesse o sistema via:

http://localhost/estoque-shell/public/index.html

📁 Estrutura dos Arquivos

/css/            # Arquivos CSS (style.css)
img/             # Imagens (shell-logo.png)
includes/        # Arquivos PHP de conexão e funções comuns (conexao.php)
pages/           # Páginas principais do sistema (estoque.php, cadastrar.php, baixar.php, excluir.php, relatorio.php)
auth/            # Arquivos de autenticação (login.php, logout.php)
public/          # Arquivos públicos e estáticos (index.html)
README.md        # Documentação do projeto
LICENSE          # Licença do projeto
.gitignore       # Arquivo para ignorar arquivos desnecessários no git

✅ Regras de Negócio

	Código externo deve conter exatamente 7 dígitos.

	Ao cadastrar um produto com código já existente:

	Se as demais informações forem diferentes, o sistema exibe erro.

	Se as informações forem iguais, o sistema soma a quantidade automaticamente.

	Operações de baixa e exclusão são feitas pela interface.

	A exclusão de produtos requer confirmação do usuário.

🖨️ Relatório de Estoque

	O sistema oferece um botão para gerar e imprimir o relatório da tabela de estoque (pages/relatorio.php).

	Esse recurso pode ser removido se o projeto exigir uma versão mais simples.




