CREATE TABLE user(
  `id` int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(40)  COMMENT '密码'
);
CREATE TABLE images(
   `id` int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
   `url` varchar(225) NOT NULL DEFAULT '' COMMENT '链接',
   `sort` int not null DEFAULT 0 COMMENT '次序'
)