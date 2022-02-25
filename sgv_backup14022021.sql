-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Fev-2022 às 21:49
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_almox`
--

CREATE TABLE `c_almox` (
  `id_almox` int(11) NOT NULL,
  `nome_almox` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_almox`
--

INSERT INTO `c_almox` (`id_almox`, `nome_almox`) VALUES
(1, 'Almoxarifado Central');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_capa_em`
--

CREATE TABLE `c_capa_em` (
  `id_capaem` bigint(20) NOT NULL,
  `cnpj_capaem` bigint(14) DEFAULT NULL,
  `cpf_capaem` bigint(11) DEFAULT NULL,
  `rz_social_capaem` varchar(100) NOT NULL,
  `numero_notafisc_capaem` varchar(100) NOT NULL,
  `dt_entrada` date NOT NULL,
  `data_notafisc` date NOT NULL,
  `cep_capaem` varchar(8) DEFAULT NULL,
  `uf_capaem` char(2) DEFAULT NULL,
  `cidade_capaem` varchar(100) DEFAULT NULL,
  `endereco_capaem` varchar(100) DEFAULT NULL,
  `bairro_capaem` varchar(100) DEFAULT NULL,
  `telefone_capaem` varchar(50) DEFAULT NULL,
  `email_capaem` varchar(50) DEFAULT NULL,
  `vl_conferencia` double(15,2) DEFAULT NULL,
  `id_almox_capaem_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_capa_em`
--

INSERT INTO `c_capa_em` (`id_capaem`, `cnpj_capaem`, `cpf_capaem`, `rz_social_capaem`, `numero_notafisc_capaem`, `dt_entrada`, `data_notafisc`, `cep_capaem`, `uf_capaem`, `cidade_capaem`, `endereco_capaem`, `bairro_capaem`, `telefone_capaem`, `email_capaem`, `vl_conferencia`, `id_almox_capaem_FK`) VALUES
(75, 71985412000176, NULL, 'Atacadão Rio verde Ltda', '1001', '2021-10-11', '2021-10-11', '74680-12', 'GO', 'Rio verde', 'rua das lages, 785', 'Lurdes', '62 32361478', 'teste@teste.com', 200.00, 1),
(76, 71985412000176, NULL, 'Atacadão Rio verde Ltda', '1002', '2021-10-11', '2021-10-11', '74680-12', 'GO', 'Rio verde', 'rua das lages, 785', 'Lurdes', '62 32361478', 'teste@teste.com', 500.50, 1),
(85, 17031642000150, NULL, 'Atacadão Boa Sorte', '2000', '2021-10-11', '2021-10-11', '76893-69', 'SP', 'Araçatuba', 'Rua das violetas, 789 ', 'Concordia', '189999-8989', 'teste@gmail.com', 200.00, 1),
(87, 17109301000150, NULL, 'Atacadão Arçatuba LTD', '8523', '2021-10-15', '2021-10-14', '76893-22', 'SP', 'Araçatuba', 'Rua rio Negro, 999', 'Iporã', '18 3236-7896', 'teste@teste.com', 250.00, 1),
(89, 17109301000150, NULL, 'Atacadão Arçatuba LTD', '8963', '2021-10-16', '2021-10-15', '76893-22', 'SP', 'Araçatuba', 'Rua rio Negro, 999', 'Iporã', '18 3236-7896', 'teste@teste.com', 100.00, 1),
(90, 71985412000176, NULL, 'Atacadão Rio verde Ltda', '99999', '2021-10-25', '2021-10-24', '74680-12', 'GO', 'Rio verde', 'rua das lages, 785', 'Lurdes', '62 32361478', 'teste@teste.com', 100.00, 1),
(91, 0, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 0.00, 1),
(92, 82807675000101, NULL, 'Atacadao raio de sul', '1788', '2021-11-08', '2021-11-08', '99999999', 'sp', 'araçatuba', 'teste', 'teste', '1899999999', 'teste@teste.com', 100.00, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_fornecedor`
--

