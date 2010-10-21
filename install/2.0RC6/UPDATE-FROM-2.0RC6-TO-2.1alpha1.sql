/*!40101 SET NAMES utf8 */;


CREATE TABLE `usuariosXlocalizacao` (
  `user_id` int(4) unsigned NOT NULL COMMENT 'Código do uauário.',
  `loc_id` int(11) unsigned NOT NULL COMMENT 'Código do Local a qual o usuário pertence',
  PRIMARY KEY  (`user_id`,`loc_id`),
FOREIGN KEY (user_id) REFERENCES usuarios(user_id),
FOREIGN KEY (loc_id) REFERENCES localizacao(loc_id)
) ENGINE=MyISAM;



UPDATE  `status` SET  `status` =  'Agendado com usu&aacute;rio' WHERE  `status`.`stat_id` =7;
UPDATE  `status` SET  `status` =  'Aguardando feedback do usu&aacute;rio' WHERE  `status`.`stat_id` =16;
UPDATE  `status` SET  `status` =  'Indispon&iacute;vel para atendimento' WHERE  `status`.`stat_id` =19;

ALTER TABLE  `config` ADD  `conf_enterprise` VARCHAR( 100 ) DEFAULT 'ocomon' NOT NULL COMMENT  'Nome que vai aparecer no header e rodape'