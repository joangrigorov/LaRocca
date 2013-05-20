CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(90) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
);

/* test -  test */
INSERT INTO `la_rocca`.`users` (`username`, `password`) VALUES ('test', '098f6bcd4621d373cade4e832627b4f6');

