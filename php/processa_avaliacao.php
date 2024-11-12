<?php
include "config.php";
include "funcoes_db";

// Cria a conexão
$conn = conectaDb($servername, $username, $password, $dbname);

// Verifica se a avaliação foi enviada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $estrelas = $_POST['estrelas'];
    $comentario = $_POST['comentario'];

    $avaliacao = insereAvaliacao($conn, $nome, $estrelas, $comentario);
}
$conn->close();

    
?>
