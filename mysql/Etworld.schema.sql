DROP DATABASE IF EXISTS `ETWorld`;

CREATE DATABASE `ETWorld`;

USE `ETWorld`;

# Dump of table SUPPLIER
# ------------------------------------------------------------

CREATE TABLE `SUPPLIER`(
`SupplierID`int(5) NOT NULL AUTO_INCREMENT,
`SupplierAddress` varchar(30) DEFAULT NULL,
`UnitPrice` float(25,5) DEFAULT NULL,
PRIMARY KEY(`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `Customer`;

CREATE TABLE `Customer` (
  `CustomerID` int(10) NOT NULL,
  `CFirstName` varchar(10) DEFAULT NULL,
  `CLastName` varchar(10) DEFAULT NULL,
  `CAddress` varchar(50) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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



# Dump of table PRODUCT
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PRODUCT`;
CREATE TABLE `PRODUCT`(
`ProductID`int(12) NOT NULL AUTO_INCREMENT,
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


DROP TABLE IF EXISTS `Account`; 

CREATE TABLE `Account`(
`CustomerID` int(10) DEFAULT NULL,
`AccountID` int(12) NOT NULL,
`AccountType` varchar(10) DEFAULT NULL, 
`Username` varchar(15) DEFAULT NULL, 
`Password` varchar(25) DEFAULT NULL, 
PRIMARY KEY(`AccountID`),
KEY `fk_Account_Customer` (`CustomerID`),
CONSTRAINT `fk_Account_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE SET NULL ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
PRIMARY KEY(`BankAccountID`),
KEY `fk_Account_BankAccount` (`AccountID`),
CONSTRAINT `fk_Account_BankAccount` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;





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

KEY `fk_Staff_Account` (`AccountID`),
CONSTRAINT `fk_Staff_Account` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE,
KEY `fk_Staff_BRANCH` (`BranchID`),
CONSTRAINT `fk_Staff_BRANCH` FOREIGN KEY (`BranchID`) REFERENCES `BRANCH` (`BranchID`) ON DELETE SET NULL ON UPDATE CASCADE,
PRIMARY KEY(`StaffID`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `Payroll`; 

CREATE TABLE `Payroll`(
`StaffID` varchar(10) DEFAULT NULL, 
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







