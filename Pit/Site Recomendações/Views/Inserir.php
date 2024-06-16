<?php
include_once 'D:/CURSOS/www/Teste/Site Recomendações/Config/Conector.php';

$pdo = Conexao::Conecta();                    
function VerPrecos($pdo){
    $sql = "SELECT preco FROM filtro_recomendacaopc GROUP BY preco;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function VerMarcas($pdo){
    $sql = "SELECT marca FROM filtro_recomendacaopc GROUP BY marca;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function VerCategorias($pdo){
    $sql = "SELECT categoria FROM filtro_recomendacaopc GROUP BY categoria;";
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

<body style="padding:0;margin:0; height:5em">
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
            style="background-color:#EAD0D0;display: flex;flex-direction: column;align-items: center;"
            action="Recomendacoes.php" method="post">

            <h1 style="display:flex; justify-content: center; font-size: 100px; margin-top: 1em; margin-bottom: 1em;">Escolher Recomendação</h1>

            <ul style="display: flex; flex-direction: column; align-items: center;list-style:none; justify-content: space-around; margin-bottom: 5em;">
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
            <ul style="display: flex; flex-direction: column; align-items: center;list-style:none; justify-content: space-around; margin-bottom: 5em;">
                <label for="">Marca</label>
                <select name="Marca" value="Marca">
                    <option value="null" name="Nenhum">Nenhuma</option>
                <?php
                    $marcas = VerMarcas($pdo);
                    foreach ($marcas as $marca) {
                    echo "<option
                    style='height: 36px;width: 545px;background-color:grey;border-bottom: 1.5px solid black;color:black;display: flex;justify-content: center;align-items: center;font-family:sans-serif'
                    value='{$marca['marca']}'>{$marca['marca']}</option>";
                    }
                ?>
                </select>
            </ul>
            <ul style="display: flex; flex-direction: column; align-items: center; list-style:none; justify-content:space-evenly">
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
            <div style="display:flex; justify-content:center;">
                <button style="width: 237px; height: 62px; background-color: #1F5D78; border-radius: 69px; color: #ffffff; font-size: 18px;" type="submit">Escolher
                    Requisitos</button>
            </div>
        </form>

    </div>

</body>

</html>