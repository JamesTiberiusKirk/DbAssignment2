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

