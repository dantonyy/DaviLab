-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2023 às 19:57
-- Versão do servidor: 8.0.24
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `davilab_app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `erro_sistema`
--

DROP TABLE IF EXISTS `erro_sistema`;
CREATE TABLE IF NOT EXISTS `erro_sistema` (
  `id_erro_sistema` int NOT NULL AUTO_INCREMENT,
  `id_usuario_autenticacao` int NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acao` varchar(100) NOT NULL,
  `erro` varchar(500) NOT NULL,
  PRIMARY KEY (`id_erro_sistema`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id_laboratorio` int NOT NULL AUTO_INCREMENT,
  `razaosocial` varchar(500) NOT NULL,
  `nome_fantasia` varchar(500) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `endereco` json NOT NULL,
  `email` varchar(500) NOT NULL,
  `telefone` varchar(500) NOT NULL,
  PRIMARY KEY (`id_laboratorio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio_papel`
--

DROP TABLE IF EXISTS `laboratorio_papel`;
CREATE TABLE IF NOT EXISTS `laboratorio_papel` (
  `id_laboratorio_papel` int NOT NULL AUTO_INCREMENT,
  `papel` varchar(100) NOT NULL,
  PRIMARY KEY (`id_laboratorio_papel`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `laboratorio_papel`
--

INSERT INTO `laboratorio_papel` (`id_laboratorio_papel`, `papel`) VALUES
(1, 'Administrador'),
(2, 'Atendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio_possui_paciente`
--

DROP TABLE IF EXISTS `laboratorio_possui_paciente`;
CREATE TABLE IF NOT EXISTS `laboratorio_possui_paciente` (
  `id_laboratorio_possui_paciente` int NOT NULL AUTO_INCREMENT,
  `id_laboratorio` int NOT NULL,
  `id_paciente` int NOT NULL,
  PRIMARY KEY (`id_laboratorio_possui_paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio_possui_usuario`
--

DROP TABLE IF EXISTS `laboratorio_possui_usuario`;
CREATE TABLE IF NOT EXISTS `laboratorio_possui_usuario` (
  `id_laboratorio_possui_usuario` int NOT NULL AUTO_INCREMENT,
  `id_laboratorio` int NOT NULL,
  `id_usuario_autenticacao` int NOT NULL,
  `papel` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_laboratorio_possui_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_autenticacao`
--

DROP TABLE IF EXISTS `usuario_autenticacao`;
CREATE TABLE IF NOT EXISTS `usuario_autenticacao` (
  `id_usuario_autenticacao` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `sobrenome` varchar(500) NOT NULL,
  `celular` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_finalizacao_cadastro` datetime DEFAULT NULL,
  `ultima_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_autenticacao`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_autenticacao`
--

INSERT INTO `usuario_autenticacao` (`id_usuario_autenticacao`, `nome`, `sobrenome`, `celular`, `email`, `senha`, `data_criacao`, `data_finalizacao_cadastro`, `ultima_edicao`) VALUES
(1, 'Admin', 'DaviLab', '', 'admin@admin.com', 'admin', '2023-10-03 16:56:58', NULL, '2023-10-03 16:56:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_configuracao`
--

DROP TABLE IF EXISTS `usuario_configuracao`;
CREATE TABLE IF NOT EXISTS `usuario_configuracao` (
  `id_usuario_configuracao` int NOT NULL AUTO_INCREMENT,
  `id_usuario_autenticacao` int NOT NULL,
  `endereco` json NOT NULL,
  `nacionalidade` varchar(100) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `nome_social` varchar(200) DEFAULT NULL,
  `tema` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario_configuracao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_exame_arquivo`
--

DROP TABLE IF EXISTS `usuario_exame_arquivo`;
CREATE TABLE IF NOT EXISTS `usuario_exame_arquivo` (
  `id_exame_arquivo` int NOT NULL AUTO_INCREMENT,
  `id_usuario_autenticacao` int NOT NULL,
  `laudo` varchar(500) NOT NULL,
  `nome_exame` varchar(500) NOT NULL,
  `nome_arquivo` varchar(500) NOT NULL,
  `extensao` varchar(500) NOT NULL,
  `profissional` varchar(500) NOT NULL,
  `data_realizacao` varchar(500) NOT NULL,
  `id_laboratorio_possui_usuario` int NOT NULL,
  `status_exame` int NOT NULL,
  `comentarios_recusa` varchar(500) NOT NULL,
  PRIMARY KEY (`id_exame_arquivo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_logs`
--

DROP TABLE IF EXISTS `usuario_logs`;
CREATE TABLE IF NOT EXISTS `usuario_logs` (
  `id_usuario_logs` int NOT NULL AUTO_INCREMENT,
  `id_usuario_autenticacao` int NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_logs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
