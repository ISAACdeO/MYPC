SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE database BDComputadores;
-- -----------------------------------------------------
-- Schema bdsqlcomputadores
-- -----------------------------------------------------
USE BDComputadores;

-- -----------------------------------------------------
-- Table `mydb`.`Requisitos`
-- -----------------------------------------------------
CREATE TABLE `Requisitos` (
  `id_Requisitos` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Requisitos`))
ENGINE = InnoDB;

--------------------------------------------------------------



-- -----------------------------------------------------
-- Table `mydb`.`Filtros`
-- -----------------------------------------------------

CREATE TABLE `Filtros` (
  `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Preco` INT NOT NULL,
  `Marca` VARCHAR(80) NOT NULL,
  `TipoComponente` VARCHAR(45) NOT NULL,
  `Tiposocket_PlacaMae` VARCHAR(25) NOT NULL,
  `TipoDeSocket_Processador` VARCHAR(15) NOT NULL,
  `TipoDeMemoria` VARCHAR(45) NOT NULL,
  `TipoDePlacaDeVideo` VARCHAR(45) NOT NULL,
  `TipoDePlacaDeRede` VARCHAR(45) NOT NULL,
  `SerieRtx` VARCHAR(100) NOT NULL,
  `SerieAMD` VARCHAR(80) NOT NULL,
  `TipoDeCooler` VARCHAR(45) NOT NULL,
  `PotenciaDeFonte` VARCHAR(45) NOT NULL,
  `TipoDoGabinete` VARCHAR(45) NOT NULL,
  `EspacoInternoDoGabinete` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE = InnoDB;
INSERT INTO Filtros (Preco, Marca, TipoComponente, Tiposocket_PlacaMae, TipoDeSocket_Processador, TipoDeMemoria, TipoDePlacaDeVideo, TipoDePlacaDeRede, SerieRtx, SerieAMD, TipoDeCooler, PotenciaDeFonte, TipoDoGabinete, EspacoInternoDoGabinete) 
VALUES 
(2500, 'Corsair', 'Placa de Vídeo', 'PCI Express 4.0', 'AM4', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'RTX 3090', 'Ryzen 5000', 'Air Cooler', '650W', 'Torre Média', 'ATX'),
(5500, 'MSI', 'Placa de Vídeo', 'PCI Express 4.0', 'AM4', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'RTX 3090', 'Ryzen 5000', 'Water Cooler', '650W', 'Torre Média', 'ATX'),
(2500, 'Gigabyte', 'Placa de Vídeo', 'PCI Express 4.0', 'LGA 1200', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'RX580', 'i7', 'Air Cooler', '650W', 'Torre Média', 'ATX'),
(3800, 'Crucial', 'Placa de Vídeo', 'PCI Express 4.0', 'AM4', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'GTX 1660', 'Ryzen 5000', 'Air Cooler', '650W', 'Torre Média', 'ATX'),
(7200, 'Asus', 'Placa de Vídeo', 'PCI Express 4.0', 'LGA 1200', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'RX580', 'i9', 'Air Cooler', '650W', 'Torre Média', 'ATX'),
(4800, 'Cooler Master', 'Placa de Vídeo', 'PCI Express 4.0', 'AM4', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'RTX 4090', 'Ryzen 5', 'Air Cooler', '650W', 'Torre Média', 'ATX'),
(2500, 'NZXT', 'Placa de Vídeo', 'PCI Express 4.0', 'AM4', 'DDR6', 'RTX 3060', 'Ethernet Gigabit', 'RTX 30xx', 'Ryzen 3', 'Water Cooler', '650W', 'Torre Média', 'ATX');



-- -----------------------------------------------------
-- Table `mydb`.`Placa_Mae`
-- -----------------------------------------------------

CREATE TABLE `Placa_Mae` (
  `Id_Mae` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Socket` VARCHAR(45) NOT NULL,
  `TipoDeRam` VARCHAR(45) NOT NULL,
  `QuantidadeMaximaDeRam` INT UNSIGNED NOT NULL,
  `ConectoresTraseiros` VARCHAR(200) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_Mae`),
    FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Configuracao_Sugerida`
-- -----------------------------------------------------


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Processador`
-- -----------------------------------------------------

CREATE TABLE `processador` (
  `Id_Processador` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Marca` VARCHAR(50) NOT NULL,
  `ModeloP` VARCHAR(50) NOT NULL,
  `Nucleos` INT UNSIGNED NOT NULL,
  `Threads` INT UNSIGNED NOT NULL,
  `Frequencia` VARCHAR(20) NOT NULL,
  `Cache` VARCHAR(20) NOT NULL,
  `Socket` VARCHAR(45) NOT NULL,
   `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_Processador`),
    FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Cooler`
-- -----------------------------------------------------
CREATE TABLE `cooler` (
  `Id_Cooler` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Refrigeracao` VARCHAR(50) NOT NULL,
  `Marca` VARCHAR(50) NOT NULL,
  `ModeloC` VARCHAR(50) NOT NULL,
  `Material` VARCHAR(50) NOT NULL,
    `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_Cooler`),
    FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;


