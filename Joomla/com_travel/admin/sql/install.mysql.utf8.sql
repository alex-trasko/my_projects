DROP TABLE IF EXISTS `#__travel`;

CREATE TABLE `#__travel` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(60) NOT NULL,
 `image` text NOT NULL,
 `image_thumb` text NOT NULL,
 `image_full` text NOT NULL,
 `place` varchar(60),
 `start_date` date,
 `end_date` date,
 `description` text NOT NULL,
 `lat` DOUBLE NOT NULL,
 `lng` DOUBLE NOT NULL,
 `published` TINYINT NOT NULL DEFAULT '1',

 PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
