SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `cidade`, `estado`, `senha`) VALUES
(1, 'Fulano de Tal', 'fulano@cnec.br', '(00)00000-0000', 'Porto Alegre', 'Rio Grande do Sul', '1234');

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `pedidos` (`id`, `idProduto`, `idCliente`, `data`) VALUES
(1, 2, 1, '2020-10-13'),
(2, 3, 1, '2020-10-13'),
(3, 1, 1, '2020-10-13');

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `produtos` (`id`, `nome`, `valor`, `imagem`) VALUES
(1, 'Notebook 1', 1500.5, 'note2.jpg'),
(2, 'Notebook 2', 1300, 'note2.jpg'),
(3, 'Notebook 3', 1200, 'note2.jpg');


ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;