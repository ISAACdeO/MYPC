<?php
require('Conector.php');
$pdo = Conexao::Conecta();

function VerBuild($pdo){
    $sql = "SELECT * FROM build_pessoal;";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloPainel.css">
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



    <div id="builds" class="builds">
        
        <h2>Minhas Builds</h2>

        <div class="build-list">
            <?php
   $Builds = VerBuild($pdo);
   foreach($Builds as $Build){
            echo "<div class='build'>";
            echo "<h3>Build</h3>";
                echo "<ul>";
                echo "<li>" .  $Build['gabinete'] . "</li>";
                echo "<li>" .  $Build['ram'] . "</li>";
                echo "<li>" .  $Build['placa_mae'] . "</li>";
                echo "<li>" .  $Build['placa_video'] . "</li>";
                echo "<li>" .  $Build['fonte'] . "</li>";
                /*echo "<li>" . $Build['placa_rede'] . "</li>";*/
                echo "<li>" . $Build['processador'] . "</li>";
                echo "<li>" . $Build['hd'] . "</li>";
                echo "<li>" . $Build['ssd'] . "</li>";
                echo "<button id='botao1'><a href='AlteradorDeBild.php?IdPessoal=" . $Build['IdPessoal'] . "'>Alterar</a></button>";
                    echo "<p><span class='tooltip'>?";
                    echo    "<span class='tooltiptext'>Aqui você pode ver todas as builds que já montou.</span>";
                    echo "</span></p>";
               echo "</ul>";
            echo "</div>";
            }
            ?>
        </div>
    </div>

   
    </head>

    <body>


        <footer>
            <p>&copy; MYPC. Todos os direitos reservados.</p>
        </footer>

    </body>

</html>