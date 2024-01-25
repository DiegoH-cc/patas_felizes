<?php
include 'conexao.php'; // Inclui o arquivo de conexão

// Diretório para upload de imagens
$uploadDir = 'uploads/';

// Processar o formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Evite possíveis problemas de injeção de SQL usando prepared statements

    $nomePessoa = htmlspecialchars($_POST['nomePessoa']);
    $Contato = htmlspecialchars($_POST['Contato']);
    $nomeAnimal = htmlspecialchars($_POST['nomeAnimal']);
    $especie = htmlspecialchars($_POST["especie"]);
    $sexo = htmlspecialchars($_POST["sexo"]);
    $porte = htmlspecialchars($_POST["porte"]);
    $descricao = htmlspecialchars($_POST['descricao']);

    // Verifica se o arquivo de imagem foi enviado corretamente
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        $imagem = $_FILES["imagem"]["name"];
        $tempName = $_FILES["imagem"]["tmp_name"];
        $uploadPath = $uploadDir . $imagem;

        // Mover a imagem para o diretório de upload
        move_uploaded_file($tempName, $uploadPath);
    } else {
        // Lida com erro no upload da imagem, se necessário
        echo "Erro no upload da imagem.";
        exit();
    }

    // Inserir os dados no banco de dados usando uma declaração preparada
    $sql = "INSERT INTO animais (nomePessoa, Contato, nomeAnimal, especie, sexo, porte, descricao, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssss", $nomePessoa, $Contato, $nomeAnimal, $especie, $sexo, $porte, $descricao, $imagem);

        if ($stmt->execute()) {
            $stmt->close();
            $conexao->close();

            echo "Animal cadastrado com sucesso!";
            // Correto redirecionamento após o cadastro
            header("Location: menu.php");
            exit();
        } else {
            echo "Erro ao cadastrar o animal: " . $stmt->error;
            $stmt->close();
        }
    } else {
        echo "Erro na preparação da instrução: " . $conexao->error;
    }
} else {
    echo "Erro: O formulário não foi submetido corretamente.";
}

// Fechar a conexão com o banco de dados em caso de erro
$conexao->close();
?>
