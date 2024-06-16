<?php
include_once 'D:/CURSOS/www/Teste/Site Recomendações/Config/Conector.php';

$pdo = Conexao::Conecta();                    
function VerPrecos($pdo){
    $sql = "SELECT preco FROM filtro_recomendacaopc GROUP BY preco;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function VerDistribuidoras($pdo){
    $sql = "SELECT distribuidora FROM filtro_build GROUP BY distribuidora;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function VerCategorias($pdo){
    $sql = "SELECT categoria FROM filtro_build GROUP BY categoria;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <title>Document</title>
</head>

<body style="padding:0;margin:0">
    <header>
        <h1>MYPC</h1>
        <nav>
            <a href="index.php" id="home">Home</a>
            <a href="cadastrar.php" id="cadastrar">Cadastrar</a>
            <a href="sobre-nos.php" id="sobreN">Sobre Nós</a>
            <a href="build.php" id="build">Build</a>
        </nav>
    </header>

    <div>

        <form
            style="background-color:purple;border:black solid 0.5em;display: flex;flex-direction: column;align-items: center; color:white; height:59.1em;justify-content:center"
            action="RecomendacoesDeBuilds.php" method="post">

            <h1>Escolher Recomendação</h1>

            <ul style="
    display: flex;
    flex-direction: column;
    align-items: center;list-style:none">
                <label for="">Preço</label>
                <select name="Preco" value="Preco">
                    <option style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value="Baixo">
                    De 3000 Para baixo
                    </option>

                    <option style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value="Medio">
                    De 3001 até 4999
                    </option>

                    <option style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value="Alto">
                    Igual ou mais que 5000
                    </option>

                    <?php/*
                    $precos = VerPrecos($pdo);
                    foreach ($precos as $preco) {
                    echo "<option
                    style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value='{$preco['preco']}'>R$ {$preco['preco']}</option>";
                    }*/
                    ?>
                </select>
            </ul>
            <ul style="
    display: flex;
    flex-direction: column;
    align-items: center;list-style:none">
                <label for="">Distribuidora/Marca</label>
                <select name="Distribuidora" value="Distribuidora">
                    <option value="null" name="Nenhum">Nenhuma</option>
                <?php
                    $Destribuidoras = VerDistribuidoras($pdo);
                    foreach ($Destribuidoras as $Destribuidora) {
                    echo "<option
                    style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value='{$Destribuidora['distribuidora']}'>{$Destribuidora['distribuidora']}</option>";
                    }
                ?>
                </select>
            </ul>
            <ul style="
    display: flex;
    flex-direction: column;
    align-items: center;list-style:none">
                <label for="">Categoria</label>
                <select name="Categoria" value="Categoria">
                    <?php
                $categorias = VerCategorias($pdo);
                    foreach ($categorias as $categoria) {
                    echo "<option
                    style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value='{$categoria['categoria']}'>{$categoria['categoria']}</option>";
                    }
                    ?>
                </select>
            </ul>
            <div>
                <button style="width:237px;height:62px; background-color:grey;border-radius:10px" type="submit">Escolher
                    Requisitos</button>
            </div>
        </form>

    </div>

</body>

</html>