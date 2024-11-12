<?php

function conectaDb ($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password, $dbname); // Cria a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error); // Verifica a conexão
    }
    return $conn;
}

function insereAvaliacao($conn, $nome, $estrelas, $comentario) {
    
    $query = $conn->prepare("INSERT INTO avaliacoes (nome, estrelas, comentario) VALUES (?, ?, ?)"); // Prepara e executa a inserção
    $query->bind_param("sis", $nome, $estrelas, $comentario);

    
    if ($query->execute()) {     // Verifica se a inserção foi bem-sucedida
        echo "Obrigado pela sua avaliação!";
    } else {
        echo "Erro ao enviar a avaliação: " . $query->error;
    }
    $query->close();
}

?>