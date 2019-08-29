-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Ago-2019 às 03:08
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_apartamento`
--

CREATE TABLE `tb_apartamento` (
  `id_apartamento` int(11) NOT NULL,
  `num_apartamento` int(11) NOT NULL,
  `tb_Bloco_id_Bloco` int(11) NOT NULL,
  `num_vaga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bloco`
--

CREATE TABLE `tb_bloco` (
  `id_Bloco` int(11) NOT NULL,
  `nome_Bloco` varchar(45) DEFAULT NULL,
  `tb_condominio_id_cond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_espaco`
--

CREATE TABLE `tb_espaco` (
  `id_espaco` int(11) NOT NULL,
  `nome_espaco` varchar(45) NOT NULL,
  `tb_Bloco_id_Bloco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_func` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome_fun` varchar(100) NOT NULL,
  `rg_func` int(11) NOT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_func`, `cpf`, `nome_fun`, `rg_func`, `turno`, `sexo`) VALUES
(0, '03660107152', 'Daniel', 525288, 'Noturno', 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_morador`
--

CREATE TABLE `tb_morador` (
  `id_morador` int(11) NOT NULL,
  `nome_morador` varchar(100) NOT NULL,
  `rg_morador` int(11) NOT NULL,
  `dt_nacimento` date NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `tb_tipo_morador_id_tipo_morador` int(11) NOT NULL,
  `tb_status_morador_id_status_morador` int(11) NOT NULL,
  `tb_veiculos_placa` varchar(8) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `tipo_morador` varchar(45) NOT NULL,
  `sexo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_morador_apartamento`
--

CREATE TABLE `tb_morador_apartamento` (
  `tb_morador_id_morador` int(11) NOT NULL,
  `tb_apartamento_id_apartamento` int(11) NOT NULL,
  `tb_apartamento_num_apartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel_acesso`
--

CREATE TABLE `tb_nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL,
  `nivel_acesso` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_nivel_acesso`
--

INSERT INTO `tb_nivel_acesso` (`id_nivel_acesso`, `nivel_acesso`) VALUES
(1, 'Portaria'),
(2, 'Sindico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `idtb_reserva` int(11) NOT NULL,
  `dt_reserva` datetime DEFAULT NULL,
  `tb_espaco_id_espaco` int(11) NOT NULL,
  `tb_morador_id_morador` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status_morador`
--

CREATE TABLE `tb_status_morador` (
  `id_status_morador` int(11) NOT NULL,
  `status_morador` varchar(45) NOT NULL,
  `dt_entrada` datetime NOT NULL,
  `dt_saida` datetime NOT NULL,
  `situação` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status_visitante`
--

CREATE TABLE `tb_status_visitante` (
  `idtb_status_visitante` int(11) NOT NULL,
  `status_visitante` varchar(45) NOT NULL,
  `dt_entrada` datetime NOT NULL,
  `dt_saida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_visitante`
--

CREATE TABLE `tb_tipo_visitante` (
  `idtb_tipo_visita` int(11) NOT NULL,
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
  `id_nivel_acesso` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `senha`, `usuario`, `id_nivel_acesso`, `id_funcionario`) VALUES
(0, '123', 'Daniel', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculos`
--

CREATE TABLE `tb_veiculos` (
  `placa` varchar(8) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visitante`
--

CREATE TABLE `tb_visitante` (
  `id_visitante` int(11) NOT NULL,
  `nome_visitante` varchar(100) NOT NULL,
  `cpf_visitante` varchar(11) NOT NULL,
  `rg_visitante` int(11) NOT NULL,
  `acomp_visitante` varchar(200) DEFAULT NULL,
  `tb_tipo_visitante_idtb_tipo_visita` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `tb_status_visitante_idtb_status_visitante` int(11) NOT NULL,
  `sexo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visita_morador`
--

CREATE TABLE `tb_visita_morador` (
  `tb_morador_id_morador` int(11) NOT NULL,
  `tb_visitante_id_visitante` int(11) NOT NULL,
  `tb_visitante_cpf_visitante` varchar(11) NOT NULL,
  `tb_morador_id_morador1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  ADD PRIMARY KEY (`id_apartamento`,`num_apartamento`),
  ADD KEY `fk_tb_apartamento_tb_Bloco1_idx` (`tb_Bloco_id_Bloco`);

--
-- Indexes for table `tb_bloco`
--
ALTER TABLE `tb_bloco`
  ADD PRIMARY KEY (`id_Bloco`),
  ADD KEY `fk_tb_Bloco_tb_condominio1_idx` (`tb_condominio_id_cond`);

--
-- Indexes for table `tb_espaco`
--
ALTER TABLE `tb_espaco`
  ADD PRIMARY KEY (`id_espaco`),
  ADD KEY `fk_tb_espaco_tb_Bloco1_idx` (`tb_Bloco_id_Bloco`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_func`,`cpf`);

--
-- Indexes for table `tb_morador`
--
ALTER TABLE `tb_morador`
  ADD PRIMARY KEY (`id_morador`),
  ADD KEY `fk_tb_morador_tb_status_morador1_idx` (`tb_status_morador_id_status_morador`),
  ADD KEY `fk_tb_morador_tb_veiculos1_idx` (`tb_veiculos_placa`),
  ADD KEY `fk_tb_morador_usuario1_idx` (`usuario_id_usuario`);

--
-- Indexes for table `tb_morador_apartamento`
--
ALTER TABLE `tb_morador_apartamento`
  ADD PRIMARY KEY (`tb_morador_id_morador`,`tb_apartamento_id_apartamento`,`tb_apartamento_num_apartamento`),
  ADD KEY `fk_tb_morador_has_tb_apartamento_tb_apartamento1_idx` (`tb_apartamento_id_apartamento`,`tb_apartamento_num_apartamento`),
  ADD KEY `fk_tb_morador_has_tb_apartamento_tb_morador1_idx` (`tb_morador_id_morador`);

--
-- Indexes for table `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`);

--
-- Indexes for table `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`idtb_reserva`),
  ADD KEY `fk_tb_reserva_tb_espaco1_idx` (`tb_espaco_id_espaco`),
  ADD KEY `fk_tb_reserva_tb_morador1_idx` (`tb_morador_id_morador`),
  ADD KEY `fk_tb_reserva_usuario1_idx` (`usuario_id_usuario`);

--
-- Indexes for table `tb_status_morador`
--
ALTER TABLE `tb_status_morador`
  ADD PRIMARY KEY (`id_status_morador`);

--
-- Indexes for table `tb_status_visitante`
--
ALTER TABLE `tb_status_visitante`
  ADD PRIMARY KEY (`idtb_status_visitante`);

--
-- Indexes for table `tb_tipo_visitante`
--
ALTER TABLE `tb_tipo_visitante`
  ADD PRIMARY KEY (`idtb_tipo_visita`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_tb_nivel_acesso1_idx` (`id_nivel_acesso`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `fk_tb_veiculos_usuario1_idx` (`usuario_id_usuario`);

--
-- Indexes for table `tb_visitante`
--
ALTER TABLE `tb_visitante`
  ADD PRIMARY KEY (`id_visitante`,`cpf_visitante`),
  ADD KEY `fk_tb_visitante_tb_tipo_visitante1_idx` (`tb_tipo_visitante_idtb_tipo_visita`),
  ADD KEY `fk_tb_visitante_usuario1_idx` (`usuario_id_usuario`),
  ADD KEY `fk_tb_visitante_tb_status_visitante1_idx` (`tb_status_visitante_idtb_status_visitante`);

--
-- Indexes for table `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  ADD PRIMARY KEY (`tb_morador_id_morador`),
  ADD KEY `fk_tb_visita_morador_tb_visitante1_idx` (`tb_visitante_id_visitante`,`tb_visitante_cpf_visitante`),
  ADD KEY `fk_tb_visita_morador_tb_morador1_idx` (`tb_morador_id_morador1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  MODIFY `id_apartamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  ADD CONSTRAINT `fk_tb_apartamento_tb_Bloco1` FOREIGN KEY (`tb_Bloco_id_Bloco`) REFERENCES `tb_bloco` (`id_Bloco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_espaco`
--
ALTER TABLE `tb_espaco`
  ADD CONSTRAINT `fk_tb_espaco_tb_Bloco1` FOREIGN KEY (`tb_Bloco_id_Bloco`) REFERENCES `tb_bloco` (`id_Bloco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  ADD CONSTRAINT `fk_tb_morador_tb_status_morador1` FOREIGN KEY (`tb_status_morador_id_status_morador`) REFERENCES `tb_status_morador` (`id_status_morador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_morador_tb_veiculos1` FOREIGN KEY (`tb_veiculos_placa`) REFERENCES `tb_veiculos` (`placa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_morador_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_morador_apartamento`
--
ALTER TABLE `tb_morador_apartamento`
  ADD CONSTRAINT `fk_tb_morador_has_tb_apartamento_tb_apartamento1` FOREIGN KEY (`tb_apartamento_id_apartamento`,`tb_apartamento_num_apartamento`) REFERENCES `tb_apartamento` (`id_apartamento`, `num_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_morador_has_tb_apartamento_tb_morador1` FOREIGN KEY (`tb_morador_id_morador`) REFERENCES `tb_morador` (`id_morador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `fk_tb_reserva_tb_espaco1` FOREIGN KEY (`tb_espaco_id_espaco`) REFERENCES `tb_espaco` (`id_espaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_reserva_tb_morador1` FOREIGN KEY (`tb_morador_id_morador`) REFERENCES `tb_morador` (`id_morador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_reserva_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_func`),
  ADD CONSTRAINT `tb_usuario_ibfk_2` FOREIGN KEY (`id_nivel_acesso`) REFERENCES `tb_nivel_acesso` (`id_nivel_acesso`);

--
-- Limitadores para a tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD CONSTRAINT `fk_tb_veiculos_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_visitante`
--
ALTER TABLE `tb_visitante`
  ADD CONSTRAINT `fk_tb_visitante_tb_status_visitante1` FOREIGN KEY (`tb_status_visitante_idtb_status_visitante`) REFERENCES `tb_status_visitante` (`idtb_status_visitante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_visitante_tb_tipo_visitante1` FOREIGN KEY (`tb_tipo_visitante_idtb_tipo_visita`) REFERENCES `tb_tipo_visitante` (`idtb_tipo_visita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_visitante_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  ADD CONSTRAINT `fk_tb_visita_morador_tb_morador1` FOREIGN KEY (`tb_morador_id_morador1`) REFERENCES `tb_morador` (`id_morador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_visita_morador_tb_visitante1` FOREIGN KEY (`tb_visitante_id_visitante`,`tb_visitante_cpf_visitante`) REFERENCES `tb_visitante` (`id_visitante`, `cpf_visitante`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
