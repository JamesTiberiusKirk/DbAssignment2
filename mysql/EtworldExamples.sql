USE `ETWorld`;


LOCK TABLES `Supplier` WRITE;

INSERT INTO `Supplier`(`SupplierAddress`,`UnitPrice`)
VALUES
('DundeeStock',5784.36),
('DundeeStock',78451.5),
('DundeeStock',4451.3);
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;
UNLOCK TABLES;

# Dump of table Customer
# -------------------------------------SUPPLIER-----------------------


LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` (`CustomerFirstName`,`CustomerLastName`,`CustomerAddress`,`Phone`)
VALUES
    ('Bellic','Niko','LIBERTYCITY',07579000000),
    ('Bellic','Roman','LIBERTYCITY',07579000001),
    ('Little','Jacob','LIBERTYCITY',07579000002),
    ('Mcreary','Francis','LIBERTYCITY',07579000003),
    ('Mcreary','Patrick','LIBERTYCITY',07579000004);
    
   

/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `CustomerOrder` WRITE;
/*!40000 ALTER TABLE `CustomerOrder` DISABLE KEYS */;
INSERT INTO `CustomerOrder` (`Quantity`,`OrderPrice`,`Delivery Address`,`Time`)
VALUES
	(2,8000,'LIBERTYCITY','2019-10-10'),
	(3,3300,'LIBERTYCITY','2019-10-11'),
	(2,4900,'LIBERTYCITY','2019-10-12'),
	(1,1500,'LIBERTYCITY','2019-10-13'),
    (1,1000,'LIBERTYCITY','2019-10-14');
   

/*!40000 ALTER TABLE `CustomerOrder` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `Branch` WRITE;
/*!40000 ALTER TABLE `Branch` DISABLE KEYS */;
INSERT INTO `Branch` (`BranchType`,`BranchAddress`,`ContactNumber`,`StockQuantity`)
VALUES
	('Accountancy','Dundee DD1 5EN','764516317','9'),
    ('SELLsDept','Dundee DD1 5EN','75787656317','4');
/*!40000 ALTER TABLE `Branch` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account`(`AccountType`,`Username`,`Password`)  
VALUES
('Buyer','JOhny1','something'),
('Supplier','BASELTD','something');
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `BankAccount` WRITE;
/*!40000 ALTER TABLE `BankAccount` DISABLE KEYS */;
INSERT INTO `BankAccount` (`CardNUmber`,`CVC`,`AcountNUmber`,`SortCode`,`ExpiryDate`,`FullName`,`CardType`)
VALUES
(8888557457,325,125478,215478,1025, "Johny Bravo","Visa"),
(5666557457,325,125478,215478,1025, "Johny Mckenna ","Visa");
/*!40000 ALTER TABLE `BankAccount` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
/*10000-Laptop 20000-DesktopPc 30000-GammingLp 40000-GamingDp*/
INSERT INTO `Product`(`Name`,`Type`,`Description`,`CurrentPrice`,`ImagePath`)
VALUES
/*10000-Laptop*/
('ETlight1','Laptop','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper',1100,'C://home/image1'),
('ETlight2','Laptop','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper',1500,'C://home/image4'),

/*20000-DesktopPc*/
('ETtank1','DesktopPc','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi',1000,'C://home/image1'),
('ETtank1','DesktopPc','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper tincidunt velit,',1350,'C://home/image1'),

/*30000-GammingLp*/
('ETgen1','GammingLp','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper tincidunt velit, in pulvinar',2350,'C://home/image1'),
('ET Monitor NTZ3000','Peripherals','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper tincidunt velit, in pulvinar',2750,'C://home/image1'),

/*40000-GamingDp*/
('Gaming Headset TX1500','Accessories','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper tincidunt velit, in pulvinar quam posuere eget. Fusce ',1800,'C://home/image1'),
('Gaming Mouse ZX2000','Accessories','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper tincidunt velit, ',2200,'C://home/image1');
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Staff` WRITE; 
/*!40000 ALTER TABLE `Staff` DISABLE KEYS */;
INSERT INTO `Staff` (`FullName`,`Salary`, `Role`,`Address`,`Phone`)
VALUES 
("Nikita Khrushchev",32223,"Sales"," Nethergate, Dundee",08854574),
("Joseph Stalin",32223,"Manager"," Nethergate, Dundee",08854574);
/*!40000 ALTER TABLE `Staff` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `Payroll` WRITE;

/*!40000 ALTER TABLE `Payroll` DISABLE KEYS */;
INSERT INTO `Payroll`(`FullName`,`Deductions`,`GrossPay`,`NetPay`,`Ni`)
VALUES
("Simon STill","-something","Some ammount wihtout taxes","After taxes", "SB6548746D");
/*!40000 ALTER TABLE `Payroll` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `StaffSchedule` WRITE; 
/*!40000 ALTER TABLE `StaffSchedule` DISABLE KEYS */;
INSERT INTO `StaffSchedule`(`Date`,`Start_at`,`Finish_at`)
VALUES 
('2019-08-23','09:10:00','20:26:00'),
('2019-09-15','10:25:00','17:39:00'),
('2019-10-9','09:00:00','12:15:00');

/*!40000 ALTER TABLE `StaffSchedule` ENABLE KEYS */;
UNLOCK TABLES; 
