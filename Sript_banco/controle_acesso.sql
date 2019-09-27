-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2019 às 03:46
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_acesso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_apartamento`
--

CREATE TABLE `tb_apartamento` (
  `id_apartamento` int(11) NOT NULL,
  `nr_apartamento` int(11) NOT NULL,
  `id_bloco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bloco`
--

CREATE TABLE `tb_bloco` (
  `id_bloco` int(11) NOT NULL,
  `nome` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_espacos`
--

CREATE TABLE `tb_espacos` (
  `id_espacos` int(11) NOT NULL,
  `descrição` varchar(45) NOT NULL,
  `id_bloco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` int(11) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `dt_cadastro` date NOT NULL DEFAULT current_timestamp(),
  `dt_nascimento` date NOT NULL,
  `imagem` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `cpf`, `nome`, `rg`, `turno`, `sexo`, `telefone`, `id_status`, `dt_cadastro`, `dt_nascimento`, `imagem`) VALUES
(1, '02923154142', 'Samoel lopes costa', 5002095, 'diurno', 'masculino', NULL, 1, '2019-09-16', '0000-00-00', ''),
(2, '00500600821', 'Nivaldo Henrique', 1010101, 'noturno', 'Indefinido', NULL, 1, '2019-09-16', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_img_funcionario`
--

CREATE TABLE `tb_img_funcionario` (
  `id_imagem` int(10) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_img_morador`
--

CREATE TABLE `tb_img_morador` (
  `id_imagem` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `imagem` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_morador`
--

CREATE TABLE `tb_morador` (
  `id_morador` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` int(11) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT current_timestamp(),
  `tipo_morador` varchar(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_morador_apartamento`
--

CREATE TABLE `tb_morador_apartamento` (
  `id_morador_apartamento` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `id_apartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mov_morador`
--

CREATE TABLE `tb_mov_morador` (
  `id_movimentaçao` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `dt_entrada` datetime DEFAULT current_timestamp(),
  `dt_saida` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel_acesso`
--

CREATE TABLE `tb_nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL,
  `nivel_acesso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_nivel_acesso`
--

INSERT INTO `tb_nivel_acesso` (`id_nivel_acesso`, `nivel_acesso`) VALUES
(1, 'portaria'),
(2, 'sindico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `id_reserva` int(11) NOT NULL,
  `dt_reserva` date DEFAULT NULL,
  `id_espaco` int(11) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL DEFAULT 1,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `STATUS`) VALUES
(1, 'Ativo'),
(2, 'inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_visita`
--

CREATE TABLE `tb_tipo_visita` (
  `id_tipo_visita` int(11) NOT NULL,
  `id_visitante` int(11) DEFAULT NULL,
  `tipo_visita` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `usuario` varchar(14) NOT NULL,
  `id_nivel_acesso` int(1) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `senha`, `usuario`, `id_nivel_acesso`, `id_funcionario`) VALUES
(1, '1234', 'samoel', 2, 1),
(2, '12345', 'nivaldo', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id_veiculo` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `placa` varchar(9) NOT NULL,
  `descrição` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visitante`
--

CREATE TABLE `tb_visitante` (
  `id_visitante` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `telefone` varchar(9) DEFAULT NULL,
  `acompanhantes` text DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visita_morador`
--

CREATE TABLE `tb_visita_morador` (
  `id_visita_morador` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `id_visitante` int(11) DEFAULT NULL,
  `dt_entrada` datetime NOT NULL DEFAULT current_timestamp(),
  `dt_saida` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  ADD PRIMARY KEY (`id_apartamento`),
  ADD KEY `id_bloco` (`id_bloco`);

--
-- Índices para tabela `tb_bloco`
--
ALTER TABLE `tb_bloco`
  ADD PRIMARY KEY (`id_bloco`);

--
-- Índices para tabela `tb_espacos`
--
ALTER TABLE `tb_espacos`
  ADD PRIMARY KEY (`id_espacos`),
  ADD KEY `id_bloco` (`id_bloco`);

--
-- Índices para tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_img_funcionario`
--
ALTER TABLE `tb_img_funcionario`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Índices para tabela `tb_img_morador`
--
ALTER TABLE `tb_img_morador`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `id_morador` (`id_morador`);

--
-- Índices para tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  ADD PRIMARY KEY (`id_morador`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_morador_apartamento`
--
ALTER TABLE `tb_morador_apartamento`
  ADD PRIMARY KEY (`id_morador_apartamento`),
  ADD KEY `id_morador` (`id_morador`),
  ADD KEY `id_apartamento` (`id_apartamento`);

--
-- Índices para tabela `tb_mov_morador`
--
ALTER TABLE `tb_mov_morador`
  ADD PRIMARY KEY (`id_movimentaçao`),
  ADD KEY `id_morador` (`id_morador`);

--
-- Índices para tabela `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`);

--
-- Índices para tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_espaco` (`id_espaco`),
  ADD KEY `id_morador` (`id_morador`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tb_tipo_visita`
--
ALTER TABLE `tb_tipo_visita`
  ADD PRIMARY KEY (`id_tipo_visita`),
  ADD KEY `id_visitante` (`id_visitante`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_nivel_acesso` (`id_nivel_acesso`),
  ADD KEY `id_nivel_acesso_2` (`id_nivel_acesso`);

--
-- Índices para tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `id_morador` (`id_morador`);

--
-- Índices para tabela `tb_visitante`
--
ALTER TABLE `tb_visitante`
  ADD PRIMARY KEY (`id_visitante`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  ADD PRIMARY KEY (`id_visita_morador`),
  ADD KEY `id_morador` (`id_morador`),
  ADD KEY `id_visitante` (`id_visitante`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  MODIFY `id_apartamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_bloco`
--
ALTER TABLE `tb_bloco`
  MODIFY `id_bloco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_espacos`
--
ALTER TABLE `tb_espacos`
  MODIFY `id_espacos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_img_funcionario`
--
ALTER TABLE `tb_img_funcionario`
  MODIFY `id_imagem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_img_morador`
--
ALTER TABLE `tb_img_morador`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  MODIFY `id_morador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_morador_apartamento`
--
ALTER TABLE `tb_morador_apartamento`
  MODIFY `id_morador_apartamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_mov_morador`
--
ALTER TABLE `tb_mov_morador`
  MODIFY `id_movimentaçao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_tipo_visita`
--
ALTER TABLE `tb_tipo_visita`
  MODIFY `id_tipo_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_visitante`
--
ALTER TABLE `tb_visitante`
  MODIFY `id_visitante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  MODIFY `id_visita_morador` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  ADD CONSTRAINT `tb_apartamento_ibfk_1` FOREIGN KEY (`id_bloco`) REFERENCES `tb_bloco` (`id_bloco`);

--
-- Limitadores para a tabela `tb_espacos`
--
ALTER TABLE `tb_espacos`
  ADD CONSTRAINT `tb_espacos_ibfk_1` FOREIGN KEY (`id_bloco`) REFERENCES `tb_bloco` (`id_bloco`);

--
-- Limitadores para a tabela `tb_img_funcionario`
--
ALTER TABLE `tb_img_funcionario`
  ADD CONSTRAINT `tb_img_funcionario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `tb_img_morador`
--
ALTER TABLE `tb_img_morador`
  ADD CONSTRAINT `tb_img_morador_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`);

--
-- Limitadores para a tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  ADD CONSTRAINT `tb_morador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_morador_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`);

--
-- Limitadores para a tabela `tb_morador_apartamento`
--
ALTER TABLE `tb_morador_apartamento`
  ADD CONSTRAINT `tb_morador_apartamento_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`),
  ADD CONSTRAINT `tb_morador_apartamento_ibfk_2` FOREIGN KEY (`id_apartamento`) REFERENCES `tb_apartamento` (`id_apartamento`);

--
-- Limitadores para a tabela `tb_mov_morador`
--
ALTER TABLE `tb_mov_morador`
  ADD CONSTRAINT `tb_mov_morador_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`);

--
-- Limitadores para a tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `tb_reserva_ibfk_1` FOREIGN KEY (`id_espaco`) REFERENCES `tb_espacos` (`id_espacos`),
  ADD CONSTRAINT `tb_reserva_ibfk_2` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`),
  ADD CONSTRAINT `tb_reserva_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_tipo_visita`
--
ALTER TABLE `tb_tipo_visita`
  ADD CONSTRAINT `tb_tipo_visita_ibfk_1` FOREIGN KEY (`id_visitante`) REFERENCES `tb_visitante` (`id_visitante`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD CONSTRAINT `tb_veiculo_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`);

--
-- Limitadores para a tabela `tb_visitante`
--
ALTER TABLE `tb_visitante`
  ADD CONSTRAINT `tb_visitante_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_visitante_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`);

--
-- Limitadores para a tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  ADD CONSTRAINT `tb_visita_morador_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`),
  ADD CONSTRAINT `tb_visita_morador_ibfk_2` FOREIGN KEY (`id_visitante`) REFERENCES `tb_visitante` (`id_visitante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
