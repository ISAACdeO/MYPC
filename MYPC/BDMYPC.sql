create database BDMYPC;
/*drop database BDMYPC;*/
use BDMYPC;



CREATE TABLE Recomendacoes (
  `idRecomendacoes` INT UNSIGNED AUTO_INCREMENT not null,
  `Preco` varchar(50) NOT NULL,
  `Marca` VARCHAR(55) NOT NULL,
  `Categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRecomendacoes`))
ENGINE = InnoDB;


CREATE TABLE FILTRO_RECOMENDACAOPC (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT primary key,
  `preco` DECIMAL(10,2) NOT NULL,
  `marca` VARCHAR(55) NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(150) NOT NULL,
  `link` VARCHAR(600) NOT NULL,
  `idRecomendacoes` INT UNSIGNED NOT NULL,
foreign key (idRecomendacoes) references Recomendacoes(idRecomendacoes)) ENGINE = InnoDB;

/*drop table FILTRO_RECOMENDACAOPC;*/

CREATE TABLE FILTRO_BUILD (
  `IdBildPronta` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `preco` DECIMAL(10,2) NOT NULL,
  `distribuidora` VARCHAR(55) NOT NULL,
  `categoria` VARCHAR(55) NOT NULL,
  `descricao` VARCHAR(150) NOT NULL,
  `link` VARCHAR(650) NOT NULL,
  `idRecomendacoes` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`IdBildPronta`),
  INDEX `fk_filtro_build_recomendacoes_idx` (`idRecomendacoes` ASC) VISIBLE)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

insert into recomendacoes(Preco,Marca,Categoria) values(0.00,'dfvdf','asccdsa');

-- Placa de video
INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao, link,idRecomendacoes) 
VALUES 
(1567, 'NVIDIA', 'Placa de vídeo', 'RTX 3060 8GB preta', 'https://www.kabum.com.br/produto/180539/placa-de-video-rtx-3060-gaming-oc-gigabyte-geforce-12-gb-gddr6-lhr-ray-tracing-gv-n3060gaming-oc-12gd-rev-2-0',1),
(2499, 'MSI', 'Placa de vídeo', 'RTX 3060 Ti Ventus 2X 8GD6X OC', 'https://www.kabum.com.br/produto/473896/placa-de-video-rtx-3060-ti-ventus-2x-8gd6x-oc-msi-nvidia-geforce-8gb-gddr6x-g-sync-ray-tracing-256-bits-85423190',1),
(3899, 'Gigabyte', 'Placa de vídeo', 'RTX 3070 Eagle 8GB', 'https://www.kabum.com.br/produto/134851/placa-de-video-gigabyte-nvidia-geforce-rtx-3070-eagle-oc-8gb-gddr6-dlss-ray-tracing-gv-n3070eagle-oc-8gd',1),
(5999, 'ASUS', 'Placa de vídeo', 'RTX 3080 TUF Gaming 10GB', 'https://www.kabum.com.br/produto/117217/placa-de-video-asus-nvidia-geforce-rtx-3080-tuf-gaming-10gb-gddr6x-ray-tracing-dlss-90yv0fb1-m0na00',1),
(11999, 'ZOTAC', 'Placa de vídeo', 'RTX 3090 Trinity 24GB', 'https://www.kabum.com.br/produto/121139/placa-de-video-zotac-gaming-nvidia-geforce-rtx-3090-trinity-24gb-gddr6x-ray-tracing-zt-a30900d-10p',1),
(1499, 'Galax', 'Placa de vídeo', 'GTX 1660 Super 6GB', 'https://www.kabum.com.br/produto/111898/placa-de-video-galax-geforce-gtx-1660-super-ex-1-click-oc-6gb-gddr6-60srh7dsy91c',1),
(1299, 'Sapphire', 'Placa de vídeo', 'RX 580 Pulse 8GB', 'https://www.kabum.com.br/produto/86000/placa-de-video-sapphire-radeon-rx-580-pulse-8gb-gddr5-11265-05-20g',1),
(2199, 'ASRock', 'Placa de vídeo', 'RX 5700 XT Challenger D 8GB', 'https://www.kabum.com.br/produto/105002/placa-de-video-asrock-radeon-rx-5700-xt-challenger-d-8g-oc-90-ga1qzz-00uanf',1),
(899, 'EVGA', 'Placa de vídeo', 'GTX 1050 Ti SC Gaming 4GB', 'https://www.kabum.com.br/produto/84782/placa-de-video-evga-nvidia-geforce-gtx-1050-ti-sc-gaming-4gb-gddr5-04g-p4-6253-kr',1),
(3499, 'PowerColor', 'Placa de vídeo', 'RX 6700 XT Red Devil 12GB', 'https://www.kabum.com.br/produto/129604/placa-de-video-powercolor-radeon-rx-6700-xt-red-devil-12gb-gddr6-ray-tracing-axrx-6700xt-12gbd6-3dhe-oc',1);

