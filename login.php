<?php
// Inclua o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para encontrar o usuário
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuário encontrado, verifica a senha
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
                // Senha correta, o usuário está autenticado
                echo "Login bem-sucedido! Bem-vindo, " . $row['nome'];
                header("Location: menu.php");
            exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da instrução: " . $conexao->error;
    }
    
    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>
