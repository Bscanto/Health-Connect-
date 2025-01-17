-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17/01/2025 às 14:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `health`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acao`
--

CREATE TABLE `acao` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acao`
--

INSERT INTO `acao` (`id`, `codigo`, `descricao`) VALUES
(6, 301080038, 'Acolhimentoem terceiro turno de paciente em CAPS'),
(7, 301080232, 'Acolhimento inicial por centro de atenção psicossocial'),
(8, 301080020, 'Acolhimento noturno de paciente em centro de atenção psicossocial'),
(9, 301080194, 'Acolhimento diurno de paciente em centro de atenção psicossocial'),
(10, 301080208, 'Acolhimento individual de paciente em centro de atenção psicossocial'),
(11, 301080216, 'Acolhimento em grupo de paciente em centro de atenção psicossocial'),
(12, 301080224, 'Acolhimento familiar em centro de atenção psicossocial'),
(13, 301080240, 'Acolhimento domiciliar para pacientes de centro de atenção psicossocial e/ou familiares'),
(14, 301080291, 'Atenção às situações de crise'),
(15, 301080348, 'Ações de reabilitação psicossocial'),
(16, 301080313, 'Ações de redução de dano');

-- --------------------------------------------------------

--
-- Estrutura para tabela `acao_realizada`
--

