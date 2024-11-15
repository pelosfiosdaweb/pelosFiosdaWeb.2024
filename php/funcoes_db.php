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



function exibirAvaliacoes($conn) {
    $sql = "SELECT nome, estrelas, comentario FROM avaliacoes ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Exibe as avaliações
        while ($row = $result->fetch_assoc()) {
            echo "<div class='avaliacao'>";
            echo "<h4>" . ($row['nome']) . " - ";
            echo str_repeat("★", $row['estrelas']);
            echo "</h4>";
            echo "<p>\"". ($row['comentario']) ."\"</p>";
            echo "</div>";
        }

    }else{
        echo "<p>Não existem avaliações registradas.</p>";
    }    
            
}   

?>