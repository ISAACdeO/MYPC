<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Recomendacoes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
   $(document).ready(function() {
    $('.btn-enviar').click(function(e) {
        e.preventDefault();

        var UltraId = $(this).data('ultra-id'); 
        var formData = { UltraId: UltraId };

        $.ajax({
            type: 'POST',
            url: '<?php echo $_SERVER['PHP_SELF']; ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Build registrada com sucesso!');
                } else {
                    alert('Erro ao registrar a build.');
                }
            },
            error: function() {
                alert('Erro ao conectar com o servidor.');
            }
        });
    });
});

    </script>
</head>
<body style="background-color: #EAD0D0; display: flex;flex-direction: column;align-items: center; color:#000; height:59.1em;justify-content:center;paddin:0;margin:0">
    <?php
    require('Conector.php');
    $pdo = Conexao::Conecta();


//    var_dump ($_POST);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   /*     if (isset($_POST["acao"]) && $_POST["acao"] == "chamarRegistrador") {
            // Check for both acao and id parameters
            if (isset($_POST["acao"]) && isset($_POST["IdBildPronta"])) {
                $id = $_POST["IdBildPronta"]; // Capture the ID from the POST request
                // ... (process the captured ID)
                //echo "Id = " . $id;
            } else {
              //  echo "ID não encontrado";
                exit;
            }
            Mostrar();
            exit;
        } */
        
        $Preco = $_POST["Preco"];
        $Distribuidora = $_POST["Distribuidora"];
        $Categoria = $_POST["Categoria"];

        function AtualizarRequisitos($pdo, $Preco, $Distribuidora, $Categoria) {
            $sql = "UPDATE Recomendacoes SET Preco = :Preco, Marca = :Distribuidora, Categoria = :Categoria WHERE idRecomendacoes = 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':Preco', $Preco, PDO::PARAM_STR);
            $stmt->bindParam(':Distribuidora', $Distribuidora, PDO::PARAM_STR);
            $stmt->bindParam(':Categoria', $Categoria, PDO::PARAM_STR);
            return $stmt->execute();
        }

        function MostrarFiltro($pdo, $Preco) {
            switch ($Preco) {
                case 'Baixo':
                    $sql = "SELECT filtro_build.IdBildPronta, filtro_build.descricao, filtro_build.preco, filtro_build.distribuidora, filtro_build.categoria
                            FROM Recomendacoes
                            JOIN filtro_build USING(idRecomendacoes)
                            WHERE filtro_build.preco <= 3000
                              AND (filtro_build.distribuidora = Recomendacoes.marca OR Recomendacoes.marca = 'null')
                              AND filtro_build.categoria = Recomendacoes.categoria
                            GROUP BY filtro_build.descricao;";
                            $UltraId = ["IdBildPronta"];
                    break;
                case 'Medio':
                    $sql = "SELECT filtro_build.IdBildPronta, filtro_build.descricao, filtro_build.preco, filtro_build.distribuidora, filtro_build.categoria
                            FROM Recomendacoes
                            JOIN filtro_build USING(idRecomendacoes)
                            WHERE filtro_build.preco BETWEEN 3001 AND 4999
                              AND (filtro_build.distribuidora = Recomendacoes.marca OR Recomendacoes.marca = 'null')
                              AND filtro_build.categoria = Recomendacoes.categoria
                            GROUP BY filtro_build.descricao;";
                            $UltraId = ["IdBildPronta"];
                    break;
                case 'Alto':
                    $sql = "SELECT filtro_build.IdBildPronta, filtro_build.descricao, filtro_build.preco, filtro_build.distribuidora, filtro_build.categoria
                            FROM Recomendacoes
                            JOIN filtro_build USING(idRecomendacoes)
                            WHERE filtro_build.preco >= 5000
                              AND (filtro_build.distribuidora = Recomendacoes.marca OR Recomendacoes.marca = 'null')
                              AND filtro_build.categoria = Recomendacoes.categoria
                            GROUP BY filtro_build.descricao;";
                            $UltraId = ["IdBildPronta"];

                    break;
                default:
                    return false;
            }

            $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }

        $Filtros = MostrarFiltro($pdo, $Preco);
        if (AtualizarRequisitos($pdo, $Preco, $Distribuidora, $Categoria)) {
            // echo "Registro atualizado com sucesso!";
        } else {
            // echo "Erro ao atualizar o registro.";
        }
    }
    ?>

    <?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UltraId'])) {
    $UltraId = $_POST['UltraId'];

    $response = array();
    if (RegistrarBuild($pdo, $UltraId)) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

function RegistrarBuild($pdo, $UltraId) {
    $sql = "INSERT INTO build_pessoal (gabinete, ram, placa_mae, placa_video, fonte, processador, hd, ssd)
            SELECT gabinete, ram, placa_mae, placa_video, fonte, processador, hd, ssd 
            FROM filtro_build 
            WHERE IdBildPronta = :UltraId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':UltraId', $UltraId, PDO::PARAM_INT);

    return $stmt->execute();
}

    if (isset($Filtros) && $Filtros) {
        foreach ($Filtros as $Filtro) { ?>
            <ul class="Registro">
                <li style="display:none;"><?php echo $Filtro['IdBildPronta']; ?></li>
                <li><?php echo $Filtro['descricao']; ?></li>
                <li>R$<?php echo $Filtro['preco']; ?></li>
                <li><?php echo $Filtro['distribuidora']; ?></li>
                <li><?php echo $Filtro['categoria']; ?></li>
                <li><button class="btn-enviar" data-ultra-id="<?php echo $Filtro['IdBildPronta']; ?>">Enviar para as suas builds</button></li>
            </ul>
        <?php }
    }
    ?>
</body>
</html>