-- Gabinete

INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao, link,idRecomendacoes) 
VALUES 
(329.90, 'Rise Mode', 'Gabinete', 'Gabinete Gamer Rise Mode Galaxy Glass Preto', 'https://www.kabum.com.br/produto/320908/gabinete-gamer-rise-mode-galaxy-glass-mid-tower-lateral-e-frontal-em-vidro-temperado-preto-rm-ga-gg-fb',1),
(299.90, 'Redragon', 'Gabinete', 'Gabinete Gamer Redragon Wideload Preto', 'https://www.kabum.com.br/produto/128550/gabinete-gamer-redragon-wideload-mid-tower-lateral-e-frontal-em-vidro-gc-802-1',1),
(379.90, 'XPG', 'Gabinete', 'Gabinete Gamer XPG Starker Air Preto', 'https://www.kabum.com.br/produto/389453/gabinete-gamer-xpg-starker-air-mid-tower-led-rgb-atx-lateral-em-vidro-temperado-2x-cooler-fan-rgb-preto-starkerair-bkcww',1),
(549.90, 'Cooler Master', 'Gabinete', 'Gabinete Gamer Cooler Master MasterBox MB520', 'https://www.kabum.com.br/produto/502252/gabinete-gamer-cooler-master-mid-tower-argb-m-atx-atx-mini-itx-masterbox-mb520-vidro-temperado-preto-mb520-kgnn-s01',1),
(449.90, 'Corsair', 'Gabinete', 'Gabinete Gamer Corsair 4000D Airflow Preto', 'https://www.kabum.com.br/produto/115451/gabinete-gamer-corsair-4000d-airflow-mid-tower-atx-lateral-em-vidro-temperado-com-fan-preto-cc-9011200-ww',1),
(289.90, 'Husky', 'Gabinete', 'Gabinete Gamer Husky Frost Mid Tower Preto', 'https://www.kabum.com.br/produto/114987/gabinete-gamer-husky-frost-mid-tower-argb-com-fan-porta-em-vidro-temperado-hgmc004',1),
(379.90, 'Aerocool', 'Gabinete', 'Gabinete Gamer Aerocool Aero One Frost Branco', 'https://www.kabum.com.br/produto/114988/gabinete-gamer-aerocool-aero-one-frost-mid-tower-argb-com-fan-porta-em-vidro-temperado-hgmc005',1),
(329.90, 'Thermaltake', 'Gabinete', 'Gabinete Gamer Thermaltake H200 TG RGB', 'https://www.kabum.com.br/produto/115452/gabinete-gamer-thermaltake-h200-tg-rgb-mid-tower-lateral-em-vidro-temperado-preto-ca-1m3-00m1wn-00',1),
(549.90, 'NZXT', 'Gabinete', 'Gabinete Gamer NZXT H510 Elite Branco', 'https://www.kabum.com.br/produto/502253/gabinete-gamer-nzxt-h510-elite-mid-tower-argb-atx-lateral-em-vidro-temperado-preto-1',1),
(499.90, 'Lian Li', 'Gabinete', 'Gabinete Gamer Lian Li Lancool II Mesh Performance', 'https://www.kabum.com.br/produto/115453/gabinete-gamer-lian-li-lancool-ii-mesh-performance-mid-tower-atx-lateral-em-vidro-temperado-com-fan-preto-lancool2m-x',1);

