<?php
include 'conexao.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $conn->query("DELETE FROM produtos WHERE id = $id");
}

header("Location: estoque.php");
?>
