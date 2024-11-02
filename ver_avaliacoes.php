<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sua_base_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para buscar as avaliações
$sql = "SELECT nome, estrelas, comentario FROM avaliacoes ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Avaliações</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<strong>" . $row["nome"] . "</strong><br>";
        echo "Avaliação: " . str_repeat("⭐", $row["estrelas"]) . "<br>";
        if (!empty($row["comentario"])) {
            echo "Comentário: " . $row["comentario"] . "<br>";
        }
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "Nenhuma avaliação ainda.";
}

$conn->close();
?>
