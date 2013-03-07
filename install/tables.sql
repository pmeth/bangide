CREATE TABLE IF NOT EXISTS `project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `db_name` varchar(100) NOT NULL,
  `db_user` varchar(100),
  `db_pass` varchar(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_active` enum('false','true') NOT NULL DEFAULT 'true',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `UniqueActiveUsers` (`is_active` ASC, `username` ASC) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
