<?php
// Conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$dbname = "barbearia"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se a avaliação foi enviada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $estrelas = $_POST['estrelas'];
    $comentario = $_POST['comentario'];

    // Prepara e executa a inserção
    $query = $conn->prepare("INSERT INTO avaliacoes (nome, estrelas, comentario) VALUES (?, ?, ?)");
    $query->bind_param("sis", $nome, $estrelas, $comentario);

    // Verifica se a inserção foi bem-sucedida
    if ($query->execute()) {
        echo "Obrigado pela sua avaliação!";
    } else {
        echo "Erro ao enviar a avaliação: " . $query->error;
    }

    $query->close();
    $conn->close();
}
?>
