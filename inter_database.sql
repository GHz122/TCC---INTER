-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 01:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inter_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCat`) VALUES
(1, 'Camisas'),
(2, 'Jaquetas'),
(3, 'Calças'),
(4, 'Tênis'),
(5, 'Relógios'),
(6, 'Colares'),
(7, 'Brincos'),
(8, 'Anéis');

-- --------------------------------------------------------

--
-- Table structure for table `desc_prod`
--

CREATE TABLE `desc_prod` (
  `d_id` int(11) NOT NULL,
  `p_ID` int(11) NOT NULL,
  `d_Tamanho` int(11) NOT NULL,
  `d_comprimento` varchar(80) NOT NULL,
  `d_largura` varchar(80) NOT NULL,
  `d_tipoT` varchar(15) NOT NULL,
  `d_caimento` varchar(50) NOT NULL,
  `d_argola` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desc_prod`
--

INSERT INTO `desc_prod` (`d_id`, `p_ID`, `d_Tamanho`, `d_comprimento`, `d_largura`, `d_tipoT`, `d_caimento`, `d_argola`) VALUES
(1, 3, 1, '74 cm', '50 cm', '100% algodão', 'Regular fit', 'U'),
(2, 3, 2, '76 cm', '52 cm', '100% algodão', 'Regular fit', 'U'),
(3, 3, 3, '78 cm', '54 cm', '100% algodão', 'Regular fit', 'U'),
(4, 3, 4, '80 cm', '56 cm', '100% algodão', 'Regular fit', 'U'),
(5, 3, 5, '82 cm', '58 cm', '100% algodão', 'Regular fit ', 'U'),
(6, 6, 1, '74 cm', '50 cm', '100% algodão', 'Regular Fit', 'U'),
(7, 6, 2, '76 cm', '52 cm', '100% algodão', 'Regular Fit', 'U'),
(8, 6, 3, '78 cm', '54 cm', '100% algodão', 'Regular Fit', 'U'),
(9, 6, 4, '80 cm', '56 cm', '100% algodão', 'Regular Fit', 'U'),
(10, 6, 5, '82 cm', '58 cm', '100% algodão', 'Regular Fit', 'U'),
(11, 8, 1, '64 cm', '53 cm', '100% algodão', 'Regular Fit', ''),
(12, 8, 2, '64 cm', '57 cm', '100% algodão', 'Regular Fit', ''),
(13, 8, 3, '68 cm', '60 cm', '100% algodão', 'Regular Fit', ''),
(14, 8, 4, '69 cm', '63 cm', '100% algodão', 'Regular Fit', ''),
(15, 8, 5, '71 cm', '65 cm', '100% algodão', 'Regular Fit', ''),
(16, 10, 1, '36 cm', '109 cm', '100% algodão', 'Regular fit ', ''),
(17, 10, 2, '38 cm', '109,5 cm', '100% algodão', 'Regular fit ', ''),
(18, 10, 3, '42 cm', '110,5 cm', '100% algodão', 'Regular fit ', ''),
(19, 10, 4, '46 cm', '111,5 cm', '100% algodão', 'Regular fit ', ''),
(20, 10, 5, '54 cm', '113,5 cm', '100% algodão', 'Regular fit ', ''),
(22, 11, 1, '34 cm', '106 cm', '100% algodão', 'Regular fit ', ''),
(23, 11, 2, '38 cm', '107 cm', '100% algodão', 'Regular fit ', ''),
(24, 11, 3, '42 cm', '108 cm', '100% algodão', 'Regular fit ', ''),
(25, 11, 4, '46 cm', '109 cm', '100% algodão', 'Regular fit ', ''),
(26, 11, 5, '50 cm', '110 cm', '100% algodão', 'Regular fit ', ''),
(32, 44, 1, '73 cm', '56 cm', '100% algodão', 'Regular fit ', ''),
(33, 44, 2, '75 cm', '60 cm', '100% algodão', 'Regular fit ', ''),
(34, 44, 3, '78 cm', '64 cm', '100% algodão', 'Regular fit ', ''),
(35, 44, 4, '80 cm', '68 cm', '100% algodão', 'Regular fit ', ''),
(36, 44, 5, '82 cm', '72 cm', '100% algodão', 'Regular fit ', '');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `m_ID` int(11) NOT NULL,
  `m_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`m_ID`, `m_nome`) VALUES
(1, 'Polar'),
(2, 'Primitive'),
(3, 'STAPLE'),
(4, 'Nike'),
(5, 'Lacoste'),
(6, 'Life'),
(7, 'Vivara'),
(11, 'HUF');

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `p_ID` int(11) NOT NULL,
  `p_nome` varchar(100) NOT NULL,
  `p_adressImage` varchar(200) NOT NULL,
  `p_val` decimal(7,2) NOT NULL,
  `p_categoria` int(11) DEFAULT NULL,
  `p_marca` int(11) DEFAULT NULL,
  `p_sexo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`p_ID`, `p_nome`, `p_adressImage`, `p_val`, `p_categoria`, `p_marca`, `p_sexo`) VALUES
