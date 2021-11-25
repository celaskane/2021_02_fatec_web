-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2021 às 02:03
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pwt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cesta`
--

CREATE TABLE `cesta` (
  `sessionId` varchar(100) DEFAULT NULL,
  `codigoCesta` bigint(20) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cesta`
--

INSERT INTO `cesta` (`sessionId`, `codigoCesta`, `qtd`) VALUES
('tl1k7rau89c57799mllbdl64cm', 4, 1),
('tl1k7rau89c57799mllbdl64cm', 6, 1),
('tl1k7rau89c57799mllbdl64cm', 6, 1),
('tl1k7rau89c57799mllbdl64cm', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
