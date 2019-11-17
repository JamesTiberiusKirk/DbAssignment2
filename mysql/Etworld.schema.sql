DROP DATABASE IF EXISTS `ETWorld`;

CREATE DATABASE `ETWorld`;

USE `ETWorld`;

# Dump of table SUPPLIER
# ------------------------------------------------------------
DROP TABLE IF EXISTS `Supplier`;

CREATE TABLE `Supplier` (
    `SupplierID` INT(5) NOT NULL AUTO_INCREMENT,
    `SupplierAddress` VARCHAR(30) DEFAULT NULL,
    `UnitPrice` FLOAT(25 , 5 ) DEFAULT NULL,
    PRIMARY KEY (`SupplierID`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `Supplier` AUTO_INCREMENT = 50;

DROP TABLE IF EXISTS `Account`;

CREATE TABLE `Account`(
`AccountID` int(15) NOT NULL AUTO_INCREMENT,
`AccountType` varchar(10) DEFAULT 'customer', 
`Username` varchar(15) DEFAULT NULL, 
`Password` varchar(255) DEFAULT NULL, 
PRIMARY KEY(`AccountID`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `Account` AUTO_INCREMENT = 250 ;

DROP TABLE IF EXISTS `Customer`;

CREATE TABLE `Customer` (
    `AccountID` INT(15) DEFAULT NULL,
    `CustomerID` INT(10) NOT NULL AUTO_INCREMENT,
    `CustomerFirstName` VARCHAR(10) DEFAULT NULL,
    `CustomerLastName` VARCHAR(10) DEFAULT NULL,
    `CustomerAddress` VARCHAR(50) DEFAULT NULL,
    `Phone` VARCHAR(12) DEFAULT NULL,
    PRIMARY KEY (`CustomerID`),
    KEY `fk_Customer_Account` (`AccountID`),
    CONSTRAINT `fk_Customer_Account` FOREIGN KEY (`AccountID`)
        REFERENCES `Account` (`AccountID`)
        ON DELETE SET NULL ON UPDATE CASCADE
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `Customer` AUTO_INCREMENT = 500 ;


DROP TABLE IF EXISTS `CustomerOrder`;

CREATE TABLE `CustomerOrder` (
    `CustomerOrderID` INT(12) AUTO_INCREMENT NOT NULL,
    `Quantity` INT(3) DEFAULT NULL,
    `OrderPrice` INT(10) DEFAULT NULL,
    `Delivery Address` VARCHAR(30) NOT NULL,
    `Time` DATE DEFAULT NULL,
    `CustomerID` INT(10) DEFAULT NULL,
    PRIMARY KEY (`CustomerOrderID`),
    KEY `fk_Customer_CustomerOrder` (`CustomerID`),
    CONSTRAINT `fk_Customer_CustomerOrder` FOREIGN KEY (`CustomerID`)
        REFERENCES `Customer` (`CustomerID`)
        ON DELETE SET NULL ON UPDATE CASCADE
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `CustomerOrder` AUTO_INCREMENT = 1000 ;
# Dump of table BRANCH
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Branch`;

CREATE TABLE `Branch` (
    `SupplierID` INT(5) DEFAULT NULL,
    `BranchID` INT(15) NOT NULL AUTO_INCREMENT,
    `BranchType` VARCHAR(10) NOT NULL,
    `BranchAddress` VARCHAR(30) DEFAULT NULL,
    `ContactNumber` VARCHAR(11) DEFAULT NULL,
    `StockQuantity` INT(10) DEFAULT NULL,
    PRIMARY KEY (`BranchID`),
    KEY `fk_Supplier_Branch` (`SupplierID`),
    CONSTRAINT `fk_Supplier_Branch` FOREIGN KEY (`SupplierID`)
        REFERENCES `Supplier` (`SupplierID`)
        ON DELETE SET NULL ON UPDATE CASCADE
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `Branch` AUTO_INCREMENT = 1500;

# Dump of table PRODUCT
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product` (
    `ProductID` INT(12) NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(25) DEFAULT NULL,
    `Type` VARCHAR(25) DEFAULT NULL,
    `Description` VARCHAR(10000) DEFAULT NULL,
    `CurrentPrice` INT(10) DEFAULT NULL,
    `BranchID` INT(15) DEFAULT NULL,
   `ImagePath` varchar(256) DEFAULT NULL,
    /*KEY `fk_Product_Branch` (`BranchID`),
    CONSTRAINT `fk_Product_Branch` FOREIGN KEY (`BranchID`)
        REFERENCES `Branch` (`BranchID`)
        ON DELETE SET NULL ON UPDATE CASCADE,*/
    PRIMARY KEY (`ProductID`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `Product` AUTO_INCREMENT = 2000;


DROP TABLE IF EXISTS `BankAccount`;
CREATE TABLE `BankAccount` (
    `AccountID` INT(12) DEFAULT NULL,
    `BankAccountID` INT(10) NOT NULL AUTO_INCREMENT,
    `CardNUmber` INT(16) DEFAULT NULL,
    `CVC` INT(3) DEFAULT NULL,
    `AcountNUmber` INT(10) DEFAULT NULL,
    `SortCode` INT(6) DEFAULT NULL,
    `ExpiryDate` INT(8) DEFAULT NULL,
    `FullName` VARCHAR(25) DEFAULT NULL,
    `CardType` VARCHAR(15) DEFAULT NULL,
    PRIMARY KEY (`BankAccountID`),
    KEY `fk_Account_BankAccount` (`AccountID`),
    CONSTRAINT `fk_Account_BankAccount` FOREIGN KEY (`AccountID`)
        REFERENCES `Account` (`AccountID`)
        ON DELETE SET NULL ON UPDATE CASCADE
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `BankAccount` AUTO_INCREMENT = 2500;



DROP TABLE IF EXISTS `Staff`;


CREATE TABLE `Staff` (
    `BranchID` INT(15) DEFAULT NULL,
    `AccountID` INT(15) DEFAULT NULL,
    `StaffID` INT(10) NOT NULL AUTO_INCREMENT,
    `FullName` VARCHAR(40) NOT NULL,
    `Salary` INTEGER(9) DEFAULT NULL,
    `Role` VARCHAR(15) DEFAULT NULL,
    `Address` VARCHAR(15) DEFAULT NULL,
    `Phone` INTEGER(11) DEFAULT NULL,
    KEY `fk_Staff_Account` (`AccountID`),
    CONSTRAINT `fk_Staff_Account` FOREIGN KEY (`AccountID`)
        REFERENCES `Account` (`AccountID`)
        ON DELETE SET NULL ON UPDATE CASCADE,
    KEY `fk_Staff_Branch` (`BranchID`),
    CONSTRAINT `fk_Staff_Branch` FOREIGN KEY (`BranchID`)
        REFERENCES `Branch` (`BranchID`)
        ON DELETE SET NULL ON UPDATE CASCADE,
    PRIMARY KEY (`StaffID`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;
ALTER TABLE `Staff` AUTO_INCREMENT = 3000;

DROP TABLE IF EXISTS `StaffSchedule`;

CREATE TABLE `StaffSchedule` (
    `ScheduleID` INT(15) NOT NULL AUTO_INCREMENT,
    `Date` DATE NOT NULL,
    `Start_at` TIME(0) NOT NULL,
    `Finish_at` TIME(0) NOT NULL,
    `StaffID` INT(10) DEFAULT NULL,
    KEY `fk_Staff_StaffSchedule` (`StaffID`),
    CONSTRAINT `fk_Staff_StaffSchedule` FOREIGN KEY (`StaffID`)
        REFERENCES `Staff` (`StaffID`)
        ON DELETE SET NULL ON UPDATE CASCADE,
    PRIMARY KEY (`ScheduleID`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `StaffSchedule` AUTO_INCREMENT = 3500;


DROP TABLE IF EXISTS `Payroll`;

CREATE TABLE `Payroll` (
    `StaffID` INT(10) DEFAULT NULL,
    `FullName` VARCHAR(40) DEFAULT NULL,
    `PayrollID` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `Deductions` VARCHAR(25) DEFAULT NULL,
    `GrossPay` FLOAT(10) DEFAULT NULL,
    `NetPay` FLOAT(10) DEFAULT NULL,
    `Ni` VARCHAR(10) DEFAULT NULL,
    KEY `fk_Payroll_Staff` (`StaffID`),
    CONSTRAINT `fk_Payroll_Staff` FOREIGN KEY (`StaffID`)
        REFERENCES `Staff` (`StaffID`)
        ON DELETE SET NULL ON UPDATE CASCADE,
    PRIMARY KEY (`PayrollID`)
)  ENGINE=INNODB DEFAULT CHARSET=LATIN1;

ALTER TABLE `Payroll` AUTO_INCREMENT = 4000;







