<!DOCTYPE html>
<html lang="pt-BR">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Recomendacoes.css">
    <script src="ScriptNovo.js" defer></script> 
</head>
<body style="background-color: #EAD0D0; display: flex;flex-direction: column;align-items: center; color:#000; height:59.1em;justify-content:center;paddin:0;margin:0">
    <?php
include_once 'D:/CURSOS/www/Teste/Site Recomendações/Config/Conector.php';
$pdo = Conexao::Conecta();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["acao"]) && $_POST["acao"] == "chamarRegistrador") {
            Mostrar();
            exit;
        }

        $Preco = $_POST["Preco"];
        $Marca = $_POST["Marca"];
        $Categoria = $_POST["Categoria"];

        function AtualizarRequisitos($pdo, $Preco, $Marca, $Categoria) {
            $sql = "UPDATE Recomendacoes SET Preco = :Preco, Marca = :Marca, Categoria = :Categoria WHERE idRecomendacoes = 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':Preco', $Preco, PDO::PARAM_STR);
            $stmt->bindParam(':Marca', $Marca, PDO::PARAM_STR);
            $stmt->bindParam(':Categoria', $Categoria, PDO::PARAM_STR);
            return $stmt->execute();
        }

        function MostrarFiltro($pdo, $Preco) {
            switch ($Preco) {
                case 'Baixo':
                    $sql = "SELECT filtro_recomendacaopc.descricao, filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria
                            FROM Recomendacoes
                            JOIN filtro_recomendacaopc USING(idRecomendacoes)
                            WHERE filtro_recomendacaopc.preco <= 3000
                              AND (filtro_recomendacaopc.marca = Recomendacoes.marca OR Recomendacoes.marca IS NULL)
                              AND filtro_recomendacaopc.categoria = Recomendacoes.categoria
                            GROUP BY filtro_recomendacaopc.descricao, filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria
                            ORDER BY filtro_recomendacaopc.preco ASC;"; // Adicionando ORDER BY
                    break;
                case 'Medio':
                    $sql = "SELECT filtro_recomendacaopc.descricao, filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria
                            FROM Recomendacoes
                            JOIN filtro_recomendacaopc USING(idRecomendacoes)
                            WHERE filtro_recomendacaopc.preco BETWEEN 3001 AND 4999
                              AND (filtro_recomendacaopc.marca = Recomendacoes.marca OR Recomendacoes.marca IS NULL)
                              AND filtro_recomendacaopc.categoria = Recomendacoes.categoria
                            GROUP BY filtro_recomendacaopc.descricao, filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria
                            ORDER BY filtro_recomendacaopc.preco ASC;"; // Adicionando ORDER BY
                    break;
                case 'Alto':
                    $sql = "SELECT filtro_recomendacaopc.descricao, filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria
                            FROM Recomendacoes
                            JOIN filtro_recomendacaopc USING(idRecomendacoes)
                            WHERE filtro_recomendacaopc.preco >= 5000
                              AND (filtro_recomendacaopc.marca = Recomendacoes.marca OR Recomendacoes.marca IS NULL)
                              AND filtro_recomendacaopc.categoria = Recomendacoes.categoria
                            GROUP BY filtro_recomendacaopc.descricao, filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria
                            ORDER BY filtro_recomendacaopc.preco ASC;"; // Adicionando ORDER BY
                    break;
                default:
                    return false;
            }
        
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                // Aqui você poderia registrar o erro em um arquivo de log
                error_log("Erro na consulta: " . $e->getMessage());
                return false;
            }
        }
        $Filtros = MostrarFiltro($pdo, $Preco);
        if (AtualizarRequisitos($pdo, $Preco, $Marca, $Categoria)) {
            // echo "Registro atualizado com sucesso!";
        } else {
            // echo "Erro ao atualizar o registro.";
        }
    }
    ?>

    <?php
    function RegistrarBuild() {
        //$sql = "INSERT INTO "
    }

    if (isset($Filtros) && $Filtros) {
        foreach ($Filtros as $Filtro) { ?>
            <ul class="Registro">
                <li><?php echo $Filtro['descricao']; ?></li>
                <li><?php echo $Filtro['preco']; ?></li>
                <li><?php echo $Filtro['marca']; ?></li>
                <li><?php echo $Filtro['categoria']; ?></li>
            </ul>
        <?php }
    }
    ?>
</body>
</html>