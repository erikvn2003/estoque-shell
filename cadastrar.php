<?php
session_start();
include 'conexao.php';

$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];

$result = $conn->query("SELECT * FROM produtos WHERE codigo = '$codigo'");

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();

    // Se código existe, mas informações estão diferentes
    if (
        $produto['nome'] !== $nome ||
        $produto['valor'] != $valor
    ) {
        echo "<script>alert('Erro: Já existe um produto com esse código, mas com informações diferentes. Verifique.'); history.back();</script>";
        exit();
    }

    // Se tudo igual, apenas soma a quantidade
    $novaQuantidade = $produto['quantidade'] + $quantidade;
    $conn->query("UPDATE produtos SET quantidade = $novaQuantidade WHERE codigo = '$codigo'");
} else {
    // Produto novo
    $conn->query("INSERT INTO produtos (nome, codigo, valor, quantidade) VALUES ('$nome', '$codigo', '$valor', '$quantidade')");
}

header("Location: estoque.php");
exit();