CREATE TABLE `c_fornecedor` (
  `id_forn` bigint(20) NOT NULL,
  `cnpj_forn` bigint(14) DEFAULT NULL,
  `cpf_forn` bigint(11) DEFAULT NULL,
  `rz_social_forn` varchar(100) NOT NULL,
  `cep_forn` varchar(8) DEFAULT NULL,
  `uf_forn` varchar(2) DEFAULT NULL,
  `cidade_forn` varchar(100) DEFAULT NULL,
  `endereco_forn` varchar(100) DEFAULT NULL,
  `bairro_forn` varchar(100) DEFAULT NULL,
  `telefone_forn` varchar(250) DEFAULT NULL,
  `email_forn` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_fornecedor`
--

INSERT INTO `c_fornecedor` (`id_forn`, `cnpj_forn`, `cpf_forn`, `rz_social_forn`, `cep_forn`, `uf_forn`, `cidade_forn`, `endereco_forn`, `bairro_forn`, `telefone_forn`, `email_forn`) VALUES
(19, 71985412000176, NULL, 'Atacadão Rio verde Ltda', '74680-12', 'GO', 'Rio verde', 'rua das lages, 785', 'Lurdes', '62 32361478', 'teste@teste.com'),
(28, 17031642000150, NULL, 'Atacadão Boa Sorte', '76893-69', 'SP', 'Araçatuba', 'Rua das violetas, 789 ', 'Concordia', '189999-8989', 'teste@gmail.com'),
(29, 17109301000150, NULL, 'Atacadão Arçatuba LTD', '76893-22', 'SP', 'Araçatuba', 'Rua rio Negro, 999', 'Iporã', '18 3236-7896', 'teste@teste.com'),
(30, 17109301000150, NULL, 'Atacadão Arçatuba LTD', '76893-22', 'SP', 'Araçatuba', 'Rua rio Negro, 999', 'Iporã', '18 3236-7896', 'teste@teste.com'),
(31, 71985412000176, NULL, 'Atacadão Rio verde Ltda', '74680-12', 'GO', 'Rio verde', 'rua das lages, 785', 'Lurdes', '62 32361478', 'teste@teste.com'),
(32, 82807675000101, NULL, 'Atacadao raio de sul', '99999999', 'sp', 'araçatuba', 'teste', 'teste', '1899999999', 'teste@teste.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_inutilizacao`
--

CREATE TABLE `c_inutilizacao` (
  `id_inu` int(11) NOT NULL,
  `hora_inu` time NOT NULL,
  `data_inu` date NOT NULL,
  `id_almox_inu_fk` int(11) NOT NULL,
  `motivo_inu` varchar(150) NOT NULL,
  `lote_inu` varchar(100) NOT NULL,
  `id_mat_inu` int(11) NOT NULL,
  `desc_mat_inu` varchar(250) NOT NULL,
  `medida_inu` varchar(30) NOT NULL,
  `qtd_estoque_inu` decimal(15,2) NOT NULL,
  `preco_medio_item_inu` decimal(15,2) NOT NULL,
  `preco_total_item_inu` decimal(15,2) NOT NULL,
  `marca_mat_inu` varchar(150) NOT NULL,
  `data_fab_inu` date NOT NULL,
  `data_val_inu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_inutilizacao`
--

INSERT INTO `c_inutilizacao` (`id_inu`, `hora_inu`, `data_inu`, `id_almox_inu_fk`, `motivo_inu`, `lote_inu`, `id_mat_inu`, `desc_mat_inu`, `medida_inu`, `qtd_estoque_inu`, `preco_medio_item_inu`, `preco_total_item_inu`, `marca_mat_inu`, `data_fab_inu`, `data_val_inu`) VALUES
(1, '14:42:00', '2021-10-23', 1, 'Material Vencido', 'LT08', 47, 'Extrato de tomate 100 gramas', 'Un', '100.00', '1.00', '100.00', 'Elefante', '2021-10-15', '2021-10-15'),
(4, '15:25:00', '2021-10-23', 1, 'Material Vencido', 'LT09', 46, 'Macarrão instantâneo', 'Un', '100.00', '1.50', '150.00', 'Nissin', '2021-10-15', '2021-10-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_inventario_item`
--

CREATE TABLE `c_inventario_item` (
  `id_inv` int(11) NOT NULL,
  `hora_inv` time DEFAULT NULL,
  `data_inv` date DEFAULT NULL,
  `id_almox_inv_FK` int(11) DEFAULT NULL,
  `lote_inv` varchar(100) DEFAULT NULL,
  `id_mat_inv` int(11) DEFAULT NULL,
  `desc_mat_inv` varchar(250) DEFAULT NULL,
  `medida_inv` varchar(250) DEFAULT NULL,
  `qtd_em_estoque_inv` decimal(15,2) DEFAULT NULL,
  `qtd_novo_estoque_inv` decimal(15,2) DEFAULT NULL,
  `preco_medio_inv` decimal(15,2) DEFAULT NULL,
  `preco_total_item` decimal(15,2) DEFAULT NULL,
  `motivo_inv` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_inventario_item`
--

INSERT INTO `c_inventario_item` (`id_inv`, `hora_inv`, `data_inv`, `id_almox_inv_FK`, `lote_inv`, `id_mat_inv`, `desc_mat_inv`, `medida_inv`, `qtd_em_estoque_inv`, `qtd_novo_estoque_inv`, `preco_medio_inv`, `preco_total_item`, `motivo_inv`) VALUES
(2, '11:59:00', '2021-10-15', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '12.00', '11.00', '19.00', '209.00', 'Ajuste de Estoque'),
(3, '11:59:00', '2021-10-15', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '12.00', '11.00', '19.00', '209.00', 'Ajuste de Estoque'),
(4, '11:59:00', '2021-10-15', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '12.00', '11.00', '19.00', '209.00', 'Ajuste de Estoque'),
(5, '00:00:00', '0000-00-00', 1, 'LT02', 42, 'Feijão preto tipo 1 pacote 1 kg', 'Un', '10.00', '9.00', '5.60', '50.40', 'Ajuste de Estoque'),
(6, '00:00:00', '0000-00-00', 1, 'LT02', 42, 'Feijão preto tipo 1 pacote 1 kg', 'Un', '10.00', '9.00', '5.60', '50.40', 'Ajuste de Estoque'),
(7, '00:00:00', '0000-00-00', 1, 'LT09', 46, 'Macarrão instantâneo', 'Un', '250.00', '100.00', '1.50', '150.00', 'Ajuste de Estoque'),
(8, '00:00:00', '0000-00-00', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '12.00', '11.00', '19.00', '209.00', 'Ajuste de Estoque'),
(9, '22:44:00', '2021-10-18', 1, 'LT02', 42, 'Feijão preto tipo 1 pacote 1 kg', 'Un', '9.00', '8.00', '5.60', '44.80', 'Ajuste de Estoque'),
(10, '21:23:00', '2021-10-21', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '11.00', '9.00', '19.00', '171.00', 'Ajuste de Estoque'),
(11, '21:36:00', '2021-10-25', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '9.00', '7.00', '19.00', '133.00', 'Ajuste de Estoque'),
(12, '00:00:00', '0000-00-00', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '7.00', '8.00', '19.00', '152.00', 'Ajuste de Estoque'),
(13, '00:00:00', '0000-00-00', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '8.00', '10.00', '19.00', '1.00', NULL),
(14, '00:00:00', '0000-00-00', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '10.00', '1.00', '19.00', '19.00', NULL),
(15, '00:00:00', '0000-00-00', 1, 'LT02', 42, 'Feijão preto tipo 1 pacote 1 kg', 'Un', '8.00', '1.00', '5.60', '0.00', 'Ajuste de Estoque'),
(16, '21:34:00', '2022-02-07', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '0.00', '2.00', '19.00', '38.00', 'Ajuste de Estoque'),
(17, '21:41:00', '2022-02-07', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '0.00', '5.00', '19.00', '95.00', 'Ajuste de Estoque'),
(18, '21:44:00', '2022-02-07', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '0.00', '5.00', '19.00', '95.00', 'Ajuste de Estoque'),
(19, '22:12:00', '2022-02-07', 1, 'LT01', 41, 'Arroz tipo 1 pacote 5 kg agulhinha', 'Un', '0.00', '10.00', '19.00', '190.00', 'Ajuste de Estoque'),
(20, '00:00:00', '0000-00-00', 1, 'LT05', 45, 'Açúcar mascavo pacote 5 kg', 'Un', '7.00', '0.00', '14.95', '0.00', 'Ajuste de Estoque'),
(21, '22:24:00', '2022-02-07', 1, 'LT05', 45, 'Açúcar mascavo pacote 5 kg', 'Un', '7.00', '8.00', '14.95', '119.60', 'Ajuste de Estoque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_item_em`
--

CREATE TABLE `c_item_em` (
  `id_item_em` bigint(20) NOT NULL,
  `nome_ite` varchar(100) NOT NULL,
  `det_ite` text DEFAULT NULL,
  `marca_ite` varchar(100) DEFAULT NULL,
  `grupo_ite` varchar(100) DEFAULT NULL,
  `medida_ite` char(2) NOT NULL,
  `qtd_ite` double(15,2) NOT NULL,
  `vl_unit_ite` double(15,2) NOT NULL,
  `vl_total_ite` double(15,2) NOT NULL,
  `id_capaem` bigint(20) NOT NULL,
  `numero_notafisc_capaem` varchar(100) NOT NULL,
  `lote_prod_ite_nf` varchar(100) NOT NULL,
  `data_fab_prod_ite_nf` date DEFAULT NULL,
  `data_valid_prod_ite_nf` date DEFAULT NULL,
  `id_almox_item_em_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_item_em`
--

INSERT INTO `c_item_em` (`id_item_em`, `nome_ite`, `det_ite`, `marca_ite`, `grupo_ite`, `medida_ite`, `qtd_ite`, `vl_unit_ite`, `vl_total_ite`, `id_capaem`, `numero_notafisc_capaem`, `lote_prod_ite_nf`, `data_fab_prod_ite_nf`, `data_valid_prod_ite_nf`, `id_almox_item_em_FK`) VALUES
(172, 'Arroz tipo 1 agulhinha pacote 5 kg', NULL, 'Cristal', 'Gêneros alimenticios', 'Un', 10.00, 15.50, 155.00, 75, '1001', 'LT01', '2021-01-01', '2022-12-31', 1),
(173, 'Arroz tipo 1 agulhinha pacote 5 kg', NULL, 'Cristal', 'Gêneros alimenticios', 'Un', 2.00, 22.50, 45.00, 75, '1001', 'LT01', '2021-01-01', '2022-12-31', 1),
(174, 'Feijão preto tipo 1 pacote 1 kg', NULL, 'Dona Cota', 'Gêneros alimenticios', 'Un', 10.00, 5.60, 56.00, 76, '1002', 'LT02', '2021-01-01', '2023-12-31', 1),
(175, 'Farinha de trigo pacote 1 kg', NULL, 'Cristal', 'Gêneros alimenticios', 'Un', 50.00, 3.90, 195.00, 76, '1002', 'LT03', '2021-03-01', '2022-09-08', 1),
(176, 'Farinha de milho pacote 500 gramas', NULL, 'Flocão', 'Gêneros alimenticios', 'Un', 50.00, 2.00, 100.00, 76, '1002', 'LT04', '2021-05-01', '2022-07-08', 1),
(177, 'Açúcar mascavo pacote 5 kg', NULL, 'Naturalis', 'Gêneros alimenticios', 'Un', 10.00, 14.95, 145.50, 76, '1002', 'LT05', '2021-01-01', '2023-12-31', 1),
(178, 'Macarrão instantâneo', NULL, 'Nissin', 'Gêneros alimenticios', 'Un', 250.00, 1.50, 375.00, 87, '8523', 'LT09', '2021-10-15', '2021-10-16', 1),
(179, 'Extrato de tomate 100 gramas', NULL, 'Elefante', 'Gêneros alimenticios', 'Un', 100.00, 1.00, 100.00, 89, '8963', 'LT08', '2021-10-15', '2021-10-15', 1),
(180, 'Creme dental com fluor', NULL, 'Colgate', 'Material de Limpeza', 'Un', 50.00, 1.00, 50.00, 90, '99999', 'LT20', '2021-05-25', '2021-10-25', 1),
(181, 'Sabonete', NULL, 'Rexona', 'Material de Limpeza', 'Un', 50.00, 1.00, 50.00, 90, '99999', 'LT21', '2021-10-23', '2021-10-24', 1),
(182, 'Leite po', NULL, 'vAQUINHA', 'Gêneros alimenticios', 'Un', 10.00, 5.00, 50.00, 92, '1788', 'LT50', '2021-11-08', '2021-11-30', 1),
(183, 'Leite em po', NULL, 'Vaquinha', 'Gêneros alimenticios', 'Un', 10.00, 5.00, 50.00, 92, '1788', 'LT50', '2021-11-08', '2021-12-07', 1),
(184, 'Creme dental 75 gramas', NULL, 'COLGATE TOTAL 10', 'Material de Limpeza', 'Un', 1.00, 3.50, 3.50, 76, '1002', 'LT25', '2022-02-09', '2022-04-30', 1),
(185, 'Polpa de fruta Manga', NULL, 'FRUTARE', 'Gêneros alimenticios', 'Un', 1.00, 0.50, 0.50, 76, '1002', 'LT26', '2022-02-11', '2022-05-11', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_produto`
--

CREATE TABLE `c_produto` (
  `id_produto` bigint(20) NOT NULL,
  `nome_prod` varchar(100) NOT NULL,
  `det_prod` text DEFAULT NULL,
  `grupo_prod` varchar(100) DEFAULT NULL,
  `medida_prod` char(3) NOT NULL,
  `qtd_estoque_prod` double(15,2) DEFAULT NULL,
  `vl_preco_med_prod` double(15,2) DEFAULT NULL,
  `vl_preco_total_prod` double(15,2) DEFAULT NULL,
  `percentual_lucro_prod` double(15,2) DEFAULT NULL,
  `valor_com_pecentual_prod` double(15,2) DEFAULT NULL,
  `marca_prod` varchar(100) DEFAULT NULL,
  `lote_prod` varchar(100) NOT NULL,
  `data_fab_prod` date DEFAULT NULL,
  `data_valid_prod` date DEFAULT NULL,
  `id_almox_prod_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_produto`
--

INSERT INTO `c_produto` (`id_produto`, `nome_prod`, `det_prod`, `grupo_prod`, `medida_prod`, `qtd_estoque_prod`, `vl_preco_med_prod`, `vl_preco_total_prod`, `percentual_lucro_prod`, `valor_com_pecentual_prod`, `marca_prod`, `lote_prod`, `data_fab_prod`, `data_valid_prod`, `id_almox_prod_FK`) VALUES
(41, 'Arroz tipo 1 pacote 5 kg agulhinha', NULL, 'Gêneros alimenticios', 'Un', 9.00, 19.00, 19.00, NULL, NULL, 'Cristal', 'LT01', '2021-01-01', '2022-03-31', 1),
(42, 'Feijão preto tipo 1 pacote 1 kg', NULL, 'Gêneros alimenticios', 'Un', 0.00, 5.60, 5.60, NULL, NULL, 'Dona Cota', 'LT02', '2021-01-01', '2023-12-31', 1),
(43, 'Farinha de trigo pacote 1 kg', NULL, 'Gêneros alimenticios', 'Un', 50.00, 3.90, 195.00, NULL, NULL, 'Cristal', 'LT03', '2021-03-01', '2022-04-30', 1),
(44, 'Farinha de milho pacote 500 gramas', NULL, 'Gêneros alimenticios', 'Un', 50.00, 2.00, 100.00, NULL, NULL, 'Flocão', 'LT04', '2021-05-01', '2022-07-08', 1),
(45, 'Açúcar mascavo pacote 5 kg', NULL, 'Gêneros alimenticios', 'Un', 7.00, 14.95, 14.95, NULL, NULL, 'Naturalis', 'LT05', '2021-01-01', '2023-12-31', 1),
(46, 'Macarrão instantâneo', NULL, 'Gêneros alimenticios', 'Un', 0.00, 0.00, 0.00, NULL, NULL, 'Nissin', 'LT09', '2021-10-15', '2021-10-16', 1),
(47, 'Extrato de tomate 100 gramas', NULL, 'Gêneros alimenticios', 'Un', 0.00, 0.00, 0.00, NULL, NULL, 'Elefante', 'LT08', '2021-10-15', '2021-10-15', 1),
(48, 'Creme dental com fluor', NULL, 'Material de Limpeza', 'Un', 50.00, 1.00, 50.00, NULL, NULL, 'Colgate', 'LT20', '2021-05-25', '2021-10-25', 1),
(49, 'Sabonete', NULL, 'Material de Limpeza', 'Un', 50.00, 1.00, 50.00, NULL, NULL, 'Rexona', 'LT21', '2021-10-23', '2021-10-24', 1),
(50, 'Leite po', NULL, 'Gêneros alimenticios', 'Un', 20.00, 5.00, 100.00, NULL, NULL, 'vAQUINHA', 'LT50', '2021-11-08', '2021-11-30', 1),
(51, 'Creme dental 75 gramas', NULL, 'Material de Limpeza', 'Un', 1.00, 3.50, 3.50, NULL, NULL, 'COLGATE TOTAL 10', 'LT25', '2022-02-09', '2022-04-30', 1),
(52, 'Polpa de fruta Manga', NULL, 'Gêneros alimenticios', 'Un', 1.00, 0.50, 0.50, NULL, NULL, 'FRUTARE', 'LT26', '2022-02-11', '2022-05-11', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_saida_material`
--

CREATE TABLE `c_saida_material` (
  `id_saida` int(11) NOT NULL,
  `id_almox_saida_fk` int(11) NOT NULL,
  `data_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `lote_mat_saida` varchar(250) NOT NULL,
  `id_mat_saida` int(11) NOT NULL,
  `desc_mat_saida` int(250) NOT NULL,
  `medida_mat_saida` varchar(250) NOT NULL,
  `qtd_saida_mat` decimal(10,0) NOT NULL,
  `preco_medio_saida` decimal(10,0) NOT NULL,
  `vl_total_item_saida` decimal(10,0) NOT NULL,
  `requisitante` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_saida_material`
--

INSERT INTO `c_saida_material` (`id_saida`, `id_almox_saida_fk`, `data_saida`, `hora_saida`, `lote_mat_saida`, `id_mat_saida`, `desc_mat_saida`, `medida_mat_saida`, `qtd_saida_mat`, `preco_medio_saida`, `vl_total_item_saida`, `requisitante`) VALUES
(1, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(2, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(3, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(4, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(5, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(6, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'lucas'),
(7, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(8, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(9, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(10, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(11, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(12, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(13, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(14, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(15, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(16, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(17, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(18, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(19, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(20, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(21, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(22, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(23, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(24, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(25, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(26, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(27, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(28, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(29, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(30, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(31, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(32, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(33, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', 'Lucas'),
(34, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(35, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(36, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(37, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(38, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(39, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(40, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(41, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(42, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(43, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(44, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(45, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(46, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(47, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(48, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(49, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '1', '19', '19', ''),
(50, 1, '0000-00-00', '00:00:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(51, 1, '2022-02-07', '21:26:00', 'LT02', 42, 0, 'Un', '2', '6', '11', 'Lucas'),
(52, 1, '2022-02-07', '21:34:00', 'LT02', 42, 0, 'Un', '1', '6', '6', ''),
(53, 1, '2022-02-07', '21:35:00', 'LT01', 41, 0, 'Un', '5', '19', '95', 'Joao'),
(54, 1, '2022-02-07', '21:35:00', 'LT01', 41, 0, 'Un', '5', '19', '95', 'Joao'),
(55, 1, '2022-02-07', '21:36:00', 'LT01', 41, 0, 'Un', '100', '19', '1900', ''),
(56, 1, '2022-02-07', '21:39:00', 'LT01', 41, 0, 'Un', '100', '19', '1900', 'Lucas'),
(57, 1, '2022-02-07', '21:39:00', 'LT01', 41, 0, 'Un', '2', '19', '38', 'Lucas'),
(58, 1, '2022-02-07', '21:41:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Lucas'),
(59, 1, '2022-02-07', '21:41:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Lucas'),
(60, 1, '2022-02-07', '21:41:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Lucas'),
(61, 1, '2022-02-07', '21:41:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Lucas'),
(62, 1, '2022-02-07', '21:41:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Lucas'),
(63, 1, '2022-02-07', '21:41:00', 'LT01', 41, 0, 'Un', '1', '19', '114', 'Lucas'),
(64, 1, '2022-02-07', '21:43:00', 'LT01', 41, 0, 'Un', '5', '19', '95', ''),
(65, 1, '2022-02-07', '21:43:00', 'LT01', 41, 0, 'Un', '5', '19', '95', ''),
(66, 1, '2022-02-07', '21:43:00', 'LT01', 41, 0, 'Un', '5', '19', '95', ''),
(67, 1, '2022-02-07', '21:43:00', 'LT01', 41, 0, 'Un', '5', '19', '95', ''),
(68, 1, '2022-02-07', '21:43:00', 'LT01', 41, 0, 'Un', '5', '19', '95', ''),
(69, 1, '2022-02-07', '21:43:00', 'LT01', 41, 0, 'Un', '5', '19', '95', ''),
(70, 1, '2022-02-07', '21:44:00', 'LT01', 41, 0, 'Un', '4', '19', '76', ''),
(71, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(72, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(73, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(74, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(75, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(76, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(77, 1, '0000-00-00', '21:45:00', 'LT01', 41, 0, 'Un', '5', '19', '97', ''),
(78, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(79, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(80, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(81, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(82, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(83, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(84, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(85, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(86, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(87, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(88, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(89, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(90, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(91, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(92, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(93, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(94, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(95, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(96, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(97, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(98, 1, '2022-02-07', '21:49:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'Joao'),
(99, 1, '0000-00-00', '00:00:00', 'LT01', 41, 0, 'Un', '7', '19', '133', ''),
(100, 1, '2022-02-07', '22:11:00', 'LT01', 41, 0, 'Un', '6', '19', '114', 'joao'),
(101, 1, '2022-02-07', '22:11:00', 'LT01', 41, 0, 'Un', '5', '19', '95', 'joao'),
(102, 1, '0000-00-00', '00:00:00', 'LT05', 45, 0, 'Un', '11', '15', '164', 'ana laura'),
(103, 1, '2022-02-07', '22:13:00', 'LT05', 45, 0, 'Un', '1', '15', '15', ''),
(104, 1, '0000-00-00', '22:16:00', 'LT01', 41, 0, 'Un', '1', '19', '19', '1'),
(105, 1, '0000-00-00', '00:00:00', 'LT05', 45, 0, 'Un', '1', '15', '15', ''),
(106, 1, '0000-00-00', '22:13:00', 'LT05', 45, 0, 'Un', '0', '15', '0', ''),
(107, 1, '0000-00-00', '22:13:00', 'LT05', 45, 0, 'Un', '1', '15', '15', ''),
(108, 1, '0000-00-00', '00:00:00', 'LT05', 45, 0, 'Un', '0', '15', '0', ''),
(109, 1, '0000-00-00', '00:00:00', 'LT05', 45, 0, 'Un', '0', '15', '0', 'rrr'),
(110, 1, '2022-02-07', '22:22:00', 'LT05', 45, 0, 'Un', '21', '15', '314', ''),
(111, 1, '2022-02-08', '19:03:00', 'LT05', 45, 0, 'Un', '9', '15', '135', 'Lucas'),
(112, 1, '2022-02-08', '19:04:00', 'LT05', 45, 0, 'Un', '8', '15', '121', 'Lucas'),
(113, 1, '2022-02-08', '21:48:00', 'LT05', 45, 0, 'Un', '12', '15', '179', ''),
(114, 1, '2022-02-09', '19:15:00', 'LT05', 45, 0, 'Un', '9', '15', '135', 'Chico'),
(115, 1, '2022-02-09', '19:15:00', 'LT05', 45, 0, 'Un', '1', '15', '15', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_usuario`
--

CREATE TABLE `c_usuario` (
  `idLogin` int(11) NOT NULL,
  `nomeLogin` varchar(100) NOT NULL,
  `usuarioLogin` varchar(100) NOT NULL,
  `nivelLogin` varchar(1) NOT NULL,
  `emailLogin` varchar(100) NOT NULL,
  `senhaLogin` varchar(255) NOT NULL,
  `dataLogin` date NOT NULL,
  `statusLogin` varchar(1) NOT NULL,
  `idAlmoxLogin_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `c_usuario`
--

INSERT INTO `c_usuario` (`idLogin`, `nomeLogin`, `usuarioLogin`, `nivelLogin`, `emailLogin`, `senhaLogin`, `dataLogin`, `statusLogin`, `idAlmoxLogin_FK`) VALUES
(1, 'Administrador Sistemas', 'admin', '1', 'adm@teste.com', '$2y$10$QsqVHF5HkzHdD.HduZphee4mLqzhDQ3U7kg8gay5L9mcLWPtzK/5G', '2021-09-19', '1', 1),
(2, 'Marina Rui Barbosa', 'marina.sgm', '2', 'marina@teste.com', '$2y$10$pi9eAc73RD1ISiJma/6ywONW/3X13JhnK4lCEMsgZ5yRHk7KrZ9gi', '2021-09-19', '1', 1),
(3, 'Almoxarife', 'almox.sgm', '1', 'almox@gmail.com', '$2y$10$hEEgP4jplio.Y.JPTEvvF.AE2oG0Uc80ftkqzJkvl4MRwooqxWKQK', '2021-09-19', '1', 1),
(4, 'Geraldo Luiz', 'geraldo.sgm', '2', 'geraldo@gmail.com', '$2y$10$0CxndyXukKgTSXIMOYNQLu9W6PVBmsOxrPQ/1316sumMwE9I9LHBS', '2021-10-10', '1', 1),
(5, 'Almoxarifado', 'almox', '1', 'almox@etec.com', '$2y$10$UBcMMYgqvyQ7J2LO7AkJzuARLCY1CKThwgCVY6kNTJPw/fOBqkqCq', '2021-10-15', '1', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `c_almox`
--
ALTER TABLE `c_almox`
  ADD PRIMARY KEY (`id_almox`);

--
-- Índices para tabela `c_capa_em`
--
ALTER TABLE `c_capa_em`
  ADD PRIMARY KEY (`id_capaem`),
  ADD KEY `id_almox_capaem` (`id_almox_capaem_FK`);

--
-- Índices para tabela `c_fornecedor`
--
ALTER TABLE `c_fornecedor`
  ADD PRIMARY KEY (`id_forn`);

--
-- Índices para tabela `c_inutilizacao`
--
ALTER TABLE `c_inutilizacao`
  ADD PRIMARY KEY (`id_inu`);

--
-- Índices para tabela `c_inventario_item`
--
ALTER TABLE `c_inventario_item`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_almox_inv` (`id_almox_inv_FK`);

--
-- Índices para tabela `c_item_em`
--
ALTER TABLE `c_item_em`
  ADD PRIMARY KEY (`id_item_em`),
  ADD KEY `c_item_em_ibfk_1` (`id_capaem`),
  ADD KEY `id_almox_item_em_FK` (`id_almox_item_em_FK`);

--
-- Índices para tabela `c_produto`
--
ALTER TABLE `c_produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_almox_prod_FK` (`id_almox_prod_FK`);

--
-- Índices para tabela `c_saida_material`
--
ALTER TABLE `c_saida_material`
  ADD PRIMARY KEY (`id_saida`);

--
-- Índices para tabela `c_usuario`
--
ALTER TABLE `c_usuario`
  ADD PRIMARY KEY (`idLogin`),
  ADD KEY `idAlmoxLogin_FK` (`idAlmoxLogin_FK`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `c_almox`
--
ALTER TABLE `c_almox`
  MODIFY `id_almox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `c_capa_em`
--
ALTER TABLE `c_capa_em`
  MODIFY `id_capaem` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `c_fornecedor`
--
ALTER TABLE `c_fornecedor`
  MODIFY `id_forn` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `c_inutilizacao`
--
ALTER TABLE `c_inutilizacao`
  MODIFY `id_inu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `c_inventario_item`
--
ALTER TABLE `c_inventario_item`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `c_item_em`
--
ALTER TABLE `c_item_em`
  MODIFY `id_item_em` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de tabela `c_produto`
--
ALTER TABLE `c_produto`
  MODIFY `id_produto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `c_saida_material`
--
ALTER TABLE `c_saida_material`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `c_usuario`
--
ALTER TABLE `c_usuario`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `c_capa_em`
--
ALTER TABLE `c_capa_em`
  ADD CONSTRAINT `c_capa_em_ibfk_1` FOREIGN KEY (`id_almox_capaem_FK`) REFERENCES `c_almox` (`id_almox`);

--
-- Limitadores para a tabela `c_inventario_item`
--
ALTER TABLE `c_inventario_item`
  ADD CONSTRAINT `c_inventario_item_ibfk_1` FOREIGN KEY (`id_almox_inv_FK`) REFERENCES `c_almox` (`id_almox`);

--
-- Limitadores para a tabela `c_item_em`
--
ALTER TABLE `c_item_em`
  ADD CONSTRAINT `c_item_em_ibfk_1` FOREIGN KEY (`id_capaem`) REFERENCES `c_capa_em` (`id_capaem`),
  ADD CONSTRAINT `c_item_em_ibfk_2` FOREIGN KEY (`id_almox_item_em_FK`) REFERENCES `c_almox` (`id_almox`);

--
-- Limitadores para a tabela `c_produto`
--
ALTER TABLE `c_produto`
  ADD CONSTRAINT `c_produto_ibfk_1` FOREIGN KEY (`id_almox_prod_FK`) REFERENCES `c_almox` (`id_almox`);

--
-- Limitadores para a tabela `c_usuario`
--
ALTER TABLE `c_usuario`
  ADD CONSTRAINT `c_usuario_ibfk_1` FOREIGN KEY (`idAlmoxLogin_FK`) REFERENCES `c_almox` (`id_almox`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
