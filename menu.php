<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituição Patas Felizes</title>
    <link rel="shortcut icon" href="imgLogos/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="fonts/fonts.css">
</head>
<body>

    <header class="header">
        <nav>
            <img class="logo" src="imgLogos/Dog.png" alt="Logo da Instituição de Adoção">
            
            <div class="nav" id="nav">
                <a href="index.html">Página Inicial</a>
                <a href="#animais">Quero adotar</a>
                <a href="cadastrarAnimal.html">Cadastrar Animal</a>
                <a href="sobre.html">Quem Somos</a>
            </div>
            
            <button class="login" onclick="login()">Logar</button>  
            <button class="cadastrar" onclick="cadastrar()">Cadastrar</button>
        </nav>
    </header><br>

    

    <h1 class="title-lg">Encontre seu novo amigo</h1>

    <br>
    <main class="Pesquisar">
        <div class="tituloLogo"></div>
        <div>
            <form action="" method="post">
                <select class="especie" name="especie">
                    <option value="">Todas as espécies</option>
                    <option value="cachorro">Cachorro</option>
                    <option value="gato">Gato</option>
                </select>
        </div>

        <div class="sexo">
            <select id="sex" name="sex">
                <option value="">Todos os sexos</option>
                <option value="macho">Macho</option>
                <option value="femea">Fêmea</option>
            </select>
        </div>

        <div class="Portes">
            <select id="portes" name="porte">
                <option value="">Todos os portes</option>
                <option value="pequeno">Porte pequeno</option>
                <option value="medio">Porte médio</option>
                <option value="grande">Porte grande</option>
            </select>
        </div>

        <div class="button-buscar">
            <button class="buscar" type="submit">Buscar</button>
        </div>
        
    </form>
    </main>
        
    <div class="custom-rect">
        <div class="image-container">
            <?php
            // Processamento da busca e exibição dos resultados
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'buscar_animais.php';
            } else {
                // Se não houver busca, exibir todos os animais
                include 'listar_animais.php';
            }
            ?>
        </div>
    </div>

    <script src="inicial.js"></script>
    <script src="carrosel.js"></script>


    </form>
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <h3>Instituto Patas Felizes</h3>
                    <p>Av. Liége, 213 - Europa, Belo Horizonte - MG, 31620-400</p>
                    <p>Telefone: (31) 3057-8600</p>
                    <p>Email: Instpatas@patasfelizesmg.org</p>
                </div>
                
                <div class="footer-links">
                    <h3>Links Úteis</h3>
                    <ul>
                        <li><a href="#home">Página Inicial</a></li>
                        <li><a href="menu.php">Quero Adotar</a></li>
                        <li><a href="cadastrarAnimal.html">Cadastrar Animal</a></li>
                        <li><a href="sobre">Sobre Nós</a></li>
                    </ul>
                </div>
    
                <div class="footer-social">
                    <h3>Conecte-se Conosco</h3>
                    <ul>
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i> Twitter</a></li>
                    </ul>
                </div>
                
            </div>
            
            <p class="copyright">&copy; 2024 Instituto Patas Felizes. Todos os direitos reservados.</p>
        </div>
    </footer>   
        
        
</body>
</html>
