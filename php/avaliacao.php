<?php
include "config.php";
include "funcoes_db.php";

// Cria a conexão
$conn = conectaDb($servername, $username, $password, $dbname);

$mensagem = ''; 

// Verifica se a avaliação foi enviada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $estrelas = $_POST['estrelas'];
    $comentario = $_POST['comentario'];

    $mensagem = insereAvaliacao($conn, $nome, $estrelas, $comentario);
}
$conn->close();
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/avaliacao.css">
    <title>Avaliação</title>
</head>
<body>
    <h2>Deixe sua Avaliação</h2>
    <form method="POST" action="avaliacao.php">
        
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>
        </div>

       
        <label for="estrelas">Avaliação (1 a 5 estrelas):</label>
        <div class="star-rating">
            <input type="radio" id="star5" name="estrelas" value="5" required>
            <label class="star" for="star5">&#9733;</label>
            <input type="radio" id="star4" name="estrelas" value="4">
            <label class="star" for="star4">&#9733;</label>
            <input type="radio" id="star3" name="estrelas" value="3">
            <label class="star" for="star3">&#9733;</label>
            <input type="radio" id="star2" name="estrelas" value="2">
            <label class="star" for="star2">&#9733;</label>
            <input type="radio" id="star1" name="estrelas" value="1">
            <label class="star" for="star1">&#9733;</label>
        </div>

        <label for="comentario">Comentário:</label>
        <textarea id="comentario" name="comentario" placeholder="Opcional"></textarea>

        <button type="submit">Enviar Avaliação</button>
    </form>

    <h2>Avaliações Recentes</h2>
    <div class="avaliacoes">
        <?php
        // Reabre a conexão para exibir as avaliações
        $conn = conectaDb($servername, $username, $password, $dbname);
        exibirAvaliacoes($conn);
        $conn->close();
        ?>
    </div>
    <a href="../index.html"><button>Voltar</button></a>
</body>
</html>
