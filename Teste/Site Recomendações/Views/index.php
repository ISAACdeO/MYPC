<?php

include_once 'D:/CURSOS/www/Teste/Site Recomendações/Controle/index.css';
include_once 'D:/CURSOS/www/Teste/Site Recomendações/Config/Conector.php';
//Comandos para Criar Build Funcionar

$pdo = Conexao::Conecta();

function Inseridor($pdo, $gabinete, $ram, $placaM, $placaV, $fonte, $hd, $processador, $ssd) {
    $sql = "INSERT INTO build_pessoal (gabinete, ram, placa_mae, placa_video, fonte, processador, hd, ssd) 
            VALUES(:gabinete, :ram, :placaM, :placaV, :fonte, :hd, :processador, :ssd)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':gabinete', $gabinete, PDO::PARAM_STR);
    $stmt->bindParam(':ram', $ram, PDO::PARAM_STR);
    $stmt->bindParam(':placaM', $placaM, PDO::PARAM_STR);
    $stmt->bindParam(':placaV', $placaV, PDO::PARAM_STR);
    $stmt->bindParam(':fonte', $fonte, PDO::PARAM_STR);
    $stmt->bindParam(':hd', $hd, PDO::PARAM_STR);
    $stmt->bindParam(':processador', $processador, PDO::PARAM_STR);
    $stmt->bindParam(':ssd', $ssd, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: index.php?success=1');
        exit();
    } else {
        echo "Erro ao salvar a build.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gabinete = $_POST["Gabinete"];
    $ram = $_POST["Ram"];
    $placaM = $_POST["PlacaM"];
    $fonte = $_POST["Fonte"];
    $hd = $_POST["HD"];
    $processador = $_POST["Processador"];
    $ssd = $_POST["SSD"];
    $placaV = $_POST["PlacaV"];

    if (Inseridor($pdo, $gabinete, $ram, $placaM, $placaV, $fonte, $hd, $processador, $ssd)) {
        //echo "Algo!!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
            <a href="CriadorDeBuild.php" class="image-text">Criar Build</a>
        </div>
        <div>
            <img src="Alterar.png" alt="Alterar Builds">
            <a href="PainelDeBuilds" class="image-text">Gerenciar Builds</a>
        </div>
        <div style="display:flex; flex-direction: column">
            <img src="Recomendar.png" alt="Recomendações">
            <span style="display:flex; flex-direction:column; position:absolute; height:100%; justify-content: center; aling-items:center; width:100%"><h3>Recomendações:</h3>
            <a href="inserir.php" class="image-text" style="position:relative; bottom: 0; left: 0; top: 0; right:0;">Filtrar Peças</a>
            <a href="InserirBuild.php" class="image-text" style="position:relative; bottom: 0; left: 0; top: 0; right:0;">Filtrar Computadores</a>
            </span>
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