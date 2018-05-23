-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2018 às 22:36
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www.systemfiles.com.br`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`) VALUES
(1, 'Funcionários Ativos', 'Categoria de Funcionários ativos da empresa.', 3),
(2, 'Funcionários Inativos', 'Funcionários inativos da empresa.', 3),
(3, 'Funcionários Ativos', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `drive`
--

CREATE TABLE `drive` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `id_category` int(11) NOT NULL,
  `date_register` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `drive`
--

INSERT INTO `drive` (`id`, `name`, `id_category`, `date_register`, `status`) VALUES
(1, 'Documentos', 1, '0000-00-00', 3),
(2, 'Arquivos', 1, '0000-00-00', 3),
(3, 'Documentos 2', 2, '0000-00-00', 3),
(4, 'Documentos', 3, '2018-04-12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `drive_access`
--

CREATE TABLE `drive_access` (
  `id` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_drive` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `drive_access`
--

INSERT INTO `drive_access` (`id`, `id_profile`, `id_drive`, `level`, `status`) VALUES
(1, 1, 4, 2, 1),
(2, 3, 4, 2, 1),
(3, 2, 4, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `drive_config`
--

CREATE TABLE `drive_config` (
  `id` int(11) NOT NULL,
  `id_drive` int(11) NOT NULL,
  `field` varchar(15) NOT NULL,
  `cod` varchar(20) NOT NULL,
  `required` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `drive_config`
--

INSERT INTO `drive_config` (`id`, `id_drive`, `field`, `cod`, `required`, `status`) VALUES
(4, 2, 'identidade', 'rg_', 1, 1),
(5, 2, 'cpf', 'cpf_', 1, 1),
(6, 2, 'cnh', 'cnh_', 0, 1),
(7, 3, 'identidade', 'rg_', 1, 1),
(8, 3, 'cpf', 'cpf_', 0, 1),
(9, 3, 'titulo', 'title_', 1, 1),
(10, 3, 'curriculo', 'curriculo_', 1, 1),
(11, 4, 'rg', 'rg_', 1, 1),
(12, 4, 'cpf', 'cpf_', 1, 1),
(13, 4, 'cnh', 'cnh_', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `envelop`
--

CREATE TABLE `envelop` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cod` varchar(15) NOT NULL,
  `id_drive` int(11) NOT NULL,
  `date_register` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `envelop`
--

INSERT INTO `envelop` (`id`, `name`, `cod`, `id_drive`, `date_register`, `status`) VALUES
(1, 'Apolo', '2147483647', 2, '2018-03-21', 3),
(2, 'Apolo', '2147483647', 2, '2018-03-21', 3),
(3, 'Apolo', '2147483647', 2, '2018-03-21', 3),
(4, '', '0', 0, '2018-03-22', 1),
(5, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(6, '', '0', 0, '2018-03-22', 1),
(7, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(8, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(9, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(10, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(11, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(12, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(13, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(14, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(15, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(16, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(17, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(18, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(19, 'Apolo', '2147483647', 2, '2018-03-22', 3),
(20, 'Apolo', '2147483647', 3, '2018-03-22', 3),
(21, 'victor', '02568366559', 3, '2018-03-22', 3),
(22, 'Lordelo', '02568366559', 3, '2018-03-22', 3),
(23, 'Apolo', '02568366559', 4, '2018-04-17', 1),
(24, 'Joao', '02568366559', 4, '2018-04-17', 1),
(25, 'Joao', '02568366559', 4, '2018-04-17', 1),
(26, 'Maria', '02568366557', 4, '2018-04-17', 1),
(27, 'Manoel', '2222', 4, '2018-04-17', 1),
(28, 'Manoel', '2222', 4, '2018-04-17', 1),
(29, 'Pedro', '2223', 4, '2018-04-17', 3),
(30, 'Pedro', '2223', 4, '2018-04-17', 3),
(31, 'Pedro', '2223', 4, '2018-04-17', 3),
(32, 'Marcos', '1111', 4, '2018-04-17', 3),
(33, 'a', '224', 4, '2018-04-17', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `level_profile`
--

CREATE TABLE `level_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `level_profile`
--

INSERT INTO `level_profile` (`id`, `name`, `status`) VALUES
(1, 'Administrador', 1),
(2, 'Coordenador/Editor', 1),
(3, 'Visualizador', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `registration_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id`, `name`, `registration_date`, `status`) VALUES
(1, 'Setor Administrativo', '2018-04-11', 1),
(2, 'Setor Contábil', '2018-04-11', 1),
(3, 'Setor de RH', '2018-04-12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `id_envelop` int(11) NOT NULL,
  `ref` varchar(25) NOT NULL,
  `ref_link` varchar(25) NOT NULL,
  `date_register` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `uploads`
--

INSERT INTO `uploads` (`id`, `id_envelop`, `ref`, `ref_link`, `date_register`, `status`) VALUES
(1, 18, '0', '0', '2018-03-22', 3),
(2, 18, '0', '0', '2018-03-22', 3),
(3, 18, '0', '0', '2018-03-22', 3),
(4, 19, '0', '0', '2018-03-22', 3),
(5, 19, '0', '0', '2018-03-22', 3),
(6, 19, '0', '0', '2018-03-22', 3),
(7, 20, '0', '0', '2018-03-22', 3),
(8, 20, '0', '0', '2018-03-22', 3),
(9, 21, '0', '0', '2018-03-22', 3),
(10, 21, '0', '0', '2018-03-22', 3),
(11, 22, 'rg_22', 'rg_22.jpg', '2018-03-22', 3),
(12, 22, 'cpf_22', 'cpf_22.jpg', '2018-03-22', 3),
(13, 22, 'rg_22', 'rg_22.', '2018-04-01', 3),
(14, 22, 'cpf_22', 'cpf_22.jpg', '2018-04-01', 3),
(15, 22, 'title_22', 'title_22.', '2018-04-01', 3),
(16, 22, 'cpf_22', 'cpf_22.jpg', '2018-04-01', 3),
(17, 22, 'title_22', 'title_22.jpg', '2018-04-01', 3),
(18, 22, 'curriculo_22', 'curriculo_22.jpg', '2018-04-01', 3),
(19, 22, 'cpf_22', 'cpf_22.jpg', '2018-04-01', 3),
(20, 22, 'rg_22', 'rg_22.jpg', '2018-04-01', 3),
(21, 22, 'curriculo_22', 'curriculo_22.jpg', '2018-04-01', 3),
(22, 22, 'title_22', 'title_22.jpg', '2018-04-01', 3),
(23, 22, 'cpf_22', 'cpf_22.pdf', '2018-04-01', 3),
(24, 22, 'cpf_22', 'cpf_22.pdf', '2018-04-01', 3),
(25, 20, 'title_20', 'title_20.png', '2018-04-01', 3),
(26, 22, 'cpf_22', 'cpf_22.jpg', '2018-04-04', 3),
(27, 20, 'rg_20', 'rg_20.jpg', '2018-04-04', 3),
(28, 23, 'rg_23', 'rg_23.jpg', '2018-04-17', 1),
(29, 23, 'cpf_23', 'cpf_23.', '2018-04-17', 1),
(30, 23, 'cnh_23', 'cnh_23.', '2018-04-17', 1),
(31, 24, 'rg_24', 'rg_24.', '2018-04-17', 1),
(32, 24, 'cpf_24', 'cpf_24.', '2018-04-17', 1),
(33, 24, 'cnh_24', 'cnh_24.', '2018-04-17', 1),
(34, 25, 'rg_25', 'rg_25.', '2018-04-17', 1),
(35, 25, 'cpf_25', 'cpf_25.', '2018-04-17', 1),
(36, 25, 'cnh_25', 'cnh_25.', '2018-04-17', 1),
(37, 26, 'rg_26', 'rg_26.jpg', '2018-04-17', 1),
(38, 26, 'cpf_26', 'cpf_26.', '2018-04-17', 1),
(39, 26, 'cnh_26', 'cnh_26.', '2018-04-17', 1),
(40, 28, 'rg_28', 'rg_28.jpg', '2018-04-17', 1),
(41, 28, 'cpf_28', 'cpf_28.', '2018-04-17', 1),
(42, 28, 'cnh_28', 'cnh_28.', '2018-04-17', 1),
(43, 29, 'rg_29', 'rg_29.jpg', '2018-04-17', 3),
(44, 29, 'cpf_29', 'cpf_29.', '2018-04-17', 3),
(45, 29, 'cnh_29', 'cnh_29.', '2018-04-17', 3),
(46, 30, 'rg_30', 'rg_30.jpg', '2018-04-17', 3),
(47, 30, 'cpf_30', 'cpf_30.', '2018-04-17', 3),
(48, 30, 'cnh_30', 'cnh_30.', '2018-04-17', 3),
(49, 31, 'rg_31', 'rg_31.jpg', '2018-04-17', 3),
(50, 32, 'cpf_32', 'cpf_32.jpg', '2018-04-17', 3),
(51, 32, 'cnh_32', 'cnh_32.jpg', '2018-04-17', 3),
(52, 32, 'rg_32', 'rg_32.jpg', '2018-04-17', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `username`, `cpf`, `id_profile`, `registration_date`, `status`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', 'admin@admin.com', 'admin123', 1, '2018-04-17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive_access`
--
ALTER TABLE `drive_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive_config`
--
ALTER TABLE `drive_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `envelop`
--
ALTER TABLE `envelop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_profile`
--
ALTER TABLE `level_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drive`
--
ALTER TABLE `drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drive_access`
--
ALTER TABLE `drive_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drive_config`
--
ALTER TABLE `drive_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `envelop`
--
ALTER TABLE `envelop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `level_profile`
--
ALTER TABLE `level_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
