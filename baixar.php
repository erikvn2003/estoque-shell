<?php
include 'conexao.php';

if (isset($_POST['id']) && isset($_POST['saida'])) {
    $id = $_POST['id'];
    $saida = $_POST['saida'];

    $conn->query("UPDATE produtos SET quantidade = quantidade - $saida WHERE id = $id");
}

header("Location: estoque.php");
?>
