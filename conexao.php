<?php
$host = 'localhost';
$user = 'root';
$senha = ''; // ou 'root' se você mudou no XAMPP
$banco = 'estoque_posto';

$conn = new mysqli($host, $user, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
