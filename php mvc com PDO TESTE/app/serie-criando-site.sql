-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3312
-- Tempo de geração: 01-Fev-2021 às 02:40
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `serie-criando-site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `mensagem` varchar(3000) DEFAULT NULL,
  `id_postagem` int(11) DEFAULT NULL,
  `data_hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `nome`, `mensagem`, `id_postagem`, `data_hora`) VALUES
(1, 'Pedro', 'NÃO CONCORDO.cOM CERTEZA TEM QUE CRIAR UMA NOVA CONSTITUIÇÃO PARA LIVRAR O BRASIL OLIGARQUIA POLÍTICA', 4, '2021-01-31 19:00:54'),
(4, 'Lucas', 'VSVDDFVF CSDFVEFVFVD', 2, '2021-01-31 19:00:54'),
(5, 'Gustavo', 'Não tem jeito tem que mudar a constituição e reformular o jeito de seleção de ministros do STF', 4, '2021-01-31 19:00:54'),
(6, 'Gustavo', 'Não tem jeito tem que mudar a constituição e reformular o jeito de seleção de ministros do STF', 4, '2021-01-31 19:00:54'),
(7, 'Augusto', 'Nas eleições de 2022 Bolsonaro não deve ganhar , porque não fará nada já que não fez nada em 4 anos', 4, '2021-01-31 19:00:54'),
(8, 'Augusto', 'Nas eleições de 2022 Bolsonaro não deve ganhar , porque não fará nada já que não fez nada em 4 anos', 4, '2021-01-31 19:00:54'),
(9, '?', '?', NULL, '2021-01-31 19:00:54'),
(10, '?', '?', 0, '2021-01-31 19:00:54'),
(11, 'Tiago', 'dddddd', 0, '2021-01-31 19:00:54'),
(12, 'Tiago', 'testeFinal', 20, '2021-01-31 19:00:54'),
(13, 'Tiago', 'é muito importante mesmo', 20, '2021-01-31 19:00:54'),
(14, 'Tiago', 'Pode crer', 20, '2021-01-31 19:00:54'),
(15, 'Tiago', 'Claro que sim !', 20, '2021-01-31 19:00:54'),
(16, 'Tiago', 'eeeee', 20, '0000-00-00 00:00:00'),
(17, 'Tiago', 'pppppppp', 20, '0000-00-00 00:00:00'),
(18, 'Tiago', 'ooooo', 20, '2021-01-31 23:37:24'),
(19, 'Tiago', 'cendo', 20, '2021-01-31 20:12:58'),
(20, 'Tiago', 'uuuuuuuu', 20, '2021-01-31 20:35:23'),
(21, 'Tiago', 'testano', 20, '0000-00-00 00:00:00'),
(22, 'Tiago', 'llllllll', 20, '0000-00-00 00:00:00'),
(23, 'Tiago', 'hhhh', 20, '0000-00-00 00:00:00'),
(24, 'Tiago', 'ggfffgggereegsg\r\nfgffhf', 20, '2021-01-31 21:56:20'),
(25, 'Tiago', 'tfuguccvuch\r\n\r\n\r\nvvyctxrtctyxtcjtc', 20, 'Feito em : 31/01/2021às22:07'),
(26, 'Tiago', 'hgggsgrg\r\nkgjffjfjfjfjfj\r\nsdghgdhdhdhdhdhsdh\r\ndfhdhdfhdhsdh\r\n', 20, 'Feito em : 31/01/2021 às  22:10'),
(27, 'Tiago', 'Este é o último teste \r\n\r\n', 20, 'Feito em : 31/01/2021 às  22:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `conteudo` varchar(1000) NOT NULL,
  `ex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `titulo`, `conteudo`, `ex`) VALUES
(15, 'POSTAGEM EXMPLO', 'ESTA POSTAGEM NÃO PODE SER EXCLUÍDA!', 1),
(18, 'iiii', 'kkkkkkkk', 0),
(19, 'primeiro update', 'yyyyyyyy', 0),
(20, 'A história é importante para um povo', 'A história é muito importante para que um povo saiba sua identidade', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
