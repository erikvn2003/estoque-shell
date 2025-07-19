
# 🛢️ Sistema de Controle de Estoque - Posto Shell

Este projeto é um sistema web desenvolvido em PHP e MySQL para gerenciar o estoque de produtos de um posto de combustíveis (óleo, palhetas, fluido, etc), com autenticação de usuários e interface nas cores da Shell (vermelho e amarelo).

---

## 🚀 Visão Geral

O sistema permite que usuários façam login para acessar uma área restrita, onde é possível:

- Cadastrar produtos por código externo 
- Somar quantidades automaticamente quando o código já existe
- Dar baixa individual nos produtos
- Excluir produtos com confirmação
- Visualizar e imprimir relatório do estoque
- Interface amigável nas cores da Shell

---

## ⚙️ Como Executar Localmente

Siga os passos abaixo para rodar o sistema de estoque em sua máquina local:

### 1. Instale o XAMPP

Baixe e instale o XAMPP em:  
🔗 https://www.apachefriends.org/pt_br/index.html

---

### 2. Copie o projeto

Após clonar ou baixar o projeto, mova a pasta para:

```
C:\xampp\htdocs\estoque-shell
```

---

### 3. Inicie o servidor

Abra o **XAMPP Control Panel** e inicie os serviços:

- ✅ Apache
- ✅ MySQL

---

### 4. Crie o banco de dados

1. Acesse o phpMyAdmin no navegador:
   ```
   http://localhost/phpmyadmin
   ```

2. Crie um banco de dados com o nome:

```
estoque_posto
```

---

### 5. Crie a tabela de usuários

No phpMyAdmin, com o banco selecionado, vá até "SQL" e execute o comando:

```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  senha VARCHAR(50) NOT NULL
);
```

---

### 6. Acesse o sistema

Abra o navegador e acesse:

```
http://localhost/estoque-shell/src/index.html
```

Faça login com um usuário criado manualmente no banco (por enquanto).

---

## ✅ Regras de Negócio

- Código externo deve conter **exatamente 7 dígitos**.
- Se um produto com o mesmo código for cadastrado:
  - Se os dados forem diferentes, o sistema exibe **erro**.
  - Se os dados forem iguais, o sistema **soma automaticamente a quantidade**.
- As baixas e exclusões são feitas diretamente pela interface.
- A exclusão exige confirmação do usuário.

---

## 🖨️ Relatório de Estoque

- Há um botão para gerar e imprimir o relatório da tabela de estoque (`relatorio.php`).
- Este recurso pode ser removido, se necessário, para simplificação.

---

## 📁 Estrutura Sugerida de Pastas

```
/css/             -> Arquivos de estilo
/img/             -> Imagens do sistema
/includes/        -> Arquivos PHP reutilizáveis (ex: conexao.php)
/pages/           -> Páginas principais (estoque.php, cadastrar.php, etc)
/auth/            -> Autenticação (login.php, logout.php)
public/index.html -> Tela de login
README.md         -> Documentação
LICENSE           -> Licença
```

---

## 📄 Licença

Projeto sob licença MIT. Veja o arquivo LICENSE para mais detalhes.







