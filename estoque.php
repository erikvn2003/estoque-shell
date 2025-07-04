<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Estoque Shell</title>
  <link rel="stylesheet" href="style.css">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #FF0000; /* FUNDO VERMELHO Shell */
    margin: 0;
    padding: 20px;
    color: white;
  }

  h1 {
    background-color: #FFD700; /* AMARELO Shell */
    color: #000;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
  }

  a {
    color: #FFD700;
    text-decoration: none;
    font-weight: bold;
    float: right;
    margin-top: -40px;
  }

  h2 {
    color: #FFD700;
    margin-top: 30px;
  }

  form {
    margin-top: 15px;
    margin-bottom: 25px;
  }

  input[type="text"],
  input[type="number"] {
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
    border: 2px solid #FFD700;
    outline: none;
    width: 200px;
    background-color: #fff;
    color: #000;
  }

  button {
    background-color: #FFD700;
    color: #000;
    font-weight: bold;
    padding: 10px 15px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
  }

  button:hover {
    background-color: #e6c200;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    background-color: #fff;
    border: 3px solid #000; /* BORDA EXTERNA PRETA */
    color: #000;
  }

  th, td {
    border: 2px solid #000; /* BORDAS INTERNAS PRETAS */
    text-align: center;
    padding: 10px;
  }

  th {
    background-color: #FFD700;
    color: #000;
  }

  td form input[type="number"] {
    width: 80px;
    border: 2px solid #000;
    border-radius: 5px;
    padding: 5px;
  }

  td form button {
    padding: 5px 10px;
    font-size: 13px;
    background-color: #FFD700;
    color: #000;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
  }

  td form button:hover {
    background-color: #e6c200;
  }
</style>

</head>
<body>
  <h1>Controle de Estoque - Posto Shell</h1>

<div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 3rem; margin-bottom: 15px;">
   <a href="logout.php">
    <button>Sair</button>
  </a>
</div>


  <h2>Cadastrar Produto</h2>
  <form action="cadastrar.php" method="post">
    <input type="text" name="nome" placeholder="Nome do Produto" required>
    <input type="text" name="codigo" placeholder="Código (7 dígitos)" pattern="\d{7}" required>
    <input type="number" name="valor" placeholder="Valor" step="0.01" required>
    <input type="number" name="quantidade" placeholder="Quantidade" required>
    <button type="submit">Cadastrar / Somar</button>
  </form>

  <h2>Estoque Atual</h2>
  <table>
    <tr>
      <th>Nome</th>
      <th>Código</th>
      <th>Valor</th>
      <th>Quantidade</th>
      <th>Baixar</th>
      <th>Excluir</th>
    </tr>

<a href="relatorio.php" target="_blank">
  <button>Imprimir Relatório</button>
</a>

    <?php
    $res = $conn->query("SELECT * FROM produtos");
    while($row = $res->fetch_assoc()) {
        echo "<tr>
          <td>{$row['nome']}</td>
          <td>{$row['codigo']}</td>
          <td>R$ {$row['valor']}</td>
          <td>{$row['quantidade']}</td>
          <td>
            <form action='baixar.php' method='post'>
              <input type='hidden' name='id' value='{$row['id']}'>
              <input type='number' name='saida' min='1' max='{$row['quantidade']}' required>
              <button type='submit'>Baixar</button>
            </form>
          </td>
          <td>
            <form action='excluir.php' method='post' onsubmit='return confirm(\"Deseja excluir?\")'>
              <input type='hidden' name='id' value='{$row['id']}'>
              <button type='submit'>Excluir</button>
            </form>
          </td>
        </tr>";
    }
    ?>
  </table>
</body>
</html>
