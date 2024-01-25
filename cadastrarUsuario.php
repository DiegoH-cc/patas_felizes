<?php
// Inclua o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $telefone = $_POST['telefone'];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
            header("Location: logar.html");
            exit();
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da instrução: " . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>
