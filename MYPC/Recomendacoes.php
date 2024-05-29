<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Recomendacoes.css">
</head>
<body style="background-color:purple;border:black solid 0.5em;display: flex;flex-direction: column;align-items: center; color:white; height:59.1em;justify-content:center;paddin:0;margin:0">
    <?php

    require('Conector.php');
    $pdo = Conexao::Conecta();


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
    /*function InserirChaves($pdo){
        $sql = "SET SQL_SAFE_UPDATES = 0;
        update FILTRO_RECOMENDACAOPC set idRecomendacoes = idRecomendacoes + 1 WHERE idRecomendacoes < 1;
        SET SQL_SAFE_UPDATES = 1;";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
        }*/
    function MostrarFiltro($pdo){
        if($Preco = 'Baixo'){
        $sql = "SELECT filtro_recomendacaopc.descricao ,filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria FROM Recomendacoes join filtro_recomendacaopc using(idRecomendacoes) where filtro_recomendacaopc.preco <= 3000 and filtro_recomendacaopc.marca = Recomendacoes.marca and filtro_recomendacaopc.categoria = Recomendacoes.categoria GROUP BY filtro_recomendacaopc.descricao;";
        }
        elseif($Preco = 'Medio'){
            $sql = "SELECT filtro_recomendacaopc.descricao ,filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria FROM Recomendacoes join filtro_recomendacaopc using(idRecomendacoes) where filtro_recomendacaopc.preco BETWEEN 3001 and 4999 and filtro_recomendacaopc.marca = Recomendacoes.marca and filtro_recomendacaopc.categoria = Recomendacoes.categoria GROUP BY filtro_recomendacaopc.descricao;";
        }
        elseif($Preco = 'Alto')
        {
            $sql = "SELECT filtro_recomendacaopc.descricao ,filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria FROM Recomendacoes join filtro_recomendacaopc using(idRecomendacoes) where filtro_recomendacaopc.preco >= 5000 and filtro_recomendacaopc.marca = Recomendacoes.marca and filtro_recomendacaopc.categoria = Recomendacoes.categoria GROUP BY filtro_recomendacaopc.descricao;";
        }
        else{

        }
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    $Filtros = MostrarFiltro($pdo);
    if(AtualizarRequisitos($pdo, $Preco, $Marca, $Categoria)){
        //echo "Registro atualizado com sucesso!";
    } else {
        //echo "Erro ao atualizar o registro.";
    }
    /*if(InserirChaves($pdo)){
    //echo "Deu certo";
    }*/





    /*function InserirBild($pdo){
        $sql = "INSERT INTO Placa_Mae (Socket, TipoDeRam, QuantidadeMaximaDeRam, ConectoresTraseiros, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('LGA1200', 'DDR4', 64, 'USB 3.0, HDMI, DisplayPort', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AM4', 'DDR4', 32, 'USB 3.1, HDMI, DisplayPort', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('LGA1151', 'DDR3', 16, 'USB 2.0, VGA, DVI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AM4', 'DDR4', 64, 'USB 3.1, HDMI, DisplayPort', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('LGA1200', 'DDR4', 32, 'USB 3.0, HDMI, DisplayPort', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('AM4', 'DDR4', 16, 'USB 3.1, HDMI, DisplayPort', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('LGA1151', 'DDR4', 64, 'USB 2.0, VGA, DVI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1);

-- Exemplos de dados na tabela Processador
INSERT INTO Processador (Marca, ModeloP, Nucleos, Threads, Frequencia, Cache, Socket, Tipo, Finalidade, Orcamento, Id_Requisitos)
VALUES 
    ('AMD', 'Ryzen 5 3600', 6, 12, '3.6 GHz', '35MB', 'AM4', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Intel', 'Core i5-11600K', 6, 12, '3.9 GHz', '12MB', 'LGA 1200', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AMD', 'Ryzen 7 5800X', 8, 16, '3.8 GHz', '36MB', 'AM4', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Cooler
INSERT INTO Cooler (Refrigeracao, Marca, ModeloC, Material, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Ar', 'Cooler Master', 'Hyper 212 RGB', 'Alumínio', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Líquido', 'Corsair', 'H100i RGB Platinum', 'Alumínio', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Ar', 'Noctua', 'NH-D15', 'Alumínio', 'Descktop/PC', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);
    
    insert into sockets_de_cooler (Socket)
    values
    ('LGA1115'),
    ('AM4'),
    ('LGA1200');
    
    insert into lista_sockets_cooler(cooler_Id_Cooler,Sockets_De_Cooler_Id_Sockets_De_Cooler)
    values
    ('1','1'),
    ('1','2'),
    ('1','3'),
    ('2','1'),
    ('2','2'),
    ('2','3'),
    ('3','1'),
    ('3','2'),
    ('3','3');

-- Exemplos de dados na tabela Memoria_RAM
INSERT INTO Memoria_RAM (MarcaR, Capacidade, TipoDEDDR, Frequencia, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Corsair', '16GB', 'DDR4', '3200 MHz', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Crucial', '8GB', 'DDR4', '2666 MHz', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('G.Skill', '32GB', 'DDR4', '3600 MHz', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Placa_de_Video
INSERT INTO Placa_de_Video (Marca, ModeloV, VRAM, Clock_Grafico, Conectores, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Nvidia', 'RTX 3060', '6GB GDDR6', '1777 MHz', 'DisplayPort, HDMI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AMD', 'RX 6700 XT', '12GB GDDR6', '2424 MHz', 'DisplayPort, HDMI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Nvidia', 'GTX 1650 Super', '4GB GDDR6', '1725 MHz', 'DisplayPort, HDMI', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Placa_de_Rede
INSERT INTO Placa_de_Rede (Marca, ModeloR, Tecnologia, Velocidade, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('TP-Link', 'Archer T9E', 'Wi-Fi 5 (802.11ac)', '1300 Mbps', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Asus', 'PCE-AC88', 'Wi-Fi 5 (802.11ac)', '2167 Mbps', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Intel', 'Ethernet I210-T1', 'Ethernet', '1 Gbps', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Fonte
INSERT INTO Fonte (Marca, ModeloF, Potencia, Eficiencia, Certificado, Modularidade, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Corsair', 'RM750x', '750W', '80 Plus Gold', 'Gold', 'Totalmente Modular', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('EVGA', 'SuperNOVA 650 G5', '650W', '80 Plus Gold', 'Gold', 'Totalmente Modular', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Seasonic', 'Focus GX-850', '850W', '80 Plus Gold', 'Gold', 'Totalmente Modular', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Gabinete
INSERT INTO Gabinete (Marca, ModeloG, Estilo, Tamanho, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Corsair', 'Crystal 570X RGB', 'Torre Média', 'ATX', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('NZXT', 'H510', 'Torre Média', 'ATX', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Cooler Master', 'MasterBox MB511', 'Torre Média', 'ATX', 'Descktop/PC', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('Phanteks', 'Eclipse P300', 'Mini Torre', 'Micro ATX', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('Fractal Design', 'Meshify C', 'Torre Média', 'ATX', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);
        
        INSERT INTO configuracao_sugerida (Id_Processador, Id_Cooler, Id_MemoriaRAM, Id_PlacaDeVideo, Id_PlacaDeRede, Id_Fonte, Id_Gabinete, id_Requisitos, Id_PlacaMae)
        SELECT DISTINCT
            Processador.id_Processador,
            Cooler.Id_Cooler,
            Memoria_RAM.Id_MemoriaRAM,
            Placa_De_Video.Id_PlacaDeVideo,
            Placa_De_Rede.Id_PlacaDeRede,
            Fonte.Id_Fonte,
            Gabinete.Id_Gabinete,
            Requisitos.id_Requisitos,
            Placa_Mae.Id_Mae
        FROM
        Requisitos
        join placa_mae using(id_Requisitos)
        join processador using(id_Requisitos)
        join cooler using(id_Requisitos)
        join Memoria_RAM using(id_Requisitos)
        join Placa_De_Video using(id_Requisitos)
        join Placa_De_Rede using(id_Requisitos)
        join Fonte using(id_Requisitos)
        join Gabinete using(id_Requisitos)
        join lista_sockets_cooler on (Cooler.Id_Cooler = lista_sockets_cooler.cooler_Id_Cooler)
        join sockets_de_cooler on (sockets_de_cooler.Id_Sockets_De_Cooler = lista_sockets_cooler.cooler_Id_Cooler)
        where
        Requisitos.Id_Requisitos = 1 and
        placa_mae.Tipo = Requisitos.tipo and Placa_Mae.Finalidade = Requisitos.Finalidade and Placa_Mae.Orcamento = Requisitos.Orcamento and
        Processador.Tipo = Requisitos.tipo and Processador.Finalidade = Requisitos.Finalidade and Processador.Orcamento = Requisitos.Orcamento and
            Cooler.Tipo = Requisitos.tipo and Cooler.Finalidade = Requisitos.Finalidade and Cooler.Orcamento = Requisitos.Orcamento and
        Memoria_RAM.Tipo = Requisitos.tipo and Memoria_RAM.Finalidade = Requisitos.Finalidade and Memoria_RAM.Orcamento = Requisitos.Orcamento and
        Placa_De_Video.Tipo = Requisitos.tipo and Placa_De_Video.Finalidade = Requisitos.Finalidade and Placa_De_Video.Orcamento = Requisitos.Orcamento and
        Placa_De_Rede.Tipo = Requisitos.tipo and Placa_De_Rede.Finalidade = Requisitos.Finalidade and Placa_De_Rede.Orcamento = Requisitos.Orcamento and
        Fonte.Tipo = Requisitos.tipo and Fonte.Finalidade = Requisitos.Finalidade and Fonte.Orcamento = Requisitos.Orcamento and
        Gabinete.Tipo = Requisitos.tipo and Gabinete.Finalidade = Requisitos.Finalidade and Gabinete.Orcamento = Requisitos.Orcamento and
        Placa_Mae.Socket = Processador.Socket and
        sockets_de_cooler.Socket = Placa_Mae.Socket or sockets_de_cooler.Socket = Placa_Mae.Socket or sockets_de_cooler.Socket = Placa_Mae.Socket and
        memoria_ram.TipoDeDDR = placa_mae.TipoDeRam /*and
        placa_de_video.
        placa_de_rede
        fonte
        gabinete
        limit 10;";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute();
    }
    if(InserirBild($pdo)){
        //echo "Registrado!";
    }
}
function ListarComputadores($pdo){
    $sql = "SELECT DISTINCT
    Placa_Mae.Socket,
    Processador.ModeloP,
    Cooler.ModeloC,
    Memoria_RAM.MarcaR,
    Placa_De_Video.ModeloV,
    Placa_De_Rede.ModeloR,
    Fonte.ModeloF,
    Gabinete.ModeloG,
    Configuracao_Sugerida.Id_Configuracao_Sugerida
FROM
Requisitos
join Configuracao_Sugerida using(id_Requisitos)
join placa_mae using(id_Requisitos)
join processador using(id_Requisitos)
join cooler using(id_Requisitos)
join Memoria_RAM using(id_Requisitos)
join Placa_De_Video using(id_Requisitos)
join Placa_De_Rede using(id_Requisitos)
join Fonte using(id_Requisitos)
join Gabinete using(id_Requisitos)
join lista_sockets_cooler on (Cooler.Id_Cooler = lista_sockets_cooler.cooler_Id_Cooler)
join sockets_de_cooler on (sockets_de_cooler.Id_Sockets_De_Cooler = lista_sockets_cooler.cooler_Id_Cooler)
where
Requisitos.Id_Requisitos = 1 and
placa_mae.Tipo = Requisitos.tipo and Placa_Mae.Finalidade = Requisitos.Finalidade and Placa_Mae.Orcamento = Requisitos.Orcamento and
Processador.Tipo = Requisitos.tipo and Processador.Finalidade = Requisitos.Finalidade and Processador.Orcamento = Requisitos.Orcamento and
    Cooler.Tipo = Requisitos.tipo and Cooler.Finalidade = Requisitos.Finalidade and Cooler.Orcamento = Requisitos.Orcamento and
Memoria_RAM.Tipo = Requisitos.tipo and Memoria_RAM.Finalidade = Requisitos.Finalidade and Memoria_RAM.Orcamento = Requisitos.Orcamento and
Placa_De_Video.Tipo = Requisitos.tipo and Placa_De_Video.Finalidade = Requisitos.Finalidade and Placa_De_Video.Orcamento = Requisitos.Orcamento and
Placa_De_Rede.Tipo = Requisitos.tipo and Placa_De_Rede.Finalidade = Requisitos.Finalidade and Placa_De_Rede.Orcamento = Requisitos.Orcamento and
Fonte.Tipo = Requisitos.tipo and Fonte.Finalidade = Requisitos.Finalidade and Fonte.Orcamento = Requisitos.Orcamento and
Gabinete.Tipo = Requisitos.tipo and Gabinete.Finalidade = Requisitos.Finalidade and Gabinete.Orcamento = Requisitos.Orcamento and
Placa_Mae.Socket = Processador.Socket and
sockets_de_cooler.Socket = Placa_Mae.Socket or sockets_de_cooler.Socket = Placa_Mae.Socket or sockets_de_cooler.Socket = Placa_Mae.Socket and
memoria_ram.TipoDeDDR = placa_mae.TipoDeRam 
    limit 3";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
*/  } /*
    $Computadores = ListarComputadores($pdo);
        foreach($Computadores as $Computadores){
            echo "<ul>";
            echo "<li>" . $Computadores['Socket'] . "</li>";
            echo "<li>" . $Computadores['ModeloP'] . "</li>";
            echo "<li>" . $Computadores['ModeloC'] . "</li>";
            echo "<li>" . $Computadores['MarcaR'] . "</li>";
            echo "<li>" . $Computadores['ModeloV'] . "</li>";
            echo "<li>" . $Computadores['ModeloR'] . "</li>";
            echo "<li>" . $Computadores['ModeloF'] . "</li>";
            echo "<li>" . $Computadores['ModeloG'] . "</li>";
            echo "<a href = 'AlteradorDeBild.php?Id_Configuracao_Sugerida=" . $Computadores['Id_Configuracao_Sugerida'] . "'>Alterar Bild<a>";
            echo "</ul>";
        }*/
    ?>

<?php foreach ($Filtros as $Filtro) { ?>
            <ul>
                <li><?php echo $Filtro['descricao'];?></li>
                <li><?php echo $Filtro['preco']; ?></li>
                <li><?php echo $Filtro['marca']; ?></li>
                <li><?php echo $Filtro['categoria']; ?></li>
            </ul>
        <?php } ?>
</body>
</html>