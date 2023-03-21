-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2022 às 23:23
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cervejaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idCerveja_FK` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cerveja`
--

CREATE TABLE `cerveja` (
  `idCerveja` int(11) NOT NULL,
  `nomeCerveja` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `teorAlcoolico` varchar(4) NOT NULL,
  `temperaturaConsumo` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cerveja`
--

INSERT INTO `cerveja` (`idCerveja`, `nomeCerveja`, `tipo`, `marca`, `preco`, `teorAlcoolico`, `temperaturaConsumo`, `foto`) VALUES
(12, 'Cerveja Franziskaner Hefe Weissbier Dunkel 500ml', 'Trigo', 'Franziskaner', '13.99', '5,0%', '4º - 9º', 'img/175084-1200-auto.jpg'),
(13, 'Cerveja Goose Island LO IPA 355ml', 'ipa', 'Goose Island', '12.00', '2.7%', '2º - 4º', 'img/181766-1200-auto.jpg'),
(14, 'Cerveja Red Ale 355ml: Patagonia & Campos do Jordão', 'ale', 'Patagonia', '14.99', '4,7%', '2º - 6º', 'img/182234-1200-auto.jpg'),
(15, 'Cerveja Al Capone Weiss 500ml', 'trigo', 'Al Capone', '20.90', '5,2%', '4º - 6º', 'img/179424-1200-auto.jpg'),
(16, 'Cerveja Proa Carrie Nation - American IPA 500ml', 'ipa', 'Cervejaria Proa', '25.49', '6,2%', '4º - 6º', 'img/182204-1200-auto.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cerveja_venda`
--

CREATE TABLE `cerveja_venda` (
  `idCerveja_FK` int(11) NOT NULL,
  `idVenda_FK` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cerveja_venda`
--

INSERT INTO `cerveja_venda` (`idCerveja_FK`, `idVenda_FK`, `quantidade`) VALUES
(12, 26, 1),
(13, 26, 1),
(12, 27, 1),
(13, 27, 1),
(12, 28, 1),
(12, 29, 1),
(12, 30, 2),
(13, 30, 2),
(13, 31, 1),
(12, 32, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nomeFuncionario` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dataNascimento` varchar(15) DEFAULT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'ativo',
  `funcao` varchar(15) NOT NULL,
  `login` varchar(8) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nomeFuncionario`, `telefone`, `dataNascimento`, `status`, `funcao`, `login`, `senha`) VALUES
(1, 'José Administrador', '11111111', '04/07/1995', 'ativo', 'administrador', 'admin', 'admin'),
(2, 'Jose Vendedor', '55555555', '04/07/1992', 'ativo', 'vendedor', 'jose', 'jose'),
(3, 'Ricardo Estoquista', '3333333', '04/07/1993', 'ativo', 'estoquista', 'ricardo', '1'),
(6, 'Lucia de Jesus Alvino', '55555555', '04/01/1960', 'ativo', 'vendedor', 'lucia', 'lucia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idVenda` int(11) NOT NULL,
  `dataVenda` varchar(15) NOT NULL,
  `idFuncionario_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `dataVenda`, `idFuncionario_FK`) VALUES
(26, '12/12/2022', 1),
(27, '12/12/2022', 1),
(28, '17/11/2022', 1),
(29, '17/11/2022', 1),
(30, '18/11/2022', 1),
(31, '22/11/2022', 1),
(32, '22/11/2022', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD KEY `idCerveja_FK` (`idCerveja_FK`);

--
-- Índices para tabela `cerveja`
--
ALTER TABLE `cerveja`
  ADD PRIMARY KEY (`idCerveja`);

--
-- Índices para tabela `cerveja_venda`
--
ALTER TABLE `cerveja_venda`
  ADD KEY `idCerveja_FK` (`idCerveja_FK`),
  ADD KEY `idVenda_FK` (`idVenda_FK`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `idFuncionario_FK` (`idFuncionario_FK`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cerveja`
--
ALTER TABLE `cerveja`
  MODIFY `idCerveja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idCerveja_FK`) REFERENCES `cerveja` (`idCerveja`);

--
-- Limitadores para a tabela `cerveja_venda`
--
ALTER TABLE `cerveja_venda`
  ADD CONSTRAINT `cerveja_venda_ibfk_1` FOREIGN KEY (`idCerveja_FK`) REFERENCES `cerveja` (`idCerveja`),
  ADD CONSTRAINT `cerveja_venda_ibfk_2` FOREIGN KEY (`idVenda_FK`) REFERENCES `venda` (`idVenda`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idFuncionario_FK`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
