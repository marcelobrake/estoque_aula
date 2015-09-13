-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.5.37-0ubuntu0.14.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.2.0.4974
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para estoque
CREATE DATABASE IF NOT EXISTS `estoque` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
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
  CONSTRAINT `FK__usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `FK__fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;


-- Copiando estrutura para tabela estoque.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `razaoSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `nomeFantasia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cnpj` bigint(14) unsigned zerofill NOT NULL DEFAULT '00000000000000',
  `ie` bigint(11) unsigned NOT NULL DEFAULT '0',
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.fornecedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela estoque.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
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
