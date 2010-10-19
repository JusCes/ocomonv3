/*!40101 SET NAMES utf8 */;


CREATE TABLE `usuariosXlocalizacao` (
  `user_id` int(4) unsigned NOT NULL COMMENT 'Código do uauário.',
  `loc_id` int(11) unsigned NOT NULL COMMENT 'Código do Local a qual o usuário pertence',
  PRIMARY KEY  (`user_id`,`loc_id`),
FOREIGN KEY (user_id) REFERENCES usuarios(user_id),
FOREIGN KEY (loc_id) REFERENCES localizacao(loc_id)
) ENGINE=MyISAM;