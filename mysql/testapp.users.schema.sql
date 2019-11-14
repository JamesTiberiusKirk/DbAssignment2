DROP TABLE `testapp`.`users`;
CREATE TABLE `testapp`.`users`(
	uID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	uname varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	upass varchar(255) NOT NULL,
	urole varchar(255) DEFAULT 'customer'
);

CREATE TABLE 'testapp'.'products'(
	ProductIDint(12) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	pName varchar(20) DEFAULT NULL,
	pType varchar(20)DEFAULT NULL,
	CurrentPrice int(10) DEFAULT NULL,
	BranchID varchar(15) DEFAULT NULL,
	COrderID integer(12) DEFAULT NULL
);
