DROP DATABASE IF EXISTS `ETWorld`;

CREATE DATABASE `ETWorld`;

USE `ETWorld`;

# Dump of table SUPPLIER
# ------------------------------------------------------------
DROP TABLE IF EXISTS `Supplier`;

CREATE TABLE `Supplier`(
`SupplierID`int(5) NOT NULL AUTO_INCREMENT,
`SupplierAddress` varchar(30) DEFAULT NULL,
`UnitPrice` float(25,5) DEFAULT NULL,
PRIMARY KEY(`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `Account`; 

CREATE TABLE `Account`(
`AccountID` int(15) NOT NULL AUTO_INCREMENT,
`AccountType` varchar(10) DEFAULT NULL, 
`Username` varchar(15) DEFAULT NULL, 
`Password` varchar(25) DEFAULT NULL, 
PRIMARY KEY(`AccountID`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Customer`;

CREATE TABLE `Customer` (
  `AccountID` int(15) DEFAULT NULL, 
  `CustomerID` int(10) NOT NULL AUTO_INCREMENT,
  `CustomerFirstName` varchar(10) DEFAULT NULL,
  `CustomerLastName` varchar(10) DEFAULT NULL,
  `CustomerAddress` varchar(50) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`),
  KEY `fk_Customer_Account` (`AccountID`),
CONSTRAINT `fk_Customer_Account` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`AccountID`) ON DELETE SET NULL ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
  `BranchID` int(15) NOT NULL AUTO_INCREMENT  ,  
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







