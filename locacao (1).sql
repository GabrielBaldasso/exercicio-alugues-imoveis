-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2024 às 18:44
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `idImovel` int(11) NOT NULL,
  `preco` decimal(11,0) NOT NULL,
  `estado` text NOT NULL,
  `cidade` text NOT NULL,
  `tipoImovel` text NOT NULL,
  `tipoCompra` text NOT NULL,
  `endereco` text NOT NULL,
  `tamanho` float NOT NULL,
  `descricao` text NOT NULL,
  `quartos` int(11) NOT NULL,
  `garagem` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`idImovel`, `preco`, `estado`, `cidade`, `tipoImovel`, `tipoCompra`, `endereco`, `tamanho`, `descricao`, `quartos`, `garagem`, `status`) VALUES
(1, 1510000, 'AL', 'Curitiba', 'Apartamento', 'Aluguel', 'Rua Logo Alias', 100, '12 patos na lagoa', 5, 4, 'Disponivel'),
(4, 100000, 'PR', 'Maringa', 'Casa', 'Alocação', 'Av Colombo', 1, 'TEste de camara de re', 1, 1, 'Disponivel'),
(5, 100000, 'BA', 'Cascavel', 'Apartamento', 'Compra', 'Rua Judas botas', 145, 'descrição descrição descrição descrição descrição descrição', 5, 2, 'Disponivel'),
(6, 900215, 'MS', 'Goiania', 'Casa', 'Aluguel', 'Rua Logo Alias', 145, 'descrição descrição descrição descrição descrição descrição descrição descrição', 2, 1, 'Indisponível'),
(7, 470000, 'AL', 'Sao Paulo', 'Kitnet', 'Alocação', 'Av Diga Tchau', 302, 'Agora vai ? Agora vai ? Agora vai ? Agora vai ? Agora vai ? Agora vai ? Agora vai ? ', 1, 1, 'Disponivel'),
(8, 500300, 'SC', 'Ponta Grossa', 'Casa', 'Alocação', 'Av Colombo', 456, 'teste teste teste teste teste teste teste teste teste teste', 1, 2, 'Disponivel'),
(9, 1510000, 'SC', 'Florianopolis', 'Casa', 'Alocação', 'Rua Judas botas', 100, 'teste testeteste testeteste testeteste testeteste testeteste teste', 2, 3, 'Disponivel'),
(10, 1510000, 'AC', 'Curitiba', 'Apartamento', 'Aluguel', 'Rua Judas botas', 1, 'teste testeteste testeteste testeteste testeteste teste', 1, 2, 'Disponivel'),
(13, 20000, 'AL', 'Maringa', 'Casa', 'Compra', 'Rua Judas botas', 100, 'Uma casa sem pé nem cabeça', 3, 1, 'Disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `tipoUser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `email`, `senha`, `tipoUser`) VALUES
(5, 'Mateus', 'mateus@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(6, 'Raica', 'raica@gmail.com', '202cb962ac59075b964b07152d234b70', 'Funcionario'),
(7, 'Gabriel', 'gabriel@gmail.com', '202cb962ac59075b964b07152d234b70', 'Funcionario'),
(8, 'Isa', 'isa@gmail.com', '202cb962ac59075b964b07152d234b70', 'Funcionario'),
(20, 'JJJ', 'jjj@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(21, 'Jesus', 'jesus@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(22, 'teste', 'teste@gmail.com', '202cb962ac59075b964b07152d234b70', 'Funcionario'),
(23, 'teste2', 'teste2@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`idImovel`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `idImovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
