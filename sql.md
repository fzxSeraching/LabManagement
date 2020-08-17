<pre>
DROP TABLE IF EXISTS `ma_user`;  
CREATE TABLE `ma_user` (  
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱地址',
	`password` varchar(255) DEFAULT NULL COMMENT '密码',
	`usertype` int(5) DEFAULT NULL COMMENT '用户类型', 
	
  PRIMARY KEY (`id`)  
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户表';  
</pre>