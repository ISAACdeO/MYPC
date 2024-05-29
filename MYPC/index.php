<?php
require('Conector.php');
$pdo = Conexao::Conecta();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gabinete = $_POST['Gabinete'];
    $ram = $_POST['Ram'];
    $placaM = $_POST['PlacaM'];
    $fonte = $_POST['Fonte'];
    $hd = $_POST['HD'];
    $Placar = $_POST['PlacaR'];
    $processador = $_POST['Processador'];
    $ssd = $_POST['SSD'];
    $placaV = $_POST['PlacaV'];

    $sql = "INSERT INTO build_pessoal VALUES(:gabinete,:ram,:placaM,:placaV,:fonte,:Placar,:processador,:hd,:ssd)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':gabinete', $gabinete);
    $stmt->bindParam(':ram', $ram);
    $stmt->bindParam(':placaM', $placaM);
    $stmt->bindParam(':fonte', $fonte);
    $stmt->bindParam(':hd', $hd);
    $stmt->bindParam(':Placar', $Placar);
    $stmt->bindParam(':processador', $processador);
    $stmt->bindParam(':ssd', $ssd);
    $stmt->bindParam(':placaV', $placaV);

    if ($stmt->execute()) {
        header('Location: index.php?success=1');
        exit();
    } else {
        echo "Erro ao salvar a build.";
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

    <div id="imagens"></div>

    <div class="image-section">
        <div>
            <img src="Criar.png" alt="Criar Build">
            <a href="CriadorDeBuild.php" class="image-text">Criar Build</a>
        </div>
        <div>
            <img src="Alterar.png" alt="Alterar Builds">
            <div class="image-text">Alterar Builds</div>
        </div>
        <div>
            <img src="Recomendar.png" alt="Recomendações">
            <a href="inserir.php" class="image-text">Recomendações</a>
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

    <a href="inserir.php">clica</a>

</body>

</html>