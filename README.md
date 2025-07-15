# 🛢️ Sistema de Controle de Estoque - Posto Shell

Este projeto é um sistema web desenvolvido em PHP e MySQL com o objetivo de gerenciar o estoque de produtos de um posto de combustíveis (óleo, palhetas, fluido, etc), com autenticação de usuários e interface nas cores da Shell (vermelho e amarelo).

---

## 🚀 Visão Geral

O sistema permite que usuários façam login para acessar uma área restrita, onde é possível:

- Cadastrar produtos por código externo (7 dígitos)
- Somar quantidades automaticamente quando o código já existe
- Dar **baixa individual** nos produtos
- Excluir produtos com confirmação
- Interface amigável e colorida (vermelho e amarelo da Shell)

---

## 📁 Estrutura dos Arquivos

| Arquivo               | Função                                                                                             |
|-----------------------|----------------------------------------------------------------------------------------------------|
| `index.html`          | Tela de login do sistema com campo de usuário e senha                                              |
| `login.php`           | Valida as credenciais do usuário e redireciona para o sistema (`estoque.php`)                      |
| `estoque.php`         | Página principal com cadastro, tabela de estoque, baixa e exclusão de produtos                     |
| `cadastrar.php`       | Processa o cadastro. Se o código já existe e os dados forem iguais, apenas soma a quantidade       |
| `baixar.php`          | Diminui a quantidade de um produto específico (baixa individual)                                   |
| `excluir.php`         | Exclui um produto do estoque após confirmação do usuário                                           |
| `logout.php`          | Encerra a sessão do usuário e retorna à tela de login                                              |
| `conexao.php`         | Conecta o sistema ao banco de dados MySQL                                                          |
| `style.css`           | Define o estilo visual do sistema (cores da Shell, layout de formulário e tabelas)                 |
| `shell-logo.png`      | Imagem da logomarca da Shell exibida na tela de login                                              |

---

## 🔐 Funcionalidade de Login

- A tela de login é acessada pelo `index.html`
- O login é validado por `login.php` com base na tabela `usuarios`
- Senhas são armazenadas como texto no banco (em ambiente de produção recomenda-se criptografar)

---

## 🛠️ Tecnologias Utilizadas

- **Linguagem:** PHP 8.x
- **Banco de Dados:** MySQL (usando phpMyAdmin)
- **Interface:** HTML5, CSS3
- **Servidor Local:** XAMPP

---

## ⚙️ Como Executar Localmente

1. Instale o [XAMPP](https://www.apachefriends.org/index.html)
2. Copie o projeto para a pasta:  
   `C:\xampp\htdocs\estoque-shell`
3. Inicie o **Apache** e o **MySQL** no XAMPP
4. Acesse o [phpMyAdmin](http://localhost/phpmyadmin)
5. Crie um banco chamado:  
   `estoque_posto`
6. Execute o SQL abaixo para criar a tabela de usuários:

```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  senha VARCHAR(50) NOT NULL
);

## ✅ Regras de Negócio

- **Código externo** deve ter 7 dígitos
- Se tentar cadastrar um produto com mesmo código e **informações diferentes**, exibe erro
- Se as informações forem iguais, o sistema **soma a quantidade automaticamente**
- Baixas e exclusões são feitas diretamente pela interface
- Confirmação de exclusão é obrigatória

---

## 🖨️ Relatório de Estoque

- Há um botão opcional para imprimir o relatório da tabela de estoque (`relatorio.php`)
- Este recurso pode ser removido se o projeto exigir um sistema mais simples

