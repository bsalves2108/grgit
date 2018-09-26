SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(160) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueID` (`phone`,`id_user`) USING BTREE,
  KEY `fromUser` (`id_user`),
  CONSTRAINT `fromUser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

INSERT INTO `contacts` VALUES ('31', '3', 'BRUNO DOS SANTOS ALVES', '(21) 98208-1888', 'bsalves2108@gmail.com', '2018-09-23 23:57:18', '2018-09-23 23:57:26');
INSERT INTO `contacts` VALUES ('32', '2', 'BRUNO DOS SANTOS ALVES', '(21) 98208-1888', 'bsalves2108@gmail.com', '2018-09-23 23:58:14', '2018-09-23 23:58:14');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('normal','admin') DEFAULT 'normal',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_users_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('2', 'BRUNO DOS', 'bsalves2108@gmail.com', '21982081888', '$2y$10$eYGmYW6ZqIrU3NAmk2DDXeePrdMA4C7BW20xgqKkQf2aj5kL9TMsy', '2018-09-23 21:06:22', '2018-09-23 21:06:22');
