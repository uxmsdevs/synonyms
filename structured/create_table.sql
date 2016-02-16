CREATE TABLE `synonyms` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `group` int(11) DEFAULT NULL,
    `word` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
