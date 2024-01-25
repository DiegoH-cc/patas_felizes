<?php
// buscar_animais.php

include 'conexao.php';

$especie = $_POST['especie'] ?? '';
$porte = $_POST['porte'] ?? '';
$sexo = $_POST['sex'] ?? '';

$sql = "SELECT * FROM animais WHERE especie LIKE '%$especie%' AND porte LIKE '%$porte%' AND sexo LIKE '%$sexo%'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="animal">';
        $imagemPath = 'uploads/' . $row["imagem"]; // Caminho relativo para a pasta uploads
        echo '<a href="detalhesAnimal.php?id=' . $row["id"] . '">';
        echo '<img src="' . $imagemPath . '" alt="' . $row["nomeAnimal"] . '">';
        echo '</a>';
        echo '<p>Nome: ' . $row["nomeAnimal"] . '</p>';
        echo '<p>Espécie: ' . $row["especie"] . '</p>';
        echo '<p>Porte: ' . $row["porte"] . '</p>';
        echo '<p>Sexo: ' . $row["sexo"] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>Nenhum resultado encontrado</p>';
}

$conexao->close();
?>