CREATE TABLE `Sockets_De_Cooler` (
  `Id_Sockets_De_Cooler` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Socket` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_Sockets_De_Cooler`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Memoria_RAM`
-- -----------------------------------------------------
CREATE TABLE `memoria_ram` (
  `Id_MemoriaRam` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `MarcaR` VARCHAR(50) NOT NULL,
  `Capacidade` VARCHAR(20) NOT NULL,
  `TipoDeDDR` VARCHAR(20) NOT NULL,
  `Frequencia` VARCHAR(20) NOT NULL,
    `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_MemoriaRam`),
    FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Placa_de_Video`
-- -----------------------------------------------------
CREATE TABLE `placa_de_video` (
  `Id_PlacaDeVideo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Marca` VARCHAR(50) NOT NULL,
  `ModeloV` VARCHAR(50) NOT NULL,
  `VRAM` VARCHAR(20) NOT NULL,
  `Clock_Grafico` VARCHAR(20) NOT NULL,
  `Conectores` VARCHAR(50) NOT NULL,
    `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_PlacaDeVideo`),
    FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Placa_de_Rede`
-- -----------------------------------------------------
CREATE TABLE `placa_de_rede` (
  `Id_PlacaDeRede` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Marca` VARCHAR(50) NOT NULL,
  `ModeloR` VARCHAR(50) NOT NULL,
  `Tecnologia` VARCHAR(50) NOT NULL,
  `Velocidade` VARCHAR(20) NOT NULL,
    `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_PlacaDeRede`),
    FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Fonte`
-- -----------------------------------------------------
CREATE TABLE `fonte` (
  `Id_Fonte` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Marca` VARCHAR(50) NOT NULL,
  `ModeloF` VARCHAR(50) NOT NULL,
  `Potencia` VARCHAR(20) NOT NULL,
  `Eficiencia` VARCHAR(20) NOT NULL,
  `Certificado` VARCHAR(20) NOT NULL,
  `Modularidade` VARCHAR(20) NOT NULL,
    `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_Fonte`),
  FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Gabinete`
-- -----------------------------------------------------
CREATE TABLE `gabinete` (
  `Id_Gabinete` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Marca` VARCHAR(50) NOT NULL,
  `ModeloG` VARCHAR(50) NOT NULL,
  `Estilo` VARCHAR(20) NOT NULL,
  `Tamanho` VARCHAR(20) NOT NULL,
    `Tipo` VARCHAR(45) NOT NULL,
  `Finalidade` VARCHAR(100) NOT NULL,
  `Orcamento` varchar(100) NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_Gabinete`),
  FOREIGN KEY (`id_Requisitos`)
    REFERENCES `requisitos` (`id_Requisitos`))
ENGINE = InnoDB;

CREATE TABLE `Lista_Sockets_Cooler` (
  `cooler_Id_Cooler` INT UNSIGNED NOT NULL,
  `Sockets_De_Cooler_Id_Sockets_De_Cooler` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cooler_Id_Cooler`, `Sockets_De_Cooler_Id_Sockets_De_Cooler`),
  INDEX `fk_cooler_has_Sockets_De_Cooler_Sockets_De_Cooler1_idx` (`Sockets_De_Cooler_Id_Sockets_De_Cooler` ASC) VISIBLE,
  INDEX `fk_cooler_has_Sockets_De_Cooler_cooler1_idx` (`cooler_Id_Cooler` ASC) VISIBLE,
  CONSTRAINT `fk_cooler_has_Sockets_De_Cooler_cooler1`
    FOREIGN KEY (`cooler_Id_Cooler`)
    REFERENCES `cooler` (`Id_Cooler`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cooler_has_Sockets_De_Cooler_Sockets_De_Cooler1`
    FOREIGN KEY (`Sockets_De_Cooler_Id_Sockets_De_Cooler`)
    REFERENCES `Sockets_De_Cooler` (`Id_Sockets_De_Cooler`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

-- -----------------------------------------------------
-- Table `DBsqlComputadores`.`Configuracao_Sugerida`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `Configuracao_Sugerida` (
  `Id_Configuracao_Sugerida` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_Processador` INT UNSIGNED NOT NULL,
  `Id_Cooler` INT UNSIGNED NOT NULL,
  `Id_MemoriaRAM` INT UNSIGNED NOT NULL,
  `Id_PlacaDeVideo` INT UNSIGNED NOT NULL,
  `Id_PlacaDeRede` INT UNSIGNED NOT NULL,
  `Id_Fonte` INT UNSIGNED NOT NULL,
  `Id_Gabinete` INT UNSIGNED NOT NULL,
  `id_Requisitos` INT UNSIGNED NOT NULL,
  `Id_PlacaMae` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Id_Configuracao_Sugerida`),
  FOREIGN KEY (`id_Requisitos`) REFERENCES `Requisitos` (`id_Requisitos`),
  FOREIGN KEY (`Id_PlacaMae`) REFERENCES `Placa_Mae` (`Id_Mae`),
  FOREIGN KEY (`Id_Processador`) REFERENCES `Processador` (`Id_Processador`),
  FOREIGN KEY (`Id_Cooler`) REFERENCES `Cooler` (`Id_Cooler`),
  FOREIGN KEY (`Id_MemoriaRAM`) REFERENCES `Memoria_RAM` (`Id_MemoriaRam`),
  FOREIGN KEY (`Id_PlacaDeVideo`) REFERENCES `Placa_de_Video` (`Id_PlacaDeVideo`),
  FOREIGN KEY (`Id_PlacaDeRede`) REFERENCES `Placa_de_Rede` (`Id_PlacaDeRede`),
  FOREIGN KEY (`Id_Fonte`) REFERENCES `Fonte` (`Id_Fonte`),
  FOREIGN KEY (`Id_Gabinete`) REFERENCES `Gabinete` (`Id_Gabinete`)
) ENGINE = InnoDB;


INSERT INTO Placa_Mae (Socket, TipoDeRam, QuantidadeMaximaDeRam, ConectoresTraseiros, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('LGA1200', 'DDR4', 64, 'USB 3.0, HDMI, DisplayPort', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AM4', 'DDR4', 32, 'USB 3.1, HDMI, DisplayPort', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('LGA1151', 'DDR3', 16, 'USB 2.0, VGA, DVI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AM4', 'DDR4', 64, 'USB 3.1, HDMI, DisplayPort', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('LGA1200', 'DDR4', 32, 'USB 3.0, HDMI, DisplayPort', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('AM4', 'DDR4', 16, 'USB 3.1, HDMI, DisplayPort', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('LGA1151', 'DDR4', 64, 'USB 2.0, VGA, DVI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1);

-- Exemplos de dados na tabela Processador
INSERT INTO Processador (Marca, Modelo, Nucleos, Threads, Frequencia, Cache, Socket, Tipo, Finalidade, Orcamento, Id_Requisitos)
VALUES 
    ('AMD', 'Ryzen 5 3600', 6, 12, '3.6 GHz', '35MB', 'AM4', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Intel', 'Core i5-11600K', 6, 12, '3.9 GHz', '12MB', 'LGA 1200', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AMD', 'Ryzen 7 5800X', 8, 16, '3.8 GHz', '36MB', 'AM4', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Cooler
INSERT INTO Cooler (Refrigeracao, Marca, Modelo, Material, Tipo, Finalidade, Orcamento, id_Requisitos)
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
INSERT INTO Memoria_RAM (Marca, Capacidade, TipoDEDDR, Frequencia, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Corsair', '16GB', 'DDR4', '3200 MHz', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Crucial', '8GB', 'DDR4', '2666 MHz', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('G.Skill', '32GB', 'DDR4', '3600 MHz', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Placa_de_Video
INSERT INTO Placa_de_Video (Marca, Modelo, VRAM, Clock_Grafico, Conectores, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Nvidia', 'RTX 3060', '6GB GDDR6', '1777 MHz', 'DisplayPort, HDMI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('AMD', 'RX 6700 XT', '12GB GDDR6', '2424 MHz', 'DisplayPort, HDMI', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Nvidia', 'GTX 1650 Super', '4GB GDDR6', '1725 MHz', 'DisplayPort, HDMI', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Placa_de_Rede
INSERT INTO Placa_de_Rede (Marca, Modelo, Tecnologia, Velocidade, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('TP-Link', 'Archer T9E', 'Wi-Fi 5 (802.11ac)', '1300 Mbps', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Asus', 'PCE-AC88', 'Wi-Fi 5 (802.11ac)', '2167 Mbps', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Intel', 'Ethernet I210-T1', 'Ethernet', '1 Gbps', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Fonte
INSERT INTO Fonte (Marca, Modelo, Potencia, Eficiencia, Certificado, Modularidade, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Corsair', 'RM750x', '750W', '80 Plus Gold', 'Gold', 'Totalmente Modular', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('EVGA', 'SuperNOVA 650 G5', '650W', '80 Plus Gold', 'Gold', 'Totalmente Modular', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Seasonic', 'Focus GX-850', '850W', '80 Plus Gold', 'Gold', 'Totalmente Modular', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

-- Exemplos de dados na tabela Gabinete
INSERT INTO Gabinete (Marca, Modelo, Estilo, Tamanho, Tipo, Finalidade, Orcamento, id_Requisitos)
VALUES 
    ('Corsair', 'Crystal 570X RGB', 'Torre Média', 'ATX', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('NZXT', 'H510', 'Torre Média', 'ATX', 'Descktop/PC', 'Trabalho Comum', 'R$1.500,00-R$3.000,00', 1),
    ('Cooler Master', 'MasterBox MB511', 'Torre Média', 'ATX', 'Descktop/PC', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('Phanteks', 'Eclipse P300', 'Mini Torre', 'Micro ATX', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1),
    ('Fractal Design', 'Meshify C', 'Torre Média', 'ATX', 'Noteboock/Laptop', 'entretenimento/ edição de vídeos/ modelagem em 3D', 'R$10.000,00+', 1);

    
    
INSERT INTO configuracao_sugerida (Id_Processador, Id_Cooler, Id_MemoriaRAM, Id_PlacaDeVideo, Id_PlacaDeRede, Id_Fonte, Id_Gabinete, id_Requisitos, Id_PlacaMae)
SELECT
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
gabinete*/
limit 10;

SELECT * FROM requisitos JOIN configuracao_sugerida USING(id_Requisitos);
/*delete from configuracao_sugerida;

SET SQL_SAFE_UPDATES=0;*/

/*drop database bdcomputadores;*/

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------