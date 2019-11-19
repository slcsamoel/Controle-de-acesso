-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2019 às 21:42
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

--
-- Extraindo dados da tabela `tb_apartamento`
--

INSERT INTO `tb_apartamento` (`id_apartamento`, `nr_apartamento`, `id_bloco`) VALUES
(1, 101, 1),
(2, 102, 1),
(3, 103, 1),
(4, 104, 1),
(5, 201, 1),
(6, 202, 1),
(7, 203, 1),
(8, 204, 1),
(9, 301, 1),
(10, 302, 1),
(11, 303, 1),
(12, 304, 1),
(13, 401, 1),
(14, 402, 1),
(15, 403, 1),
(16, 404, 1),
(17, 501, 1),
(18, 502, 1),
(19, 503, 1),
(20, 504, 1),
(21, 601, 1),
(22, 602, 1),
(23, 603, 1),
(24, 604, 1),
(25, 701, 1),
(26, 702, 1),
(27, 703, 1),
(28, 704, 1),
(29, 801, 1),
(30, 802, 1),
(31, 803, 1),
(32, 804, 1),
(33, 901, 1),
(34, 902, 1),
(35, 903, 1),
(36, 904, 1),
(37, 1001, 1),
(38, 1002, 1),
(39, 1003, 1),
(40, 1004, 1),
(41, 1101, 1),
(42, 1102, 1),
(43, 1103, 1),
(44, 1104, 1),
(45, 1201, 1),
(46, 1202, 1),
(47, 1203, 1),
(48, 1204, 1),
(49, 1301, 1),
(50, 1302, 1),
(51, 1303, 1),
(52, 1304, 1),
(53, 1401, 1),
(54, 1402, 1),
(55, 1403, 1),
(56, 1404, 1),
(57, 1501, 1),
(58, 1502, 1),
(59, 1503, 1),
(60, 1504, 1),
(61, 1601, 1),
(62, 1602, 1),
(63, 1603, 1),
(64, 1604, 1),
(65, 1701, 1),
(66, 1702, 1),
(67, 1703, 1),
(68, 1704, 1),
(69, 1801, 1),
(70, 1802, 1),
(71, 1803, 1),
(72, 1804, 1),
(73, 1901, 1),
(74, 1902, 1),
(75, 1903, 1),
(76, 1904, 1),
(77, 2001, 1),
(78, 2002, 1),
(79, 2003, 1),
(80, 2004, 1),
(81, 101, 2),
(82, 102, 2),
(83, 103, 2),
(84, 104, 2),
(85, 201, 2),
(86, 202, 2),
(87, 203, 2),
(88, 204, 2),
(89, 301, 2),
(90, 302, 2),
(91, 303, 2),
(92, 304, 2),
(93, 401, 2),
(94, 402, 2),
(95, 403, 2),
(96, 404, 2),
(97, 501, 2),
(98, 502, 2),
(99, 503, 2),
(100, 504, 2),
(101, 601, 2),
(102, 602, 2),
(103, 603, 2),
(104, 604, 2),
(105, 701, 2),
(106, 702, 2),
(107, 703, 2),
(108, 704, 2),
(109, 801, 2),
(110, 802, 2),
(111, 803, 2),
(112, 804, 2),
(113, 901, 2),
(114, 902, 2),
(115, 903, 2),
(116, 904, 2),
(117, 1001, 2),
(118, 1002, 2),
(119, 1003, 2),
(120, 1004, 2),
(121, 1101, 2),
(122, 1102, 2),
(123, 1103, 2),
(124, 1104, 2),
(125, 1201, 2),
(126, 1202, 2),
(127, 1203, 2),
(128, 1204, 2),
(129, 1301, 2),
(130, 1302, 2),
(131, 1303, 2),
(132, 1304, 2),
(133, 1401, 2),
(134, 1402, 2),
(135, 1403, 2),
(136, 1404, 2),
(137, 1501, 2),
(138, 1502, 2),
(139, 1503, 2),
(140, 1504, 2),
(141, 1601, 2),
(142, 1602, 2),
(143, 1603, 2),
(144, 1604, 2),
(145, 1701, 2),
(146, 1702, 2),
(147, 1703, 2),
(148, 1704, 2),
(149, 1801, 2),
(150, 1802, 2),
(151, 1803, 2),
(152, 1804, 2),
(153, 1901, 2),
(154, 1902, 2),
(155, 1903, 2),
(156, 1904, 2),
(157, 2001, 2),
(158, 2002, 2),
(159, 2003, 2),
(160, 2004, 2),
(161, 101, 3),
(162, 102, 3),
(163, 103, 3),
(164, 104, 3),
(165, 201, 3),
(166, 202, 3),
(167, 203, 3),
(168, 204, 3),
(169, 301, 3),
(170, 302, 3),
(171, 303, 3),
(172, 304, 3),
(173, 401, 3),
(174, 402, 3),
(175, 403, 3),
(176, 404, 3),
(177, 501, 3),
(178, 502, 3),
(179, 503, 3),
(180, 504, 3),
(181, 601, 3),
(182, 602, 3),
(183, 603, 3),
(184, 604, 3),
(185, 701, 3),
(186, 702, 3),
(187, 703, 3),
(188, 704, 3),
(189, 801, 3),
(190, 802, 3),
(191, 803, 3),
(192, 804, 3),
(193, 901, 3),
(194, 902, 3),
(195, 903, 3),
(196, 904, 3),
(197, 1001, 3),
(198, 1002, 3),
(199, 1003, 3),
(200, 1004, 3),
(201, 1101, 3),
(202, 1102, 3),
(203, 1103, 3),
(204, 1104, 3),
(205, 1201, 3),
(206, 1202, 3),
(207, 1203, 3),
(208, 1204, 3),
(209, 1301, 3),
(210, 1302, 3),
(211, 1303, 3),
(212, 1304, 3),
(213, 1401, 3),
(214, 1402, 3),
(215, 1403, 3),
(216, 1404, 3),
(217, 1501, 3),
(218, 1502, 3),
(219, 1503, 3),
(220, 1504, 3),
(221, 1601, 3),
(222, 1602, 3),
(223, 1603, 3),
(224, 1604, 3),
(225, 1701, 3),
(226, 1702, 3),
(227, 1703, 3),
(228, 1704, 3),
(229, 1801, 3),
(230, 1802, 3),
(231, 1803, 3),
(232, 1804, 3),
(233, 1901, 3),
(234, 1902, 3),
(235, 1903, 3),
(236, 1904, 3),
(237, 2001, 3),
(238, 2002, 3),
(239, 2003, 3),
(240, 2004, 3),
(241, 101, 4),
(242, 102, 4),
(243, 103, 4),
(244, 104, 4),
(245, 201, 4),
(246, 202, 4),
(247, 203, 4),
(248, 204, 4),
(249, 301, 4),
(250, 302, 4),
(251, 303, 4),
(252, 304, 4),
(253, 401, 4),
(254, 402, 4),
(255, 403, 4),
(256, 404, 4),
(257, 501, 4),
(258, 502, 4),
(259, 503, 4),
(260, 504, 4),
(261, 601, 4),
(262, 602, 4),
(263, 603, 4),
(264, 604, 4),
(265, 701, 4),
(266, 702, 4),
(267, 703, 4),
(268, 704, 4),
(269, 801, 4),
(270, 802, 4),
(271, 803, 4),
(272, 804, 4),
(273, 901, 4),
(274, 902, 4),
(275, 903, 4),
(276, 904, 4),
(277, 1001, 4),
(278, 1002, 4),
(279, 1003, 4),
(280, 1004, 4),
(281, 1101, 4),
(282, 1102, 4),
(283, 1103, 4),
(284, 1104, 4),
(285, 1201, 4),
(286, 1202, 4),
(287, 1203, 4),
(288, 1204, 4),
(289, 1301, 4),
(290, 1302, 4),
(291, 1303, 4),
(292, 1304, 4),
(293, 1401, 4),
(294, 1402, 4),
(295, 1403, 4),
(296, 1404, 4),
(297, 1501, 4),
(298, 1502, 4),
(299, 1503, 4),
(300, 1504, 4),
(301, 1601, 4),
(302, 1602, 4),
(303, 1603, 4),
(304, 1604, 4),
(305, 1701, 4),
(306, 1702, 4),
(307, 1703, 4),
(308, 1704, 4),
(309, 1801, 4),
(310, 1802, 4),
(311, 1803, 4),
(312, 1804, 4),
(313, 1901, 4),
(314, 1902, 4),
(315, 1903, 4),
(316, 1904, 4),
(317, 2001, 4),
(318, 2002, 4),
(319, 2003, 4),
(320, 2004, 4),
(321, 101, 5),
(322, 102, 5),
(323, 103, 5),
(324, 104, 5),
(325, 201, 5),
(326, 202, 5),
(327, 203, 5),
(328, 204, 5),
(329, 301, 5),
(330, 302, 5),
(331, 303, 5),
(332, 304, 5),
(333, 401, 5),
(334, 402, 5),
(335, 403, 5),
(336, 404, 5),
(337, 501, 5),
(338, 502, 5),
(339, 503, 5),
(340, 504, 5),
(341, 601, 5),
(342, 602, 5),
(343, 603, 5),
(344, 604, 5),
(345, 701, 5),
(346, 702, 5),
(347, 703, 5),
(348, 704, 5),
(349, 801, 5),
(350, 802, 5),
(351, 803, 5),
(352, 804, 5),
(353, 901, 5),
(354, 902, 5),
(355, 903, 5),
(356, 904, 5),
(357, 1001, 5),
(358, 1002, 5),
(359, 1003, 5),
(360, 1004, 5),
(361, 1101, 5),
(362, 1102, 5),
(363, 1103, 5),
(364, 1104, 5),
(365, 1201, 5),
(366, 1202, 5),
(367, 1203, 5),
(368, 1204, 5),
(369, 1301, 5),
(370, 1302, 5),
(371, 1303, 5),
(372, 1304, 5),
(373, 1401, 5),
(374, 1402, 5),
(375, 1403, 5),
(376, 1404, 5),
(377, 1501, 5),
(378, 1502, 5),
(379, 1503, 5),
(380, 1504, 5),
(381, 1601, 5),
(382, 1602, 5),
(383, 1603, 5),
(384, 1604, 5),
(385, 1701, 5),
(386, 1702, 5),
(387, 1703, 5),
(388, 1704, 5),
(389, 1801, 5),
(390, 1802, 5),
(391, 1803, 5),
(392, 1804, 5),
(393, 1901, 5),
(394, 1902, 5),
(395, 1903, 5),
(396, 1904, 5),
(397, 2001, 5),
(398, 2002, 5),
(399, 2003, 5),
(400, 2004, 5),
(401, 101, 6),
(402, 102, 6),
(403, 103, 6),
(404, 104, 6),
(405, 201, 6),
(406, 202, 6),
(407, 203, 6),
(408, 204, 6),
(409, 301, 6),
(410, 302, 6),
(411, 303, 6),
(412, 304, 6),
(413, 401, 6),
(414, 402, 6),
(415, 403, 6),
(416, 404, 6),
(417, 501, 6),
(418, 502, 6),
(419, 503, 6),
(420, 504, 6),
(421, 601, 6),
(422, 602, 6),
(423, 603, 6),
(424, 604, 6),
(425, 701, 6),
(426, 702, 6),
(427, 703, 6),
(428, 704, 6),
(429, 801, 6),
(430, 802, 6),
(431, 803, 6),
(432, 804, 6),
(433, 901, 6),
(434, 902, 6),
(435, 903, 6),
(436, 904, 6),
(437, 1001, 6),
(438, 1002, 6),
(439, 1003, 6),
(440, 1004, 6),
(441, 1101, 6),
(442, 1102, 6),
(443, 1103, 6),
(444, 1104, 6),
(445, 1201, 6),
(446, 1202, 6),
(447, 1203, 6),
(448, 1204, 6),
(449, 1301, 6),
(450, 1302, 6),
(451, 1303, 6),
(452, 1304, 6),
(453, 1401, 6),
(454, 1402, 6),
(455, 1403, 6),
(456, 1404, 6),
(457, 1501, 6),
(458, 1502, 6),
(459, 1503, 6),
(460, 1504, 6),
(461, 1601, 6),
(462, 1602, 6),
(463, 1603, 6),
(464, 1604, 6),
(465, 1701, 6),
(466, 1702, 6),
(467, 1703, 6),
(468, 1704, 6),
(469, 1801, 6),
(470, 1802, 6),
(471, 1803, 6),
(472, 1804, 6),
(473, 1901, 6),
(474, 1902, 6),
(475, 1903, 6),
(476, 1904, 6),
(477, 2001, 6),
(478, 2002, 6),
(479, 2003, 6),
(480, 2004, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_baixa_produto`
--

CREATE TABLE `tb_baixa_produto` (
  `id_baixa_produto` int(11) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `dt_baixa` datetime DEFAULT current_timestamp(),
  `id_status_mov_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_baixa_produto`
--

INSERT INTO `tb_baixa_produto` (`id_baixa_produto`, `id_funcionario`, `id_usuario`, `motivo`, `dt_baixa`, `id_status_mov_produto`) VALUES
(1, 1, 1, NULL, '2019-11-07 01:58:54', NULL),
(2, 2, 1, NULL, '2019-11-07 03:24:24', NULL),
(3, 2, 1, NULL, '2019-11-07 03:24:52', NULL),
(4, 2, 1, NULL, '2019-11-07 03:30:04', NULL),
(5, 4, 1, NULL, '2019-11-07 03:33:38', NULL),
(6, 12, 1, NULL, '2019-11-07 04:44:01', NULL),
(7, 1, 1, NULL, '2019-11-07 05:17:46', NULL),
(8, 1, 1, NULL, '2019-11-17 09:52:45', NULL),
(9, 12, 1, NULL, '2019-11-17 09:54:10', 2),
(10, 1, 1, NULL, '2019-11-17 09:55:36', 1),
(11, 1, 1, NULL, '2019-11-19 15:32:42', 1),
(12, 12, 1, NULL, '2019-11-19 15:35:01', 1),
(13, 4, 1, NULL, '2019-11-19 15:37:15', 1),
(14, 12, 1, NULL, '2019-11-19 15:42:09', 1),
(15, 1, 1, NULL, '2019-11-19 15:53:11', 1),
(16, 12, 1, NULL, '2019-11-19 16:02:10', 1),
(17, 12, 1, NULL, '2019-11-19 16:42:32', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bloco`
--

CREATE TABLE `tb_bloco` (
  `id_bloco` int(11) NOT NULL,
  `descricao_bloco` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bloco`
--

INSERT INTO `tb_bloco` (`id_bloco`, `descricao_bloco`) VALUES
(1, 'Bloco-A'),
(2, 'Bloco-B'),
(3, 'Bloco-C'),
(4, 'Bloco-D'),
(5, 'Bloco-E'),
(6, 'Bloco-F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_entrada_produto`
--

CREATE TABLE `tb_entrada_produto` (
  `id_entrada_produto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tp_entrada_produto` int(11) NOT NULL,
  `nf_fiscal` varchar(50) DEFAULT NULL,
  `dt_entrada` datetime DEFAULT current_timestamp(),
  `id_status_mov_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_entrada_produto`
--

INSERT INTO `tb_entrada_produto` (`id_entrada_produto`, `id_usuario`, `id_tp_entrada_produto`, `nf_fiscal`, `dt_entrada`, `id_status_mov_produto`) VALUES
(1, 1, 1, '1234', '2019-11-07 00:00:00', NULL),
(2, 1, 1, '123', '2019-11-07 00:00:00', NULL),
(3, 1, 1, '3363', '2019-11-06 19:55:38', NULL),
(5, 1, 1, '5596', '2019-11-06 20:02:11', NULL),
(6, 1, 1, '5523', '2019-11-06 20:03:20', NULL),
(7, 1, 1, '5523', '2019-11-06 20:03:35', NULL),
(8, 1, 1, '9958', '2019-11-06 20:10:21', NULL),
(9, 1, 1, '183', '2019-11-06 20:12:24', NULL),
(10, 1, 2, '12123', '2019-11-06 20:13:38', NULL),
(11, 1, 2, '12123', '2019-11-06 20:14:51', NULL),
(12, 1, 1, '888', '2019-11-06 20:17:37', NULL),
(13, 1, 1, '888', '2019-11-06 20:18:24', NULL),
(14, 1, 1, '89898', '2019-11-06 20:18:30', NULL),
(15, 1, 1, '747', '2019-11-06 20:18:52', NULL),
(16, 1, 1, '1111', '2019-11-06 20:20:51', NULL),
(17, 1, 1, '8520', '2019-11-06 20:21:17', NULL),
(18, 1, 1, '8520', '2019-11-06 20:21:56', NULL),
(19, 1, 1, '85858585', '2019-11-06 20:22:05', NULL),
(20, 1, 1, '85858585', '2019-11-06 20:22:23', NULL),
(21, 1, 1, '12312312312', '2019-11-06 20:24:11', NULL),
(22, 1, 1, '12312312312', '2019-11-06 20:25:28', NULL),
(23, 1, 1, '2525236', '2019-11-06 20:26:13', NULL),
(24, 1, 1, '8569', '2019-11-06 20:30:07', NULL),
(25, 1, 1, '666', '2019-11-06 23:49:20', NULL),
(26, 1, 1, '665', '2019-11-06 23:50:10', NULL),
(27, 1, 1, '852', '2019-11-06 23:59:35', NULL),
(28, 1, 1, '12312312312', '2019-11-07 00:04:34', NULL),
(29, 1, 1, '4433', '2019-11-07 00:07:16', NULL),
(30, 1, 1, '111111', '2019-11-07 00:09:29', NULL),
(31, 1, 1, '5545', '2019-11-07 00:16:57', NULL),
(32, 1, 1, '2333232', '2019-11-07 00:18:53', NULL),
(33, 1, 1, '6666', '2019-11-07 00:19:56', NULL),
(34, 1, 1, '554656', '2019-11-07 00:33:22', NULL),
(35, 1, 1, '23232', '2019-11-07 02:18:29', NULL),
(36, 1, 1, '123', '2019-11-07 03:38:55', NULL),
(37, 1, 2, '444444', '2019-11-07 03:43:42', NULL),
(38, 1, 1, '6598', '2019-11-07 04:45:06', NULL),
(39, 1, 2, '2323', '2019-11-07 05:16:58', NULL),
(40, 1, 1, '45455', '2019-11-11 22:21:18', NULL),
(41, 1, 1, '5999', '2019-11-13 04:54:17', NULL),
(42, 1, 2, '2323', '2019-11-13 05:40:44', NULL),
(43, 1, 1, '0000', '2019-11-13 05:56:05', NULL),
(44, 1, 1, '0000', '2019-11-13 05:57:21', NULL),
(45, 1, 2, '0000', '2019-11-13 06:01:46', NULL),
(46, 1, 2, '0000', '2019-11-13 06:02:43', NULL),
(47, 1, 1, '0000', '2019-11-14 05:24:12', NULL),
(48, 1, 1, '0000', '2019-11-14 05:32:49', NULL),
(49, 1, 2, '8888', '2019-11-15 21:46:04', NULL),
(50, 1, 2, '8888', '2019-11-16 18:15:17', 2),
(51, 1, 2, '8888', '2019-11-16 18:21:27', NULL),
(52, 1, 2, '8888', '2019-11-16 18:22:46', NULL),
(53, 1, 1, '8888', '2019-11-16 18:27:53', 1),
(54, 1, 2, '2323', '2019-11-17 09:27:01', NULL),
(55, 1, 2, '5999', '2019-11-17 09:35:32', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_espacos`
--

CREATE TABLE `tb_espacos` (
  `id_espacos` int(11) NOT NULL,
  `descricao_espaco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_espacos`
--

INSERT INTO `tb_espacos` (`id_espacos`, `descricao_espaco`) VALUES
(1, 'Churrasqueira'),
(2, 'Salao de Festa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcao`
--

CREATE TABLE `tb_funcao` (
  `id_funcao` int(11) NOT NULL,
  `funcao` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcao`
--

INSERT INTO `tb_funcao` (`id_funcao`, `funcao`) VALUES
(1, 'Porteiro(a'),
(2, 'Zelador(a)'),
(3, 'Faxineiro(a)');

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
  `dt_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `dt_nascimento` date NOT NULL,
  `id_funcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `cpf`, `nome`, `rg`, `turno`, `sexo`, `telefone`, `id_status`, `dt_cadastro`, `dt_nascimento`, `id_funcao`) VALUES
(1, '02923154142', 'Samoel lopes costa', 5002095, 'diurno', 'masculino', '62 99156-8478', 1, '2019-09-16 00:00:00', '1990-07-15', 1),
(2, '00500600821', 'Nivaldo Henrique', 1010101, 'noturno', 'Indefinido', '62 99922336', 1, '2019-09-16 00:00:00', '0000-00-00', 2),
(4, '03030303030', 'matheus lopes ', 4444444, 'diurno', 'masculino', '44 4444-5565', 2, '2019-10-01 03:03:04', '2005-05-04', 3),
(5, '74185296300', 'Edemarques lopes ', 22222222, 'diurno', 'masculino', '62 99775-5600', 1, '2019-10-04 02:19:35', '1988-04-22', 1),
(11, '33333333333', 'Jonas silva juinior ', 55555, 'diurno', 'masculino', '62 99564-4433', 1, '2019-10-05 01:16:52', '2019-05-04', 2),
(12, '03030303030', 'valeria almeida costa ', 50066464, 'diurno', 'feminino', '44 4444-5565', 1, '2019-10-12 06:36:54', '1991-06-21', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_img_funcionario`
--

CREATE TABLE `tb_img_funcionario` (
  `imagem` varchar(255) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_img_funcionario`
--

INSERT INTO `tb_img_funcionario` (`imagem`, `id_funcionario`) VALUES
('IMG_20181224_223451683.jpg', 1),
('18d0e5b4a71eef92d2dadc5b10cbfb74jpg', 4),
('49c8635c62999eb2dc5a3e2d7eb1b6c8jpg', 5),
('7df71f5b9eba195dc092cc4111ba02d9jpg', 11),
('8b2d86d51a9cda4bf54c2642f94cad94jpg', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_img_morador`
--

CREATE TABLE `tb_img_morador` (
  `imagem` varchar(255) NOT NULL,
  `id_morador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_img_morador`
--

INSERT INTO `tb_img_morador` (`imagem`, `id_morador`) VALUES
('IMG_20181224_223451683.jpg', 1),
('3623818daba7b2a16b8437b086b06bd7jpg', 8),
('48ed4eefca56f0485ccd4d1dc9182065jpg', 9),
('3b7ac03515b47235c7cfc0f146c5aef4jpg', 10),
('b859ff4063f6d83dce1860fcad241382jpg', 11),
('9f18383fd978923be07e6d8907034db6png', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_baixa`
--

CREATE TABLE `tb_itens_baixa` (
  `id_itens_baixa` int(11) NOT NULL,
  `id_baixa_produto` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_itens_baixa`
--

INSERT INTO `tb_itens_baixa` (`id_itens_baixa`, `id_baixa_produto`, `id_produto`, `quantidade`) VALUES
(2, 1, 2, 2),
(7, 6, 1, 10),
(8, 6, 2, 5),
(10, 7, 2, 2),
(11, 8, 1, 2),
(12, 9, 1, 2),
(13, 10, 1, 3),
(14, 11, 2, 2),
(15, 12, 2, 2),
(16, 13, 1, 3),
(17, 14, 2, 3),
(18, 15, 1, 3),
(19, 16, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_entrada`
--

CREATE TABLE `tb_itens_entrada` (
  `id_itens_entrada` int(11) NOT NULL,
  `id_entrada_produto` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_itens_entrada`
--

INSERT INTO `tb_itens_entrada` (`id_itens_entrada`, `id_entrada_produto`, `id_produto`, `quantidade`) VALUES
(31, 24, 2, 3),
(32, 26, 2, 3),
(33, 26, 1, 3),
(38, 29, 1, 2),
(41, 30, 1, 2),
(43, 31, 1, 1),
(46, 32, 2, 1),
(57, 34, 1, 2),
(59, 38, 1, 10),
(60, 38, 2, 500),
(68, 43, 2, 3),
(71, 45, 2, 1),
(72, 45, 1, 2),
(73, 48, 2, 2),
(75, 49, 2, 2),
(76, 49, 1, 2),
(77, 50, 1, 3),
(78, 51, 1, 2),
(79, 52, 1, 2),
(80, 53, 2, 3),
(81, 55, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_morador`
--

CREATE TABLE `tb_morador` (
  `id_morador` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `nome_pai` varchar(100) NOT NULL,
  `rg` int(11) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `sexo` varchar(13) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT current_timestamp(),
  `id_tipo_morador` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `telefone` varchar(13) NOT NULL,
  `id_apartamento` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_morador`
--

INSERT INTO `tb_morador` (`id_morador`, `cpf`, `nome`, `nome_mae`, `nome_pai`, `rg`, `dt_nascimento`, `sexo`, `dt_cadastro`, `id_tipo_morador`, `id_usuario`, `telefone`, `id_apartamento`, `id_status`) VALUES
(1, '02923154142', 'Samoel lopes costa ', 'Vilma luciende lopes costa ', 'Tome da conceiÃ§Ã£o costa', 5002095, '1990-07-15', 'masculino', '2019-10-05 05:38:06', 1, 1, '62 991568748', 12, 1),
(8, '02523126141', 'Maria Valeria almeida costa ', 'Joaquina antunes', 'Osmar antunes guedes ', 4512312, '1991-06-21', 'feminino', '2019-10-12 07:50:02', 2, 1, '44 4444-5565', 337, 1),
(9, '85274196301', 'Edemarques lopes ', 'Neusi lopes', 'raimundo lopes', 22222222, '1988-04-26', 'masculino', '2019-10-19 23:51:48', 1, 1, '62 99775-5600', 257, 1),
(10, '03030303030', 'isabela costa', 'Maria valeria almeida guedes ', 'samoel lopes costa', 55555, '2013-07-03', 'feminino', '2019-10-19 23:58:28', 2, 1, '929919556', 161, 1),
(11, '74185296300', 'Sidnei lopes costa', 'Vilma luciene lopes costa', 'tome da conceiÃ§Ã£o costa', 22222222, '1992-02-15', 'masculino', '2019-10-26 09:15:59', 1, 1, '44 4444-5565', 322, 2),
(12, '03660125522', 'Daniel Gomes Albernaz', 'Solange', 'Gilmar', 123123, '2020-01-01', 'feminino', '2019-11-06 19:02:48', 1, 1, '629583695', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mov_morador`
--

CREATE TABLE `tb_mov_morador` (
  `id_movimentacao` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_movimentacao` datetime DEFAULT current_timestamp(),
  `id_tp_movimentacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_mov_morador`
--

INSERT INTO `tb_mov_morador` (`id_movimentacao`, `id_morador`, `id_usuario`, `dt_movimentacao`, `id_tp_movimentacao`) VALUES
(2, 8, 1, '2019-10-16 03:27:21', 1),
(3, 1, 1, '2019-10-16 03:31:26', 1),
(4, 1, 1, '2019-10-16 03:32:07', 2),
(5, 1, 1, '2019-10-16 03:41:19', 1),
(6, 1, 1, '2019-10-16 03:48:04', 2),
(7, 8, 1, '2019-10-16 03:48:11', 2),
(8, 1, 1, '2019-10-16 03:49:10', 1),
(9, 1, 1, '2019-10-16 03:51:32', 2),
(10, 1, 1, '2019-10-16 03:52:58', 2),
(11, 8, 1, '2019-10-16 03:59:31', 1),
(12, 1, 1, '2019-10-16 04:09:09', 1),
(13, 1, 1, '2019-10-16 04:11:36', 2),
(14, 1, 1, '2019-10-16 04:15:07', 1),
(15, 1, 1, '2019-10-19 14:10:36', 2),
(16, 8, 1, '2019-10-19 16:40:22', 2),
(17, 1, 1, '2019-10-19 16:42:08', 1),
(18, 1, 1, '2019-10-19 16:46:21', 2),
(19, 1, 1, '2019-10-19 16:46:30', 1),
(20, 1, 1, '2019-10-19 16:49:15', 2),
(21, 1, 1, '2019-10-19 16:53:15', 1),
(22, 8, 1, '2019-10-19 17:14:32', 1),
(23, 1, 1, '2019-10-19 17:15:41', 2),
(24, 8, 1, '2019-10-19 22:50:01', 2),
(25, 1, 1, '2019-10-19 22:50:25', 1),
(26, 8, 1, '2019-10-19 22:53:28', 1),
(27, 1, 1, '2019-10-19 22:54:21', 2),
(28, 8, 1, '2019-10-19 23:40:40', 2),
(29, 8, 1, '2019-10-19 23:41:01', 2),
(30, 8, 1, '2019-10-19 23:44:30', 2),
(31, 1, 1, '2019-10-19 23:47:45', 1),
(32, 9, 1, '2019-10-19 23:51:53', 1),
(33, 9, 1, '2019-10-19 23:52:09', 2),
(34, 9, 1, '2019-10-19 23:52:16', 1),
(35, 10, 1, '2019-10-19 23:58:45', 2),
(36, 8, 1, '2019-10-20 00:16:50', 2),
(37, 8, 1, '2019-10-20 01:01:49', 1),
(38, 9, 2, '2019-10-20 01:08:13', 2),
(39, 1, 2, '2019-10-20 01:16:21', 2),
(40, 8, 1, '2019-10-20 18:32:10', 2),
(41, 1, 1, '2019-10-20 18:32:16', 1),
(42, 8, 1, '2019-10-24 10:09:50', 1),
(43, 8, 1, '2019-10-25 14:11:10', 2),
(44, 8, 1, '2019-10-25 14:11:33', 1),
(45, 8, 1, '2019-10-26 08:55:15', 2),
(46, 8, 1, '2019-10-26 08:55:22', 1),
(47, 11, 1, '2019-10-26 09:17:07', 2),
(48, 11, 1, '2019-10-26 09:17:14', 1),
(49, 11, 1, '2019-10-26 09:17:23', 2),
(50, 9, 1, '2019-10-26 09:23:48', 1),
(51, 11, 1, '2019-10-26 09:24:04', 1),
(52, 9, 1, '2019-10-26 09:24:25', 2),
(53, 1, 1, '2019-10-26 09:53:07', 2),
(54, 8, 1, '2019-10-26 09:53:20', 2),
(55, 8, 1, '2019-10-26 09:54:22', 1),
(56, 1, 1, '2019-10-26 09:54:30', 1),
(57, 9, 1, '2019-10-26 09:54:35', 1),
(58, 8, 1, '2019-10-26 11:04:32', 2),
(59, 9, 1, '2019-10-26 11:05:09', 2),
(60, 8, 1, '2019-10-26 17:28:16', 1),
(61, 1, 1, '2019-10-26 17:28:28', 2),
(62, 8, 1, '2019-10-27 20:29:19', 2),
(63, 8, 1, '2019-10-30 01:43:54', 1),
(64, 9, 1, '2019-10-30 01:44:12', 1),
(65, 1, 1, '2019-10-30 01:44:20', 1),
(66, 8, 1, '2019-11-02 16:31:02', 2),
(67, 1, 1, '2019-11-02 16:36:13', 2),
(68, 8, 1, '2019-11-02 16:42:08', 1),
(69, 1, 1, '2019-11-02 16:42:13', 1),
(70, 8, 1, '2019-11-02 17:54:03', 2),
(71, 1, 1, '2019-11-02 17:54:08', 2),
(72, 1, 1, '2019-11-09 08:00:35', 1),
(73, 1, 1, '2019-11-09 08:09:20', 2),
(74, 1, 1, '2019-11-09 08:09:28', 1),
(75, 1, 1, '2019-11-09 08:09:35', 2),
(76, 1, 1, '2019-11-18 19:48:09', 1);

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
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `dt_cadastro` date DEFAULT curdate(),
  `id_tipo_produto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `preco_produto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `descricao`, `quantidade`, `observacao`, `dt_cadastro`, `id_tipo_produto`, `id_usuario`, `preco_produto`) VALUES
(1, 'Papel higienico', 0, 'Para coco', '2019-11-06', 1, 1, '2.50'),
(2, 'Sabao', 5, 'De coco', '2019-11-06', 1, 1, '3.50'),
(3, 'Amaciante ', 5, 'produto para limpeza 0000', '2019-11-07', 1, 1, '12.00'),
(4, 'Bule de  Cafe ', NULL, 'Bule azul', '2019-11-19', 4, 1, '6.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `id_reserva` int(11) NOT NULL,
  `dt_reserva` date DEFAULT NULL,
  `id_espaco` int(11) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `evento` varchar(255) NOT NULL,
  `id_bloco` int(11) NOT NULL,
  `id_status_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_reserva`
--

INSERT INTO `tb_reserva` (`id_reserva`, `dt_reserva`, `id_espaco`, `id_morador`, `id_usuario`, `evento`, `id_bloco`, `id_status_reserva`) VALUES
(1, '2019-10-10', 1, 1, 1, 'torta ', 2, 1),
(2, '2019-10-21', 2, 8, 1, 'aniversario', 3, 1),
(4, '2019-10-25', 1, 9, 1, 'festa', 4, 1),
(5, '2019-10-25', 2, 8, 1, 'aniversario', 4, 1),
(6, '2019-10-27', 1, 9, 1, 'torta ', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL DEFAULT 1,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status_mov_produto`
--

CREATE TABLE `tb_status_mov_produto` (
  `id_status_mov_produto` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status_mov_produto`
--

INSERT INTO `tb_status_mov_produto` (`id_status_mov_produto`, `status`) VALUES
(1, 'FINALIZADO'),
(2, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status_reserva`
--

CREATE TABLE `tb_status_reserva` (
  `id_status_reserva` int(11) NOT NULL,
  `status_reserva` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status_reserva`
--

INSERT INTO `tb_status_reserva` (`id_status_reserva`, `status_reserva`) VALUES
(1, 'ATIVA'),
(2, 'CANCELADA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_morador`
--

CREATE TABLE `tb_tipo_morador` (
  `id_tipo_morador` int(11) NOT NULL,
  `tipo_morador` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_morador`
--

INSERT INTO `tb_tipo_morador` (`id_tipo_morador`, `tipo_morador`) VALUES
(1, 'PROPRIETARIO'),
(2, 'LOCATARIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_produto`
--

CREATE TABLE `tb_tipo_produto` (
  `id_tipo_produto` int(11) NOT NULL,
  `tipo_produto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_produto`
--

INSERT INTO `tb_tipo_produto` (`id_tipo_produto`, `tipo_produto`) VALUES
(1, 'LIMPEZA'),
(2, 'FERRAMENTAS'),
(3, 'ALIMENTACAO'),
(4, 'UTENSILIOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_visita`
--

CREATE TABLE `tb_tipo_visita` (
  `id_tipo_visita` int(11) NOT NULL,
  `tipo_visita` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_visita`
--

INSERT INTO `tb_tipo_visita` (`id_tipo_visita`, `tipo_visita`) VALUES
(1, 'VISITA'),
(2, 'PRESTADOR DE SERVICO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_total_entrada`
--

CREATE TABLE `tb_total_entrada` (
  `id_total_entrada` int(11) NOT NULL,
  `id_entrada_produto` int(11) NOT NULL,
  `total_entrada` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_total_entrada`
--

INSERT INTO `tb_total_entrada` (`id_total_entrada`, `id_entrada_produto`, `total_entrada`) VALUES
(1, 24, '10.50'),
(2, 24, '10.50'),
(3, 24, '10.50'),
(4, 25, '0.00'),
(5, 26, '7.50'),
(6, 27, '12.00'),
(9, 30, '0.00'),
(10, 31, '6.00'),
(11, 32, '31.00'),
(12, 33, '-25.00'),
(13, 34, '5.00'),
(14, 35, '0.00'),
(15, 2, '0.00'),
(16, 37, '0.00'),
(17, 38, '1775.00'),
(18, 39, '-1487.50'),
(19, 40, '0.00'),
(20, 41, '-12.00'),
(21, 39, '-1487.50'),
(22, 43, '10.50'),
(23, 43, '10.50'),
(24, 45, '8.50'),
(25, 45, '0.00'),
(26, 48, '-1358.00'),
(27, 49, '12.00'),
(28, 50, '7.50'),
(29, 51, '5.00'),
(30, 52, '5.00'),
(31, 53, '10.50'),
(32, 54, '0.00'),
(33, 55, '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tp_entrada_produto`
--

CREATE TABLE `tb_tp_entrada_produto` (
  `id_tp_entrada_produto` int(11) NOT NULL,
  `tipo_entrada_produto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tp_entrada_produto`
--

INSERT INTO `tb_tp_entrada_produto` (`id_tp_entrada_produto`, `tipo_entrada_produto`) VALUES
(1, 'ENTREGUE PELA EMPRESA'),
(2, 'ADQUERIDO PELO SINDICO ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tp_movimentacao`
--

CREATE TABLE `tb_tp_movimentacao` (
  `id_tp_movimentacao` int(11) NOT NULL,
  `movimentacao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tp_movimentacao`
--

INSERT INTO `tb_tp_movimentacao` (`id_tp_movimentacao`, `movimentacao`) VALUES
(1, 'ENTRADA'),
(2, 'SAIDA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `usuario` varchar(14) NOT NULL,
  `id_nivel_acesso` int(1) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `senha`, `usuario`, `id_nivel_acesso`, `id_funcionario`, `id_status`) VALUES
(1, '12345', 'samoel', 2, 1, 1),
(2, '12345', 'nivaldo', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id_veiculo` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `descricao_veiculo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_veiculo`
--

INSERT INTO `tb_veiculo` (`id_veiculo`, `id_morador`, `placa`, `descricao_veiculo`) VALUES
(1, 8, 'kEW8885', 'Gol G5 Preto'),
(2, 9, 'kwm9991', 'Polo preto '),
(4, 11, 'kwm8884', 'Gol G5 Preto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visitante`
--

CREATE TABLE `tb_visitante` (
  `id_visitante` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `dt_nascimento` date NOT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `sexo` varchar(45) NOT NULL,
  `observacao` text DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_tipo_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_visitante`
--

INSERT INTO `tb_visitante` (`id_visitante`, `nome`, `cpf`, `rg`, `dt_nascimento`, `telefone`, `sexo`, `observacao`, `id_usuario`, `id_status`, `id_tipo_visita`) VALUES
(3, 'Edemarques lopes ', '16161364446', 55555, '1990-01-21', '62 99564', 'masculino', 'ENTROU ACOMPANHADO DE :\r\nFULANO UM E FULANO DOIS \r\n', 1, 1, 1),
(4, 'Samoel lopes costa', '02923154142', 2147483647, '1990-07-15', '62 99156-8478', 'masculino', 'ira passa a noite  no condominio ', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visita_morador`
--

CREATE TABLE `tb_visita_morador` (
  `id_visita_morador` int(11) NOT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `id_visitante` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_movimentacao` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tp_movimentacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_visita_morador`
--

INSERT INTO `tb_visita_morador` (`id_visita_morador`, `id_morador`, `id_visitante`, `id_usuario`, `dt_movimentacao`, `id_tp_movimentacao`) VALUES
(1, 8, 4, 1, '2019-10-23 01:53:07', 1),
(7, 8, 4, 1, '2019-11-03 08:28:53', 2),
(8, 8, 4, 1, '2019-11-03 08:29:13', 1),
(9, 8, 4, 1, '2019-11-03 08:29:57', 2),
(10, 8, 4, 1, '2019-11-03 08:39:08', 1),
(11, 8, 4, 1, '2019-11-03 08:39:26', 2),
(12, 8, 4, 1, '2019-11-03 08:59:23', 1),
(13, 8, 4, 1, '2019-11-03 09:00:29', 1),
(14, 8, 4, 1, '2019-11-03 09:02:37', 1),
(15, 8, 4, 1, '2019-11-03 16:09:27', 2),
(18, 1, 4, 1, '2019-11-07 05:33:30', 1),
(19, 1, 4, 1, '2019-11-19 17:41:35', 2),
(20, 1, 4, 1, '2019-11-19 17:41:46', 1);

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
-- Índices para tabela `tb_baixa_produto`
--
ALTER TABLE `tb_baixa_produto`
  ADD PRIMARY KEY (`id_baixa_produto`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_status_mov_produto` (`id_status_mov_produto`);

--
-- Índices para tabela `tb_bloco`
--
ALTER TABLE `tb_bloco`
  ADD PRIMARY KEY (`id_bloco`);

--
-- Índices para tabela `tb_entrada_produto`
--
ALTER TABLE `tb_entrada_produto`
  ADD PRIMARY KEY (`id_entrada_produto`),
  ADD KEY `id_tp_entrada_produto` (`id_tp_entrada_produto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_status_mov_produto` (`id_status_mov_produto`);

--
-- Índices para tabela `tb_espacos`
--
ALTER TABLE `tb_espacos`
  ADD PRIMARY KEY (`id_espacos`);

--
-- Índices para tabela `tb_funcao`
--
ALTER TABLE `tb_funcao`
  ADD PRIMARY KEY (`id_funcao`);

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
  ADD PRIMARY KEY (`imagem`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Índices para tabela `tb_img_morador`
--
ALTER TABLE `tb_img_morador`
  ADD PRIMARY KEY (`imagem`),
  ADD KEY `id_morador` (`id_morador`);

--
-- Índices para tabela `tb_itens_baixa`
--
ALTER TABLE `tb_itens_baixa`
  ADD PRIMARY KEY (`id_itens_baixa`),
  ADD KEY `id_baixa_produto` (`id_baixa_produto`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `tb_itens_entrada`
--
ALTER TABLE `tb_itens_entrada`
  ADD PRIMARY KEY (`id_itens_entrada`),
  ADD KEY `id_entrada_produto` (`id_entrada_produto`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  ADD PRIMARY KEY (`id_morador`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_apartamento` (`id_apartamento`),
  ADD KEY `id_tipo_morador` (`id_tipo_morador`);

--
-- Índices para tabela `tb_mov_morador`
--
ALTER TABLE `tb_mov_morador`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `id_morador` (`id_morador`),
  ADD KEY `id_tp_movimentacao` (`id_tp_movimentacao`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_tipo_produto` (`id_tipo_produto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_espaco` (`id_espaco`),
  ADD KEY `id_morador` (`id_morador`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_bloco` (`id_bloco`),
  ADD KEY `id_status_reserva` (`id_status_reserva`);

--
-- Índices para tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tb_status_mov_produto`
--
ALTER TABLE `tb_status_mov_produto`
  ADD PRIMARY KEY (`id_status_mov_produto`);

--
-- Índices para tabela `tb_status_reserva`
--
ALTER TABLE `tb_status_reserva`
  ADD PRIMARY KEY (`id_status_reserva`);

--
-- Índices para tabela `tb_tipo_morador`
--
ALTER TABLE `tb_tipo_morador`
  ADD PRIMARY KEY (`id_tipo_morador`);

--
-- Índices para tabela `tb_tipo_produto`
--
ALTER TABLE `tb_tipo_produto`
  ADD PRIMARY KEY (`id_tipo_produto`);

--
-- Índices para tabela `tb_tipo_visita`
--
ALTER TABLE `tb_tipo_visita`
  ADD PRIMARY KEY (`id_tipo_visita`);

--
-- Índices para tabela `tb_total_entrada`
--
ALTER TABLE `tb_total_entrada`
  ADD PRIMARY KEY (`id_total_entrada`),
  ADD KEY `id_entrada_produto` (`id_entrada_produto`);

--
-- Índices para tabela `tb_tp_entrada_produto`
--
ALTER TABLE `tb_tp_entrada_produto`
  ADD PRIMARY KEY (`id_tp_entrada_produto`);

--
-- Índices para tabela `tb_tp_movimentacao`
--
ALTER TABLE `tb_tp_movimentacao`
  ADD PRIMARY KEY (`id_tp_movimentacao`);

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
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_tipo_visita` (`id_tipo_visita`);

--
-- Índices para tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  ADD PRIMARY KEY (`id_visita_morador`),
  ADD KEY `id_morador` (`id_morador`),
  ADD KEY `id_visitante` (`id_visitante`),
  ADD KEY `id_tp_movimentacao` (`id_tp_movimentacao`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  MODIFY `id_apartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT de tabela `tb_baixa_produto`
--
ALTER TABLE `tb_baixa_produto`
  MODIFY `id_baixa_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_bloco`
--
ALTER TABLE `tb_bloco`
  MODIFY `id_bloco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_entrada_produto`
--
ALTER TABLE `tb_entrada_produto`
  MODIFY `id_entrada_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `tb_espacos`
--
ALTER TABLE `tb_espacos`
  MODIFY `id_espacos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_funcao`
--
ALTER TABLE `tb_funcao`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_itens_baixa`
--
ALTER TABLE `tb_itens_baixa`
  MODIFY `id_itens_baixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_itens_entrada`
--
ALTER TABLE `tb_itens_entrada`
  MODIFY `id_itens_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  MODIFY `id_morador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_mov_morador`
--
ALTER TABLE `tb_mov_morador`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_status_mov_produto`
--
ALTER TABLE `tb_status_mov_produto`
  MODIFY `id_status_mov_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_status_reserva`
--
ALTER TABLE `tb_status_reserva`
  MODIFY `id_status_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tipo_morador`
--
ALTER TABLE `tb_tipo_morador`
  MODIFY `id_tipo_morador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tipo_produto`
--
ALTER TABLE `tb_tipo_produto`
  MODIFY `id_tipo_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_tipo_visita`
--
ALTER TABLE `tb_tipo_visita`
  MODIFY `id_tipo_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_total_entrada`
--
ALTER TABLE `tb_total_entrada`
  MODIFY `id_total_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_tp_entrada_produto`
--
ALTER TABLE `tb_tp_entrada_produto`
  MODIFY `id_tp_entrada_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tp_movimentacao`
--
ALTER TABLE `tb_tp_movimentacao`
  MODIFY `id_tp_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_visitante`
--
ALTER TABLE `tb_visitante`
  MODIFY `id_visitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  MODIFY `id_visita_morador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_apartamento`
--
ALTER TABLE `tb_apartamento`
  ADD CONSTRAINT `tb_apartamento_ibfk_1` FOREIGN KEY (`id_bloco`) REFERENCES `tb_bloco` (`id_bloco`);

--
-- Limitadores para a tabela `tb_baixa_produto`
--
ALTER TABLE `tb_baixa_produto`
  ADD CONSTRAINT `tb_baixa_produto_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `tb_baixa_produto_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_baixa_produto_ibfk_4` FOREIGN KEY (`id_status_mov_produto`) REFERENCES `tb_status_mov_produto` (`id_status_mov_produto`);

--
-- Limitadores para a tabela `tb_entrada_produto`
--
ALTER TABLE `tb_entrada_produto`
  ADD CONSTRAINT `tb_entrada_produto_ibfk_2` FOREIGN KEY (`id_tp_entrada_produto`) REFERENCES `tb_tp_entrada_produto` (`id_tp_entrada_produto`),
  ADD CONSTRAINT `tb_entrada_produto_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_entrada_produto_ibfk_4` FOREIGN KEY (`id_status_mov_produto`) REFERENCES `tb_status_mov_produto` (`id_status_mov_produto`);

--
-- Limitadores para a tabela `tb_img_funcionario`
--
ALTER TABLE `tb_img_funcionario`
  ADD CONSTRAINT `tb_img_funcionario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `tb_img_funcionario_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `tb_img_morador`
--
ALTER TABLE `tb_img_morador`
  ADD CONSTRAINT `tb_img_morador_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`);

--
-- Limitadores para a tabela `tb_itens_baixa`
--
ALTER TABLE `tb_itens_baixa`
  ADD CONSTRAINT `tb_itens_baixa_ibfk_1` FOREIGN KEY (`id_baixa_produto`) REFERENCES `tb_baixa_produto` (`id_baixa_produto`),
  ADD CONSTRAINT `tb_itens_baixa_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Limitadores para a tabela `tb_itens_entrada`
--
ALTER TABLE `tb_itens_entrada`
  ADD CONSTRAINT `tb_itens_entrada_ibfk_1` FOREIGN KEY (`id_entrada_produto`) REFERENCES `tb_entrada_produto` (`id_entrada_produto`),
  ADD CONSTRAINT `tb_itens_entrada_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Limitadores para a tabela `tb_morador`
--
ALTER TABLE `tb_morador`
  ADD CONSTRAINT `tb_morador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_morador_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`),
  ADD CONSTRAINT `tb_morador_ibfk_3` FOREIGN KEY (`id_apartamento`) REFERENCES `tb_apartamento` (`id_apartamento`),
  ADD CONSTRAINT `tb_morador_ibfk_4` FOREIGN KEY (`id_tipo_morador`) REFERENCES `tb_tipo_morador` (`id_tipo_morador`);

--
-- Limitadores para a tabela `tb_mov_morador`
--
ALTER TABLE `tb_mov_morador`
  ADD CONSTRAINT `tb_mov_morador_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`),
  ADD CONSTRAINT `tb_mov_morador_ibfk_2` FOREIGN KEY (`id_tp_movimentacao`) REFERENCES `tb_tp_movimentacao` (`id_tp_movimentacao`),
  ADD CONSTRAINT `tb_mov_morador_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `tb_produto_ibfk_2` FOREIGN KEY (`id_tipo_produto`) REFERENCES `tb_tipo_produto` (`id_tipo_produto`),
  ADD CONSTRAINT `tb_produto_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `tb_reserva_ibfk_1` FOREIGN KEY (`id_espaco`) REFERENCES `tb_espacos` (`id_espacos`),
  ADD CONSTRAINT `tb_reserva_ibfk_2` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`),
  ADD CONSTRAINT `tb_reserva_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_reserva_ibfk_4` FOREIGN KEY (`id_bloco`) REFERENCES `tb_bloco` (`id_bloco`),
  ADD CONSTRAINT `tb_reserva_ibfk_5` FOREIGN KEY (`id_status_reserva`) REFERENCES `tb_status_reserva` (`id_status_reserva`);

--
-- Limitadores para a tabela `tb_total_entrada`
--
ALTER TABLE `tb_total_entrada`
  ADD CONSTRAINT `tb_total_entrada_ibfk_1` FOREIGN KEY (`id_entrada_produto`) REFERENCES `tb_entrada_produto` (`id_entrada_produto`);

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
  ADD CONSTRAINT `tb_visitante_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`),
  ADD CONSTRAINT `tb_visitante_ibfk_3` FOREIGN KEY (`id_tipo_visita`) REFERENCES `tb_tipo_visita` (`id_tipo_visita`);

--
-- Limitadores para a tabela `tb_visita_morador`
--
ALTER TABLE `tb_visita_morador`
  ADD CONSTRAINT `tb_visita_morador_ibfk_1` FOREIGN KEY (`id_morador`) REFERENCES `tb_morador` (`id_morador`),
  ADD CONSTRAINT `tb_visita_morador_ibfk_2` FOREIGN KEY (`id_visitante`) REFERENCES `tb_visitante` (`id_visitante`),
  ADD CONSTRAINT `tb_visita_morador_ibfk_3` FOREIGN KEY (`id_tp_movimentacao`) REFERENCES `tb_tp_movimentacao` (`id_tp_movimentacao`),
  ADD CONSTRAINT `tb_visita_morador_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
