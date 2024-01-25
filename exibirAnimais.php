<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Recupera os animais do banco de dados
$sql = "SELECT * FROM animais";
$result = $conexao->query($sql);

// Inicializa uma variável para armazenar o HTML dos animais
$htmlAnimais = '';

// Gera o HTML dos animais com links para detalhes
while ($row = $result->fetch_assoc()) {-
    $htmlAnimais .= '<a href="detalhesAnimal.php?id=' . $row["id"] . '">';
    $htmlAnimais .= '<figure class="rounded float-start">';
    $htmlAnimais .= '<img src="uploads/' . $row["imagem"] . '" alt="Imagem do animal" />';
    $htmlAnimais .= '<figcaption class="figure-card">' . $row["nome"] . '</figcaption>';
    $htmlAnimais .= '</figure>';
    $htmlAnimais .= '</a>';
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
