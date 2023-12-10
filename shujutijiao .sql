
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";






CREATE TABLE IF NOT EXISTS `datas` (
  `id` int(10) unsigned NOT NULL,
  `Max` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Min` varchar(255) DEFAULT NULL,
  `Clothing` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `Weather` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;



INSERT INTO `datas` (`id`, `Max`, `Min`, `Clothing`, `flag`, `Weather`, `detail`, `img`, `cid`) VALUES
(6, '1', '0.1', 'cotton-padded jacket ,jacket', '123', 'summer', '123123', NULL, NULL);



CREATE TABLE IF NOT EXISTS `user_table` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `real_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access_level` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;



INSERT INTO `user_table` (`id`, `username`, `real_name`, `email`, `dob`, `password`, `access_level`, `age`, `class`) VALUES
(1, 'admin', 'admin', '123@gmail.com', '123', '123', 'admin', NULL, NULL),




ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `datas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

ALTER TABLE `user_table`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;

