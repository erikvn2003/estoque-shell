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
  <title>Relatório de Estoque</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
    }

    h2 {
      text-align: center;
      margin-bottom: 10px;
    }

    .botoes-topo {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .botoes-topo a, .botoes-topo button {
      background-color: #FF0000;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
    }

    .botoes-topo button:hover,
    .botoes-topo a:hover {
      background-color: #cc0000;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #FFD700;
    }

    @media print {
      .botoes-topo {
        display: none;
      }
    }
  </style>
</head>
<body>

  <div class="botoes-topo">
    <a href="logout.php">Sair</a>
    <button onclick="window.print()">Imprimir Relatório</button>
  </div>

  <h2>Relatório de Estoque - Posto Shell</h2>

  <table>
    <tr>
      <th>Nome</th>
      <th>Código</th>
      <th>Valor</th>
      <th>Quantidade</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM produtos");
    while($row = $res->fetch_assoc()) {
      echo "<tr>
              <td>{$row['nome']}</td>
              <td>{$row['codigo']}</td>
              <td>R$ {$row['valor']}</td>
              <td>{$row['quantidade']}</td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>
