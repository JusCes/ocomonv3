/*!40101 SET NAMES utf8 */;


CREATE TABLE `usuariosXlocalizacao` (
  `user_id` int(4) unsigned NOT NULL COMMENT 'C�digo do uau�rio.',
  `loc_id` int(11) unsigned NOT NULL COMMENT 'C�digo do Local a qual o usu�rio pertence',
  PRIMARY KEY  (`user_id`,`loc_id`),
FOREIGN KEY (user_id) REFERENCES usuarios(user_id),
FOREIGN KEY (loc_id) REFERENCES localizacao(loc_id)
) ENGINE=MyISAM;



UPDATE  `status` SET  `status` =  'Agendado com usu&aacute;rio' WHERE  `status`.`stat_id` =7;
UPDATE  `status` SET  `status` =  'Aguardando feedback do usu&aacute;rio' WHERE  `status`.`stat_id` =16;
UPDATE  `status` SET  `status` =  'Indispon&iacute;vel para atendimento' WHERE  `status`.`stat_id` =19;

ALTER TABLE  `config` ADD  `conf_support_name` VARCHAR( 80 ) DEFAULT 'ocomon' NOT NULL COMMENT  'Nome que vai aparecer no header,rodape e mensagens'
ALTER TABLE  `config` ADD `conf_ticket_term` tinyint( 2 ) NOT NULL COMMENT  'Defini��o de como os registros v�o ser chamados'


ALTER TABLE  `mailconfig` ADD  `mail_port` SMALLINT( 5 ) NOT NULL AFTER  `mail_isauth`