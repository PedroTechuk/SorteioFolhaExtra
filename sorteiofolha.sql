-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21/02/2024 às 00:17
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
-- Banco de dados: `sorteiofolha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `numbers_amount` int(7) NOT NULL,
  `numbers` longtext NOT NULL,
  `min_numbers` int(11) NOT NULL DEFAULT 0,
  `max_numbers` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `actions`
--

INSERT INTO `actions` (`id`, `title`, `subtitle`, `description`, `status`, `numbers_amount`, `numbers`, `min_numbers`, `max_numbers`, `created_at`, `updated_at`) VALUES

-- --------------------------------------------------------

--
-- Estrutura para tabela `costumers`
--

CREATE TABLE `costumers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `doc` varchar(30) NOT NULL,
  `state` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `phone`, `email`, `doc`, `state`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Pedro Augusto Techuk', '(43) 99693-5486', 'gutechuk@gmail.com', '068.123.319-29', '', '', '2024-02-18 19:58:06', '2024-02-18 19:58:06'),
(6, 'Felipe Monteiro', '(41) 99533-5371', 'lipee_wb@hotmail.com', '076.483.419-30', 'PR', 'Wenceslau Braz', '2024-02-21 03:15:41', '2024-02-21 03:15:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mail_queue`
--

CREATE TABLE `mail_queue` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `from_email` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `numbers` longtext NOT NULL,
  `payment_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1 = reservado, 2 = pago',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `participants`
--

INSERT INTO `participants` (`id`, `costumer_id`, `action_id`, `price`, `numbers`, `payment_status`, `created_at`, `updated_at`) VALUES
(3, 6, 1, 0, '009720', 2, '2024-02-21 03:15:41', '2024-02-21 03:15:41');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mail_queue`
--
ALTER TABLE `mail_queue`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `mail_queue`
--
ALTER TABLE `mail_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;