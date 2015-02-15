-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Fev-2015 às 23:16
-- Versão do servidor: 10.0.15-MariaDB
-- PHP Version: 5.6.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webdb`
--
CREATE DATABASE IF NOT EXISTS `webdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webdb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `arq_imagem` varchar(100) NOT NULL,
  `arq_texto` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `albums`
--

INSERT INTO `albums` (`id`, `artist`, `title`, `arq_imagem`, `arq_texto`, `tipo`) VALUES
(182, 'alalalalala', 'oakakaoakaok', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(183, 'asdasdasdasda', 'sadasdasdasd', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(184, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(185, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(186, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(187, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(188, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(189, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(190, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(191, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(192, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(193, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(194, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(195, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(196, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(197, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(198, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(199, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(200, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(201, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(202, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(203, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(204, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(205, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(206, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(207, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(208, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(209, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(210, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(211, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(212, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(213, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(214, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(215, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(216, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(217, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(218, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(219, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(220, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(221, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(222, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(223, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(224, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(225, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(226, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(227, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(228, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(229, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(230, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(231, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(233, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(234, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(235, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(236, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(237, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(238, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(239, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(240, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(241, 'asdasdasdasdas', 'asdasdasdasdas', '1422705833-+-aaal.jpg', '1422705833-+-texto1', 1),
(242, 'Teste', 'teste', '1423189492-+-220px-Emperor_Penguin_Manchot_empereur.jpg', '1423189492-+-teste', 1),
(243, 'sadasdasdsa', 'saddasdsadsa', '1423189604-+-220px-Emperor_Penguin_Manchot_empereur.jpg', '1423189604-+-teste', 1),
(244, 'sadasdasdsa', 'sadsadasdas', '1423189752-+-220px-Emperor_Penguin_Manchot_empereur.jpg', '1423189752-+-teste', 1),
(245, 'asdasdsad', 'asdsadasd', '1423189798-+-220px-Emperor_Penguin_Manchot_empereur.jpg', '1423189798-+-teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `midias`
--

CREATE TABLE IF NOT EXISTS `midias` (
  `id` int(11) NOT NULL,
  `midia` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `midias`
--

INSERT INTO `midias` (`id`, `midia`) VALUES
(1, 'dvd'),
(2, 'cd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nivel`) VALUES
(1, 'leo8789', 'c51e21fe3ff6de1e1a8aad4f1de35b31fa31c736', 'admin'),
(2, 'rau123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`), ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `midias`
--
ALTER TABLE `midias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `midias`
--
ALTER TABLE `midias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
