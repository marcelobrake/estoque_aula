-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.5.37-0ubuntu0.14.04.1-log - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.3.0.5001
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para estoque
CREATE DATABASE IF NOT EXISTS `estoque` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `estoque`;


-- Copiando estrutura para tabela estoque.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(11) unsigned NOT NULL DEFAULT '0',
  `fornecedor` int(11) unsigned NOT NULL DEFAULT '0',
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK__usuario` (`usuario`),
  KEY `FK__fornecedor` (`fornecedor`),
  CONSTRAINT `FK__fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id`),
  CONSTRAINT `FK__usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `parametro` varchar(255) NOT NULL DEFAULT '0',
  `valor` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `parametro` (`parametro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque.config: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT IGNORE INTO `config` (`id`, `parametro`, `valor`) VALUES
	(1, 'titulo', 'Controle Estoque v1.0'),
	(2, 'rodape', 'Copyright © Aula de Desenvolvimento Web 1 e 2 - 2015');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `razaoSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `nomeFantasia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cnpj` bigint(14) unsigned zerofill NOT NULL DEFAULT '00000000000000',
  `ie` bigint(11) unsigned zerofill NOT NULL DEFAULT '00000000000',
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.fornecedor: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT IGNORE INTO `fornecedor` (`id`, `razaoSocial`, `nomeFantasia`, `cnpj`, `ie`, `ativo`) VALUES
	(1, 'TESTE', 'TESTETESTE', 12312312312312312, 123321321321321, b'1'),
	(2, 'TESTE 2', 'TESTE2TESTE2', 00000000031900, 00000031900, b'1');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.itemCompra
CREATE TABLE IF NOT EXISTS `itemCompra` (
  `compra` int(11) unsigned NOT NULL,
  `produto` int(11) unsigned NOT NULL,
  `qtde` int(11) DEFAULT NULL,
  PRIMARY KEY (`compra`,`produto`),
  KEY `FK__produto` (`produto`,`compra`),
  CONSTRAINT `FK__compra` FOREIGN KEY (`compra`) REFERENCES `compra` (`id`),
  CONSTRAINT `FK__produto` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.itemCompra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemCompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemCompra` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.itemVenda
CREATE TABLE IF NOT EXISTS `itemVenda` (
  `venda` bigint(11) unsigned NOT NULL,
  `produto` int(11) unsigned NOT NULL,
  `qtde` int(11) unsigned NOT NULL,
  PRIMARY KEY (`venda`,`produto`),
  KEY `FK_itemVenda_produto` (`produto`,`venda`),
  CONSTRAINT `FK_itemVenda_produto` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `FK_itemVenda_venda` FOREIGN KEY (`venda`) REFERENCES `venda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.itemVenda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemVenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemVenda` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fornecedor` int(11) unsigned NOT NULL DEFAULT '0',
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cbarras` bigint(13) DEFAULT '0',
  `preco` decimal(10,2) DEFAULT '0.00',
  `qtde` int(7) DEFAULT '0',
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cbarras` (`cbarras`),
  KEY `qtde` (`qtde`),
  KEY `fornecedor` (`fornecedor`),
  CONSTRAINT `fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `administrador` bit(1) NOT NULL DEFAULT b'0',
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.usuario: ~100 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`id`, `nome`, `email`, `senha`, `administrador`, `ativo`) VALUES
	(1, 'MARCELO DIVALDO BRAKE', 'contato@marcelobrake.com.br', '$2y$12$dEwuKBlPsOsZTLv1t/fXz.7VJYL2Q3DPZ50wonxMsnSSlZfzyE.uy', b'1', b'1'),
	(2, 'ANA FARO', 'pamela76@branco.br', '$2y$12$neRmt2.nycu6GEhQHSnyTerIOImRV71p1BUNoQcHHJjYSZoLukKzm', b'0', b'1'),
	(3, 'MÃ¡RIO SANCHES', 'luara.abreu@godoi.net.br', '$2y$12$ZZLtMF9nA37.KjEDL1L6vOnp16X4SFbPEG/h9jPfze4E6yVUgzrVm', b'0', b'1'),
	(4, 'HERNANI FONSECA', 'mroque@uchoa.com', '$2y$12$3uShrFmIFGS6KRH9vTLiuewcRpMugKlRY99IycJ8EljQw2dQwNOLy', b'0', b'1'),
	(5, 'MELISSA SOARES', 'benjamin.oliveira@yahoo.com', '$2y$12$5b8.d7aoxhXePvra9WJFzOOiT5vU5S4cIdNFC5J/H.w2F0y0E5GGy', b'0', b'1'),
	(6, 'TEOBALDO ESTRADA', 'fsolano@terra.com.br', '$2y$12$ymlx9d2YJRpUzHlFqWZake/rO9MNW4RCkHkJIN1X7U14WyJ0EFCwq', b'0', b'1'),
	(7, 'ANDREA MARQUES', 'mendes.matias@vale.com', '$2y$12$EPXSeSkawZXebYCUlHN8ieLRdxTAG7rk.KoBnlm8S76g99UetyDY2', b'0', b'1'),
	(8, 'ALEXANDRE TOLEDO', 'salas.constancia@gmail.com', '$2y$12$/b9YqAP9quZ87IBPWEkh3.gminUfWtGFLezIgvGrpN4ApT.P4WvKe', b'0', b'1'),
	(9, 'MIRANDA SERNA', 'carla.dasilva@grego.com.br', '$2y$12$xPgHb4uc7tzBPPCmB6oETe0FP6kUYPqIw9jJmHZvDaadlcie0P8i6', b'0', b'1'),
	(10, 'OLÃ­VIA SALES', 'gian.dasilva@gmail.com', '$2y$12$pHdNWldSjqym1QkMCZ8vfOrrVpB/j1xPbiO4uORSZXXoRS3mrt50e', b'0', b'1'),
	(11, 'SUZANA SALAS', 'maldonado.micaela@aranda.com.br', '$2y$12$RBCmQOPok/N7CEokphrzxeLQFoLIy53HfY6dySW9RPLrNUFjd6LE.', b'0', b'1'),
	(12, 'JASMIN ROQUE', 'jbonilha@vieira.br', '$2y$12$qMj30Ev3asm89HDk4ddvJeAXGfWzNqo.IQlGrGDR5RxsyMMJ7qYB.', b'0', b'1'),
	(13, 'CHRISTOPHER CASANOVA', 'natalia.barros@hotmail.com', '$2y$12$mha3ZkUjbqheyuwExkk4n.CONlNeSQZv3lW9JzbY45F0JMrpsmz0G', b'0', b'1'),
	(14, 'ISADORA CERVANTES', 'david.matias@valencia.br', '$2y$12$MwPY7qZul3Beyw98UHkCqOSB1sxCX2IPRLNI5ILlQN1dwZWxez5Vm', b'0', b'1'),
	(15, 'MIRANDA LEAL', 'luzia.gil@yahoo.com', '$2y$12$IYhx//L5ZnsfBHPezlboM.me.9kEIiLcfUQCWnEiu/Lod61mCpOj6', b'0', b'1'),
	(16, 'DANIEL PONTES', 'luara.serna@gmail.com', '$2y$12$g6GBsrmVIA2xOj6WLqMEzOb0aPzaQupfx/jdf8SkIQbhPMQeTTq8S', b'0', b'1'),
	(17, 'VITÃ³RIA MAIA', 'urias.regina@terra.com.br', '$2y$12$QkAo8YOhWdQKtBpaoQL7f.83tTqqVIruPa/b2SP90rIQiUsn1UKYW', b'0', b'1'),
	(18, 'SUZANA GIL', 'natalia65@martines.net', '$2y$12$Thh8R5.KVzet4kG6ehgi3Og4Y3lzYx/LlUUAV.VQPN8VaIdsEqem.', b'0', b'1'),
	(19, 'SUZANA CAMPOS', 'oliveira.pedro@domingues.net.br', '$2y$12$iXwweAZLf7B/o0i.3hS3EeH4K.hjcEJNSmS6MRPs17R07CCbVGbSa', b'0', b'1'),
	(20, 'NOELÃ­ SOTO', 'francisco.madeira@medina.com.br', '$2y$12$24JypIGsfWyXsqfaYdrKwOXdrcPZblrrsxHIqpuBCIyqPU88KaIYS', b'0', b'1'),
	(21, 'HORTÃªNCIA MARIN', 'fernando24@madeira.com.br', '$2y$12$kPnZVIHUdTrDZpNFyTKJnupYfRvQCLDZf9gJWYSG.GiSSoWEhluI.', b'0', b'1'),
	(22, 'BRUNO MATOS', 'nflores@uol.com.br', '$2y$12$Eg.rPrTIq/coZbiuHoLDD.UwO0DR4RPVyt/FILunbysfWZLRAEHj6', b'0', b'1'),
	(23, 'ISADORA DA SILVA', 'alexandre15@lovato.org', '$2y$12$COrGf2N2R7sKNQCvuKqKDecNqHuRbG5W74VFWvNozQNrKp7VQtbMG', b'0', b'1'),
	(24, 'CHRISTOPHER GOMES', 'francisco62@carmona.br', '$2y$12$Q7SsEQsQ/1P08KjtWLphaexwIJXKg0PT85VavGGeMQ1qyqsEa6RBm', b'0', b'1'),
	(25, 'ISABELLA FERREIRA', 'mel26@vale.net.br', '$2y$12$EfQWBeZ7delfWytT9tFwK.NQ8TtYFlujrlP07ZIQQeklPIV8M/5Ri', b'0', b'1'),
	(26, 'CHRISTIAN DELATORRE', 'suzana.fernandes@yahoo.com', '$2y$12$Fy.yZkJayrr35ZXj5LDTEuREw2j2ZPTanhqYLhFXNsYqiHxTRopXm', b'0', b'1'),
	(27, 'VALENTIN FERREIRA', 'brito.santiago@ig.com.br', '$2y$12$5zOAYwg66wUslGOmk/sZSeeLONYQRA5voJNIMyBAv9jx2jqAxKbvm', b'0', b'1'),
	(28, 'CONSTÃ¢NCIA MARTINES', 'bezerra.noel@uol.com.br', '$2y$12$5YpXAfFKxYXVIXewDtcNZ.xaMsQSpBa27JzlglkIle8KUVp8X04NG', b'0', b'1'),
	(29, 'MARTINHO FERMINIANO', 'alexandre.toledo@ig.com.br', '$2y$12$qz.dEOOqdoxUYAS.iJtcNukEqToNJK.IZKjm5zXw0OE5voFiPPmQe', b'0', b'1'),
	(30, 'HELENA VEGA', 'gusmao.salome@delvalle.net', '$2y$12$rGSU0.c/.u.M4Tppu4EjHOJ1Tuz/P6NK5z4J.Jn21cEmher0AnTr.', b'0', b'1'),
	(31, 'JOSEFINA CERVANTES', 'paulina.vega@pereira.org', '$2y$12$0I1ahd12rYhQ2hPvZHrU.uyHBSq15QmJ7khgQdfUJELz1iKzw0H8u', b'0', b'1'),
	(32, 'TOMÃ¡S ZAMBRANO', 'joaquin74@uol.com.br', '$2y$12$LQ8GngiaIYjZHn2Hoo/8h.V2S0rucg7m3gVDq3Pg1rTl3V2IE7vSC', b'0', b'1'),
	(33, 'NORMA BONILHA', 'jsoto@galhardo.org', '$2y$12$zsemmsYPIvh4knKu4k4rm.6r.eyem0Q2VYNUeAhCM2Ty1x9j0PGMW', b'0', b'1'),
	(34, 'PAULINA ARANDA', 'agostinho41@velasques.com', '$2y$12$.hUjjwlvHenaYPEB9KcdyuIvBYJuwtxlB0.ZOJy5XoBcTthL.PP3e', b'0', b'1'),
	(35, 'MATIAS QUINTANA', 'bezerra.sophie@rezende.org', '$2y$12$6FVnF/5n.DA7UVvMR.4/aeEcj0OjXzin33qUEV7KiKMAoYBEwrPaG', b'0', b'1'),
	(36, 'NORMA SALES', 'alonso94@ortiz.br', '$2y$12$eYvH3P6asSsIvNDrB1Et6uATlIVgCS6m7yMkMMxul82p71DcMLWHa', b'0', b'1'),
	(37, 'PAULO VEGA', 'vlovato@valentin.net.br', '$2y$12$72wjXkxJ791DeszWN4jvkOhqYQacfIWA7UKzobW60KblMfdHL7ea.', b'0', b'1'),
	(38, 'JÃºLIA COLAÃ§O', 'vbarreto@hotmail.com', '$2y$12$YEGddDqAXWL56.dAUTXoWOZcnc5/6GNfI0QeW8mNqcqWCjr15qvB.', b'0', b'1'),
	(39, 'RAFAEL RAMOS', 'giovane.carrara@hotmail.com', '$2y$12$oc27Ai7Va5C5iJfAQDOm1eJ8DpgQX1Zm./6YMroBUTlBti1AXMvNe', b'0', b'1'),
	(40, 'CAROLINA SANTACRUZ', 'corona.bruno@torres.com.br', '$2y$12$lWV5G2yDTKCnxks/w0Av3.zxk2XLXWRsA.AVvEGf63.egOF97T642', b'0', b'1'),
	(41, 'EVERTON BRITO', 'christian.cruz@desouza.com.br', '$2y$12$sKZO.zdx4TVE42VPWips/ONV.sKI6MOMvOSrxgsfhYFey9cmnEDM.', b'0', b'1'),
	(42, 'PAULA BONILHA', 'mfontes@chaves.net.br', '$2y$12$O7M3xNlEHMuSKv2Ga8s5F.3EsnSXe1OOct9QYyn.GgeVfshCANrXG', b'0', b'1'),
	(43, 'NÃ¡DIA ESTRADA', 'daniel63@terra.com.br', '$2y$12$ksJa4HiGRFMFlshi3Nj8xedzVp4ACrkANQ9g6aX39lL7QRj90RAga', b'0', b'1'),
	(44, 'SILVANA URIAS', 'soto.rodrigo@lutero.net', '$2y$12$AhVazv3tDhHB.ewLrQU3qOlUiHs1eca3kZtUEGTY/lP4Wa33HIJUi', b'0', b'1'),
	(45, 'MICAELA PADRÃ£O', 'madalena.beltrao@terra.com.br', '$2y$12$ZTR6vCpPy1I3AfP56STXwOTUm/hFsdpKo7pgQKKMNSMs0Xyge3/5G', b'0', b'1'),
	(46, 'MALENA FELICIANO', 'luis.aragao@terra.com.br', '$2y$12$OUo/.e/saBSj7tAQUWmtievThK0/Bno9mnFPPeWgoUMDHtzRf0mcm', b'0', b'1'),
	(47, 'SANTIAGO GARCIA', 'emiliano.davila@leon.com', '$2y$12$KbQc0xw3OyR6NKwS6Ln.C.kUCRWs5Lr9vykXKywR9oIoJ/UCBrWR6', b'0', b'1'),
	(48, 'MEL MONTENEGRO', 'micaela.aranda@serra.com', '$2y$12$8u.FXVDsYhLofLKnQXbCo.78CdJZnG2PtL4L9ZcqhfEBDM0xhdHlK', b'0', b'1'),
	(49, 'VICENTE LEAL', 'miranda.zamana@ig.com.br', '$2y$12$av1ERUGz786oQ0VXs1VCx.cu28D5iZJc16.A8FtDsOd7VBtDbtlCW', b'0', b'1'),
	(50, 'GABRIELA BRANCO', 'kevin.dias@valdez.com', '$2y$12$ElHjchBSrEZlL..AyQO2Au9NVWW4M.Ne.CLWh8w/tjrSPNdEGYlXW', b'0', b'1'),
	(51, 'NATAL MENDES', 'alma08@barros.net', '$2y$12$jnq6RBxzZBxiqe.lOC35OeOODhdMrPOg4wzAnFghaEZ7zunZViRCu', b'0', b'1'),
	(52, 'CAMILO BURGOS', 'sverdara@barreto.com', '$2y$12$gYaaPOZRm8qsuMu2jknwi.IBxDBYiCPZx69SwRXHyfqXIkux61mQy', b'0', b'1'),
	(53, 'LUANA PEREIRA', 'sfontes@corona.org', '$2y$12$pvL3WN8dPaSiJ00bs8BafuTrcolAYjeWz5PuU6AVCJywWmT4elRBS', b'0', b'1'),
	(54, 'MICHELE MAIA', 'verdara.simao@r7.com', '$2y$12$vV0OKl.91ndBAjg12bAy6eARNEYic1DqpdGMbfXAaCvoxBV8wjvIG', b'0', b'1'),
	(55, 'ALMA UCHOA', 'udavila@uol.com.br', '$2y$12$J9L/2EVaXU.Y68/bibusOuUgjuGs9q2VCrb2lo8OXrBBthISKv922', b'0', b'1'),
	(56, 'DEMIAN SERRANO', 'ysantana@ig.com.br', '$2y$12$wEbI28Bdny5j/oy34/JrLO5cS2sOwbjmsPeJ.Cth8w45kWyzsGRki', b'0', b'1'),
	(57, 'NOEL VEGA', 'tabata95@yahoo.com', '$2y$12$rsuGZVD7TsVt3NLy9i0HJO.J7.FgFsZts9ogHK65THop7W5PcUe.m', b'0', b'1'),
	(58, 'DIEGO MENDES', 'benjamin.quintana@uol.com.br', '$2y$12$Zsm.K0H6kQ9Pe.VLAfB1fe.Yx/gjaDuCac5b/Z4UA0J/d/H7XMvGq', b'0', b'1'),
	(59, 'MALENA FERNANDES', 'elias22@uol.com.br', '$2y$12$r2cd0FiB61P5ejZvbLiZ4egId95r/r1g2sV9IKVJUaTyATLbP1Qny', b'0', b'1'),
	(60, 'SAMUEL URIAS', 'vrivera@hotmail.com', '$2y$12$Rfinp9Mx/Mmtvccn9kdrxues1AqpGhQL6oiLiOSZ4.zCpvQCKiKMq', b'0', b'1'),
	(61, 'MÃ¡XIMO DA ROSA', 'velasques.diego@fernandes.com.br', '$2y$12$9MO3aWaWLJXru7WgOfZQjebLPNkf.Ihgz8rcoh1lLlHQIj5TBI96m', b'0', b'1'),
	(62, 'JULIANA CARMONA', 'ggrego@esteves.org', '$2y$12$sRsz6JmQKf2sX7YCPpWlm.LDD6M6OI9UZRJecrstA82wMU5rCIsIa', b'0', b'1'),
	(63, 'VALÃ©RIA DAS NEVES', 'deoliveira.simon@maia.com.br', '$2y$12$VMta5e6SVjlYRavWd42ZzO7rPPGj3ItU2KEZkA644aOqaGhpbAEy6', b'0', b'1'),
	(64, 'FÃ¡BIO BURGOS', 'simao09@leon.net', '$2y$12$g160hxkC2lzop7C8K0u4EOUofWq8yoovKdcUIkASlJ4n1RWEH68VS', b'0', b'1'),
	(65, 'ISAAC CORONA', 'acarrara@ig.com.br', '$2y$12$0yVPjwAD7rZd1sTV.IOjMe4zr6Mqs180jbhIwcR069nbmbeS3TnGO', b'0', b'1'),
	(66, 'ISADORA VALDEZ', 'sandoval.manuela@yahoo.com', '$2y$12$xaxbjtsxfyrYhBFBoqPnI.B3YQcjEa03z027.FtGHwbv28v6Mo8SW', b'0', b'1'),
	(67, 'GUSTAVO RIOS', 'jasmin.corona@gmail.com', '$2y$12$kMWPXDhDw0CwxTiH/pH2nO96Z515Wmne3GJHaZVdsmMtsNVks2ebK', b'0', b'1'),
	(68, 'DAVID BRANCO', 'fernando.casanova@terra.com.br', '$2y$12$X5RnbW30.0pS9CCOXuZwke2JraO254PY65rdmiqgZ6QIViqsWQP6y', b'0', b'1'),
	(69, 'EMANUEL VERDUGO', 'mateus.solano@furtado.com.br', '$2y$12$NJKNvNvo/MeaUSBfqFW/ruf6x9tc/UHOSmrywN.TLe0w8evKnzGEK', b'0', b'1'),
	(70, 'EDUARDO ARAGÃ£O', 'luis.bonilha@gmail.com', '$2y$12$elIT/I72Z4VUNc1iffLYFOFMtfijch88se2Tu2nMIuqLZrsqrtwvi', b'0', b'1'),
	(71, 'HUGO LEAL', 'igarcia@ig.com.br', '$2y$12$QTrF0Lz4xUzeZt5Vc49wCex7czCxFSIslbV9wyP8ETvImJ.3VJ4iK', b'0', b'1'),
	(72, 'SÃ©RGIO BONILHA', 'bezerra.joaquin@lira.com.br', '$2y$12$y6aXmJNZK/AHlFrjOoj1COFzNOA3o4WHoSzXE9lXdMzTcGmyhTdz2', b'0', b'1'),
	(73, 'ADRIANA RAMOS', 'joao33@gmail.com', '$2y$12$vpJpsJhvsEfSpLIfG2GqVeyl8ujrcdol6TD5aL4GLLI6kEz6HbQzm', b'0', b'1'),
	(74, 'ALONSO MARIN', 'emilia.ferreira@balestero.com', '$2y$12$D427qrWpBVzgMielrEYiLeiJa7vcZ8Z7WjzI.tSek6Yc8mvQhSsXO', b'0', b'1'),
	(75, 'MIGUEL DE OLIVEIRA', 'sophie57@cortes.com', '$2y$12$gmdq3yXkRJJPi9rMTxnX5ujTMlv.wKiB5iLRk4odvijX.ZflwFg4u', b'0', b'1'),
	(76, 'LEANDRO VILA', 'rocha.mario@grego.net.br', '$2y$12$d7OI06Kav1rinHkFhVyFGepSOOLRm/SPJn0FuRbWq4X1ZOlrGdy7y', b'0', b'1'),
	(77, 'EMÃ­LIA VEGA', 'yrosa@ig.com.br', '$2y$12$YacGMQuvkX4Zm9hRcclzP.szm5qucQYNxc6bEkUt7sYOC.a5jj3gu', b'0', b'1'),
	(78, 'MANUELA FERNANDES', 'amelia.rangel@escobar.org', '$2y$12$7A4LHx3t6htjdZd73bOiKuCOHNh9f27OEgF7gMFRWAwKtdrhjQEnu', b'0', b'1'),
	(79, 'DANIELA CARRARA', 'dasdores.miguel@uol.com.br', '$2y$12$LUwbFMY0NmpVODcNit/N0OVTY/p29nw8WTAPi7LcAhuAZ2H1BtW.a', b'0', b'1'),
	(80, 'TAÃ­S FONTES', 'tessalia84@aguiar.net', '$2y$12$x.V4.nYXLHS/SQ89FGGjmeFc0AY0y/6WZqp3gNrb8QcTjY/4KJMyi', b'0', b'1'),
	(81, 'GIOVANE PRADO', 'gusmao.thalissa@rosa.br', '$2y$12$Bgi1lWvoKJW5IOuSe5rESujtjq.GFSJZY/hl6QU.3MT/xM565EMge', b'0', b'1'),
	(82, 'ALLISON ASSUNÃ§Ã£O', 'salas.tomas@fontes.com.br', '$2y$12$Wf7lYcR6moJLmvQINbzRUOro3g9tcNHtn.NOf/FZ5N5hTdojaUotq', b'0', b'1'),
	(83, 'LUIS GARCIA', 'msepulveda@terra.com.br', '$2y$12$3UYPyh1Xfqfj/HJJaWT0Z.wV4kS7dYVK3cmmD6pWSh9MtqhbJY24W', b'0', b'1'),
	(84, 'DANIELA DELATORRE', 'benites.isabel@aranda.com', '$2y$12$Uv/7Knl7umnM2/Hs55IGPeqmGiwb1NkEbsAkKreDFRPOucjO7y6De', b'0', b'1'),
	(85, 'ALEXANDRE MAIA', 'madalena.reis@sanches.com', '$2y$12$T0F.axYV3ObSb9meb67/4OW31awRukvpzj36pnesW9owVdQdxJEzG', b'0', b'1'),
	(86, 'ARIANA LUTERO', 'amendes@ig.com.br', '$2y$12$/du6pfATkNMyCAJQF0fD1OzG23DSY2Ajp7G5pMTj28rJCGGkHVGyy', b'0', b'1'),
	(87, 'TOMÃ¡S GALHARDO', 'vitoria18@gmail.com', '$2y$12$4LJUAA86kTkQSgcQrqcfR.7i.6UA/g/4s4D17IYe0kNPH/v./DgVG', b'0', b'1'),
	(88, 'DANTE RIVERA', 'martinho.maldonado@zamana.com', '$2y$12$LbqeF9SGHt/VHoOPX9R9b.rMmX0xM4l0tWqRO8GvQL6wTmOlXHndS', b'0', b'1'),
	(89, 'SILVANA CORTÃªS', 'hmedina@escobar.com.br', '$2y$12$BFnqLA3c3p3HEEpQu3rdjORL9vvfpXQJ1QPMczF8ogEPJbwrTov4y', b'0', b'1'),
	(90, 'MARTINHO ZAMANA', 'mario26@yahoo.com', '$2y$12$aQiXePKhkqY6UI5dsTdiUODWOoLG9vkOTCIq82elvGfKfL5/wvKHW', b'0', b'1'),
	(91, 'CARLOS CAMACHO', 'hernani.rios@vale.com.br', '$2y$12$9TcVuKH5PPJWDSfr0NO28uE/owki0oUO3OWQWhzghUDzDLGRYVGzq', b'0', b'1'),
	(92, 'SÃ©RGIO BURGOS', 'quintana.juliana@r7.com', '$2y$12$BjMi7xd5nPq39HjLfqh4o.mVJalfeEYZl7F3sG7ho8cqOYmjV7/N6', b'0', b'1'),
	(93, 'HELENA DE OLIVEIRA', 'lleon@carmona.org', '$2y$12$.BWrgJV5azUOnwYp6o6EvegkpEdtgq3qhLzAK9D4yOm9dkjEs0s2G', b'0', b'1'),
	(94, 'ARIADNA GOMES', 'ltorres@ig.com.br', '$2y$12$9a4d9df.XGmDbfhDVmSO4uhZcBNGCe5ZhA60xRxmw7pgoEPEih5LW', b'0', b'1'),
	(95, 'ALONSO RANGEL', 'feliciano.violeta@yahoo.com', '$2y$12$ebcsTFeSH46/clKi0mtOrOo3RdsWNNdR0Q3RqmIBk1LPanllxi.OO', b'0', b'1'),
	(96, 'PAULO SERRANO', 'tessalia80@zamana.br', '$2y$12$KUABfWvWYaBPmF9GYSiIw./HmYolW/.DwX5a6hVygajjJrGj1c.l.', b'0', b'1'),
	(97, 'MATEUS CRUZ', 'cpaz@yahoo.com', '$2y$12$uSf9xNtAeuAfPEkVGMccruClRo.l.Zo/HYbXmhmdtd4tq/dYQBuHO', b'0', b'1'),
	(98, 'PAULINA PADRÃ£O', 'luciana91@lutero.com', '$2y$12$uC3EL0IOdPA5kwuHQYE4D.w6EOV6dzGXB8/65.Ym9jCmNTzNbpD0u', b'0', b'1'),
	(99, 'LUCIANA GONÃ§ALVES', 'vitoria31@bezerra.net.br', '$2y$12$IOFDOUwkHY4yDsmNqruZce.r//uWzZJvEqQ5bkhCahfXeUZzoG2gK', b'0', b'1'),
	(100, 'MIGUEL PEREZ', 'norma.marinho@uol.com.br', '$2y$12$L2l9wBAp8JsGPraeK1cKZe9DoWGTbgyBh7pvA3HMsfXdfwsCF5y9C', b'0', b'1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.venda
CREATE TABLE IF NOT EXISTS `venda` (
  `id` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(11) unsigned NOT NULL DEFAULT '0',
  `cliente` int(11) unsigned NOT NULL DEFAULT '0',
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_venda_usuario` (`usuario`),
  KEY `FK_venda_cliente` (`cliente`),
  CONSTRAINT `FK_venda_cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK_venda_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.venda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
