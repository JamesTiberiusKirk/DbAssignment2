DROP TABLE `testapp`.`users`;
CREATE TABLE `testapp`.`users`(
	uID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	uname varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	upass varchar(255) NOT NULL,
	urole varchar(255) DEFAULT 'customer'
);