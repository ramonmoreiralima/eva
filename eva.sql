-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.1.56-community - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para eva
CREATE DATABASE IF NOT EXISTS `eva` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eva`;


-- Copiando estrutura para tabela eva.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_face` bigint(255) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_face`),
  CONSTRAINT `FK_administrador_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1354472841244738 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.administrador: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`id_face`, `empresa`, `cargo`) VALUES
	(1354472841244737, 'STI', 'Programador');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.apresentador
CREATE TABLE IF NOT EXISTS `apresentador` (
  `id_face` bigint(255) NOT NULL,
  `lattes` mediumtext,
  `resumo_vida` longtext NOT NULL,
  PRIMARY KEY (`id_face`),
  CONSTRAINT `FK_apresentador_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.apresentador: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `apresentador` DISABLE KEYS */;
INSERT INTO `apresentador` (`id_face`, `lattes`, `resumo_vida`) VALUES
	(1114320981996391, 'http://lattes.cnpq.br/2128241443582911', 'Formada em Serviço Social pela Universidade Plinio Leite, atua na area de medidadas socio educativas.'),
	(1256393534236789, 'http://lattes.cnpq.br/4326367382762945', 'Formado em Ciencia da Computação pela Universidade Federal FLuminence no ano 1987.');
/*!40000 ALTER TABLE `apresentador` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.apresentador_apresenta_atividade
CREATE TABLE IF NOT EXISTS `apresentador_apresenta_atividade` (
  `id_face` bigint(255) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `certificado` longtext,
  PRIMARY KEY (`id_face`,`id_atividade`),
  UNIQUE KEY `id_face_id_atividade_UNIQUE` (`id_face`,`id_atividade`),
  KEY `FK_usuario_deb_aberto_atividade` (`id_atividade`,`id_face`),
  CONSTRAINT `apresentador_apresenta_atividade_apresentador` FOREIGN KEY (`id_face`) REFERENCES `apresentador` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `apresentador_apresenta_atividade_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.apresentador_apresenta_atividade: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `apresentador_apresenta_atividade` DISABLE KEYS */;
INSERT INTO `apresentador_apresenta_atividade` (`id_face`, `id_atividade`, `certificado`) VALUES
	(1114320981996391, 2, 'http://endereco/cert_apresent_345252.pdf');
/*!40000 ALTER TABLE `apresentador_apresenta_atividade` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.area
CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `desc_area` varchar(255) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela eva.area: ~62 rows (aproximadamente)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id_area`, `desc_area`) VALUES
	(1, 'Administração'),
	(2, 'Administração Pública'),
	(3, 'Antropologia'),
	(4, 'Arquitetura e Urbanismo'),
	(5, 'Arquivologia'),
	(6, 'Artes'),
	(7, 'Biomedicina '),
	(8, 'Ciência Ambiental'),
	(9, 'Ciência da Computação'),
	(10, 'Ciências Atuariais'),
	(11, 'Ciências Biológicas'),
	(12, 'Ciências Contábeis'),
	(13, 'Ciências Econômicas'),
	(14, 'Ciências Naturais'),
	(15, 'Ciências Sociais'),
	(16, 'Cinema e Audiovisual'),
	(17, 'Computação'),
	(18, 'Comunicação Social'),
	(19, 'Desenho Industrial'),
	(20, 'Direito'),
	(21, 'Educação Física'),
	(22, 'Enfermagem'),
	(23, 'Engenharia Agrícola e Ambiental'),
	(24, 'Engenharia Civil'),
	(25, 'Engenharia de Agronegócios'),
	(26, 'Engenharia de Petróleo'),
	(27, 'Engenharia de Produção'),
	(28, 'Engenharia de Recursos Hídricos e do Meio Ambiente'),
	(29, 'Engenharia de Telecomunicações'),
	(30, 'Engenharia Elétrica'),
	(31, 'Engenharia Mecânica'),
	(32, 'Engenharia Metalúrgica'),
	(33, 'Engenharia Química'),
	(34, 'Estatística'),
	(35, 'Estudos de Mídia'),
	(36, 'Farmácia'),
	(37, 'Filosofia'),
	(38, 'Física'),
	(39, 'Fonoaudiologia'),
	(40, 'Geofísica'),
	(41, 'Geografia'),
	(42, 'História'),
	(43, 'Interdisciplinar em Educação do Campo'),
	(44, 'Jornalismo'),
	(45, 'Letras'),
	(46, 'Matemática'),
	(47, 'Medicina'),
	(48, 'Medicina Veterinária'),
	(49, 'Nutrição'),
	(50, 'Odontologia'),
	(51, 'Pedagogia'),
	(52, 'Políticas Públicas'),
	(53, 'Processos Gerenciais'),
	(54, 'Produção Cultural'),
	(55, 'Psicologia'),
	(56, 'Química'),
	(57, 'Relações Internacionais'),
	(58, 'Segurança Pública'),
	(59, 'Serviço Social'),
	(60, 'Sistemas de Informação'),
	(61, 'Sociologia'),
	(62, 'Tecnologia em Sistemas de Computação');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.atividade
CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atividade` varchar(50) NOT NULL,
  `data_atividade` date NOT NULL,
  `hora_atividade` time NOT NULL,
  `desc_atividade` longtext,
  `link_atividade` longtext,
  `status_atividade` varchar(10) NOT NULL,
  `vagas_atividade` int(10) NOT NULL,
  `tp_atividade` varchar(20) NOT NULL,
  PRIMARY KEY (`id_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.atividade: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` (`id_atividade`, `nome_atividade`, `data_atividade`, `hora_atividade`, `desc_atividade`, `link_atividade`, `status_atividade`, `vagas_atividade`, `tp_atividade`) VALUES
	(1, 'Abertura', '2016-10-08', '21:01:36', NULL, NULL, 'Aberta', 20, 'Deb Aberto'),
	(2, 'Mesa-Redonda', '2016-10-08', '21:04:19', '', 'www.atividade.com', 'Aberta', 20, 'Deb Aberto'),
	(49, 'Exposição', '2016-10-18', '12:00:00', '', 'www.atividade.com', 'Aberta', 10, 'Deb Aberto'),
	(50, 'Debate Economia Politica', '2016-10-11', '12:00:00', '', '', 'Aberta', 10, 'Deb Aberto'),
	(51, 'Debate Politicas Afirmativas', '2016-10-02', '12:00:00', '', '', 'Cancelada', 10, 'Deb Aberto'),
	(54, 'Exposição De Fisica', '2016-10-23', '12:00:00', '', '', 'Aberta', 10, 'Deb Aberto'),
	(55, 'Amostra', '2016-10-04', '12:00:00', '', '', 'Cancelada', 10, 'Deb Aberto'),
	(56, 'Saral', '2016-11-28', '12:00:00', '', '', 'Ativo', 20, 'Deb Aberto');
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.atividade_evento
CREATE TABLE IF NOT EXISTS `atividade_evento` (
  `id_atividade` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY (`id_atividade`,`id_evento`),
  KEY `FK_atividade_evento_evento` (`id_evento`,`id_atividade`),
  CONSTRAINT `FK_atividade_evento_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_atividade_evento_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.atividade_evento: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `atividade_evento` DISABLE KEYS */;
INSERT INTO `atividade_evento` (`id_atividade`, `id_evento`) VALUES
	(1, 1),
	(2, 4),
	(49, 1),
	(50, 1),
	(51, 1),
	(54, 1),
	(55, 1),
	(56, 1);
/*!40000 ALTER TABLE `atividade_evento` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.ci_sessions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.congresso
CREATE TABLE IF NOT EXISTS `congresso` (
  `id_evento` int(11) NOT NULL,
  `ata_congresso` longtext,
  PRIMARY KEY (`id_evento`),
  CONSTRAINT `FK_congresso_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.congresso: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `congresso` DISABLE KEYS */;
INSERT INTO `congresso` (`id_evento`, `ata_congresso`) VALUES
	(3, 'http://www.semanadaficica.uff.br/ata_congresso.pdf');
/*!40000 ALTER TABLE `congresso` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_atividade` int(11) NOT NULL,
  `pre_requisito` longtext,
  PRIMARY KEY (`id_atividade`),
  CONSTRAINT `FK_curso_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.curso: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id_atividade`, `pre_requisito`) VALUES
	(54, 'Não Possui Nenhum');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.deb_aberto
CREATE TABLE IF NOT EXISTS `deb_aberto` (
  `id_atividade` int(11) NOT NULL,
  `tp_deb_aberto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_atividade`),
  CONSTRAINT `FK_deb_aberto_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.deb_aberto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `deb_aberto` DISABLE KEYS */;
INSERT INTO `deb_aberto` (`id_atividade`, `tp_deb_aberto`) VALUES
	(54, 'PALESTRA'),
	(55, 'PAINEL '),
	(56, 'Encontro');
/*!40000 ALTER TABLE `deb_aberto` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.deb_fechado
CREATE TABLE IF NOT EXISTS `deb_fechado` (
  `id_atividade` int(11) NOT NULL,
  `id_face` bigint(255) NOT NULL,
  `tp_deb_fechado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_atividade`),
  KEY `FK_deb_fecahdo_usuario_idx` (`id_face`),
  CONSTRAINT `FK_deb_fechado_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_deb_fechado_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.deb_fechado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `deb_fechado` DISABLE KEYS */;
INSERT INTO `deb_fechado` (`id_atividade`, `id_face`, `tp_deb_fechado`) VALUES
	(50, 1114320981996391, 'MESA REDONDA '),
	(51, 1114320981996391, 'CONFERÊNCIA');
/*!40000 ALTER TABLE `deb_fechado` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` int(8) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.endereco: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`id_endereco`, `cep`, `rua`, `numero`, `bairro`) VALUES
	(1, 24110002, 'Rua Benjamin Constant', 442, 'Largo do Barradas'),
	(2, 24110000, 'Rua São João', 131, 'Centro'),
	(4, 24110341, 'Rua São Pedro', 21, 'Barreto');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.endereco_atividade
CREATE TABLE IF NOT EXISTS `endereco_atividade` (
  `id_atividade` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_atividade`,`id_endereco`),
  UNIQUE KEY `id_atividade_UNIQUE` (`id_atividade`,`id_endereco`),
  KEY `endereco_atividade_endereco_idx` (`id_endereco`,`id_atividade`),
  CONSTRAINT `endereco_atividade_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `endereco_atividade_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.endereco_atividade: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco_atividade` DISABLE KEYS */;
INSERT INTO `endereco_atividade` (`id_atividade`, `id_endereco`) VALUES
	(51, 1);
/*!40000 ALTER TABLE `endereco_atividade` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.endereco_evento
CREATE TABLE IF NOT EXISTS `endereco_evento` (
  `id_evento` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`,`id_endereco`),
  UNIQUE KEY `id_evento_UNIQUE` (`id_evento`,`id_endereco`),
  KEY `FK_endereco_evento_endereco_idx` (`id_endereco`,`id_evento`),
  CONSTRAINT `FK_endereco_evento_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_endereco_evento_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.endereco_evento: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco_evento` DISABLE KEYS */;
INSERT INTO `endereco_evento` (`id_evento`, `id_endereco`) VALUES
	(1, 2);
/*!40000 ALTER TABLE `endereco_evento` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(255) NOT NULL,
  `edicao_evento` varchar(20) NOT NULL,
  `status_evento` varchar(20) NOT NULL,
  `inicio_evento` date NOT NULL,
  `fim_evento` date NOT NULL,
  `dia_up_mat_evento` date NOT NULL,
  `ambito_evento` varchar(20) NOT NULL,
  `area_evento` varchar(20) NOT NULL,
  `link_evento` longtext,
  `cnpj_evento` int(20) NOT NULL,
  `img_evento` varchar(50) DEFAULT NULL,
  `tp_evento` varchar(20) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.evento: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` (`id_evento`, `nome_evento`, `edicao_evento`, `status_evento`, `inicio_evento`, `fim_evento`, `dia_up_mat_evento`, `ambito_evento`, `area_evento`, `link_evento`, `cnpj_evento`, `img_evento`, `tp_evento`) VALUES
	(1, 'Semana Da Matematica', 'Primeira', 'Cancelado', '2016-10-14', '2016-10-14', '2016-10-14', 'Internacional', 'Matematica', '', 2147483647, '001.jpg', 'Congresso'),
	(3, 'Semana Da Fisica', 'Segunda', 'Cancelado', '2016-09-30', '2016-09-30', '2016-09-30', 'Nacional', 'Fisica', NULL, 2147483647, '001.jpg', 'Congresso'),
	(4, 'Semana Da Biologia', 'Primeira', 'Cancelado', '2016-10-03', '2016-09-06', '2016-09-27', 'Nacional', 'Biomedicina', NULL, 2147483647, '001.jpg', 'Congresso'),
	(6, 'Semana da Fisica', 'Segunda', 'Cancelada', '2016-09-29', '2016-09-28', '2016-10-31', 'Nacional', 'Matematica', NULL, 2147483647, '001.jpg', 'Congresso');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id_evento` int(11) NOT NULL,
  `regulamento_forum` longtext,
  `conclusao_forum` longtext,
  PRIMARY KEY (`id_evento`),
  CONSTRAINT `FK_forum_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.forum: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`id_evento`, `regulamento_forum`, `conclusao_forum`) VALUES
	(1, 'http://www.semanadamatematica.uff.br/regulamento.pdf', 'Conclui-se que as situações não contempladas no presente Regulamento serão submetidas pelo Coordenador do Fórum à deliberação da Plenária e submetidas à Coordenação do Núcleo de Estudos e Pesquisas em Justiça Restaurativa da Escola Superior da Magistratura. \r');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.material
CREATE TABLE IF NOT EXISTS `material` (
  `sku` int(20) NOT NULL AUTO_INCREMENT,
  `nome_material` varchar(30) NOT NULL,
  `unid_med_material` varchar(10) NOT NULL,
  `preco_material` double NOT NULL,
  `desc_material` longtext,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.material: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` (`sku`, `nome_material`, `unid_med_material`, `preco_material`, `desc_material`) VALUES
	(1, 'Quadro Negro', '1', 50, 'Quadro Negro'),
	(2, 'Caneta para Quadro', '1', 5.5, 'Caneta Cor Preta');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.participacao
CREATE TABLE IF NOT EXISTS `participacao` (
  `id_participacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_face` bigint(255) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `certificado` longtext,
  PRIMARY KEY (`id_participacao`),
  KEY `FK_participa_atividade` (`id_atividade`),
  KEY `FK_participa_evento` (`id_evento`),
  KEY `FK_participacao_usuario` (`id_face`),
  CONSTRAINT `FK_participacao_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_participa_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_participa_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.participacao: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `participacao` DISABLE KEYS */;
INSERT INTO `participacao` (`id_participacao`, `id_face`, `id_atividade`, `id_evento`, `certificado`) VALUES
	(1, 1114320981996391, 55, 4, 'http://endereco/cert_particip_345252.pdf'),
	(2, 1354472841244737, 55, 4, 'http://endereco/cert_particip_444252.pdf'),
	(3, 1354472841244737, 2, 4, 'http://endereco/cert_particip_412789.pdf');
/*!40000 ALTER TABLE `participacao` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.participacao_requer_material
CREATE TABLE IF NOT EXISTS `participacao_requer_material` (
  `id_participacao` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `nota_fiscal` int(50) NOT NULL,
  PRIMARY KEY (`id_participacao`,`sku`),
  UNIQUE KEY `id_participacao_sku_UNIQUE` (`id_participacao`,`sku`),
  KEY `FK_participacao_requer_material_material` (`sku`),
  CONSTRAINT `FK_participacao_requer_material_material` FOREIGN KEY (`sku`) REFERENCES `material` (`sku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_participacao_requer_material_participacao` FOREIGN KEY (`id_participacao`) REFERENCES `participacao` (`id_participacao`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.participacao_requer_material: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `participacao_requer_material` DISABLE KEYS */;
INSERT INTO `participacao_requer_material` (`id_participacao`, `sku`, `quantidade`, `nota_fiscal`) VALUES
	(1, 2, 1, 906576),
	(2, 2, 2, 778767),
	(3, 1, 2, 445433);
/*!40000 ALTER TABLE `participacao_requer_material` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.semana_academica
CREATE TABLE IF NOT EXISTS `semana_academica` (
  `id_evento` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  CONSTRAINT `FK_semana_academica_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.semana_academica: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `semana_academica` DISABLE KEYS */;
INSERT INTO `semana_academica` (`id_evento`, `categoria`) VALUES
	(1, 'TÉCNICA'),
	(4, 'CIENTÍFICA'),
	(6, 'ESTUDANTIL');
/*!40000 ALTER TABLE `semana_academica` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.simposio
CREATE TABLE IF NOT EXISTS `simposio` (
  `id_evento` int(11) NOT NULL,
  `impressao_simposio` longtext,
  PRIMARY KEY (`id_evento`),
  CONSTRAINT `FK_simposio_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.simposio: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `simposio` DISABLE KEYS */;
INSERT INTO `simposio` (`id_evento`, `impressao_simposio`) VALUES
	(4, 'http://www.simposiodebiologia.uff.br/impressao_simposio.pdf');
/*!40000 ALTER TABLE `simposio` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_face` bigint(255) NOT NULL,
  `primeiro_nome` varchar(50) NOT NULL,
  `meio_nome` varchar(50) DEFAULT NULL,
  `ultimo_nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_face`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.usuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_face`, `primeiro_nome`, `meio_nome`, `ultimo_nome`, `email`) VALUES
	(1114320981996391, 'Edineusa ', 'Santana ', 'Santos', 'dinadineusa@hotmail.com'),
	(1256393534236789, 'Ediberto', 'Ferrira', 'Silva', 'ediberto.silva@gmail.com'),
	(1352863526533285, 'Antonio ', 'Carlos', 'Almeida', 'a.carlos@gmail.com'),
	(1354472841244732, 'Jose', ' Rosa', 'Filho', 'rosafilho@gmail.com'),
	(1354472841244737, 'Ramon ', 'Moreira', 'Lima', 'ramon.mlima@gmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.usuario_cria_evento
CREATE TABLE IF NOT EXISTS `usuario_cria_evento` (
  `id_face` bigint(255) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `data_criacao` date NOT NULL,
  KEY `FK_administrador_cria_evento_evento` (`id_evento`),
  KEY `FK_administrador_cria_evento_usuario_idx` (`id_face`),
  CONSTRAINT `FK_administrador_cria_evento_administrador` FOREIGN KEY (`id_face`) REFERENCES `administrador` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_administrador_cria_evento_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.usuario_cria_evento: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_cria_evento` DISABLE KEYS */;
INSERT INTO `usuario_cria_evento` (`id_face`, `id_evento`, `data_criacao`) VALUES
	(1354472841244737, 6, '2016-11-10');
/*!40000 ALTER TABLE `usuario_cria_evento` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.usuario_participa_atividade
CREATE TABLE IF NOT EXISTS `usuario_participa_atividade` (
  `id_face` bigint(255) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `certificado` longtext,
  PRIMARY KEY (`id_face`,`id_atividade`),
  UNIQUE KEY `id_face_UNIQUE` (`id_face`,`id_atividade`),
  KEY `FK_usuario_deb_aberto_atividade` (`id_atividade`,`id_face`),
  CONSTRAINT `FK_usuario_participa_atividade_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_participa_atividade_atividade` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.usuario_participa_atividade: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_participa_atividade` DISABLE KEYS */;
INSERT INTO `usuario_participa_atividade` (`id_face`, `id_atividade`, `certificado`) VALUES
	(1354472841244732, 50, 'http://endereco/cert_part_ativ_345252.pdf'),
	(1354472841244737, 2, 'http://endereco/cert_part_ativ_348765.pdf');
/*!40000 ALTER TABLE `usuario_participa_atividade` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.usuario_participa_evento
CREATE TABLE IF NOT EXISTS `usuario_participa_evento` (
  `id_face` bigint(255) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `certificado` longtext,
  PRIMARY KEY (`id_face`,`id_evento`),
  UNIQUE KEY `id_face_UNIQUE` (`id_face`,`id_evento`),
  KEY `FK_usuario_cria_evento_evento` (`id_evento`,`id_face`),
  CONSTRAINT `FK_usuario_participa_evento_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_participa_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela eva.usuario_participa_evento: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_participa_evento` DISABLE KEYS */;
INSERT INTO `usuario_participa_evento` (`id_face`, `id_evento`, `certificado`) VALUES
	(1354472841244732, 3, 'http://endereco/cert_part_eve_345252.pdf');
/*!40000 ALTER TABLE `usuario_participa_evento` ENABLE KEYS */;


-- Copiando estrutura para tabela eva.usuario_questiona_deb_aberto
CREATE TABLE IF NOT EXISTS `usuario_questiona_deb_aberto` (
  `id_face` bigint(255) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `pergunta` longtext,
  PRIMARY KEY (`id_face`,`id_atividade`),
  UNIQUE KEY `id_face` (`id_face`,`id_atividade`),
  KEY `FK_usuario_deb_aberto_atividade` (`id_atividade`,`id_face`),
  CONSTRAINT `FK_usuario_questiona_deb_aberto_deb_aberto` FOREIGN KEY (`id_atividade`) REFERENCES `deb_aberto` (`id_atividade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_usuario_questiona_deb_aberto_usuario` FOREIGN KEY (`id_face`) REFERENCES `usuario` (`id_face`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela eva.usuario_questiona_deb_aberto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_questiona_deb_aberto` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_questiona_deb_aberto` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