-- Memoria RAM
    INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao , link,idRecomendacoes) 
    VALUES 
    (189.90, 'Kingston', 'Memória RAM', 'Kingston Fury Beast 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/172365/memoria-ram-kingston-fury-beast-8gb-3200mhz-ddr4-cl16-preto-kf432c16bb-8',1),
    (199.90, 'Corsair', 'Memória RAM', 'Corsair Vengeance LPX 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/229176/memoria-ram-corsair-vengeance-lpx-8gb-3200mhz-ddr4-cl16-preta-cmk8gx4m1e3200c16',1),
    (179.90, 'XPG', 'Memória RAM', 'XPG Spectrix D50 RGB 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/156588/memoria-ram-xpg-spectrix-d50-rgb-8gb-3200mhz-ddr4-cl16-cinza-ax4u32008g16a-st50',1),
    (169.90, 'HyperX', 'Memória RAM', 'HyperX Fury 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/155676/memoria-hyperx-fury-8gb-3200mhz-ddr4-cl16-preto-hx432c16fb3-8',1),
    (159.90, 'Rise Mode', 'Memória RAM', 'Rise Mode Z 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/383892/memoria-ram-rise-mode-z-8gb-3200mhz-ddr4-cl16-preto-rm-d4-8g-3200z?gad_source=1',1),
    (189.90, 'XPG', 'Memória RAM', 'XPG Gammix D35 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/474939/memoria-ram-xpg-gammix-d35-8gb-3200mhz-ddr4-cl16-preto-ax4u32008g16a-sbkd35?gad_source=1',1),
    (179.90, 'HyperX', 'Memória RAM', 'HyperX Fury 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/217359/memoria-kingston-hyperx-fury-8gb-3200mhz-ddr4-cl16-preto-hx432c16fb3-8',1),
    (169.90, 'Kingston', 'Memória RAM', 'Kingston Fury Beast 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/313833/memoria-kingston-fury-beast-8gb-3200mhz-ddr4-cl16-preto-kf432c16bb-8',1),
    (179.90, 'HyperX', 'Memória RAM', 'HyperX Fury Impact 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/193299/memoria-ram-para-notebook-kingston-fury-impact-8gb-3200mhz-ddr4-cl20-kf432s20ib-8',1),
    (189.90, 'Kingston', 'Memória RAM', 'Kingston Fury Beast 8GB 3200MHz DDR4', 'https://www.kabum.com.br/produto/375492/memoria-kingston-hyperx-sodimm-8gb-3200mhz-ddr4-hx432s20ib2-8',1);
    
    -- Placa Mãe
    INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao, link,idRecomendacoes) 
    VALUES 
    (759.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B450M Steel Legend AMD AM4 mATX DDR4', 'https://www.kabum.com.br/produto/100672/placa-mae-asrock-b450m-steel-legend-amd-am4-matx-ddr4',1),
    (1099.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B660M Phantom Gaming 4 Intel LGA 1700 mATX DDR4', 'https://www.kabum.com.br/produto/495982/placa-mae-asrock-b660m-phantom-gaming-4-intel-lga-1700-matx-ddr4',1),
    (649.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock H510M-HVS Intel LGA 1200 mATX DDR4', 'https://www.kabum.com.br/produto/147943/placa-mae-asrock-h510m-hvs-intel-lga-1200-matx-ddr4',1),
    (1499.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock Z690 Phantom Gaming 4/D5 Intel LGA 1700 ATX DDR5', 'https://www.kabum.com.br/produto/386055/placa-mae-asrock-z690-phantom-gaming-4-d5-intel-lga-1700-atx-ddr5',1),
    (599.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B450M-HDV R4.0 AMD AM4 Micro ATX DDR4', 'https://www.kabum.com.br/produto/111107/placa-mae-asrock-b450m-hdv-r4-0-amd-am4-micro-atx-ddr4',1),
    (799.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B560M Pro4 Intel LGA 1200 Micro ATX DDR4', 'https://www.kabum.com.br/produto/140882/placa-mae-asrock-b560m-pro4-intel-lga-1200-micro-atx-ddr4',1),
    (819.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B450M Steel Legend AMD AM4 mATX DDR4', 'https://www.kabum.com.br/produto/133767/placa-mae-asrock-b450m-steel-legend-amd-am4-matx-ddr4',1),
    (699.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock H510M-HVS R2.0 Intel LGA 1200 mATX DDR4', 'https://www.kabum.com.br/produto/349090/placa-mae-asrock-h510m-hvs-r2-0-intel-lga-1200-matx-ddr4',1),
    (1099.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B550M Steel Legend AMD AM4 Micro ATX DDR4', 'https://www.kabum.com.br/produto/114850/placa-mae-asrock-b550m-steel-legend-amd-am4-micro-atx-ddr4',1),
    (1299.90, 'ASRock', 'Placa mãe', 'Placa Mãe ASRock B660M Pro4 Intel LGA 1700 mATX DDR4', 'https://www.kabum.com.br/produto/418732/placa-mae-asrock-b660m-pro4-intel-lga-1700-matx-ddr4',1);
    
    -- Fonte de PC
    INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao, link,idRecomendacoes) 
    VALUES 
    (94.99, 'TGT', 'Fonte', 'FONTE TGT TOMAHAWK 500W PRETO, TMWK500', 'https://www.pichau.com.br/fonte-tgt-tomahawk-500w-preto-tmwk500',1),
    (122.90, 'Fortrek', 'Fonte', 'Fonte ATX 500W Bivolt Crusader Fortrek', 'https://www.amazon.com.br/Fonte-500W-Bivolt-Crusader-Fortrek/dp/B0BBXCC713/ref=asc_df_B0BBXCC713/',1),
    (219.99, 'MANCER', 'Fonte', 'FONTE MANCER THUNDER 500W BRONZE 80 PLUS, MCR-THR500-BL01', 'https://www.pichau.com.br/fonte-mancer-thunder-500w-bronze-80-plus-mcr-thr500-bl01',1),
    (123.99, 'TGT', 'Fonte', 'FONTE TGT TOMAHAWK T3, 600W, PRETO, TGT-T2WK600-BK01', 'https://www.pichau.com.br/fonte-tgt-tomahawk-t3-600w-preto-tgt-t2wk600-bk01',1),
    (95.99, 'DUEX', 'Fonte', 'FONTE DUEX DX500 FSE BLACK EDITION, 500W, DX500FSE-BK', 'https://www.pichau.com.br/fonte-duex-dx500-fse-black-edition-500w-dx500fse-bk',1),
    (279.99, 'Corsair', 'Fonte', 'FONTE CORSAIR CV SERIES CV550 80 PLUS BRONZE 550W, CP-9020210-BR', 'https://www.pichau.com.br/fonte-corsair-cv-series-cv550-80-plus-bronze-550w-cp-9020210-br',1),
    (559.99, 'Corsair', 'Fonte', 'FONTE CORSAIR CV 750, 750W, 80 PLUS BRONZE, PRETO, CP-9020237-BR', 'https://www.pichau.com.br/fonte-corsair-cv-750-750w-80-plus-bronze-preto-cp-9020237-br',1),
    (379.99, 'Corsair', 'Fonte', 'FONTE CORSAIR CV SERIES CV650 80 PLUS BRONZE 650W, CP-9020236-BR', 'https://www.pichau.com.br/fonte-corsair-cv-series-cv650-80-plus-bronze-650w-cp-9020236-br',1),
    (189.99, 'Corsair', 'Fonte', 'FONTE GAMDIAS KRATOS E1-500W, RGB, GD-Z500ZZZ', 'https://www.pichau.com.br/fonte-gamdias-kratos-e1-500w-rgb-gd-z500zzz',1);
    
    --  Processadores
    INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao, link,idRecomendacoes) 
    VALUES 
    (1159.20, 'AMD', 'Processador', 'Processador AMD Ryzen 7 5700G, 3.8GHz (4.6GHz Max Turbo), AM4, Vídeo Integrado, 8 Núcleos', 'https://www.amazon.com.br/Processador-AMD-Ryzen-5700G-Stealth/dp/B091J3NYVF/ref=asc_df_B091J3NYVF/',1),
    (586.00, 'AMD', 'Processador', 'Processador AMD Ryzen 5 5500 100100000457BOX, Cerâmica cinza', 'https://www.amazon.com.br/Processador-AMD-Ryzen-5500-100100000457BOX/dp/B09VCJ171S/ref=asc_df_B09VCJ171S/',1),
    (449.99, 'AMD', 'Processador', 'PROCESSADOR AMD RYZEN 5 4500, 6-CORE, 12-THREADS, 3.6GHZ (4.1GHZ TURBO), CACHE 11MB, AM4, 100-100000644BOX', 'https://www.pichau.com.br/processador-amd-ryzen-5-4500-6-core-12-threads-3-6ghz-4-1ghz-turbo-cache-11mb-am4-100-100000644box',1),
    (524.99, 'Intel', 'Processador', 'PROCESSADOR INTEL CORE I5-10400F, 6-CORE, 12-THREADS, 2.9GHZ (4.3GHZ TURBO), CACHE 12MB, LGA1200, BX8070110400F-BR', 'https://www.pichau.com.br/processador-intel-core-i5-10400f-6-core-12-threads-2-9ghz-4-3ghz-turbo-cache-12mb-lga1200-bx8070110400f-br',1),
    (944.00, 'Intel', 'Processador', 'Processador Intel Core I5-12400F 2.5GHZ (Turbo 4.4GHZ) Cache 18MB 6 Núcleos 12 Threads 12ª Ger LGA 1700 BX8071512400F - Intel', 'https://www.amazon.com.br/Processador-Intel-I5-12400F-N%C3%BAcleos-BX8071512400F/dp/B09MDFH5HY/ref=asc_df_B09MDFH5HY/',1),
    (944.00, 'Intel', 'Processador', 'Processador Intel Core I5-12400F 2.5GHZ (Turbo 4.4GHZ) Cache 18MB 6 Núcleos 12 Threads 12ª Ger LGA 1700 BX8071512400F - Intel', 'https://www.amazon.com.br/Processador-Intel-I5-12400F-N%C3%BAcleos-BX8071512400F/dp/B09MDFH5HY/ref=asc_df_B09MDFH5HY/',1),
    (579.99, 'AMD', 'Processador', 'Processador AMD Ryzen 5 4600G, 3.7GHz (4.2GHz Max Turbo), Cache 11MB, AM4, Vídeo Integrado - 100-100000147BOX', 'https://www.kabum.com.br/produto/333145/processador-amd-ryzen-5-4600g-3-7ghz-4-2ghz-max-turbo-cache-11mb-am4-video-integrado-100-100000147box',1),
    (579.99, 'AMD', 'Processador', 'Processador AMD Ryzen 5 4600G, 3.7GHz (4.2GHz Max Turbo), Cache 11MB, AM4, Vídeo Integrado - 100-100000147BOX', 'https://www.kabum.com.br/produto/333145/processador-amd-ryzen-5-4600g-3-7ghz-4-2ghz-max-turbo-cache-11mb-am4-video-integrado-100-100000147box',1),
    (775.99, 'Intel', 'Processador', 'Processador Intel Core i5-12400F, 2.5GHz (4.4GHz Max Turbo), Cache 18MB, LGA 1700 - BX8071512400F', 'https://www.kabum.com.br/produto/283718/processador-intel-core-i5-12400f-2-5ghz-4-4ghz-max-turbo-cache-18mb-lga-1700-bx8071512400f',1),
    (4390.00, 'AMD', 'Processador', 'Processador AMD Ryzen 9 5900X, 3.7GHz (4.8GHz Max Turbo), Cache 70MB, 12 Núcleos, 24 Threads, AM4 - 100-100000061WOF', 'https://www.kabum.com.br/produto/129460/processador-amd-ryzen-9-5900x-3-7ghz-4-8ghz-max-turbo-cache-70mb-12-nucleos-24-threads-am4-100-100000061wof',1);
    
    --  HD e SSD
    INSERT INTO FILTRO_RECOMENDACAOPC (preco, marca, categoria, descricao, link,idRecomendacoes) 
    VALUES 
    (299.90, 'WD', 'SSD', 'SSD M.2 2280 WD SN750 BLACK 500GB NVME - WDS500G3XHC', 'https://www.amazon.com.br/500GB-Black-Dissipador-Leitura-Grava%C3%A7%C3%A3o/dp/B07MC2Q81D/ref=sr_1_2_sspa',1),
    (217.99, 'Kingston', 'SSD', 'HD SSD Kingston SA400S37 480GB', 'https://www.amazon.com.br/HD-SSD-KINGSTON-SA400S37-480GB/dp/B075BKXSCQ/ref=sr_1_4',1),
    (428.00, 'Kingston', 'SSD', 'SSD Kingston NV2 1TB NVMe M.2 2280 (Leitura até 3500MB/s e Gravação até 2100MB/s)', 'https://www.amazon.com.br/Kingston-Leitura-3500MB-Grava%C3%A7%C3%A3o-2100MB/dp/B0BBWH1R8H/ref=sr_1_7',1),
    (409.99, 'Crucial', 'SSD', 'SSD interno Crucial BX500 CT1000BX500SSD1, 3D NAND SATA de 2,5 polegadas, até 540 MB/s, 1 TB)', 'https://www.amazon.com.br/Ssd-Crucial-Sata-Bx500-Ct1000bx500ssd1/dp/B07YD579WM/ref=sr_1_16',1),
    (317.97, 'Seagate', 'HD', 'Hd 1tb Seagate Barracuda Interno 3.5 Sata3 (St1000dm010)', 'https://www.amazon.com.br/Interno-Seagate-Desktop-BarraCuda-interno/dp/B0767D1BZY/ref=sr_1_1',1),
    (235.00, 'Toshiba', 'HD', 'Toshiba Disco rígido para laptop SATA de 500 GB de 2,5 polegadas (5400 rpm, cache de 8 MB) MQ01ABD050, disco rígido mecânico', 'https://www.amazon.com.br/r%C3%ADgido-laptop-Toshiba-polegadas-MQ01ABD050/dp/B008RZLSWE/ref=sr_1_6',1),
    (180.00, 'Seagate', 'HD', 'Hd 1tb P/Desktop Seagate 3.5 Sata3 (ST1000VM002)', 'https://www.amazon.com.br/1tb-Desktop-Seagate-Sata3-ST1000VM002/dp/B07ZTSF6Z7/ref=sr_1_28',1),
    (399.99, 'Sandisk', 'SSD', 'HD SSD 1TB Sandisk SDSSDA-1T00-G26', 'https://www.amazon.com.br/HD-SSD-1TB-Sandisk-SDSSDA-1T00-G26/dp/B07D998212/ref=sr_1_27',1),
    (219.99, 'WD', 'SSD', 'HD SSD 480GB Sata3 WD Western Digital 2, 5 - WDS480G2G0A', 'https://www.amazon.com.br/WD-Green-2-5%C2%B4-480GB-Leituras/dp/B01M3POPK3/ref=sr_1_23',1),
    (299.00, 'PNY', 'SSD', 'SSD 500GB PNY CS1031, M.2 2280, PCIe 3x4 NVMe, Leitura 2200MB/s, Grav. 1200MB/s - M280CS1031-500-CL', 'https://www.amazon.com.br/PNY-CS1031-Leitura-2200MB-1200MB/dp/B0BQ325SGZ/ref=sr_1_29',1);



INSERT INTO FILTRO_BUILD (preco, distribuidora, categoria, descricao , link,idRecomendacoes) 
VALUES
(3.599, 'Pichau', 'Computador', 'Computador Pichau Home, AMD Ryzen 7 8700G 16GB DDR5 SSD 240GB' ,'https://www.pichau.com.br/computador-pichau-home-amd-ryzen-7-8700g-16gb-ddr5-ssd-240gb-46046',1),
(659.98, 'Pichau', 'Computador', 'Computador Pichau Home HM110, AMD A6-7480 8GB DDR3 HD 1TB' ,'https://www.pichau.com.br/computador-pichau-home-hm110-amd-a6-7480-8gb-ddr3-hd-1tb-31125',1),
(589.98, 'Pichau', 'Computador', 'Computador Pichau Home HM096, AMD A6-7480 8GB DDR3 SSD 240GB' ,'https://www.pichau.com.br/computador-pichau-home-hm096-amd-a6-7480-8gb-ddr3-ssd-240gb-37783',1),
(1999.00, 'Pichau', 'Computador', 'Computador Pichau Home AMD Ryzen 7 5700G 8GB DDR4 SSD 240GB' ,'https://www.pichau.com.br/computador-pichau-home-amd-ryzen-7-5700g-8gb-ddr4-ssd-240gb-35862',1),
(3.299, 'Pichau', 'Computador', 'Computador Pichau Home HM645 AMD Ryzen 5 8600G 16GB DDR5 SSD 1TB' ,'https://www.pichau.com.br/computador-pichau-home-hm645-amd-ryzen-5-8600g-16gb-ddr5-ssd-1tb-45270',1),
(819.00, 'INTEL', 'Computador', 'Computador Fácil Intel Core I5 3ª Geração 8GB SSD 240GB Windows 10 Preto' ,'https://www.kabum.com.br/produto/214915/computador-facil-intel-core-i5-3-geracao-8gb-ssd-240gb-windows-10-preto',1),
(774.50, 'INTEL', 'Computador', 'Computador Cpu Intel Core I5 8GB RAM SSD 480GB Windows 10' ,'https://www.kabum.com.br/produto/345331/computador-cpu-intel-core-i5-8gb-ram-ssd-480gb-windows-10',1),
(1800.00, 'INTEL', 'Computador', 'Computador Intel Core I5 8GB SSD 240GB Windows 10 Pro Preto' ,'https://www.kabum.com.br/produto/472165/computador-intel-core-i5-8gb-ssd-240gb-windows-10-pro-preto',1),
(666.79, 'INTEL', 'Computador', 'Computador Best Boy Slim Intel Core I5 6GB SSD 120 GB Windows 10' ,'https://www.kabum.com.br/produto/343066/computador-best-boy-slim-intel-core-i5-6gb-ssd-120-gb-windows-10',1),
(2979.98, 'Pichau', 'Computador', 'Computador Pichau Gamer Silenus AMD Ryzen 5 8600G 16GB DDR5 SSD 240GB' ,'https://www.pichau.com.br/computador-pichau-gamer-silenus-amd-ryzen-5-8600g-16gb-ddr5-ssd-240gb-47068',1);



INSERT INTO FILTRO_BUILD (preco, distribuidora, categoria, descricao , link,idRecomendacoes) 
VALUES 
(1199.00, 'Apple', 'Notebook', 'Apple MacBook Air (M2 - 2022) - 13.6 inches 256GB SSD 8GB RAM', 'https://www.apple.com/shop/buy-mac/macbook-air/13-inch',1),
(1099.99, 'HP', 'Notebook', 'HP Spectre x360 16 - Intel Core i7-1260P 16GB RAM 1TB SSD', 'https://www.hp.com/us-en/shop/pdp/hp-spectre-x360-laptop-16-f2013dx',1),
(999.99, 'Dell', 'Notebook', 'Dell XPS 17 - Intel Core i7 16GB RAM 512GB SSD', 'https://www.dell.com/en-us/shop/dell-laptops/xps-17/spd/xps-17-9720-laptop',1),
(1999.99, 'Razer', 'Notebook', 'Razer Blade 14 - AMD Ryzen 9 16GB RAM 1TB SSD', 'https://www.razer.com/gaming-laptops/razer-blade-14',1),
(849.99, 'HP', 'Notebook', 'HP Envy x360 15 - AMD Ryzen 7 8GB RAM 256GB SSD', 'https://www.hp.com/us-en/shop/pdp/hp-envy-x360-laptop-15-ee1090wm',1),
(1399.99, 'Samsung', 'Notebook', 'Samsung Galaxy Book3 Ultra - Intel Core i7 16GB RAM 512GB SSD', 'https://www.samsung.com/us/computing/galaxy-books/galaxy-book3-ultra',1),
(999.99, 'Asus', 'Notebook', 'Asus ZenBook 14 OLED - Intel Core i7 16GB RAM 512GB SSD', 'https://www.asus.com/us/Laptops/For-Home/Zenbook/Zenbook-14-OLED-UM3402/',1),
(1499.00, 'Microsoft', 'Notebook', 'Microsoft Surface Laptop 5 - Intel Core i7 16GB RAM 512GB SSD', 'https://www.microsoft.com/en-us/surface/devices/surface-laptop-5',1),
(1149.99, 'HP', 'Notebook', 'HP Dragonfly G4 - Intel Core i7-1365U vPro 16GB RAM 512GB SSD', 'https://www.hp.com/us-en/shop/pdp/hp-elite-dragonfly-g4-notebook-pc',1),
(1049.99, 'MSI', 'Notebook', 'MSI Katana 15 - Intel Core i7 16GB RAM 512GB SSD', 'https://us.msi.com/Laptop/Katana-15',1);




select * from FILTRO_RECOMENDACAOPC;









-- Para tela criar Build vai para a Tela Altera build

create table BUILD_PESSOAL (
/*IdPessoal int unsigned auto_increment not null primary key,*/
gabinete VARCHAR(65) not null,
ram VARCHAR(65) not null,
placa_mae VARCHAR(70) not null,
placa_video VARCHAR(55),
fonte VARCHAR(55) not null,
placa_rede VARCHAR(55),
processador VARCHAR(60) not null,
hd VARCHAR(45),
ssd VARCHAR(45)
);


SET SQL_SAFE_UPDATES = 0;
update FILTRO_RECOMENDACAOPC set idRecomendacoes = idRecomendacoes - 1;
SET SQL_SAFE_UPDATES = 1;


SELECT filtro_recomendacaopc.descricao ,filtro_recomendacaopc.preco, filtro_recomendacaopc.marca, filtro_recomendacaopc.categoria FROM Recomendacoes join filtro_recomendacaopc using(idRecomendacoes) where filtro_recomendacaopc.preco <= 300 and filtro_recomendacaopc.marca = Recomendacoes.marca and filtro_recomendacaopc.categoria = Recomendacoes.categoria;

delete from recomendacoes where idRecomendacoes >= 1;

select * from recomendacoes join filtro_recomendacaopc using(idRecomendacoes);

select descricao from filtro_recomendacaopc where categoria = 'Memória RAM';