(1, 'Camiseta Polar Callistemon Fill Logo Branco', 'Camisas/polar_callistemon_fill_logo.jpg', '100.00', 1, 1, '2'),
(2, 'Camiseta Polar Happy Sad Around L/s Preto', 'Camisas/Polar_Happy_Sad_Around.jpg', '150.00', 1, 1, '2'),
(3, 'Camiseta Polar Team Preto', 'Camisas/Polar_Team_Preto.jpg', '320.00', 1, 1, '2'),
(4, 'CAMISETA PRIMITIVE STRONGER VINHO', 'Camisas/primitive_stronger_vinho.jpg', '270.00', 1, 2, '2'),
(5, 'CAMISETA STAPLE TRINFECTA STRIPE AZUL', 'Camisas/staple_lightning_preto.jpg', '99.00', 1, 3, '2'),
(6, 'CAMISETA STAPLE LIGHTNING PRETO', 'Camisas/staple_trinfecta_stripe.jpg', '420.00', 1, 3, '2'),
(7, 'CAMISETA PRIMITIVE DIRTY P LILY L/S ROSA', 'Camisas/primitive_dirty_p_lily.jpg', '299.90', 1, 2, '2'),
(8, 'MOLETOM PRIMITIVE DIRTY CUPID ROSA', 'Jaquetas/moletomPrimitiveRosaDirty.jpg', '499.90', 2, 2, '2'),
(9, 'Jaqueta Nike Sportswear Heritage', 'Jaquetas/jaqueta-nike-sportswear-heritage-feminina.jpg', '199.90', 2, 4, '1'),
(10, 'CALÇA PRIMITIVE NARUTO UZUMAKI FLEECE PRETO', 'Calças/calcaNaruto.jpg', '350.00', 3, 2, '2'),
(11, 'Legging Nike Air Epic Fast Feminina', 'Calças/legging-nike-air-epic-fast-feminina.jpg', '260.00', 3, 4, '1'),
(12, 'TÊNIS NIKE AIR FORCE 1 LOW RETRO SP MARROM', 'Tênis/airNikeForce-1-Retro.jpg', '524.00', 4, 4, '2'),
(13, 'Tênis Nike Air Max 95 Edição Especial Feminino', 'Tênis/tenisNikeAirMax95Feminino.jpg', '999.99', 4, 4, '1'),
(14, 'Relógio Lacoste Masculino Couro Preto', 'Relógios/relogioLacostePretoBorracha.webp', '990.90', 5, 5, '3'),
(15, 'Colar Life Masculino Aço Preto', 'Colares/colarLifePretoVivara.jpg', '310.00', 6, 6, '3'),
(16, 'Argola Life Achatada 20 mm', 'Brincos/brincoLife20mm.webp', '180.00', 7, 6, '3'),
(17, 'Anel Prata e Ródio Negro', 'Anéis/anelPrataRodio.webp', '555.00', 8, 7, '3'),
(41, 'CAMISETA STAPLE PIGEON EMBROIDERED PRETO', 'Camisas/a3b67e53bf0cddfd2f73cd0862dcaf65.jpg', '250.50', 1, 3, '2'),
(43, 'CALÇA NIKE WINDRUNNER MASCULINO BRANCO', 'Calças/91429aed366568874860ad96f464e48e.jpg', '167.00', 3, 4, '2'),
(44, 'JAQUETA MAZE APPAREL 95 PRETO', 'Jaquetas/87de400a1b48bd4dbba46f4bc47bea88.jpg', '330.00', 2, 2, '2'),
(46, 'MOLETOM MAZE TIGRE PRETO', 'Jaquetas/40d8daf4d3fe62c1ee671e8554fd87a6.jpg', '249.90', 2, 2, '2'),
(56, 'CALÇA HUF MARATHON PRETO', 'Calças/e9a757a3ef86702936fbfa7e1c7cc0cd.jpg', '150.00', 3, 11, '2');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `U_id` int(11) NOT NULL,
  `U_nome` varchar(80) NOT NULL,
  `U_email` varchar(80) NOT NULL,
  `U_senha` varchar(15) NOT NULL,
  `U_status` tinyint(1) NOT NULL,
  `U_estado` varchar(80) DEFAULT NULL,
  `U_cep` varchar(9) DEFAULT NULL,
  `U_nasc` date DEFAULT NULL,
  `U_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`U_id`, `U_nome`, `U_email`, `U_senha`, `U_status`, `U_estado`, `U_cep`, `U_nasc`, `U_img`) VALUES
(1, 'Guilherme Denez', 'gui@gmail.com', 'gui123', 1, 'SP', '03939039', NULL, '190c5dbec8a6576fe6ccd5d49b259b15.jpg'),
(2, 'Breno Santos', 'bre@gmail.com', 'bre123', 1, 'SP', '03939039', NULL, 'f0a5bbb9e8bf6135fba6d0c2ff77732e.jpg'),
(4, 'Luiz Felipe', 'luFe@hotmail.com', 'lufe123', 0, 'BA', '03572555', '2000-05-16', '839428c6d07b7cf95e190cc0a7fd6f67.jpg'),
(7, 'Carlos Gomes', 'Cag@hotmail.com', 'ca123', 0, 'MG', '03584280', '1999-06-25', '8f5dfcbd1ae93cea57f185af64a27c'),
(15, 'Renata Denez', 're@outlook.com', 're123', 0, 'SP', '03522410', '1977-08-31', '8d06b63d3885ccafeec1f55a0cbac470.jpg'),
(25, 'Richard Santos', 'riSan@hotmail.com', '123', 0, 'PR', '05825555', '1977-05-28', 'c576d5d24eacc014adcf377e324910cd.jpg'),
(26, 'Rubinho Gomes', 'ruGomes@gmail.com', '123', 0, 'AL', '02877615', '0000-00-00', 'cad67eafb629dbb6bdefd621f5487a4f.jpg'),
(27, 'Lucas Silva', 'lu123@gmail.com', '123', 0, 'MT', '08875111', '0000-00-00', '6b7e63070db2e59350f8f3fae6c3011d.jpg'),
(28, 'Mateus Gomes', 'ma@gmail.com', 'ma123', 0, 'RJ', '08775333', '0000-00-00', 'fe344355bdeebdb3a40b4785c4897136.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE `vendas` (
  `v_ID` int(11) NOT NULL,
  `no_ticket` varchar(13) NOT NULL,
  `U_id` int(11) NOT NULL,
  `p_ID` int(11) NOT NULL,
  `qnt_prod` int(11) NOT NULL,
  `val_item` decimal(10,2) NOT NULL,
  `val_total` decimal(10,2) GENERATED ALWAYS AS (`qnt_prod` * `val_item`) VIRTUAL,
  `data_venda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendas`
--

INSERT INTO `vendas` (`v_ID`, `no_ticket`, `U_id`, `p_ID`, `qnt_prod`, `val_item`, `data_venda`) VALUES
(26, '60d4bb892959c', 1, 15, 1, '310.00', '2021-06-24'),
(27, '60d4bb8ac9b97', 1, 15, 1, '310.00', '2021-06-24'),
(28, '60d4bb9982d04', 1, 15, 1, '310.00', '2021-06-24'),
(29, '60d4bb9b0401d', 1, 15, 1, '310.00', '2021-06-24'),
(30, '60d4bbbf20d6e', 1, 15, 1, '310.00', '2021-06-24'),
(31, '60d4bbccdfe6c', 1, 15, 1, '310.00', '2021-06-24'),
(32, '60d4bc36093c5', 1, 15, 1, '310.00', '2021-06-24'),
(33, '60d4bc3e637b1', 1, 15, 1, '310.00', '2021-06-24'),
(34, '60d4bc48a05b0', 1, 15, 1, '310.00', '2021-06-24'),
(35, '60d4bc5b47e71', 1, 15, 1, '310.00', '2021-06-24'),
(36, '60d4bc67a9716', 1, 15, 1, '310.00', '2021-06-24'),
(37, '60d4bc8556e86', 1, 15, 1, '310.00', '2021-06-24'),
(38, '60d4bc90efdf6', 1, 15, 1, '310.00', '2021-06-24'),
(39, '60d4cccda7d4d', 15, 13, 1, '999.99', '2021-06-24'),
(40, '60d4ce0f61a9b', 1, 16, 1, '180.00', '2021-06-24'),
(41, '60d4dad20a040', 15, 16, 1, '180.00', '2021-06-24'),
(42, '60d4dad20a040', 15, 43, 1, '167.00', '2021-06-24'),
(43, '60d4dad20a040', 15, 15, 1, '310.00', '2021-06-24'),
(44, '60d4dad20a040', 15, 14, 1, '990.90', '2021-06-24'),
(45, '60d4dcfcc041c', 21, 12, 1, '524.00', '2021-06-24'),
(46, '60d4dcfcc041c', 21, 10, 1, '350.00', '2021-06-24'),
(47, '60d4dcfcc041c', 21, 3, 1, '320.00', '2021-06-24'),
(48, '60db7c226d915', 25, 43, 1, '167.00', '2021-06-29'),
(49, '60db7c226d915', 25, 9, 1, '199.90', '2021-06-29'),
(50, '60db84fdd1504', 26, 17, 1, '555.00', '2021-06-29'),
(51, '60db84fdd1504', 26, 43, 1, '167.00', '2021-06-29'),
(52, '60db84fdd1504', 26, 13, 1, '999.99', '2021-06-29'),
(53, '60db8f35dce48', 27, 10, 1, '350.00', '2021-06-29'),
(54, '60db8f35dce48', 27, 3, 1, '320.00', '2021-06-29'),
(55, '60db960aeb55f', 28, 10, 1, '350.00', '2021-06-29'),
(56, '60db960aeb55f', 28, 3, 1, '320.00', '2021-06-29'),
(57, '60dba41d7bf89', 29, 41, 1, '250.50', '2021-06-30'),
(58, '60dba41d7bf89', 29, 3, 1, '320.00', '2021-06-30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_vendas`
-- (See below for the actual view)
--
CREATE TABLE `vw_vendas` (
`no_ticket` varchar(13)
,`U_id` int(11)
,`data_venda` date
,`p_nome` varchar(100)
,`qnt_prod` int(11)
,`val_item` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_vendas`
--
DROP TABLE IF EXISTS `vw_vendas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vendas`  AS SELECT `v`.`no_ticket` AS `no_ticket`, `v`.`U_id` AS `U_id`, `v`.`data_venda` AS `data_venda`, `p`.`p_nome` AS `p_nome`, `v`.`qnt_prod` AS `qnt_prod`, `v`.`val_item` AS `val_item` FROM (`vendas` `v` join `produtos` `p` on(`v`.`p_ID` = `p`.`p_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `desc_prod`
--
ALTER TABLE `desc_prod`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `p_ID` (`p_ID`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`m_ID`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`p_ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`U_id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`v_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `m_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `p_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `U_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `v_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desc_prod`
--
ALTER TABLE `desc_prod`
  ADD CONSTRAINT `desc_prod_ibfk_1` FOREIGN KEY (`p_ID`) REFERENCES `produtos` (`p_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
