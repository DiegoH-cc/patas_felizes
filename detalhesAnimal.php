<?php
include 'conexao.php';

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $idAnimal = $_GET['id'];

    // Recupera as informações completas do animal com base no ID
    $sql = "SELECT * FROM animais WHERE id = $idAnimal";
    $result = $conexao->query($sql);

    // Exibe as informações do animal
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nomeAnimal"];
        $especie = $row["especie"];
        $sexo = $row["sexo"];
        $porte = $row["porte"];
        $descricao = $row["descricao"];
        $imagem = $row["imagem"];
        $contato = $row["Contato"];  // Adiciona a recuperação do contato
        $nomePessoa = $row["nomePessoa"];  // Adiciona a recuperação do nome da pessoa
    } else {
        // Se não encontrar o animal, redireciona para a página principal
        header("Location: listar_Animais.php");
        exit();
    }
} else {
    // Se o parâmetro 'id' não foi passado, redireciona para a página principal
    header("Location: listar_Animais.php");
    exit();
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Animal</title>
    <link rel="shortcut icon" href="imgLogos/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/detalhesP.css">
    <link rel="stylesheet" href="fonts/fonts.css">
    <link rel="shortcut icon" href="imgLogos/favicon.png" type="image/x-icon">
</head>
<body>
<header class="header">
        <nav>
            <img class="logo" src="imgLogos/Dog.png" alt="Logo da Instituição de Adoção">
            
            <div class="nav" id="nav">
                <a href="#home">Página Inicial</a>
                <a href="menu.php">Quero adotar</a>
                <a href="cadastrarAnimal.html">Cadastrar Animal</a>
                <a href="sobre.html">Sobre Nos</a>
            </div>
            
            <button class="login" onclick="login()">Logar</button>  
            <button class="cadastrar" onclick="cadastrar()">Cadastrar</button>
        </nav>
    </header><br>

    

    <div class="custom-rect">
    <form action="seu_script.php" method="post">
    <img src="uploads/<?php echo $imagem; ?>" alt="Imagem do animal" />
        <label for="nome">Nome do Animal:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>

        <label for="especie">Espécie:</label>
        <input type="text" id="especie" name="especie" value="<?php echo $especie; ?>" readonly>

        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" value="<?php echo $sexo; ?>" readonly>

        <label for="porte">Porte:</label>
        <input type="text" id="porte" name="porte" value="<?php echo $porte; ?>" readonly>

        <label for="contato">Contato:</label>
        <input type="text" id="contato" name="contato" value="<?php echo $contato; ?>" readonly>

        <label for="nomePessoa">Nome do Responsável:</label>
        <input type="text" id="nomePessoa" name="nomePessoa" value="<?php echo $nomePessoa; ?>" readonly>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" readonly><?php echo $descricao; ?></textarea>

       
    </form>
</div>

</body>
</html>
