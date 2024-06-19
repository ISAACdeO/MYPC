<?php
session_start();
echo "Olá " . $_SESSION['nome'] . ", Bem vindo";

?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaIncial.css">



    <title>MYPC</title>
</head>

<body>
    <header>
        <h1>MYPC</h1>
        <nav>
            <a href="index.php" id="home">Home</a>
            <a href="cadastrar.php" id="cadastrar">Cadastrar</a>
            <a href="sobre-nos.php" id="sobreN">Sobre Nós</a>
            <a href="build.php" id="build">Build</a>
        </nav>
    </header>

    <div class="image-section">
        <div>
            <img src="Criar.png" alt="Criar Build">
            <a href="Paginas/Seção-Recomendaçoes-de-Peças/PagRecomendacao.php" class="image-text">Recomendações de Peças</a>
        </div>
        <div>
            <img src="Alterar.png" alt="Alterar Builds">
            <a href="PainelDeBuilds" class="image-text">Gerenciar Builds</a>
        </div>
     
    </div>

    <div id="chatWidget" class="collapsed">
        <div id="chatHeader">Ajuda Profissional<img src="seta2.png" alt="" id="seta"></div>
        <div id="chatBody" style="display: none;">
            <form id="contactForm">
                <input type="text" name="nome" class="chatInput" placeholder="Nome" require><br>
                <input type="email" id="email" class="chatInput" placeholder="E-mail">
                <textarea id="reason" class="chatInput" placeholder="Motivo de contato"></textarea>
                <button type="submit" id="sendMessageButton" class="chatInput">Enviar</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>