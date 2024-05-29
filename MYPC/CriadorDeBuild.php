<?php
require('Conector.php');
$pdo = Conexao::Conecta();



function VerDescricaoGabinete($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'Gabinete';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
function VerDescricaoRam($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'Memória RAM' GROUP BY descricao;";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
function VerDescricaoPlacaM($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'Placa mãe';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}



function VerDescricaoFonte($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'Fonte';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
function VerDescricaoHD($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'HD';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
function VerDescricaoPlacaR($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = '';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}



function VerDescricaoProcessador($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'Processador' GROUP BY descricao;";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
function VerDescricaoSSD($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'SSD';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
function VerDescricaoPlacaV($pdo){
    $sql = "SELECT descricao FROM filtro_recomendacaopc WHERE categoria = 'Placa de vídeo';";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloCriador.css">
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

<form action="index.php" method = "post">
    <h1>Criar Build</h1>
    <ul>
    <li><h2>Gabinete</h2>
    <select name="Gabinete" id="Gabinete">
        <?php
        $Gabinetes = VerDescricaoGabinete($pdo);
        foreach($Gabinetes as $Gabinete){
            echo "<option value='{$Gabinete['descricao']}'>{$Gabinete['descricao']}</option>";
        }
        ?>
    </select>
    </li>

    <li><h2>Ram</h2>
    <select name="Ram" id="Ram">
        <?php
        $Rams = VerDescricaoRam($pdo);
        foreach ($Rams as $Ram) {
            echo "<option value='{$Ram['descricao']}'>{$Ram['descricao']}</option>";
        }
        ?>
    </select>
    </li>

    <li><h2>Placa Mãe</h2>
    <select name="PlacaM" id="PlacaM">
        <?php
        $PlacasM = VerDescricaoPlacaM($pdo);
        foreach($PlacasM as $PlacaM){
            echo "<option value='{$PlacaM['descricao']}'>{$PlacaM['descricao']}</option>";
        }
        ?>
    </select>
    </li>
    </ul>



    <ul>
    <li><h2>Fonte</h2>
    <select name="Fonte" id="Fonte">
        <?php
                $Fontes = VerDescricaoFonte($pdo);
                foreach($Fontes as $Fonte){
                    echo "<option value='{$Fonte['descricao']}'>{$Fonte['descricao']}</option>";
                }
        ?>
    </select>
    </li>

    <li><h2>HD</h2>
    <select name="HD" id="HD">
        <?php
                $HDs = VerDescricaoHD($pdo);
                foreach($HDs as $HD){
                    echo "<option value='{$HD['descricao']}'>{$HD['descricao']}</option>";
                }
        ?>
    </select>
    </li>

    <li><h2>Placa De Rede</h2>
    <select name="PlacaR" id="PlacaR">
        <?php
/*                $ = ($pdo);
                foreach($ as $){
                    echo "<option value='{$['descricao']}'>{$['descricao']}</option>";
                }*/
        ?>
    </select>
    </li>
    </ul>



    <ul>
    <li><h2>Processador</h2>
    <select name="Processador" id="Processador">
        <?php
                $Processadores = VerDescricaoProcessador($pdo);
                foreach($Processadores as $Processador){
                    echo "<option value='{$Processador['descricao']}'>{$Processador['descricao']}</option>";
                }
        ?>
    </select>
    </li>

    <li><h2>SSD</h2>
    <select name="SSD" id="SSD">
        <?php
                $SSDs = VerDescricaoSSD($pdo);
                foreach($SSDs as $SSD){
                    echo "<option value='{$SSD['descricao']}'>{$SSD['descricao']}</option>";
                }
        ?>
    </select>
    </li>

    <li><h2>Placa De Video</h2>
    <select name="PlacaV" id="PlacaV">
        <?php
                $PlacasV = VerDescricaoPlacaV($pdo);
                foreach($PlacasV as $PlacaV){
                    echo "<option value='{$PlacaV['descricao']}'>{$PlacaV['descricao']}</option>";
                }
        ?>
    </select>
    </li>
    </ul>
    <button type = "submit">Pronto</button>
    </form>
</body>
</html>