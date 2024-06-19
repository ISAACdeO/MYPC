<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParaJogar</title>
    <link rel="stylesheet" href="Gabinete.css">
</head>
<body>
    <header>
        <div class="conteiner-1">
            <h1>Gabinete</h1>
            <h2>Aqui você encontra os melhores Gabinetes e seu site para comprar!</h2>
        </div>
    </header>

    <?php
    include_once('../Conexao.php'); 

    // Consulta SQL para filtragem de dados 
    $sql = "SELECT preco, marca, descricao, link FROM Filtro_Gabinete";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Iniciar a tabela HTML com classe para estilização
        echo '<div class="horizontal-table">';
        echo '<table>';

        // Cabeçalho da tabela
        echo '<tr>';
        echo '<th>Preço</th>';
        echo '<th>Marca</th>';
        echo '<th>Descrição</th>';
        echo '<th>Link</th>';
        echo '</tr>';

        // Linha de dados da tabela / adiciona as linhas de dados
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row["preco"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["marca"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["descricao"]) . '</td>';
            echo '<td><a href="' . htmlspecialchars($row["link"]) . '" target="_blank">Ver Produto</a></td>';
            echo '</tr>';
        }

        // Fechar a tabela HTML
        echo '</table>';
        echo '</div>';
    } else {
        echo "Nenhum resultado encontrado.";
    }

    // Fechar a conexão
    $conn->close();
    ?>
</body>
</html>
