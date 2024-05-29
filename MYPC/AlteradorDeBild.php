<?php

require('Conector.php');
$pdo = Conexao::Conecta();
        if (isset($_GET["Id_Configuracao_Sugerida"])) {
            $id = $_GET["Id_Configuracao_Sugerida"];
        
            // Função para listar todos os registros do banco de dados
            function listarRegistros($pdo, $id) {
                $sql = "SELECT * FROM Configuracao_Sugerida WHERE Id_Configuracao_Sugerida = $id";
                $stmt = $pdo->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                // Listar registros
                $registros = listarRegistros($pdo, $id);
                foreach ($registros as $registro) {
                    if ($registro['Id_Configuracao_Sugerida'] == $id) {
                        $aux = true;
                    }
                }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $_POST["Id_Configuracao_Sugerida"];
            $Gabinete = $_POST["ModeloG"];
            $PlacaMae = $_POST["Socket"];
            $Processador = $_POST["ModeloP"];
            $MemoriaRam = $_POST["MarcaR"];
            $Cooler = $_POST["ModeloC"];
            MudarBild($pdo,$id,$Gabinete,$PlacaMae,$Processador,$Cooler);
        }

            function MudarBild($pdo,$id,$Gabinete,$PlacaMae,$Processador,$Cooler){
                $sql = "UPDATE configuracao_sugerida SET Id_Processador = :Processador, Id_Cooler = :Cooler, Id_MemoriaRAM = :MemoriaRam WHERE id_configuracao_sugerida = :Id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':Id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':Processador', $id, PDO::PARAM_INT);
                $stmt->bindParam(':Cooler', $id, PDO::PARAM_INT);
                $stmt->bindParam(':MemoriaRam', $id, PDO::PARAM_INT);
                return $stmt->execute();
            }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstiloAlterador.css">
    <title>Document</title>
</head>
<body>
<?php if (isset($aux)) : ?>
<span id="Algo">Alterar Bild</span>

<form action="RecomendacoesAtualizado.php" method="post" style="height:31.5em!important">
<input type="hidden" name="Id" value="<?php echo $registro['Id_Configuracao_Sugerida']; ?>">
    <h5>Gabinete</h5>
    <select name="Gabinete" value="<?php echo $registro['ModeloG'];?>">
        <?php
            $ListaGabinete = ListaGabinete($pdo);
        foreach($ListaGabinete as $Gabinetes){
            echo"<option>" . $Gabinetes['ModeloG'] . "</option>";
        }
        ?>
    </select>
    <h5>Placa-Mãe</h5>
    <select name="Mae" value="<?php echo $registro['Socket'];?>">
        <?php
    $ListaMae = ListaMae($pdo);
    foreach($ListaMae as $Sockets){
        echo"<option>" . $Sockets['Socket'] . "</option>";
    }
        ?>
    </select>
    <h5>Processador</h5>
    <select name="Processador" value="<?php echo $registro['Id_Processador'];?>">
    <?php
    $ListaProcessador = ListaProcessador($pdo);
    foreach($ListaProcessador as $Processadores){
        echo"<option>" . $Processadores['ModeloP'] . "</option>";
    }?>
    </select>
    <h5>RAM</h5>
    <select name="MemoriaRam" id="<?php echo $registro['Id_MemoriaRAM'];?>">
    <?php
    $ListaRam = ListaRam($pdo);
    foreach($ListaRam as $Rams){
        echo"<option>" . $Rams['MarcaR'] . "</option>";
    }?>
    </select>
    <h5>Placa de Vídeo</h5>
    <select name="" id="">
    <?php 
    function ListaPlacaDeVideo($pdo){
    $sql = "SELECT * FROM placa_de_video";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    $ComputadoresPV = ListaPlacaDeVideo($pdo);
    foreach($ComputadoresPV as $ComputadoresPV){
        echo"<option>" . $ComputadoresPV['ModeloV'] . "</option>";
    }
    ?>
    </select>
    <h5>Placa de Rede</h5>
    <select name="" id="">
    <?php
    function ListaRede($pdo){
            $sql = "SELECT * FROM placa_de_rede";
            $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    $ComputadoresPR = ListaRede($pdo);
    foreach($ComputadoresPR as $ComputadoresPR){
        echo"<option>" . $ComputadoresPR['ModeloR'] . "</option>";
    }
    ?>
    </select>
    <h5>Fonte</h5>
    <select name="" id="">
    <?php
    function ListaFonte($pdo){
            $sql = "SELECT * FROM Fonte";
            $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    $ComputadoresF = ListaFonte($pdo);
    foreach($ComputadoresF as $ComputadoresF){
        echo"<option>" . $ComputadoresF['ModeloF'] . "</option>";
    }
    ?>
    </select>
    <h5>HDD</h5>
    <select name="" id="">
        <?php
    /*function ListaMae($pdo){
            $sql = "SELECT * FROM placa_mae";
            $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    $Computadores = ListaMae($pdo);
    foreach($Computadores as $Computadores){
        echo"<option>" . $Computadores['Socket'] . "</option>";
    } */
    ?>
    </select>
    <h5>SSD</h5>
    <select name="" id="">
    <?php /*
    function ListaMae($pdo){
            $sql = "SELECT * FROM placa_mae";
            $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    $Computadores = ListaMae($pdo);
    foreach($Computadores as $Computadores){
        echo"<option>" . $Computadores['Socket'] . "</option>";
    }*/?>
    </select>
    <h5>Cooler</h5>
    <select name="Cooler" id="<?php echo $registro['Id_Cooler'];?>">
    <?php
    $ListaCooler = ListaCooler($pdo);
    foreach($ListaCooler as $Coolers){
        echo"<option>" . $Coolers['ModeloC'] . "</option>";
    }
    ?>
    </select>
    <ul>
    <li>
    <button type="submit">Atualizar</button>
    </li>
    </ul>
    </form>
    <?php else : ?>
    <?php endif; ?>

    <div id="chatWidget" class="collapsed">
        <div id="chatHeader">Ajuda Profissional <img src="seta2.png" alt="" id="seta"></div>
        <div id="chatBody" style="display: none;">
            <form id="contactForm">
                <input type="text" id="name" class="chatInput" placeholder="Nome">
                <input type="email" id="email" class="chatInput" placeholder="E-mail">
                <textarea id="reason" class="chatInput" placeholder="Motivo de contato"></textarea>
                <button type="submit" id="sendMessageButton" class="chatInput">Enviar</button>
            </form>
        </div>
    </div>
 
    <script src="script.js"></script>

</body>
</html>
<?php
function ListaGabinete($pdo){
    $sql = "SELECT * FROM Gabinete";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ListaMae($pdo){
    $sql = "SELECT * FROM placa_mae";
    $stmt = $pdo->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ListaProcessador($pdo){
    $sql = "SELECT * FROM Processador";
    $stmt = $pdo->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function ListaRam($pdo){
    $sql = "SELECT * FROM memoria_ram";
    $stmt = $pdo->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function ListaCooler($pdo){
    $sql = "SELECT * FROM Cooler";
    $stmt = $pdo->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>