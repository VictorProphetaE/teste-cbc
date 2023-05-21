-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/05/2023 às 04:30
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testecbc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clube`
--

CREATE TABLE `clube` (
  `id` int(11) NOT NULL,
  `clube` varchar(50) NOT NULL,
  `saldo_disponivel` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clube`
--

INSERT INTO `clube` (`id`, `clube`, `saldo_disponivel`) VALUES
(1, 'Clube A', 1500.00),
(2, 'Clube B', 3000.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recurso`
--

CREATE TABLE `recurso` (
  `id` int(11) NOT NULL,
  `recurso` varchar(50) NOT NULL,
  `saldo_disponivel` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `recurso`
--

INSERT INTO `recurso` (`id`, `recurso`, `saldo_disponivel`) VALUES
(1, '1', 9500.00),
(2, '2', 10000.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clube`
--
ALTER TABLE `clube`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clube`
--
ALTER TABLE `clube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
