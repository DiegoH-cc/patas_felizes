<?php
include 'conexao.php';

// Recupera os animais do banco de dados
$sql = "SELECT * FROM animais";
$result = $conexao->query($sql);

// Exibe os animais na página
$animais = array(); // Nova matriz para armazenar os resultados
while ($row = $result->fetch_assoc()) {
    $animais[] = $row; // Adiciona o animal à matriz
    echo '<a href="detalhesAnimal.php?id=' . $row["id"] . '">';
    echo '<figure class="rounded float-start">';
    echo '<img src="uploads/' . $row["imagem"] . '" alt="Imagem do animal" />';
    echo '<figcaption class="figure-card">' . $row["nomeAnimal"] . '</figcaption>';
    echo '</figure>';
    echo '</a>';
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