CREATE TABLE `acao_realizada` (
  `id_acao_realizada` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `servico` varchar(20) DEFAULT NULL,
  `data_acao` date DEFAULT NULL,
  `classificacao` int(11) DEFAULT NULL,
  `cbo` varchar(10) DEFAULT NULL,
  `cnsp` varchar(30) DEFAULT NULL,
  `local_acao` varchar(20) DEFAULT NULL,
  `descricao_procedimento` varchar(500) DEFAULT NULL,
  `fk_acao_id` int(11) DEFAULT NULL,
  `fk_usuarios_id` int(11) DEFAULT NULL,
  `fk_paciente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acao_realizada`
--

INSERT INTO `acao_realizada` (`id_acao_realizada`, `quantidade`, `servico`, `data_acao`, `classificacao`, `cbo`, `cnsp`, `local_acao`, `descricao_procedimento`, `fk_acao_id`, `fk_usuarios_id`, `fk_paciente_id`) VALUES
(4, 1, '112', '2024-10-18', 2, '29', '1111.1111.1111.1111', 'CAPSi', 'teste', 6, NULL, 8),
(15, 1, '112', '2024-10-18', 2, NULL, NULL, 'CAPSi', 'testando', 6, 47, 8),
(16, 1, '112', '2024-10-16', 2, NULL, NULL, 'CAPSi', 'retd', 6, 47, 8),
(18, 1, '112', '2024-10-25', 2, NULL, NULL, 'CAPSi', 'hygyftugk', 6, 47, 4),
(19, 1, '112', '2024-10-26', 2, NULL, NULL, 'Território', 'atendimento em casa', 6, 47, 6),
(20, 1, '112', '2024-10-26', 2, NULL, NULL, 'CAPSi', 'kdkttdyilurfyfljflyrukrg;yflf;tg;t;ugtóutóutyóutyúoytúg/jl', 6, 47, 8),
(21, 1, '112', '2024-10-29', 2, NULL, NULL, 'Território', 'whegouwylangbladjbgljqeghlsrn;K GE GRW HMR HJLwbgjlew rGLJ/SFBGJLARWM BJ LJ', 6, 47, 6),
(26, 1, '112', '2024-11-12', 2, NULL, NULL, 'CAPSi', 'testetttttttttt', 6, 47, NULL),
(27, 1, '112', '2024-11-14', 2, NULL, NULL, 'CAPSi', 'ver se esta salvando ', 6, 47, NULL),
(28, 1, '112', '2024-11-14', 2, NULL, NULL, 'CAPSi', '2 teste', 6, 47, 4),
(29, 1, '112', '2024-11-14', 2, NULL, NULL, 'CAPSi', 'teste', 6, 47, NULL),
(31, 1, '112', '2024-11-14', 2, NULL, NULL, 'CAPSi', 'testando id', 6, 47, 5),
(32, 1, '112', '2024-11-14', 2, NULL, NULL, 'CAPSi', 'testando carregamento lista acoes', 6, 47, 5),
(34, 1, '112', '2024-11-16', 2, NULL, NULL, 'CAPSi', 'ertj4ytmnrnemunyb3unetn 35y3n3ynn3yn35y', 6, 47, 9),
(35, 1, '112', '2024-11-27', 2, NULL, NULL, 'CAPSi', 'pnph bhijnbvfxy. ugociyfc. ougcucvoutf7eztf', 6, 47, 8),
(36, 1, '112', '2024-11-27', 2, NULL, NULL, 'CAPSi', '/ljbv gvlcptcdotuc;vjgc fxkf;vjvljgvkhvkclv fitudvlgcc;vctuclg gjlcyrxyrvhkv;jg ;khv;jgvcluotcoyrxlj', 6, 47, 9),
(37, 1, '112', '2024-11-27', 2, NULL, NULL, 'CAPSi', 'mgjd,h.gk.h,jv.h/h,h', 6, 47, 9),
(38, 1, '112', '2024-12-28', 2, NULL, NULL, 'CAPSi', 'mdlw;m ', 6, 47, 10),
(39, 1, '112', '2024-12-28', 2, NULL, NULL, 'CAPSi', 'tjsgksg,gfhgfhzgm', 6, 47, 96),
(41, 1, '112', '2024-12-29', 2, '14.567.8', '3456.0000.0001', 'CAPSi', 'realizado atendomento da paciente, conversamos, foi contado de seu dia a dia na escola muito intuitiva,  gosta de brincar.', 6, 70, 71),
(42, 1, '112', '2024-12-29', 2, '14.567.8', '3456.0000.0001', 'CAPSi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 6, 70, 76),
(43, 1, '112', '2024-12-29', 2, '14.567.8', '3456.0000.0001', 'CAPSi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 6, 70, 53),
(44, 1, '112', '2024-12-29', 2, '14.567.8', '3456.0000.0001', 'CAPSi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 6, 70, 26),
(45, 1, '112', '2024-12-30', 2, '14.568.0', '3456.0000.0003', 'CAPSi', 'Atendimento com paciente, conversamos sobre sua rotina diária, afaseres domenticos, como [e o relacionamento com seus colegas de escola, como esta sendo o novo ambiente escolar.\nPacienteRelata ótima evolução com seus colegas e amigos  gostando de brincar bastante com jogos educativos.', 6, 72, 67),
(46, 1, '112', '2025-01-07', 2, NULL, NULL, 'CAPSi', 'gmengqnrg rwg jqwrlg qrw gbrwjg rwjg rn bfjb qetihb fblfas bqrwjo br bfsba sb fobjf brw brwln\'b r\'bqrojb jorjbj ', 6, 47, 6),
(47, 1, '112', '2025-01-07', 2, '30.111.6', '6789.0000.0001', 'CAPSi', 'mnltjenlgn qt hewt hlw\'tjh wlt\'jh t\'llejtejetjtejt. e ;2k5 [hkrwfs;b', 6, 85, 25),
(48, 1, '112', '2025-01-06', 2, '30.111.6', '6789.0000.0001', 'CAPSi', 'mer grh 2rkh r hrs hals\'t ht h telhj teojhrwhorhg', 6, 85, 24),
(49, 4, '112', '2025-01-02', 2, '30.111.6', '6789.0000.0001', 'CAPSi', 'rmh;', 6, 85, 93),
(50, 1, '112', '2025-01-03', 2, '30.111.6', '6789.0000.0001', 'CAPSi', 'mrkng rehrkeh et htej tekj; ykjqeltjh q. hqtehj qthjqlje hleh letq heqt htqelh qetl b', 6, 85, 92),
(51, 1, '112', '2025-01-02', 2, '30.111.6', '6789.0000.0001', 'CAPSi', '.1m grhh. j tjyyjr ;pk sgd lsgdk mlk m gm ;yrm rq;y q; n', 6, 85, 91),
(52, 1, '112', '2024-12-04', 2, '30.111.6', '6789.0000.0001', 'CAPSi', 'erhet h h3j tj et jt j twej tq ewj wyj. ryj', 6, 85, 76),
(53, 1, '112', '2024-12-13', 2, '30.111.6', '6789.0000.0001', 'CAPSi', 'hhhhhh', 6, 85, 71),
(54, 1, '112', '2025-01-03', 2, '20.114.9', '5678.0000.0004', 'CAPSi', 'h. h l\'n f\'sqnapnopqr nafnkfne\nt[nk;neqmkfd dfsnjtepsjm\'dgan\n', 6, 83, 97),
(55, 1, '112', '2025-01-07', 2, NULL, NULL, 'CAPSi', 'j,bj,bj,.b.kbk.b.kbk.b', 6, 47, 97),
(56, 1, '112', '2025-01-08', 2, '40.115.0', '7890.0000.0005', 'CAPSi', 'fsbanaenten', 6, 94, 97),
(57, 1, '112', '2025-01-08', 2, '40.115.0', '7890.0000.0005', 'CAPSi', 'dwvten twntwgnbwt ', 6, 94, 96),
(58, 1, '112', '2025-01-08', 2, NULL, NULL, 'Território', 'kkkkkkkkkkkkkkkk', 14, 47, 97),
(59, 1, '112', '2025-01-08', 2, NULL, NULL, 'CAPSi', 'fxh,fzkf', 8, 47, 97);

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `chave` varchar(50) NOT NULL,
  `grupo` int(11) NOT NULL,
  `pagina` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `acessos`
--

INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`, `pagina`) VALUES
(16, 'Home', 'home', 4, 'Sim'),
(18, 'Usuário', 'usuarios', 1, 'Sim'),
(20, 'Pacientes', 'pacientes', 1, 'Sim'),
(22, 'Cargos', 'cargos', 2, 'Sim'),
(24, 'Grupos ', 'grupos', 2, 'Sim'),
(25, 'Acessos', 'acessos', 2, 'Sim'),
(26, 'Grupo Anamnese', 'grupos_ana', 2, 'Sim'),
(27, 'Item Anamnese', 'itens_ana', 2, 'Sim'),
(29, 'Consultas', 'consultas', 5, 'Sim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `anamnese`
--

CREATE TABLE `anamnese` (
  `id` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anamnese`
--

INSERT INTO `anamnese` (`id`, `paciente`, `item`, `descricao`, `grupo`) VALUES
(27, 5, 1, 'sim final de semanab gciy', 7),
(32, 8, 41, NULL, 20),
(35, 4, 45, '34 lunos', 22),
(37, 4, 1, 'nao', 7),
(39, 4, 17, NULL, 9),
(40, 4, 31, NULL, 11),
(41, 4, 24, NULL, 13),
(42, 4, 37, NULL, 19),
(53, 5, 17, NULL, 9),
(54, 5, 31, NULL, 11),
(55, 5, 24, NULL, 13),
(56, 5, 37, NULL, 19),
(57, 5, 47, NULL, 25),
(58, 4, 47, NULL, 25),
(85, 6, 1, 'final de semana', 7),
(108, 9, 37, NULL, 19),
(109, 9, 47, NULL, 25),
(111, 8, 1, 'khvuyfdtudifcvoubouiouy', 7),
(119, 9, 1, 'ivgucjgckj', 7),
(123, 9, 24, NULL, 13),
(124, 9, 27, NULL, 13),
(125, 9, 29, NULL, 13),
(126, 9, 25, NULL, 13),
(127, 9, 48, 'k.hbvkhdiyrdl;bk', 26),
(128, 9, 50, '.nmvkjgc', 26),
(136, 97, 59, 'normal', 29),
(137, 97, 60, 'não', 30),
(138, 97, 62, 'Não', 30),
(139, 97, 64, 'Não', 31),
(140, 97, 66, 'Não', 32),
(142, 67, 53, 'vila Repouso', 28),
(143, 67, 54, 'Dr. Carlos Montenegro', 28),
(144, 67, 55, 'Normal', 28),
(145, 67, 57, 'Separado', 29),
(147, 67, 59, 'Tranquilo', 29),
(148, 67, 60, 'não', 30),
(149, 67, 62, 'Não', 30),
(150, 67, 64, 'Não', 31),
(151, 67, 66, 'Não', 32),
(157, 6, 57, 'Compartilhado', 29),
(158, 6, 59, '', 29),
(159, 6, 58, 'Irmão', 29),
(160, 6, 60, 'Não', 30),
(161, 6, 62, 'Não', 30),
(162, 6, 64, 'Não', 31),
(163, 6, 66, 'Sim', 32),
(164, 6, 67, 'Primo', 32),
(166, 97, 57, 'nmcjg.kh', 29),
(167, 6, 53, NULL, 28),
(168, 97, 53, 'gnxm', 28);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Diretor'),
(3, 'Psicologo(a)'),
(4, 'Psicopedagogo(a)'),
(5, 'Assistente Sossial'),
(6, 'Psiquiatra'),
(7, 'Terapeuta Ocupacional'),
(8, 'Fonoaudiologa'),
(9, 'Recepcionista'),
(16, 'Educador Fisico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `config`
--

CREATE TABLE `config` (
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `logo_rel` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ativo` varchar(5) DEFAULT NULL,
  `marca_dagua` varchar(5) DEFAULT NULL,
  `meta_diaria` int(11) DEFAULT NULL,
  `meta_mensal` int(11) DEFAULT NULL,
  `meta_anual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `config`
--

INSERT INTO `config` (`nome`, `email`, `telefone`, `endereco`, `instagram`, `logo`, `icone`, `logo_rel`, `id`, `ativo`, `marca_dagua`, `meta_diaria`, `meta_mensal`, `meta_anual`) VALUES
('Health Connect', 'bsccanto@gmail.com', '(55) 96214-656', 'Av Sao Joao 1829', '', 'logo.png', 'icone.png', 'logo.jpg', 1, 'Sim', 'Sim', 5, 100, 1000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados_atendimento`
--

CREATE TABLE `dados_atendimento` (
  `id_atendimento` int(11) NOT NULL,
  `data_conclusao` date DEFAULT NULL,
  `conclusao` varchar(20) DEFAULT NULL,
  `continua_atencao_basica` varchar(5) DEFAULT NULL,
  `continua_capsi` varchar(5) DEFAULT NULL,
  `diagnostico_secundario` varchar(50) DEFAULT NULL,
  `cid_secundario` varchar(10) DEFAULT NULL,
  `diagnostico_principal` varchar(50) DEFAULT NULL,
  `cid_principal` varchar(10) DEFAULT NULL,
  `origem_paciente` varchar(20) DEFAULT NULL,
  `tipo_substancia` varchar(20) DEFAULT NULL,
  `usuario_substancia` varchar(5) DEFAULT NULL,
  `fk_paciente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados_atendimento`
--

INSERT INTO `dados_atendimento` (`id_atendimento`, `data_conclusao`, `conclusao`, `continua_atencao_basica`, `continua_capsi`, `diagnostico_secundario`, `cid_secundario`, `diagnostico_principal`, `cid_principal`, `origem_paciente`, `tipo_substancia`, `usuario_substancia`, `fk_paciente_id`) VALUES
(1, NULL, 'Tratamento', 'Não', 'Sim', '', 'f480', 'TDH', 'f48', 'Demanda Espontânea', 'Álcool', 'Não', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `nome_escola` varchar(255) DEFAULT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escola`
--

INSERT INTO `escola` (`id`, `nome_escola`, `Endereco`, `numero`, `bairro`, `cep`) VALUES
(1, 'Lauro Dorneles', '', 0, '', ''),
(2, 'Gaspar Martins', '', 0, '', ''),
(70, 'CASA DA CRIANCA MENINO JESUS', NULL, NULL, NULL, NULL),
(71, 'COL ESTADUAL EMILIO ZUNEDA', 'RUA BARROS CASSAL', 2255, 'VERA CRUZ', '97543-060'),
(72, 'COLEGIO DIVINO CORACAO', 'RUA GENERAL NETO', 63, 'CENTRO', '97541-250'),
(73, 'COLEGIO PROF RAYMUNDO LUIZ MARINHO CARVALHO', 'PRACA PRESIDENTE GETULIO VARGAS', 47, 'CENTRO', '97542-570'),
(74, 'EEI SITIO DO PICA-PAU AMARELO', 'RUA JOSE BONIFACIO', 109, 'CENTRO', '97541-310'),
(75, 'EMEB ALCY VARGAS CHEUICHE', 'RUA PASTOR MANOEL PEREIRA DORNELES', 240, 'CASA', '97545-782'),
(76, 'EMEB ALFREDO SOARES LEAES', 'RINCAO DE SAO MIGUEL', NULL, NULL, '97541-970'),
(77, 'EMEB ANTONIO SAINT PASTOUS DE FREITAS', 'RUA AIRTON SENNA', 112, 'SAINT PASTOUS', '97547-582'),
(78, 'EMEB CONSTANTINO DE SOUZA NUNES', 'JACARAI', NULL, NULL, '97541-970'),
(79, 'EMEB COSTA LEITE', 'JACAQUA', NULL, NULL, '97541-970'),
(80, 'EMEB EURIPEDES BRASIL MILANO', 'RUA BARAO DE CERRO LARGO', 1280, 'CENTRO', '97542-081'),
(81, 'EMEB FERNANDO FERRARI', 'RUA GUABIJU', 81, 'CAPAO DO ANGICO', '97547-230'),
(82, 'EMEB FRANCISCO CARLOS', 'RUA SIMPLICIO JACQUES', 624, 'VILA NOVA', '97541-480'),
(83, 'EMEB FRANCISCO MAFALDO', 'CAVERA', NULL, NULL, '97541-970'),
(84, 'EMEB HOMERO ALVES PEREIRA', NULL, NULL, NULL, NULL),
(85, 'EMEB HONORIO LEMES', 'AVENIDA CAVERA', 900, 'HONORIO LEMES', '97546-140'),
(86, 'EMEB JOAO ANDRE FIGUEIRA', 'DURASNAL', NULL, NULL, '97541-970'),
(87, 'EMEB JOAO CADORE', 'ANGICO', NULL, NULL, '97541-970'),
(88, 'EMEB JOSE ANTONIO VILAVERDE MOURA', 'RUA PEDRO CARNEIRO PEREIRA', 247, 'PIOLA', '97545-590'),
(89, 'EMEB LIONS CLUBE', 'RUA ALBERTO PASQUALINE', 136, 'KENNEDY', '97545-030'),
(90, 'EMEB LUIZA DE FREITAS VALLE ARANHA', 'RUA MINAS GERAIS', 394, 'CASA', '97547-300'),
(91, 'EMEB MARCELO DE FREITAS FARACO', 'RUA ADELIO CONCEICAO AVILA', 41, 'GETULIO VARGAS', '97546-075'),
(92, 'EMEB MURILLO NUNES DE OLIVEIRA', 'CONCEICAO', NULL, NULL, '97541-970'),
(93, 'EMEB PRINCESA ISABEL', 'RUA ARNALDO BALVE', 238, 'VILA IZABEL', '97542-060'),
(94, 'EMEB SILVESTRE GONCALVES', 'RINCAO DO 28', NULL, NULL, '97541-970'),
(95, 'EMEI ALDA DORNELES DE ALMEIDA CRESPO', 'ULISSES DORNELES DE ALMEIDA', 553, 'PASSO NOVO', '97555-000'),
(96, 'EMEI ARNALDO DA COSTA PAZ', 'RUA POLICARPO RODRIGUES', 191, 'GETULIO VARGAS', '97546-369'),
(97, 'EMEI DR EUCLIDES LISBOA', 'RUA ALCEU WAMOSY', 56, 'ASSUNCAO', '97543-010'),
(98, 'EMEI DR ROMARIO ARAUJO DE OLIVEIRA', 'AVENIDA CAVERA', 1934, 'NOVA BRASILIA', '97546-140'),
(99, 'EMEI IBIRAPUITA', 'RUA ELJO RIBEIRO LIMA', 398, 'RUI RAMOS', '97541-180'),
(100, 'EMEI MANOEL ESTIVALLET', 'RUA DALTRO FILHO', 1310, 'BOA VISTA', '97542-170'),
(101, 'EMEI MARIO QUINTANA', 'PRACA OSWALDO ARANHA', 200, 'CENTRO', '97541-540'),
(102, 'EMEI MENINO DEUS', 'PRACA MARCIRIO PAIM BRITES', 39, 'PRADO', '97543-400'),
(103, 'EMEI NOSSA SENHORA DAS GRACAS', 'RUA MARECHAL ARTUR DA COSTA E SILVA', 135, 'PIOLA', '97545-420'),
(104, 'EMEI PALMIRA PALMA DE OLIVEIRA', 'RUA CORONEL LUIZ IGNACIO JACQUES', 319, 'CENTRO', '97541-110'),
(105, 'EMEI SERGIO AUGUSTO BELLO PEREIRA - GUTO PEREIRA', 'RUA GENTIL FRANCISCO CARLESSO', 496, 'CAPAO DO ANGICO', '97547-215'),
(106, 'EMEI TENENTE SALUSTIANO PRATES', 'RUA VASCO ALVES', 682, 'MACEDO', '97542-601'),
(107, 'ESC DE ENS FUND VIDA', 'RUA DEMETRIO RIBEIRO', 127, 'CENTRO', '97542-200'),
(108, 'ESC EDUC INF DO SESC', 'RUA DOS ANDRADAS', 71, 'CENTRO', '97541-001'),
(109, 'ESC EDUC INF GENTE BACANA', 'RUA DOS ANDRADAS', 776, 'CENTRO', '97541-000'),
(110, 'ESC EDUC INF LAPIS DE COR', 'AVENIDA TIARAJU', 3234, 'IBIRAPUITA', '97546-550'),
(111, 'ESC EST ED BAS DR LAURO DORNELLES', 'AVENIDA TIARAJU', 809, 'IBIRAPUITA', '97546-550'),
(112, 'ESC EST ENS FUN BARROS CASSAL', 'BENTO GONCALVES', 281, '2 DISTRITO PASSO N', '97555-000'),
(113, 'ESC EST ENS FUN DR ALEXANDRE LISBOA', NULL, NULL, NULL, NULL),
(114, 'ESC EST ENS FUN DR ARTHUR HORMAIN', 'LOCAL ESTRADA DOS PINHEIROS', NULL, 'RURAL', '97551-899'),
(115, 'ESC EST ENS FUN ECILDA ALVES PAIM', 'R TUPI', 36, 'JARDIM MANCHESTER', '97542-400'),
(116, 'ESC EST ENS FUN EMILIO ZUNEDA', NULL, NULL, NULL, NULL),
(117, 'ESC EST ENS FUN MARCHINI', 'RUA DOUTOR ZEFERINO', 1258, NULL, '97541-160'),
(118, 'ESC EST ENS FUN MANOEL CAVALCANTE', 'RUA GETULIO VARGAS', 407, 'CAICARA', '97542-830'),
(119, 'ESC EST ENS FUN PRIMAVERA', NULL, NULL, NULL, NULL),
(120, 'ESC EST ENS FUN THOMAZ MUDES', NULL, NULL, NULL, NULL),
(121, 'ESC INFANTIL CASA DA CRIANCA', 'RUA DR FALICO', 655, 'CENTRO', '97541-320'),
(122, 'ESC INFANTIL MENINA DOS OLHOS', 'RUA MAURICIO PEREIRA', 614, 'CAICARA', '97542-830'),
(123, 'ESC INFANTIL MENINOS DA VILA', 'AVENIDA MARECHAL ARTUR DA COSTA E SILVA', 507, 'PRADO', '97543-360'),
(124, 'ESC INFANTIL NOSSA SENHORA DA LUZ', 'AVENIDA TRES MARIAS', 307, 'CENTRO', '97541-200'),
(125, 'ESC INFANTIL PRIMAVERA', NULL, NULL, NULL, NULL),
(126, 'ESC INFANTIL SEMENTINHA', 'RUA AREDIO MUNIZ', 1575, 'MACEDO', '97542-780'),
(127, 'ESC INFANTIL TIO MATO', NULL, NULL, NULL, NULL),
(128, 'ESC MUNICIPAL INFANTIL NANA CANTANHEDE', 'AVENIDA CORONEL VITOR ALBUQUERQUE', 115, 'POVOADO', '97547-550'),
(129, 'ESC MUNICIPAL INFANTIL NOSSA SENHORA DO ROSARIO', NULL, NULL, NULL, NULL),
(130, 'ESC MUNICIPAL INFANTIL RIACHO DAS PEDRAS', NULL, NULL, NULL, NULL),
(131, 'ESC MUNICIPAL INFANTIL SORRISO', 'RUA LARGA', 1000, NULL, '97547-170'),
(132, 'ESC MUNICIPAL INFANTIL SORRISO', 'RUA LARGA', 1000, NULL, '97547-170'),
(133, 'ESC MUNICIPAL INFANTIL TIA ELIETE', 'AVENIDA CONSTRUCAM', 99, 'CENTRO', '97541-300'),
(134, 'ESC MUNICIPAL INFANTIL TIA ELIETE', 'AVENIDA CONSTRUCAM', 99, 'CENTRO', '97541-300'),
(135, 'ESC MUNICIPAL INFANTIL ZEZINHO DA TRILHA', 'RUA TRES RIOS', NULL, NULL, '97541-990'),
(136, 'ESC MUNICIPAL INFANTIL ZEZINHO DA TRILHA', 'RUA TRES RIOS', NULL, NULL, '97541-990');

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolaridade`
--

CREATE TABLE `escolaridade` (
  `id` int(11) NOT NULL,
  `escolaridade_pai` varchar(100) DEFAULT NULL,
  `tipo_escola` varchar(100) DEFAULT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `data_escol` date DEFAULT NULL,
  `escolaridade_mae` varchar(100) DEFAULT NULL,
  `fk_escola_id` int(11) DEFAULT NULL,
  `fk_paciente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `escolaridade_pai`, `tipo_escola`, `turno`, `serie`, `data_escol`, `escolaridade_mae`, `fk_escola_id`, `fk_paciente_id`) VALUES
(1, 'Ensino superior', 'particular', 'manhã', '5', '2024-10-06', 'Ensino Médio', 77, 6),
(2, 'Ensino Médio', '', 'tarde', '3', '2024-10-11', 'medio', 73, 5),
(3, 'Ensino Médio', 'pubica', 'tarde', '9', '2024-10-11', 'Ensino Médio', 76, 4),
(4, 'Ensino completp', '', 'tarde', '5', '2024-10-11', 'Ensino Médio', 70, 8),
(5, 'medio', 'pubica', 'manha', '3', '2024-11-27', 'medio', 115, 9),
(6, 'medio', 'pubica', 'manha', '1', '2024-12-28', 'medio', 104, 10),
(7, 'medio', 'pubica', 'manhã', '9', '2025-01-05', 'medio', 116, 67),
(8, 'fundamental', '', '', '', '2025-01-08', 'fundamental', 73, 97);

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupo_acessos`
--

CREATE TABLE `grupo_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `grupo_acessos`
--

INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES
(1, 'Pessoas'),
(2, 'Cadastros'),
(4, 'Home'),
(5, 'Consultas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupo_ana`
--

CREATE TABLE `grupo_ana` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grupo_ana`
--

INSERT INTO `grupo_ana` (`id`, `nome`, `descricao`) VALUES
(28, 'Revisão da saúde', 'Informações de nascimento.'),
(29, 'Hábitos de vida', 'Informações sono/dormitório.'),
(30, 'Historico  de dependencia Quimica', 'Informações medicamentos/substâncias.'),
(31, 'Histórico de Agressões', 'informações sobre agressão familiar.'),
(32, 'Histórico de Saúde Mental', 'Informações sobre saúde mental familiar.'),
(33, 'Grupo Familiar', 'informação familiares compõe a família.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupo_familiar`
--

CREATE TABLE `grupo_familiar` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `parentesco` varchar(100) NOT NULL,
  `situacao_atual` varchar(100) NOT NULL,
  `fk_paciente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grupo_familiar`
--

INSERT INTO `grupo_familiar` (`id`, `nome`, `idade`, `parentesco`, `situacao_atual`, `fk_paciente_id`) VALUES
(1, 'teste', 55, 'teste', 'teste', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_ana`
--

CREATE TABLE `itens_ana` (
  `id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_ana`
--

INSERT INTO `itens_ana` (`id`, `grupo`, `nome`, `descricao`) VALUES
(53, 28, 'Ubs pré-natal', ''),
(54, 28, 'Pediatra/Clinico', 'nome pediatra e/ou clinico'),
(55, 28, 'Parto (Normal ou cesário?', 'Se normal ou cesária'),
(56, 28, 'Quantas Semanas', 'Quantas semanas'),
(57, 29, 'Quarto', 'Quarto individual ou compartilhado'),
(58, 29, 'Se compartilhado com quem ', 'Com quem compartilha o quarto?'),
(59, 29, 'Sono e Repouso', 'Normal / Agitado / Insônia'),
(60, 30, 'Uso de medicamento durante a gestação', 'Sim ou não?'),
(61, 30, 'Qual medicamento?', 'Nome dos medicamentos usado na gestação?'),
(62, 30, 'Uso de sibstancio durante a gestacão (Sim  ou Não)', 'Se usou alguma substância durante a gestação?'),
(63, 30, 'Qual subctância? (Álcool / fumo / drogas)', 'Qual subctância usou?'),
(64, 31, 'Histórico de Agressões (Sim ou Não)', 'Se há registro de agressão na familia?'),
(65, 31, 'Tipo de agressão (verbal ou Física)', 'Se a agressão foi verbal ou física?'),
(66, 32, 'Histórico de saude mental (Sim ou Não)', 'Se há histórico de saúde mental na familia?'),
(67, 32, 'Grau de parentesco?', 'Qual o grau de parentesco do caso de saúde mental?'),
(68, 33, '1.Grupo Familiar (Nome/ Idade / Parentesco / Situação Ocupacional)', 'Composição do  grupo familiar'),
(69, 33, '2.Grupo Familiar (Nome/ Idade / Parentesco / Situação Ocupacional)', 'Composição do grupo familiar'),
(70, 33, '3.Grupo Familiar (Nome/ Idade / Parentesco / Situação Ocupacional)', 'Composição do grupo familiar'),
(71, 33, '4.Grupo Familiar (Nome/ Idade / Parentesco / Situação Ocupacional)', 'Composição do grupo familiar'),
(72, 33, '5.Grupo Familiar (Nome/ Idade / Parentesco / Situação Ocupacional)', 'Composição do grupo familiar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ativo` varchar(5) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `cns` varchar(20) DEFAULT NULL,
  `nome_responsavel` varchar(255) DEFAULT NULL,
  `nome_pai` varchar(255) DEFAULT NULL,
  `ocupacao_pai` varchar(100) DEFAULT NULL,
  `nome_mae` varchar(255) DEFAULT NULL,
  `ocupacao_mae` varchar(100) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `nacionalidade` varchar(50) DEFAULT NULL,
  `queixa` varchar(255) DEFAULT NULL,
  `data_cad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `cpf`, `telefone`, `email`, `ativo`, `estado`, `cidade`, `bairro`, `endereco`, `cep`, `numero`, `data_nasc`, `sexo`, `cns`, `nome_responsavel`, `nome_pai`, `ocupacao_pai`, `nome_mae`, `ocupacao_mae`, `celular`, `raca`, `nacionalidade`, `queixa`, `data_cad`) VALUES
(4, 'Carlos Alberto', '111.111.111-11', '(11) 11111-1111', 'carlos@gmail.com', 'Sim', 'RS', 'Alegrete', 'Centro', 'Rua ABC', '11111-111', 11, '1990-01-01', 'M', '1111-1111-1111-1111', 'Maria Silva', 'Marcos Rodrigues', 'Vendedor', 'Maria Silva', 'Dona de casa', '(11) 11111-1111', 'Branca', 'Brasileiro', 'primeiro paciente', '2024-10-03'),
(5, 'Matheus Canto', '222.222.222-22', '(22) 22222-2222', 'matheus@gmail.com', '0', 'RS', 'alegrete', 'centro', 'Rua dr Lauro', '22222-222', 222, '1983-12-12', 'Masculino', '2222-2222-2222-2222', 'Marcela da Costa e Silva', 'Douglas marques e Silva', 'Caminhoneiro', 'Marcela da Costa e Silva', 'Recepcionista', '(22) 22222-2222', 'Parda', 'brasileira', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', '2024-10-03'),
(6, 'Bruno  Oliveira M', '444.444.444-44', '(33) 33333-3333', 'bruno@gmail.com', '0', 'RS', 'manoel', 'alto', 'ali', '33333-333', 232, '1978-04-13', 'M', '444444444444', 'Maria Aperecida', 'Delio alves', 'pedreiro', 'Maria Aparecida', 'faxineirassdgsdgdsg', '(33) 33333-3233', 'Branca', 'Brasileiro', 'falta escola ', '2024-10-11'),
(8, 'Carlos  Dorneles', '434.255.342-99', '(99) 99343-9992', 'carlos2@gmail.com', 'Sim', 'RS', 'alegrete', 'promorar', 'aloisio alves', '33332-232', 333, '1988-06-07', 'M', '99393243764324567', 'maria db', 'Enry Dorneles', 'Vendedor', 'Maria db', 'artesa', '(99) 29848-8839', 'Branca', 'Brasileiro', 'efojmvfsjnvlfnvslfjnvsljvnljnowfnvsljnva;kdmv sldkvmdvnwodvjn.  sldkvmpdkvnpwdvnpsdmvvm', '2024-10-18'),
(9, 'Jose Marcos ', '123.123.123-12', '(55) 99999-9111', 'jose@gmail.com', 'Sim', 'rs', 'Alegrete', 'grande', 'rua nao sei', '12341-231', 123, '2005-03-12', 'M', '1234123412121234', 'Maria de Lurdes', 'Antonio da silva', 'pintor', 'Maria de Lurdes', 'dona de casa ', '(55) 99999-9111', 'Branca', 'Brasileiro', 'temperamento alterado', '2024-11-16'),
(10, 'jose alves f', '424.242.424-24', '(55) 55555-555', 'bsccanto@gmail.com', 'Sim', 'RS', 'Alegrete', 'Vila Nova', 'Simplicio Jaques', '97541-480', 441, '0000-00-00', 'M', '3434.3343.3434.434', 'maria', 'v', 'v', 'maria', 'v', '(55) 55555-5555', 'Branca', 'Brasileiro', '5gdbfbgbdbg gs sf,v gk', '2024-12-28'),
(11, 'João Silva', '111.111.111-01', '(31) 99999-0001', 'joao.silva@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua A, 101', '30000-000', 101, '1980-01-01', 'M', '123456789012345', 'Maria Silva', 'José Silva', 'Pedreiro', 'Ana Silva', 'Professora', '(31) 98888-0001', 'Parda', 'Brasileira', 'Dor de cabeça', '2024-12-28'),
(12, 'Maria Oliveira', '111.111.111-02', '(31) 99999-0002', 'maria.oliveira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua B, 102', '30000-001', 102, '1985-05-15', 'F', '123456789012346', 'Antônio Oliveira', 'Paulo Oliveira', 'Eletricista', 'Carla Oliveira', 'Enfermeira', '(31) 98888-0002', 'Branca', 'Brasileira', 'Febre e tosse', '2024-12-28'),
(13, 'Carlos Santos', '111.111.111-03', '(31) 99999-0003', 'carlos.santos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua C, 103', '30000-002', 103, '1990-03-20', 'M', '123456789012347', 'Juliana Santos', 'Pedro Santos', 'Motorista', 'Clara Santos', 'Advogada', '(31) 98888-0003', 'Negra', 'Brasileira', 'Dor no peito', '2024-12-28'),
(14, 'Ana Costa', '111.111.111-04', '(31) 99999-0004', 'ana.costa@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua D, 104', '30000-003', 104, '1995-10-10', 'F', '123456789012348', 'Fernando Costa', 'Lucas Costa', 'Mecânico', 'Carolina Costa', 'Psicóloga', '(31) 98888-0004', 'Parda', 'Brasileira', 'Falta de ar', '2024-12-28'),
(15, 'Pedro Lima', '111.111.111-05', '(31) 99999-0005', 'pedro.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Serra', 'Rua E, 105', '30000-004', 105, '2000-08-08', 'M', '123456789012349', 'Patrícia Lima', 'Carlos Lima', 'Bancário', 'Fernanda Lima', 'Administradora', '(31) 98888-0005', 'Indígena', 'Brasileira', 'Dor nas costas', '2024-12-28'),
(16, 'Beatriz Almeida', '111.111.111-06', '(31) 99999-0006', 'beatriz.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Lourdes', 'Rua F, 106', '30000-005', 106, '1982-11-25', 'F', '123456789012350', 'Leonardo Almeida', 'Rodrigo Almeida', 'Padeiro', 'Marcela Almeida', 'Arquiteta', '(31) 98888-0006', 'Branca', 'Brasileira', 'Dor abdominal', '2024-12-28'),
(17, 'Renato Castro', '111.111.111-07', '(31) 99999-0007', 'renato.castro@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua G, 107', '30000-006', 107, '1987-06-14', 'M', '123456789012351', 'Márcia Castro', 'Eduardo Castro', 'Agricultor', 'Elaine Castro', 'Veterinária', '(31) 98888-0007', 'Negra', 'Brasileira', 'Gripe e dor muscular', '2024-12-28'),
(18, 'Gabriela Rocha', '111.111.111-08', '(31) 99999-0008', 'gabriela.rocha@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua H, 108', '30000-007', 108, '1992-04-30', 'F', '123456789012352', 'Ricardo Rocha', 'Marcos Rocha', 'Marceneiro', 'Luciana Rocha', 'Nutricionista', '(31) 98888-0008', 'Parda', 'Brasileira', 'Fadiga', '2024-12-28'),
(19, 'Lucas Melo', '111.111.111-09', '(31) 99999-0009', 'lucas.melo@example.com', 'sim', 'MG', 'Belo Horizonte', 'Horto', 'Rua I, 109', '30000-008', 109, '1999-09-09', 'M', '123456789012353', 'Tatiane Melo', 'Fábio Melo', 'Engenheiro', 'Patrícia Melo', 'Dentista', '(31) 98888-0009', 'Branca', 'Brasileira', 'Ansiedade', '2024-12-28'),
(20, 'Mariana Souza', '111.111.111-10', '(31) 99999-0010', 'mariana.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Belvedere', 'Rua J, 110', '30000-009', 110, '2001-01-15', 'F', '123456789012354', 'Paulo Souza', 'João Souza', 'Professor', 'Regina Souza', 'Cozinheira', '(31) 98888-0010', 'Negra', 'Brasileira', 'Insônia', '2024-12-28'),
(21, 'Fernando Ribeiro', '222.222.222-01', '(31) 99999-0011', 'fernando.ribeiro@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua L, 111', '30010-001', 111, '1980-12-15', 'M', '123456789012355', 'Juliana Ribeiro', 'Claudio Ribeiro', 'Pescador', 'Amanda Ribeiro', 'Enfermeira', '(31) 98888-0011', 'Parda', 'Brasileira', 'Dor no ombro', '2024-12-28'),
(22, 'Renata Carvalho', '222.222.222-02', '(31) 99999-0012', 'renata.carvalho@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua M, 112', '30010-002', 112, '1987-07-25', 'F', '123456789012356', 'Luciana Carvalho', 'José Carvalho', 'Garçom', 'Patrícia Carvalho', 'Veterinária', '(31) 98888-0012', 'Branca', 'Brasileira', 'Febre', '2024-12-28'),
(23, 'Luiz Almeida', '222.222.222-03', '(31) 99999-0013', 'luiz.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua N, 113', '30010-003', 113, '1992-03-03', 'M', '123456789012357', 'Angela Almeida', 'Roberto Almeida', 'Professor', 'Sandra Almeida', 'Médica', '(31) 98888-0013', 'Indígena', 'Brasileira', 'Dor de cabeça', '2024-12-28'),
(24, 'Carla Souza', '222.222.222-04', '(31) 99999-0014', 'carla.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua O, 114', '30010-004', 114, '1995-01-20', 'F', '123456789012358', 'Fernanda Souza', 'Eduardo Souza', 'Mecânico', 'Claudia Souza', 'Arquiteta', '(31) 98888-0014', 'Negra', 'Brasileira', 'Garganta inflamada', '2024-12-28'),
(25, 'Felipe Ferreira', '222.222.222-05', '(31) 99999-0015', 'felipe.ferreira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua P, 115', '30010-005', 115, '2000-06-10', 'M', '123456789012359', 'Mariana Ferreira', 'Carlos Ferreira', 'Advogado', 'Aline Ferreira', 'Psicóloga', '(31) 98888-0015', 'Branca', 'Brasileira', 'Dor nas costas', '2024-12-28'),
(26, 'Viviane Lopes', '222.222.222-06', '(31) 99999-0016', 'viviane.lopes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Belvedere', 'Rua Q, 116', '30010-006', 116, '1998-09-30', 'F', '123456789012360', 'Lucia Lopes', 'Marcelo Lopes', 'Engenheiro', 'Patricia Lopes', 'Cozinheira', '(31) 98888-0016', 'Parda', 'Brasileira', 'Ansiedade', '2024-12-28'),
(27, 'Ricardo Campos', '222.222.222-07', '(31) 99999-0017', 'ricardo.campos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Lourdes', 'Rua R, 117', '30010-007', 117, '1982-04-01', 'M', '123456789012361', 'Julia Campos', 'Fernando Campos', 'Agricultor', 'Marcia Campos', 'Veterinária', '(31) 98888-0017', 'Indígena', 'Brasileira', 'Dor abdominal', '2024-12-28'),
(28, 'Patrícia Santos', '222.222.222-08', '(31) 99999-0018', 'patricia.santos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua S, 118', '30010-008', 118, '1993-08-20', 'F', '123456789012362', 'Rodrigo Santos', 'Claudio Santos', 'Padeiro', 'Ana Santos', 'Advogada', '(31) 98888-0018', 'Negra', 'Brasileira', 'Febre alta', '2024-12-28'),
(29, 'Juliano Andrade', '222.222.222-09', '(31) 99999-0019', 'juliano.andrade@example.com', 'sim', 'MG', 'Belo Horizonte', 'Horto', 'Rua T, 119', '30010-009', 119, '2000-11-05', 'M', '123456789012363', 'Tatiana Andrade', 'Fábio Andrade', 'Motorista', 'Patrícia Andrade', 'Nutricionista', '(31) 98888-0019', 'Branca', 'Brasileira', 'Fadiga', '2024-12-28'),
(30, 'Luciana Costa', '222.222.222-10', '(31) 99999-0020', 'luciana.costa@example.com', 'sim', 'MG', 'Belo Horizonte', 'Serra', 'Rua U, 120', '30010-010', 120, '1997-03-15', 'F', '123456789012364', 'Paulo Costa', 'Carlos Costa', 'Professor', 'Mariana Costa', 'Dentista', '(31) 98888-0020', 'Parda', 'Brasileira', 'Dor de cabeça', '2024-12-28'),
(31, 'Marcos Pereira', '333.333.333-01', '(31) 99999-0021', 'marcos.pereira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua V, 121', '30010-011', 121, '1985-07-01', 'M', '123456789012365', 'Amanda Pereira', 'João Pereira', 'Marceneiro', 'Carla Pereira', 'Veterinária', '(31) 98888-0021', 'Negra', 'Brasileira', 'Dor nas articulações', '2024-12-28'),
(32, 'Larissa Gomes', '333.333.333-02', '(31) 99999-0022', 'larissa.gomes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua W, 122', '30010-012', 122, '1990-12-25', 'F', '123456789012366', 'Ricardo Gomes', 'Fábio Gomes', 'Advogado', 'Maria Gomes', 'Psicóloga', '(31) 98888-0022', 'Parda', 'Brasileira', 'Dor muscular', '2024-12-28'),
(33, 'Gabriel Lima', '333.333.333-03', '(31) 99999-0023', 'gabriel.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua X, 123', '30010-013', 123, '2001-02-14', 'M', '123456789012367', 'Juliana Lima', 'Eduardo Lima', 'Mecânico', 'Renata Lima', 'Advogada', '(31) 98888-0023', 'Indígena', 'Brasileira', 'Dor de cabeça', '2024-12-28'),
(34, 'Caroline Vieira', '333.333.333-04', '(31) 99999-0024', 'caroline.vieira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua Y, 124', '30010-014', 124, '1996-05-30', 'F', '123456789012368', 'André Vieira', 'Marcos Vieira', 'Professor', 'Ana Vieira', 'Arquiteta', '(31) 98888-0024', 'Branca', 'Brasileira', 'Falta de ar', '2024-12-28'),
(35, 'Fábio Cardoso', '333.333.333-05', '(31) 99999-0025', 'fabio.cardoso@example.com', 'sim', 'MG', 'Belo Horizonte', 'Belvedere', 'Rua Z, 125', '30010-015', 125, '1993-07-09', 'M', '123456789012369', 'Mariana Cardoso', 'Fernando Cardoso', 'Pedreiro', 'Patrícia Cardoso', 'Cozinheira', '(31) 98888-0025', 'Negra', 'Brasileira', 'Dor no joelho', '2024-12-28'),
(36, 'Alice Martins', '444.444.444-01', '(31) 99999-0026', 'alice.martins@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua A1, 126', '30020-001', 126, '1990-11-25', 'F', '123456789012370', 'Renato Martins', 'José Martins', 'Bancário', 'Ana Martins', 'Psicóloga', '(31) 98888-0026', 'Parda', 'Brasileira', 'Dor no abdômen', '2024-12-28'),
(37, 'Thiago Ferreira', '444.444.444-02', '(31) 99999-0027', 'thiago.ferreira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Tereza', 'Rua A2, 127', '30020-002', 127, '1985-05-12', 'M', '123456789012371', 'Julia Ferreira', 'Roberto Ferreira', 'Eletricista', 'Cláudia Ferreira', 'Enfermeira', '(31) 98888-0027', 'Branca', 'Brasileira', 'Dor no braço', '2024-12-28'),
(38, 'Fernanda Rocha', '444.444.444-03', '(31) 99999-0028', 'fernanda.rocha@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua A3, 128', '30020-003', 128, '1998-08-20', 'F', '123456789012372', 'Leonardo Rocha', 'Eduardo Rocha', 'Motorista', 'Maria Rocha', 'Cozinheira', '(31) 98888-0028', 'Negra', 'Brasileira', 'Tontura', '2024-12-28'),
(39, 'Marcelo Mendes', '444.444.444-04', '(31) 99999-0029', 'marcelo.mendes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua A4, 129', '30020-004', 129, '2000-12-15', 'M', '123456789012373', 'Patrícia Mendes', 'Carlos Mendes', 'Arquiteto', 'Fernanda Mendes', 'Professora', '(31) 98888-0029', 'Branca', 'Brasileira', 'Febre', '2024-12-28'),
(40, 'Juliana Alves', '444.444.444-05', '(31) 99999-0030', 'juliana.alves@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua A5, 130', '30020-005', 130, '1982-06-10', 'F', '123456789012374', 'Fábio Alves', 'João Alves', 'Pedreiro', 'Luciana Alves', 'Nutricionista', '(31) 98888-0030', 'Parda', 'Brasileira', 'Dor no pescoço', '2024-12-28'),
(41, 'Gabriel Costa', '444.444.444-06', '(31) 99999-0031', 'gabriel.costa@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua B1, 131', '30020-006', 131, '1991-07-14', 'M', '123456789012375', 'Renata Costa', 'Carlos Costa', 'Engenheiro', 'Márcia Costa', 'Psicóloga', '(31) 98888-0031', 'Indígena', 'Brasileira', 'Dor de cabeça', '2024-12-28'),
(42, 'Ana Paula Santos', '444.444.444-07', '(31) 99999-0032', 'ana.santos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Lourdes', 'Rua B2, 132', '30020-007', 132, '1989-03-22', 'F', '123456789012376', 'Marcos Santos', 'Cláudio Santos', 'Veterinário', 'Eliane Santos', 'Administradora', '(31) 98888-0032', 'Negra', 'Brasileira', 'Dor nas articulações', '2024-12-28'),
(43, 'Lucas Silva', '444.444.444-08', '(31) 99999-0033', 'lucas.silva@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua B3, 133', '30020-008', 133, '1993-02-28', 'M', '123456789012377', 'Juliana Silva', 'Ricardo Silva', 'Professor', 'Carla Silva', 'Advogada', '(31) 98888-0033', 'Branca', 'Brasileira', 'Falta de ar', '2024-12-28'),
(44, 'Roberta Andrade', '444.444.444-09', '(31) 99999-0034', 'roberta.andrade@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua B4, 134', '30020-009', 134, '2001-05-01', 'F', '123456789012378', 'Paulo Andrade', 'Fernando Andrade', 'Agricultor', 'Sabrina Andrade', 'Professora', '(31) 98888-0034', 'Parda', 'Brasileira', 'Dor nas costas', '2024-12-28'),
(45, 'Carlos Souza', '444.444.444-10', '(31) 99999-0035', 'carlos.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua B5, 135', '30020-010', 135, '1988-10-25', 'M', '123456789012379', 'Fernanda Souza', 'Eduardo Souza', 'Mecânico', 'Carla Souza', 'Dentista', '(31) 98888-0035', 'Indígena', 'Brasileira', 'Ansiedade', '2024-12-28'),
(46, 'Patrícia Lima', '555.555.555-01', '(31) 99999-0036', 'patricia.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua C1, 136', '30030-001', 136, '1987-09-14', 'F', '123456789012380', 'Mariana Lima', 'Roberto Lima', 'Marceneiro', 'Cláudia Lima', 'Veterinária', '(31) 98888-0036', 'Parda', 'Brasileira', 'Dor no peito', '2024-12-28'),
(47, 'Renato Souza', '555.555.555-02', '(31) 99999-0037', 'renato.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Serra', 'Rua C2, 137', '30030-002', 137, '1985-04-12', 'M', '123456789012381', 'Cláudio Souza', 'José Souza', 'Engenheiro', 'Aline Souza', 'Enfermeira', '(31) 98888-0037', 'Negra', 'Brasileira', 'Garganta inflamada', '2024-12-28'),
(48, 'Fernanda Cardoso', '555.555.555-03', '(31) 99999-0038', 'fernanda.cardoso@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua C3, 138', '30030-003', 138, '1995-03-20', 'F', '123456789012382', 'Leonardo Cardoso', 'Fábio Cardoso', 'Advogado', 'Maria Cardoso', 'Nutricionista', '(31) 98888-0038', 'Branca', 'Brasileira', 'Fadiga', '2024-12-28'),
(49, 'Mariana Almeida', '555.555.555-04', '(31) 99999-0039', 'mariana.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua C4, 139', '30030-004', 139, '2000-07-30', 'F', '123456789012383', 'Juliana Almeida', 'Pedro Almeida', 'Veterinário', 'Carla Almeida', 'Psicóloga', '(31) 98888-0039', 'Negra', 'Brasileira', 'Febre alta', '2024-12-28'),
(50, 'Fábio Gomes', '555.555.555-05', '(31) 99999-0040', 'fabio.gomes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Lourdes', 'Rua C5, 140', '30030-005', 140, '1991-01-22', 'M', '123456789012384', 'Ricardo Gomes', 'Carlos Gomes', 'Médico', 'Ana Gomes', 'Professora', '(31) 98888-0040', 'Indígena', 'Brasileira', 'Insônia', '2024-12-28'),
(51, 'Paulo Fernandes', '666.666.666-01', '(31) 99999-0041', 'paulo.fernandes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua D1, 141', '30040-001', 141, '1984-10-10', 'M', '123456789012385', 'Juliana Fernandes', 'Carlos Fernandes', 'Eletricista', 'Ana Fernandes', 'Médica', '(31) 98888-0041', 'Branca', 'Brasileira', 'Dor no joelho', '2024-12-28'),
(52, 'Luciana Ribeiro', '666.666.666-02', '(31) 99999-0042', 'luciana.ribeiro@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua D2, 142', '30040-002', 142, '1989-03-20', 'F', '123456789012386', 'Fernanda Ribeiro', 'Cláudio Ribeiro', 'Mecânico', 'Patrícia Ribeiro', 'Psicóloga', '(31) 98888-0042', 'Parda', 'Brasileira', 'Dor abdominal', '2024-12-28'),
(53, 'Thiago Oliveira', '666.666.666-03', '(31) 99999-0043', 'thiago.oliveira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua D3, 143', '30040-003', 143, '1993-07-12', 'M', '123456789012387', 'Carla Oliveira', 'Pedro Oliveira', 'Engenheiro', 'Renata Oliveira', 'Advogada', '(31) 98888-0043', 'Negra', 'Brasileira', 'Ansiedade', '2024-12-28'),
(54, 'Juliana Mendes', '666.666.666-04', '(31) 99999-0044', 'juliana.mendes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua D4, 144', '30040-004', 144, '1998-04-18', 'F', '123456789012388', 'Fernanda Mendes', 'José Mendes', 'Veterinário', 'Márcia Mendes', 'Professora', '(31) 98888-0044', 'Branca', 'Brasileira', 'Febre', '2024-12-28'),
(55, 'Rafael Santos', '666.666.666-05', '(31) 99999-0045', 'rafael.santos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua D5, 145', '30040-005', 145, '1987-05-25', 'M', '123456789012389', 'Patrícia Santos', 'Leonardo Santos', 'Professor', 'Ana Santos', 'Nutricionista', '(31) 98888-0045', 'Parda', 'Brasileira', 'Dor nas costas', '2024-12-28'),
(56, 'Gabriela Rocha', '666.666.666-06', '(31) 99999-0046', 'gabriela.rocha@example.com', 'sim', 'MG', 'Belo Horizonte', 'Belvedere', 'Rua E1, 146', '30040-006', 146, '1985-02-22', 'F', '123456789012390', 'Roberto Rocha', 'Ricardo Rocha', 'Médico', 'Carla Rocha', 'Enfermeira', '(31) 98888-0046', 'Negra', 'Brasileira', 'Dor muscular', '2024-12-28'),
(57, 'Fernando Costa', '666.666.666-07', '(31) 99999-0047', 'fernando.costa@example.com', 'sim', 'MG', 'Belo Horizonte', 'Lourdes', 'Rua E2, 147', '30040-007', 147, '1990-06-15', 'M', '123456789012391', 'Juliana Costa', 'João Costa', 'Agricultor', 'Mariana Costa', 'Veterinária', '(31) 98888-0047', 'Indígena', 'Brasileira', 'Fadiga', '2024-12-28'),
(58, 'Renata Cardoso', '666.666.666-08', '(31) 99999-0048', 'renata.cardoso@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua E3, 148', '30040-008', 148, '1992-08-08', 'F', '123456789012392', 'Carlos Cardoso', 'Fábio Cardoso', 'Padeiro', 'Fernanda Cardoso', 'Arquiteta', '(31) 98888-0048', 'Parda', 'Brasileira', 'Gripe', '2024-12-28'),
(59, 'Marcelo Andrade', '666.666.666-09', '(31) 99999-0049', 'marcelo.andrade@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua E4, 149', '30040-009', 149, '1994-03-25', 'M', '123456789012393', 'Roberta Andrade', 'Eduardo Andrade', 'Eletricista', 'Patrícia Andrade', 'Psicóloga', '(31) 98888-0049', 'Branca', 'Brasileira', 'Dor de cabeça', '2024-12-28'),
(60, 'Alice Almeida', '666.666.666-10', '(31) 99999-0050', 'alice.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Horto', 'Rua E5, 150', '30040-010', 150, '1996-09-18', 'F', '123456789012394', 'Fernanda Almeida', 'Marcos Almeida', 'Advogado', 'Carla Almeida', 'Professora', '(31) 98888-0050', 'Negra', 'Brasileira', 'Tontura', '2024-12-28'),
(61, 'João Batista', '777.777.777-01', '(31) 99999-0051', 'joao.batista@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua F1, 151', '30050-001', 151, '1991-02-10', 'M', '123456789012395', 'Patrícia Batista', 'José Batista', 'Motorista', 'Ana Batista', 'Nutricionista', '(31) 98888-0051', 'Branca', 'Brasileira', 'Dor nas pernas', '2024-12-28'),
(62, 'Mariana Lopes', '777.777.777-02', '(31) 99999-0052', 'mariana.lopes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua F2, 152', '30050-002', 152, '1988-08-25', 'F', '123456789012396', 'Juliana Lopes', 'Roberto Lopes', 'Marceneiro', 'Márcia Lopes', 'Arquiteta', '(31) 98888-0052', 'Negra', 'Brasileira', 'Dor abdominal', '2024-12-28'),
(63, 'Pedro Henrique', '777.777.777-03', '(31) 99999-0053', 'pedro.henrique@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua F3, 153', '30050-003', 153, '1997-04-12', 'M', '123456789012397', 'Renata Henrique', 'Carlos Henrique', 'Veterinário', 'Ana Henrique', 'Professora', '(31) 98888-0053', 'Parda', 'Brasileira', 'Febre', '2024-12-28'),
(64, 'Carolina Melo', '777.777.777-04', '(31) 99999-0054', 'carolina.melo@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua F4, 154', '30050-004', 154, '1985-12-03', 'F', '123456789012398', 'Juliana Melo', 'Eduardo Melo', 'Engenheiro', 'Fernanda Melo', 'Psicóloga', '(31) 98888-0054', 'Branca', 'Brasileira', 'Fadiga', '2024-12-28'),
(65, 'Rafael Lima', '777.777.777-05', '(31) 99999-0055', 'rafael.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Horto', 'Rua G1, 155', '30050-005', 155, '1989-09-15', 'M', '123456789012399', 'Mariana Lima', 'Carlos Lima', 'Mecânico', 'Fernanda Lima', 'Enfermeira', '(31) 98888-0055', 'Indígena', 'Brasileira', 'Ansiedade', '2024-12-28'),
(66, 'Clara Silva', '888.888.888-01', '(31) 99999-0056', 'clara.silva@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Tereza', 'Rua G2, 156', '30050-006', 156, '1993-03-03', 'F', '123456789012400', 'Fernanda Silva', 'João Silva', 'Engenheiro', 'Maria Silva', 'Arquiteta', '(31) 98888-0056', 'Branca', 'Brasileira', 'Dor abdominal', '2024-12-28'),
(67, 'Vinícius Alves', '888.888.888-02', '(31) 99999-0057', 'vinicius.alves@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua G3, 157', '30050-007', 157, '1990-06-10', 'M', '123456789012401', 'Carla Alves', 'Ricardo Alves', 'Veterinário', 'Patrícia Alves', 'Psicóloga', '(31) 98888-0057', 'Negra', 'Brasileira', 'Dor muscular', '2024-12-28'),
(68, 'Larissa Costa', '888.888.888-03', '(31) 99999-0058', 'larissa.costa@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua G4, 158', '30050-008', 158, '1987-07-25', 'F', '123456789012402', 'Márcia Costa', 'Eduardo Costa', 'Professor', 'Clara Costa', 'Nutricionista', '(31) 98888-0058', 'Parda', 'Brasileira', 'Fadiga', '2024-12-28'),
(69, 'Fernando Ribeiro', '888.888.888-04', '(31) 99999-0059', 'fernando.ribeiro@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua G5, 159', '30050-009', 159, '1982-05-12', 'M', '123456789012403', 'Patrícia Ribeiro', 'Carlos Ribeiro', 'Mecânico', 'Luciana Ribeiro', 'Administradora', '(31) 98888-0059', 'Indígena', 'Brasileira', 'Febre', '2024-12-28'),
(70, 'Gabriela Mendes', '888.888.888-05', '(31) 99999-0060', 'gabriela.mendes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua G6, 160', '30050-010', 160, '1995-10-01', 'F', '123456789012404', 'Mariana Mendes', 'Fábio Mendes', 'Pedreiro', 'Patrícia Mendes', 'Psicóloga', '(31) 98888-0060', 'Negra', 'Brasileira', 'Dor nas articulações', '2024-12-28'),
(71, 'Ricardo Martins', '999.999.999-01', '(31) 99999-0061', 'ricardo.martins@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua H1, 161', '30060-001', 161, '1992-11-25', 'M', '123456789012405', 'Márcia Martins', 'Eduardo Martins', 'Veterinário', 'Clara Martins', 'Arquiteta', '(31) 98888-0061', 'Parda', 'Brasileira', 'Dor nas costas', '2024-12-28'),
(72, 'Ana Clara Souza', '999.999.999-02', '(31) 99999-0062', 'ana.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua H2, 162', '30060-002', 162, '1985-04-12', 'F', '123456789012406', 'Patrícia Souza', 'Carlos Souza', 'Professor', 'Maria Souza', 'Enfermeira', '(31) 98888-0062', 'Branca', 'Brasileira', 'Dor no peito', '2024-12-28'),
(73, 'João Pedro Almeida', '999.999.999-03', '(31) 99999-0063', 'joao.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua H3, 163', '30060-003', 163, '1990-01-30', 'M', '123456789012407', 'Fernanda Almeida', 'Cláudio Almeida', 'Engenheiro', 'Márcia Almeida', 'Psicóloga', '(31) 98888-0063', 'Negra', 'Brasileira', 'Dor muscular', '2024-12-28'),
(74, 'Cláudia Santos', '999.999.999-04', '(31) 99999-0064', 'claudia.santos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua H4, 164', '30060-004', 164, '1988-02-28', 'F', '123456789012408', 'Patrícia Santos', 'Eduardo Santos', 'Veterinário', 'Clara Santos', 'Arquiteta', '(31) 98888-0064', 'Branca', 'Brasileira', 'Fadiga', '2024-12-28'),
(75, 'Marcos Henrique', '999.999.999-05', '(31) 99999-0065', 'marcos.henrique@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua H5, 165', '30060-005', 165, '1994-06-06', 'M', '123456789012409', 'Fernanda Henrique', 'Ricardo Henrique', 'Professor', 'Márcia Henrique', 'Psicóloga', '(31) 98888-0065', 'Parda', 'Brasileira', 'Dor no abdômen', '2024-12-28'),
(76, 'Luana Lima', '000.000.000-01', '(31) 99999-0066', 'luana.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Tereza', 'Rua I1, 166', '30060-006', 166, '1993-12-20', 'F', '123456789012410', 'Patrícia Lima', 'João Lima', 'Engenheiro', 'Cláudia Lima', 'Administradora', '(31) 98888-0066', 'Negra', 'Brasileira', 'Dor no ombro', '2024-12-28'),
(77, 'Felipe Batista', '000.000.000-02', '(31) 99999-0067', 'felipe.batista@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua I2, 167', '30060-007', 167, '1987-09-30', 'M', '123456789012411', 'Mariana Batista', 'Eduardo Batista', 'Agricultor', 'Fernanda Batista', 'Veterinária', '(31) 98888-0067', 'Indígena', 'Brasileira', 'Febre alta', '2024-12-28'),
(78, 'Carolina Mendes', '000.000.000-03', '(31) 99999-0068', 'carolina.mendes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua I3, 168', '30060-008', 168, '1988-04-22', 'F', '123456789012412', 'Fernanda Mendes', 'Carlos Mendes', 'Veterinário', 'Márcia Mendes', 'Psicóloga', '(31) 98888-0068', 'Branca', 'Brasileira', 'Dor nas articulações', '2024-12-28'),
(79, 'Rafael Martins', '000.000.000-04', '(31) 99999-0069', 'rafael.martins@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua I4, 169', '30060-009', 169, '1990-05-05', 'M', '123456789012413', 'Patrícia Martins', 'Eduardo Martins', 'Professor', 'Fernanda Martins', 'Psicóloga', '(31) 98888-0069', 'Parda', 'Brasileira', 'Ansiedade', '2024-12-28'),
(80, 'Viviane Castro', '000.000.000-05', '(31) 99999-0070', 'viviane.castro@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua I5, 170', '30060-010', 170, '1997-08-18', 'F', '123456789012414', 'Carla Castro', 'Ricardo Castro', 'Eletricista', 'Márcia Castro', 'Advogada', '(31) 98888-0070', 'Branca', 'Brasileira', 'Dor muscular', '2024-12-28'),
(81, 'Lucas Rocha', '111.111.111-06', '(31) 99999-0071', 'lucas.rocha@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua J1, 171', '30070-001', 171, '1991-09-09', 'M', '123456789012415', 'Fernanda Rocha', 'Carlos Rocha', 'Engenheiro', 'Márcia Rocha', 'Professora', '(31) 98888-0071', 'Negra', 'Brasileira', 'Febre', '2024-12-28'),
(82, 'Juliana Andrade', '111.111.111-07', '(31) 99999-0072', 'juliana.andrade@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua J2, 172', '30070-002', 172, '1987-10-15', 'F', '123456789012416', 'Patrícia Andrade', 'Eduardo Andrade', 'Advogado', 'Márcia Andrade', 'Psicóloga', '(31) 98888-0072', 'Parda', 'Brasileira', 'Dor nas articulações', '2024-12-28'),
(83, 'Carlos Silva', '222.333.444-01', '(31) 99999-0073', 'carlos.silva@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua L1, 201', '30100-001', 201, '1991-11-20', 'M', '987654321098123', 'Luciana Silva', 'João Silva', 'Mecânico', 'Maria Silva', 'Professora', '(31) 98888-0073', 'Parda', 'Brasileira', 'Dor no joelho', '2024-12-28'),
(84, 'Ana Souza', '222.333.444-02', '(31) 99999-0074', 'ana.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua L2, 202', '30100-002', 202, '1995-03-15', 'F', '987654321098124', 'Fernanda Souza', 'Carlos Souza', 'Advogado', 'Patrícia Souza', 'Arquiteta', '(31) 98888-0074', 'Negra', 'Brasileira', 'Febre', '2024-12-28'),
(85, 'Felipe Almeida', '222.333.444-03', '(31) 99999-0075', 'felipe.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Tereza', 'Rua L3, 203', '30100-003', 203, '1990-07-10', 'M', '987654321098125', 'Cláudia Almeida', 'João Almeida', 'Marceneiro', 'Juliana Almeida', 'Veterinária', '(31) 98888-0075', 'Indígena', 'Brasileira', 'Dor abdominal', '2024-12-28'),
(86, 'Beatriz Lima', '222.333.444-04', '(31) 99999-0076', 'beatriz.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua L4, 204', '30100-004', 204, '1985-05-25', 'F', '987654321098126', 'Márcia Lima', 'Ricardo Lima', 'Agricultor', 'Carla Lima', 'Psicóloga', '(31) 98888-0076', 'Branca', 'Brasileira', 'Dor nas articulações', '2024-12-28'),
(87, 'Rafael Mendes', '222.333.444-05', '(31) 99999-0077', 'rafael.mendes@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua L5, 205', '30100-005', 205, '1993-09-05', 'M', '987654321098127', 'Fernanda Mendes', 'Fábio Mendes', 'Padeiro', 'Juliana Mendes', 'Nutricionista', '(31) 98888-0077', 'Negra', 'Brasileira', 'Dor nas costas', '2024-12-28'),
(88, 'Juliana Rocha', '222.333.444-06', '(31) 99999-0078', 'juliana.rocha@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua M1, 206', '30110-001', 206, '1997-08-15', 'F', '987654321098128', 'Patrícia Rocha', 'Carlos Rocha', 'Engenheiro', 'Márcia Rocha', 'Administradora', '(31) 98888-0078', 'Branca', 'Brasileira', 'Ansiedade', '2024-12-28'),
(89, 'Lucas Oliveira', '222.333.444-07', '(31) 99999-0079', 'lucas.oliveira@example.com', 'sim', 'MG', 'Belo Horizonte', 'Centro', 'Rua M2, 207', '30110-002', 207, '1988-12-20', 'M', '987654321098129', 'Fernanda Oliveira', 'João Oliveira', 'Veterinário', 'Patrícia Oliveira', 'Professora', '(31) 98888-0079', 'Parda', 'Brasileira', 'Dor no peito', '2024-12-28'),
(90, 'Amanda Santos', '222.333.444-08', '(31) 99999-0080', 'amanda.santos@example.com', 'sim', 'MG', 'Belo Horizonte', 'Santa Efigênia', 'Rua M3, 208', '30110-003', 208, '1994-11-11', 'F', '987654321098130', 'Cláudia Santos', 'Ricardo Santos', 'Marceneiro', 'Fernanda Santos', 'Veterinária', '(31) 98888-0080', 'Indígena', 'Brasileira', 'Dor muscular', '2024-12-28'),
(91, 'Marcos Ribeiro', '222.333.444-09', '(31) 99999-0081', 'marcos.ribeiro@example.com', 'sim', 'MG', 'Belo Horizonte', 'Prado', 'Rua M4, 209', '30110-004', 209, '1986-04-30', 'M', '987654321098131', 'Patrícia Ribeiro', 'Carlos Ribeiro', 'Advogado', 'Márcia Ribeiro', 'Professora', '(31) 98888-0081', 'Negra', 'Brasileira', 'Fadiga', '2024-12-28'),
(92, 'Viviane Lima', '222.333.444-10', '(31) 99999-0082', 'viviane.lima@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua M5, 210', '30110-005', 210, '1992-03-12', 'F', '987654321098132', 'Carla Lima', 'Ricardo Lima', 'Mecânico', 'Cláudia Lima', 'Nutricionista', '(31) 98888-0082', 'Branca', 'Brasileira', 'Dor nas pernas', '2024-12-28'),
(93, 'Fábio Martins', '333.333.555-01', '(31) 99999-0083', 'fabio.martins@example.com', 'sim', 'MG', 'Belo Horizonte', 'Belvedere', 'Rua N1, 211', '30120-001', 211, '1995-02-20', 'M', '987654321098133', 'Fernanda Martins', 'Carlos Martins', 'Professor', 'Márcia Martins', 'Psicóloga', '(31) 98888-0083', 'Parda', 'Brasileira', 'Febre alta', '2024-12-28'),
(94, 'Carolina Almeida Silveira', '333.333.555-02', '(31) 99999-0084', 'carolina.almeida@example.com', 'sim', 'MG', 'Belo Horizonte', 'Lourdes', 'Rua N2, 212', '30120-002', 212, '1991-01-14', 'F', '987654321098134', 'Cláudia Almeida', 'Fábio Almeida', 'Veterinário', 'Fernanda Almeida', 'Psicóloga', '(31) 98888-0084', 'Negra', 'Brasileira', 'Dor de cabeça', '2024-12-14'),
(95, 'Rafael Souza', '333.333.555-03', '(31) 99999-0085', 'rafael.souza@example.com', 'sim', 'MG', 'Belo Horizonte', 'Barro Preto', 'Rua N3, 213', '30120-003', 213, '1987-05-25', 'M', '987654321098135', 'Patrícia Souza', 'Carlos Souza', 'Engenheiro', 'Cláudia Souza', 'Psicóloga', '(31) 98888-0085', 'Branca', 'Brasileira', 'Dor no ombro', '2024-12-28'),
(96, 'Mariana Andrade', '333.333.555-04', '(31) 99999-0086', 'mariana.andrade@example.com', 'sim', 'MG', 'Belo Horizonte', 'Savassi', 'Rua N4, 214', '30120-004', 214, '1996-09-15', 'F', '987654321098136', 'Fernanda Andrade', 'João Andrade', 'Veterinário', 'Márcia Andrade', 'Nutricionista', '(31) 98888-0086', 'Indígena', 'Brasileira', 'Ansiedade', '2024-12-28'),
(97, 'Fernando ', '333.333.555-44', '(31) 99999-0087', 'fernando.cardoso@example.com', 'sim', 'MG', 'Belo Horizonte', 'Funcionários', 'Rua N5, 215', '30120-005', 215, '1988-03-08', 'M', '987654321098137', 'Cláudia Cardoso', 'Carlos Cardoso', 'Arquiteto', 'Fernanda Cardoso', 'Veterinária', '(31) 98888-0087', 'Parda', 'Brasileira', 'Febre', '2024-12-28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `senha_crip` varchar(130) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `token` varchar(150) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cbo` varchar(10) DEFAULT NULL,
  `cnsp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `senha_crip`, `nivel`, `ativo`, `telefone`, `endereco`, `foto`, `data`, `token`, `estado`, `cidade`, `bairro`, `cep`, `numero`, `data_nasc`, `sexo`, `cpf`, `cbo`, `cnsp`) VALUES
(47, 'Health Connect', 'bsccanto@gmail.com', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Administrador', 'Sim', '(55) 96214-656', '', '08-01-2025-17-04-44-download.jpeg', '2024-10-18', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Maria Admin', 'maria.admin@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Administrador', 'Sim', '(31) 99999-0002', 'Rua A, 102', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Centro', '30000-001', 102, '1985-05-15', 'Feminino', '111.111.111-02', '12.345.7', '1234.0000.0002'),
(65, 'José Diretor', 'jose.diretor@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Diretor', 'Sim', '(31) 99999-0011', 'Rua B, 201', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Savassi', '30010-000', 201, '1980-01-01', 'Masculino', '222.222.222-01', '13.456.7', '2345.0000.0001'),
(68, 'Laura Diretora', 'laura.diretora@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Diretor', 'Sim', '(31) 99999-0014', 'Rua B, 204', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Savassi', '30010-003', 204, '1995-10-10', 'Feminino', '222.222.222-04', '13.457.0', '2345.0000.0004'),
(70, 'Fernanda Psicóloga', 'fernanda.psicologa@example.com', '123456', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Psicologo(a)', 'Sim', '(31) 99999-0021', 'Rua C, 301', 'sem-foto.jpg', '2024-12-28', '', 'MG', 'Belo Horizonte', 'Santa Efigênia', '30020-000', 301, '1980-01-01', 'Feminino', '333.333.333-01', '14.567.8', '3456.0000.0001'),
(71, 'Renato Psicólogo', 'renato.psicologo@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Psicologo(a)', 'Sim', '(31) 99999-0022', 'Rua C, 302', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Santa Efigênia', '30020-001', 302, '1985-05-15', 'Masculino', '333.333.333-02', '14.567.9', '3456.0000.0002'),
(72, 'Juliana Psicóloga', 'juliana.psicologa@example.com', '123456', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Psicologo(a)', 'Sim', '(31) 99999-0023', 'Rua C, 303', 'sem-foto.jpg', '2024-12-28', '', 'MG', 'Belo Horizonte', 'Santa Efigênia', '30020-002', 303, '1990-03-20', 'Feminino', '333.333.333-03', '14.568.0', '3456.0000.0003'),
(74, 'Gabriela Psicóloga', 'gabriela.psicologa@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Psicologo(a)', 'Sim', '(31) 99999-0025', 'Rua C, 305', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Santa Efigênia', '30020-004', 305, '2000-08-08', 'Feminino', '333.333.333-05', '14.568.2', '3456.0000.0005'),
(75, 'Flávia Psicopedagoga', 'flavia.psicopedagoga@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Psicopedagogo(a)', 'Sim', '(31) 99999-0031', 'Rua D, 401', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30030-000', 401, '1980-01-01', 'Feminino', '444.444.444-01', '15.678.9', '4567.0000.0001'),
(78, 'Bianca Psicopedagoga', 'bianca.psicopedagoga@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Psicopedagogo(a)', 'Sim', '(31) 99999-0034', 'Rua D, 404', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30030-003', 404, '1995-10-10', 'Feminino', '444.444.444-04', '15.678.2', '4567.0000.0004'),
(80, 'Carla Assistente', 'carla.assistente@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Assistente Sossial', 'Sim', '(31) 99999-0041', 'Rua E, 501', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Santa Tereza', '30040-000', 501, '1980-01-01', 'Feminino', '555.555.555-01', '20.111.6', '5678.0000.0001'),
(83, 'Roberta Assistente', 'roberta.assistente@example.com', '123456', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Assistente Sossial', 'Sim', '(31) 99999-0044', 'Rua E, 504', 'sem-foto.jpg', '2024-12-28', '', 'MG', 'Belo Horizonte', 'Santa Tereza', '30040-003', 504, '1995-10-10', 'Feminino', '555.555.555-04', '20.114.9', '5678.0000.0004'),
(85, 'Carlos Psiquiatra', 'carlos.psiquiatra@example.com', '123456', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Psiquiatra', 'Sim', '(31) 99999-0051', 'Rua F, 601', 'sem-foto.jpg', '2024-12-28', '', 'MG', 'Belo Horizonte', 'Lourdes', '30050-000', 601, '1980-01-01', 'Masculino', '666.666.666-01', '30.111.6', '6789.0000.0001'),
(86, 'Luiza Psiquiatra', 'luiza.psiquiatra@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Psiquiatra', 'Sim', '(31) 99999-0052', 'Rua F, 602', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Lourdes', '30050-001', 602, '1985-05-15', 'Feminino', '666.666.666-02', '30.112.7', '6789.0000.0002'),
(94, 'Sabrina Terapeuta', 'sabrina.terapeuta@example.com', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Terapeuta Ocupacional', 'Sim', '(31) 99999-0000', 'Rua G, 705', '29-12-2024-19-20-46-doutor.png', '2024-12-28', '', 'MG', 'Belo Horizonte', 'Prado', '30060-004', 705, '2000-08-08', 'Feminino', '777.777.777-05', '40.115.0', '7890.0000.0005'),
(95, 'Beatriz Fono', 'beatriz.fono@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Fonoaudiologa', 'Sim', '(31) 99999-0071', 'Rua H, 801', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Barro Preto', '30070-000', 801, '1980-01-01', 'feminino', '888.888.888-01', '50.111.6', '8901.0000.0001'),
(100, 'Amanda Recepcionista', 'amanda.recep@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Recepcionista', '', '(31) 99999-0081', 'Rua I, 901', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30080-000', 901, '1980-01-01', 'Feminino', '999.999.999-01', '60.111.6', '9012.0000.0001'),
(101, 'Renan Recepcionista', 'renan.recep@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Recepcionista', 'Sim', '(31) 99999-0082', 'Rua I, 902', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30080-001', 902, '1985-05-15', 'Masculino', '999.999.999-02', '60.112.7', '9012.0000.0002'),
(102, 'Bianca Recepcionista', 'bianca.recep@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Recepcionista', 'Sim', '(31) 99999-0083', 'Rua I, 903', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30080-002', 903, '1990-03-20', 'Feminino', '999.999.999-03', '60.113.8', '9012.0000.0003'),
(103, 'Guilherme Recepcionista', 'guilherme.recep@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Recepcionista', 'Sim', '(31) 99999-0084', 'Rua I, 904', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30080-003', 904, '1995-10-10', 'Masculino', '999.999.999-04', '60.114.9', '9012.0000.0004'),
(104, 'Mariana Recepcionista', 'mariana.recep@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Recepcionista', 'Sim', '(31) 99999-0085', 'Rua I, 905', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Funcionários', '30080-004', 905, '2000-08-08', 'Feminino', '999.999.999-05', '60.115.0', '9012.0000.0005'),
(105, 'Gabriel Educador', 'gabriel.edu@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Educador Fisico', 'Sim', '(31) 99999-0091', 'Rua J, 1001', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Serra', '30090-000', 1001, '1980-01-01', 'Masculino', '101.101.101-01', '70.111.6', '0123.0000.0001'),
(106, 'Larissa Educadora', 'larissa.edu@example.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Educador Fisico', 'Sim', '(31) 99999-0092', 'Rua J, 1002', 'sem-foto.jpg', '2024-12-28', NULL, 'MG', 'Belo Horizonte', 'Serra', '30090-001', 1002, '1985-05-15', 'Feminino', '101.101.101-02', '70.112.7', '0123.0000.0002');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_permissoes`
--

CREATE TABLE `usuarios_permissoes` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios_permissoes`
--

INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES
(150, 29, 12),
(151, 29, 14),
(152, 29, 9),
(153, 29, 10),
(154, 29, 1),
(155, 41, 1),
(156, 41, 9),
(157, 41, 12),
(158, 41, 14),
(159, 41, 10),
(160, 45, 1),
(161, 45, 9),
(167, 48, 1),
(168, 48, 9),
(169, 48, 10),
(170, 53, 1),
(171, 53, 9),
(172, 53, 10),
(174, 54, 1),
(175, 54, 9),
(176, 54, 10),
(217, 65, 16),
(218, 65, 18),
(219, 65, 20),
(220, 65, 22),
(221, 65, 24),
(222, 65, 25),
(223, 65, 26),
(224, 65, 27),
(225, 65, 29),
(226, 66, 16),
(227, 66, 18),
(228, 66, 20),
(229, 66, 22),
(230, 66, 24),
(231, 66, 25),
(232, 66, 26),
(233, 66, 27),
(234, 66, 29),
(235, 68, 16),
(236, 68, 18),
(237, 68, 20),
(238, 68, 22),
(239, 68, 24),
(240, 68, 25),
(241, 68, 26),
(242, 68, 27),
(243, 68, 29),
(244, 70, 20),
(245, 70, 27),
(246, 70, 26),
(247, 70, 16),
(248, 70, 29),
(254, 72, 20),
(255, 72, 26),
(256, 72, 27),
(257, 72, 29),
(258, 72, 16),
(259, 74, 20),
(260, 74, 26),
(261, 74, 27),
(262, 74, 16),
(263, 74, 29),
(264, 75, 20),
(265, 75, 26),
(266, 75, 27),
(267, 75, 16),
(268, 75, 29),
(269, 78, 20),
(270, 78, 26),
(271, 78, 27),
(272, 78, 29),
(273, 78, 16),
(274, 80, 20),
(275, 80, 16),
(276, 80, 29),
(277, 80, 26),
(278, 80, 27),
(279, 83, 20),
(280, 83, 26),
(281, 83, 27),
(282, 83, 16),
(283, 83, 29),
(284, 85, 20),
(285, 85, 26),
(286, 85, 27),
(287, 85, 16),
(288, 85, 29),
(289, 86, 20),
(290, 86, 26),
(291, 86, 27),
(292, 86, 16),
(293, 86, 29),
(294, 94, 20),
(295, 94, 26),
(296, 94, 27),
(297, 94, 16),
(298, 94, 29),
(305, 95, 20),
(306, 95, 24),
(307, 95, 16),
(308, 95, 29),
(309, 104, 20),
(310, 104, 16),
(311, 103, 20),
(312, 103, 18),
(313, 102, 20),
(314, 102, 16),
(315, 101, 20),
(316, 101, 16),
(317, 94, 18),
(354, 109, 20),
(355, 109, 26),
(356, 109, 27),
(357, 109, 16),
(358, 109, 29),
(359, 106, 16),
(361, 106, 20),
(364, 106, 25),
(365, 106, 26),
(366, 106, 27);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acao`
--
ALTER TABLE `acao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `acao_realizada`
--
ALTER TABLE `acao_realizada`
  ADD PRIMARY KEY (`id_acao_realizada`),
  ADD KEY `fk_acao_id` (`fk_acao_id`),
  ADD KEY `fk_usuarios_id` (`fk_usuarios_id`),
  ADD KEY `fk_paciente_id` (`fk_paciente_id`);

--
-- Índices de tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `anamnese`
--
ALTER TABLE `anamnese`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dados_atendimento`
--
ALTER TABLE `dados_atendimento`
  ADD PRIMARY KEY (`id_atendimento`),
  ADD KEY `fk_paciente_id` (`fk_paciente_id`);

--
-- Índices de tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `escolaridade`
--
ALTER TABLE `escolaridade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_escola_id` (`fk_escola_id`),
  ADD KEY `fk_paciente_id` (`fk_paciente_id`);

--
-- Índices de tabela `grupo_acessos`
--
ALTER TABLE `grupo_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `grupo_ana`
--
ALTER TABLE `grupo_ana`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paciente_id` (`fk_paciente_id`);

--
-- Índices de tabela `itens_ana`
--
ALTER TABLE `itens_ana`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios_permissoes`
--
ALTER TABLE `usuarios_permissoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acao`
--
ALTER TABLE `acao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `acao_realizada`
--
ALTER TABLE `acao_realizada`
  MODIFY `id_acao_realizada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `anamnese`
--
ALTER TABLE `anamnese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dados_atendimento`
--
ALTER TABLE `dados_atendimento`
  MODIFY `id_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `escolaridade`
--
ALTER TABLE `escolaridade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `grupo_acessos`
--
ALTER TABLE `grupo_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `grupo_ana`
--
ALTER TABLE `grupo_ana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itens_ana`
--
ALTER TABLE `itens_ana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de tabela `usuarios_permissoes`
--
ALTER TABLE `usuarios_permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acao_realizada`
--
ALTER TABLE `acao_realizada`
  ADD CONSTRAINT `acao_realizada_ibfk_1` FOREIGN KEY (`fk_acao_id`) REFERENCES `acao` (`id`),
  ADD CONSTRAINT `acao_realizada_ibfk_2` FOREIGN KEY (`fk_usuarios_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `acao_realizada_ibfk_3` FOREIGN KEY (`fk_paciente_id`) REFERENCES `paciente` (`id`);

--
-- Restrições para tabelas `dados_atendimento`
--
ALTER TABLE `dados_atendimento`
  ADD CONSTRAINT `dados_atendimento_ibfk_1` FOREIGN KEY (`fk_paciente_id`) REFERENCES `paciente` (`id`);

--
-- Restrições para tabelas `escolaridade`
--
ALTER TABLE `escolaridade`
  ADD CONSTRAINT `escolaridade_ibfk_1` FOREIGN KEY (`fk_escola_id`) REFERENCES `escola` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `escolaridade_ibfk_2` FOREIGN KEY (`fk_paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD CONSTRAINT `grupo_familiar_ibfk_1` FOREIGN KEY (`fk_paciente_id`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
