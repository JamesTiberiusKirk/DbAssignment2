DROP DATABASE IF EXISTS `ETWorld`;

CREATE DATABASE `ETWorld`;

USE `ETWorld`;

# Dump of table SUPPLIER
# ------------------------------------------------------------

CREATE TABLE `SUPPLIER`(
`SupplierID`int(5) NOT NULL,
`SupplierAddress` varchar(30) DEFAULT NULL,
`UnitPrice` float(25,5) DEFAULT NULL,
PRIMARY KEY(`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `testapp`.`SUPPLIER` WRITE;

INSERT INTO `testapp`.`SUPPLIER`(`SupplierID`,`SupplierAddress`,`UnitPrice`)
VALUES
(12874,'DundeeStock',5784.36),
(45131,'DundeeStock',78451.5),
(78455,'DundeeStock',4451.3);
/*!40000 ALTER TABLE `testapp`.`SUPPLIER` ENABLE KEYS */;
UNLOCK TABLES;

# Dump of table Customer
# -------------------------------------SUPPLIER-----------------------

DROP TABLE IF EXISTS `Customer`;

CREATE TABLE `Customer` (
  `CustomerID` int(10) NOT NULL,
  `CFirstName` varchar(10) DEFAULT NULL,
  `CLastName` varchar(10) DEFAULT NULL,
  `CAddress` varchar(50) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` (`CustomerID`,`CFirstName`,`CLastName`,`CAddress`,`Phone`)
VALUES
    (0000000001,'Bellic','Niko','LIBERTYCITY',07579000000),
    (0000000002,'Bellic','Roman','LIBERTYCITY',07579000001),
    (0000000003,'Little','Jacob','LIBERTYCITY',07579000002),
    (0000000004,'Mcreary','Francis','LIBERTYCITY',07579000003),
    (0000000005,'Mcreary','Patrick','LIBERTYCITY',07579000004),
    
    (0000000006,'Vercetti','Tommy','VICECITY',07579000005),
    (0000000007,'Ken','Rosenberg','VICECITY',07579000006),
    (0000000008,'Lance','Vance','VICECITY',07579000007),
    (0000000009,'Sonny','Forelli','VICECITY',07579000008),
    (0000000010,'Victor','Vance','VICECITY',07579000009),
    
    (0000000011,'Johnson','Carl','SANANDREAS',07579000010),
    (0000000012,'Johnson','Sweet','SANANDREAS',07579000011),
    (0000000013,'Verpando','Cesar','SANANDREAS',07579000012),
    (0000000014,'Harris','Melvin','SANANDREAS',07579000013),
    (0000000015,'Thompson','Frank','SANANDREAS',07579000014),
    
	(0000000016,'Clinton','Franklin','LOSSANTOS',07579000015),
    (0000000017,'DeSanta','Michael','LOSSANTOS',07579000016),
    (0000000018,'Philips','Trevor','LOSSANTOS',07579000017),
    (0000000019,'DeSanta','Amanda','LOSSANTOS',07579000018),
    (0000000020,'DeSanta','James','LOSSANTOS',07579000019);

/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table CUSTOMERORDER
# ------------------------------------------------------------

DROP TABLE IF EXISTS `CUSTOMERORDER`;

CREATE TABLE `CUSTOMERORDER` (
  `COrderID` int(12) NOT NULL,
  `Quantity` int(3) DEFAULT NULL,
  `OrderPrice`int(10) DEFAULT NULL,
  `Delivery Address` varchar(30) NOT NULL,
  `Time` date DEFAULT NULL,
  `CustomerID` int(10) DEFAULT NULL,
  PRIMARY KEY (`COrderID`),
  KEY `fk_Customer_CUSTOMERORDER` (`CustomerID`),
  CONSTRAINT `fk_Customer_CUSTOMERORDER` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `CUSTOMERORDER` WRITE;
/*!40000 ALTER TABLE `CUSTOMERORDER` DISABLE KEYS */;
INSERT INTO `CUSTOMERORDER` (`COrderID`,`Quantity`,`OrderPrice`,`Delivery Address`,`Time`,`CustomerID`)
VALUES
	(000000000001,1,8000,'LIBERTYCITY','2019-10-10',0000000001),
	(000000000002,3,3300,'LIBERTYCITY','2019-10-11',0000000002),
	(000000000003,2,4900,'LIBERTYCITY','2019-10-12',0000000003),
	(000000000004,1,1500,'LIBERTYCITY','2019-10-13',0000000004),
    (000000000005,1,1000,'LIBERTYCITY','2019-10-14',0000000005),
    (000000000006,1,2350,'VICECITY','2018-05-11',0000000006),
    (000000000007,1,1900,'VICECITY','2018-05-12',0000000007),
    (000000000008,1,1350,'VICECITY','2018-05-13',0000000008),
    (000000000009,1,2750,'VICECITY','2018-05-14',0000000009),
    (000000000010,1,3150,'VICECITY','2018-05-15',0000000010),
    (000000000011,1,4500,'SANANDREAS','2019-07-22',0000000011),
    (000000000012,1,3450,'SANANDREAS','2019-07-25',0000000012),
    (000000000013,1,2600,'SANANDREAS','2019-07-26',0000000013),
    (000000000014,1,2100,'SANANDREAS','2019-07-27',0000000014),
    (000000000015,1,3150,'SANANDREAS','2019-07-29',0000000015),
    (000000000016,1,3000,'LOSSANTOS','2019-11-05',0000000016),
    (000000000017,1,2200,'LOSSANTOS','2019-11-04',0000000017),
    (000000000018,1,5000,'LOSSANTOS','2019-11-03',0000000018),
    (000000000019,1,4600,'LOSSANTOS','2019-11-11',0000000019),
	(000000000020,1,8000,'LOSSANTOS','2019-11-14',0000000020);
    

/*!40000 ALTER TABLE `CUSTOMERORDER` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table BRANCH
# ------------------------------------------------------------

DROP TABLE IF EXISTS `BRANCH`;

CREATE TABLE `BRANCH` (
  `SupplierID` int(5) DEFAULT NULL ,
  `BranchID` varchar(15) NOT NULL,  
  `BranchType` varchar(10) NOT NULL,
  `BranchAddress` varchar(30) DEFAULT NULL,
  `ContactNumber` varchar(11)DEFAULT NULL,
  `StockQuantity` int(10) DEFAULT NULL,
   PRIMARY KEY (`BranchID`),
   KEY `fk_SUPPLIER_BRANCH` (`SupplierID`),
   CONSTRAINT `fk_SUPPLIER_BRANCH` FOREIGN KEY (`SupplierID`) REFERENCES `SUPPLIER` (`SupplierID`) ON DELETE SET NULL ON UPDATE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `BRANCH` WRITE;
/*!40000 ALTER TABLE `BRANCH` DISABLE KEYS */;
INSERT INTO `BRANCH` (`SupplierID`,`BranchID`,`BranchType`,`BranchAddress`,`ContactNumber`,`StockQuantity`)
VALUES
	(12874,'DundeeBranch','SELLsDept','Dundee DD1 5EN','75787656317','4');
/*!40000 ALTER TABLE `BRANCH` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table PRODUCT
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PRODUCT`;
CREATE TABLE `PRODUCT`(
`ProductID`int(12) NOT NULL,
`Name` varchar(20) DEFAULT NULL,
`Type` varchar(20)DEFAULT NULL,
`CurrentPrice` int(10) DEFAULT NULL,
`BranchID` varchar(15) DEFAULT NULL,
`COrderID` integer(12) DEFAULT NULL,
KEY `fk_PRODUCT_BRANCH` (`BranchID`),
CONSTRAINT `fk_PRODUCT_BRANCH` FOREIGN KEY (`BranchID`) REFERENCES `BRANCH` (`BranchID`) ON DELETE SET NULL ON UPDATE CASCADE,
KEY `fk_PRODUCTL_CUSTOMERORDER` (`COrderID`),
CONSTRAINT `fk_PRODUCT_CUSTOMERORDER` FOREIGN KEY (`COrderID`) REFERENCES `CUSTOMERORDER` (`COrderID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`ProductID`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `PRODUCT` WRITE;
/*!40000 ALTER TABLE `PRODUCT` DISABLE KEYS */;
/*10000-Laptop 20000-DesktopPc 30000-GammingLp 40000-GamingDp*/
INSERT INTO `PRODUCT`(`ProductID`,`Name`,`Type`,`CurrentPrice`)
VALUES
/*10000-Laptop*/
(10001,'ETlight1','Laptop',1100),
(10002,'ETlight2','Laptop',1500),
(10003,'ETlight3','Laptop',1900),
(10004,'ETlight4','Laptop',2200),
(10005,'ETlight5','Laptop',2600),
/*20000-DesktopPc*/
(20001,'ETtank1','DesktopPc',1000),
(20002,'ETtank1','DesktopPc',1350),
(20003,'ETtank1','DesktopPc',1850),
(20004,'ETtank1','DesktopPc',2100),
(20005,'ETtank1','DesktopPc',2450),
/*30000-GammingLp*/
(30001,'ETgen1','GammingLp',2350),
(30002,'ETgen2','GammingLp',2750),
(30003,'ETgen3','GammingLp',3150),
(30004,'ETgen4','GammingLp',3450),
(30005,'ETgen5','GammingLp',4600),
(30011,'ETnsi','GammingLp',5000),
/*40000-GamingDp*/
(40001,'ETbasic','GammingDp',1800),
(40002,'ETAdvanced','GammingDp',2200),
(40003,'ETHighTech','GammingDp',3000),
(40004,'ETApex','GammingDp',4500),
(40015,'ETArea15','GammingDp',8000);
/*!40000 ALTER TABLE `PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `Account`; 

CREATE TABLE `Account`(
`CustomerID` int(10) DEFAULT NULL,
`AccountID` int(12) NOT NULL,
`AccountType` varchar(10) DEFAULT NULL, 
`Username` varchar(15) DEFAULT NULL, 
`Password` varchar(25) DEFAULT NULL, 

KEY `fk_Customer_Account` (`CustomerID`),
CONSTRAINT `fk_Customer_Account` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`AccountID`)

);

LOCK TABLES `Account ` WRITE;

INSERT INTO `Account`(`CustomerID`, `AccountID`, `AccountType`, `Username`, `Password`)
VALUES
(45545,45574,"Buyer","JOhny1","something" ),
(98545,45312,"Supplier","BASELTD","something" ),
();

DROP TABLE IF EXISTS `BankAccount`;

CREATE TABLE `BankAccount`(
`AccountID` int(12) DEFAULT NULL,
`BankAccountID` int(10) NOT NULL,
`CardNUmber` int(16) DEFAULT NULL, 
`CVC` int(3) DEFAULT NULL, 
`AcountNUmber` int(10) DEFAULT NULL,
`SortCode` int(6) DEFAULT NULL,
`ExpiryDate` int(8) DEFAULT NULL,
`FullName` varchar(25) DEFAULT NULL,
`CardType` varchar(15) DEFAULT NULL,
KEY `fk_Account_BankAccount` (`AccountID`),
CONSTRAINT `fk_Account_BankAccount` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE,

PRIMARY KEY(`BankAccount`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


LOCK TABLES `BankAccount` WRITE;

INSERT INTO `BankACcount` (`AccountID` , `BankAccountID`,`CardNUmber`,`CVC`,`AcountNUmber`,`SortCode`,`ExpiryDate`,`FullName`,`CardType`)
VALUES
(45451,4646,8888557457,325,125478,215478,1025, "Johny Bravo","Visa"),
(45981,4746,5666557457,325,125478,215478,1025, "Johny Mckenna ","Visa");


DROP TABLE IF EXISTS `Staff`;


CREATE TABLE `Staff`(
`BranchID` varchar(15) DEFAULT NULL, 
`AccountID` int(12) DEFAULT NULL, 
`StaffID` varchar(10) NOT NULL, 
`FullName` varchar(40) NOT NULL, 
`Salary` integer(9) DEFAULT NULL,
`Role` varchar(15) DEFAULT NULL,
`Address` varchar(15) DEFAULT NULL,
`Phone` integer(11) DEFAULT NULL,

KEY `fk_Account_Staff` (`AccountID`),
CONSTRAINT `fk_Account_Staff` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE,
KEY `fk_BRANCH_Staff` (`BranchID`),
CONSTRAINT `fk_BRANCH_Staff` FOREIGN KEY (`BranchID`) REFERENCES `BRANCH` (`BranchID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`StaffID`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Staff` WRITE; 

INSERT INTO `Staff` (`BranchID`, `AccountID`, `StaffID`,`FullName`,`Salary`, `Role`,`Address`,`Phone`)
VALUES 
(),
();








