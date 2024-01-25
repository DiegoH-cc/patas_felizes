<?php
        $host = "localhost"; //Endereço do Servidor
        $usuario = "root"; //Nome do usuario do bd MYSQL
        $senha = "Senac@2023"; //A senha do Banco MYSQL
        $dbname = "Patas_Felizes"; // nome do banco de dados criado no MYSQL
        
        $conexao = mysqli_connect($host, $usuario, $senha, $dbname); // Utiliza a conexao com banco de dados

        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }

        
 



    ?>