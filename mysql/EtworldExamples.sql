USE `ETWorld`;



LOCK TABLES `Supplier` WRITE;

INSERT INTO `Supplier`(`SupplierID`,`SupplierAddress`,`UnitPrice`)
VALUES
(1765,'DundeeStock',5784.36),
(63231,'DundeeStock',78451.5),
(73375,'DundeeStock',4451.3);
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;

UNLOCK TABLES;

# Dump of table Customer
# -------------------------------------SUPPLIER-----------------------


LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;

INSERT INTO `Customer` (`AccountID`,`CustomerFirstName`,`CustomerLastName`,`CustomerAddress`,`Phone`)
VALUES
    ("",'Bellic','Niko','LIBERTYCITY',07579000000),
    ("",'Bellic','Roman','LIBERTYCITY',07579000001),
    ("",'Little','Jacob','LIBERTYCITY',07579000002),
    ("",'Mcreary','Francis','LIBERTYCITY',07579000003),
    ("",'Mcreary','Patrick','LIBERTYCITY',07579000004);

/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;



LOCK TABLES `CustomerOrder` WRITE;
/*!40000 ALTER TABLE `CustomerOrder` DISABLE KEYS */;
INSERT INTO `CustomerOrder` (`Quantity`,`OrderPrice`,`Delivery Address`,`Time`,`CustomerID`)
VALUES
	(1,8000,'LIBERTYCITY','2019-10-10',""),
	(3,3300,'LIBERTYCITY','2019-10-11',""),
	(2,4900,'LIBERTYCITY','2019-10-12',""),
	(1,1500,'LIBERTYCITY','2019-10-13',""),
  (1,1000,'LIBERTYCITY','2019-10-14',"");
   

/*!40000 ALTER TABLE `CustomerOrder` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `Branch` WRITE;
/*!40000 ALTER TABLE `Branch` DISABLE KEYS */;
INSERT INTO `Branch` (`SupplierID`,`BranchID`,`BranchType`,`BranchAddress`,`ContactNumber`,`StockQuantity`)
VALUES
	(12874,'DundeeBranch','Accountancy','Dundee DD1 5EN','764516317','9'),
    (16574,'DundeeBranch','SELLsDept','Dundee DD1 5EN','75787656317','4');
/*!40000 ALTER TABLE `Branch` ENABLE KEYS */;

UNLOCK TABLES;

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account`(`CustomerID`,`AccountID`,`AccountType`,`Username`,`Password`)  
VALUES
(0000000001,45574,'Buyer','JOhny1','something'),
(0000000002,45312,'Supplier','BASELTD','something');
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `BankAccount` WRITE;
/*!40000 ALTER TABLE `BankAccount` DISABLE KEYS */;
INSERT INTO `BankAccount` (`AccountID` , `BankAccountID`,`CardNUmber`,`CVC`,`AcountNUmber`,`SortCode`,`ExpiryDate`,`FullName`,`CardType`)
VALUES

("","",8888557457,325,125478,215478,1025, "Johny Bravo","Visa"),
("","",5666557457,325,125478,215478,1025, "Johny Mckenna ","Visa");
/*!40000 ALTER TABLE `BankAccount` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
/*10000-Laptop 20000-DesktopPc 30000-GammingLp 40000-GamingDp*/
INSERT INTO `Product`(`ProductID`,`Name`,`Type`,`CurrentPrice`)

(45574,4646,8888557457,325,125478,215478,1025, "Johny Bravo","Visa"),
(45312,4746,5666557457,325,125478,215478,1025, "Johny Mckenna ","Visa");
/*!40000 ALTER TABLE `BankAccount` ENABLE KEYS */;

/*!40000 ALTER TABLE `PRODUCT` DISABLE KEYS */;
/*10000-Laptop 20000-DesktopPc 30000-GammingLp 40000-GamingDp*/
UNLOCK TABLES;


LOCK TABLES `Staff` WRITE; 
/*!40000 ALTER TABLE `Staff` DISABLE KEYS */;
INSERT INTO `Staff` (`BranchID`, `AccountID`, `StaffID`,`FullName`,`Salary`, `Role`,`Address`,`Phone`)
VALUES 
('DundeeBranch','45574',456,"",32223,"","",08854574),
('DundeeBranch','45312',123,"",32223,"","",08854574);
/*!40000 ALTER TABLE `Staff` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `Payroll` WRITE;

/*!40000 ALTER TABLE `Payroll` DISABLE KEYS */;
INSERT INTO `Payroll`(`StaffID`,`FullName`,`PayrollID`,`Deductions`,`GrossPay`,`NetPay`,`Ni`)
VALUES
(456,"Simon STill",0,"-something","Some ammount wihtout taxes","After taxes", "SB6548746D");
/*!40000 ALTER TABLE `Payroll` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `CustomerOrder`;

CREATE TABLE `CustomerOrder` (
  `CustomerOrderID` int(12) AUTO_INCREMENT NOT NULL,
  `Quantity` int(3) DEFAULT NULL,
  `OrderPrice`int(10) DEFAULT NULL,
  `Delivery Address` varchar(30) NOT NULL,
  `Time` date DEFAULT NULL,
  `CustomerID` int(10) DEFAULT NULL,
  PRIMARY KEY (`CustomerOrderID`),
  KEY `fk_Customer_CustomerOrder` (`CustomerID`),
  CONSTRAINT `fk_Customer_CustomerOrder` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


# Dump of table BRANCH
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Branch`;

