-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2018 às 00:05
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdpapel`
--
CREATE DATABASE IF NOT EXISTS `bdpapel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdpapel`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `data` datetime NOT NULL,
  `nota` tinyint(4) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `papelaria_id` int(11) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_avaliacao_produto1_idx` (`produto_id`),
  KEY `fk_avaliacao_usuarios1_idx` (`usuarios_id`),
  KEY `fk_avaliacao_papelaria1_idx` (`papelaria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

DROP TABLE IF EXISTS `cor`;
CREATE TABLE IF NOT EXISTS `cor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `papelaria`
--

DROP TABLE IF EXISTS `papelaria`;
CREATE TABLE IF NOT EXISTS `papelaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nomeFantasia` varchar(255) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `uf` tinytext NOT NULL,
  `telefone` char(12) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `referencial` varchar(255) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomeloja_UNIQUE` (`nome`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  UNIQUE KEY `telefone_UNIQUE` (`telefone`),
  UNIQUE KEY `website_UNIQUE` (`website`),
  KEY `usuarios_id_idx` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `papelaria_tem_produto`
--

DROP TABLE IF EXISTS `papelaria_tem_produto`;
CREATE TABLE IF NOT EXISTS `papelaria_tem_produto` (
  `papelaria_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `preco` double NOT NULL,
  `qtd` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  PRIMARY KEY (`papelaria_id`,`produto_id`,`cor_id`),
  KEY `fk_papelaria_has_produto_produto1_idx` (`produto_id`),
  KEY `fk_papelaria_has_produto_papelaria1_idx` (`papelaria_id`),
  KEY `fk_papelaria_has_produto_cor1_idx` (`cor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_papelaria1` FOREIGN KEY (`papelaria_id`) REFERENCES `papelaria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacao_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacao_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `papelaria`
--
ALTER TABLE `papelaria`
  ADD CONSTRAINT `usuarios_id` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `papelaria_tem_produto`
--
ALTER TABLE `papelaria_tem_produto`
  ADD CONSTRAINT `fk_papelaria_has_produto_cor1` FOREIGN KEY (`cor_id`) REFERENCES `cor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_papelaria_has_produto_papelaria1` FOREIGN KEY (`papelaria_id`) REFERENCES `papelaria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_papelaria_has_produto_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