CREATE TABLE `Branch` (
  `SupplierID` int(5) DEFAULT NULL  ,
  `BranchID` int(15) AUTO_INCREMENT NOT NULL ,  
  `BranchType` varchar(10) NOT NULL,
  `BranchAddress` varchar(30) DEFAULT NULL,
  `ContactNumber` varchar(11)DEFAULT NULL,
  `StockQuantity` int(10) DEFAULT NULL,
   PRIMARY KEY (`BranchID`),
   KEY `fk_Supplier_Branch` (`SupplierID`),
   CONSTRAINT `fk_Supplier_Branch` FOREIGN KEY (`SupplierID`) REFERENCES `Supplier` (`SupplierID`) ON DELETE SET NULL ON UPDATE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table PRODUCT
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product`(
`ProductID`int(12) NOT NULL AUTO_INCREMENT,
`Name` varchar(20) DEFAULT NULL,
`Type` varchar(20)DEFAULT NULL,
`CurrentPrice` int(10) DEFAULT NULL,
`BranchID` int(15) DEFAULT NULL,
`CustomerOrderID` integer(12) DEFAULT NULL,
KEY `fk_Product_Branch` (`BranchID`),
CONSTRAINT `fk_Product_Branch` FOREIGN KEY (`BranchID`) REFERENCES `Branch` (`BranchID`) ON DELETE SET NULL ON UPDATE CASCADE,
KEY `fk_Product_CustomerOrder` (`CustomerOrderID`),
CONSTRAINT `fk_Product_CustomerOrder` FOREIGN KEY (`CustomerOrderID`) REFERENCES `CustomerOrder` (`CustomerOrderID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`ProductID`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `BankAccount`;
CREATE TABLE `BankAccount`(
`AccountID` int(12) DEFAULT NULL,
`BankAccountID` int(10) NOT NULL AUTO_INCREMENT,
`CardNUmber` int(16) DEFAULT NULL, 
`CVC` int(3) DEFAULT NULL, 
`AcountNUmber` int(10) DEFAULT NULL,
`SortCode` int(6) DEFAULT NULL,
`ExpiryDate` int(8) DEFAULT NULL,
`FullName` varchar(25) DEFAULT NULL,
`CardType` varchar(15) DEFAULT NULL,
PRIMARY KEY(`BankAccountID`),
KEY `fk_Account_BankAccount` (`AccountID`),
CONSTRAINT `fk_Account_BankAccount` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS `Staff`;


CREATE TABLE `Staff`(
`BranchID` int(15) DEFAULT NULL, 
`AccountID` int(15) DEFAULT NULL, 
`StaffID` int(10) NOT NULL AUTO_INCREMENT, 
`FullName` varchar(40) NOT NULL, 
`Salary` integer(9) DEFAULT NULL,
`Role` varchar(15) DEFAULT NULL,
`Address` varchar(15) DEFAULT NULL,
`Phone` integer(11) DEFAULT NULL,

KEY `fk_Staff_Account` (`AccountID`),
CONSTRAINT `fk_Staff_Account` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE,
KEY `fk_Staff_Branch` (`BranchID`),
CONSTRAINT `fk_Staff_Branch` FOREIGN KEY (`BranchID`) REFERENCES `Branch` (`BranchID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`StaffID`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `Payroll`; 

CREATE TABLE `Payroll`(
`StaffID` int(10) DEFAULT NULL, 
`FullName` varchar(40) DEFAULT NULL,
`PayrollID` integer(12) NOT NULL AUTO_INCREMENT, 
`Deductions` varchar(25) DEFAULT NULL, 
`GrossPay` float(10) DEFAULT NULL, 
`NetPay` float(10) DEFAULT NULL, 
`Ni` varchar(10) DEFAULT NULL,

KEY `fk_Payroll_Staff` (`StaffID`),
CONSTRAINT `fk_Payroll_Staff` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`PayrollID`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;
