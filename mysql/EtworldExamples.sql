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
('customer','customer','etworldcustomer'),
('Supplier','BASELTD','something'),
('Staff' , 'Staff' , 'something'), 
('Staff','Admin','etworldadmin' );
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
('ETlight1','Laptop','GL63 8SE (RTX 2060, GDDR6 6GB)

Cooler Boost5:
The latest MSI Cooler Boost 5 excels as a dual thermal modules, adopting dual Whirlwind Blade fans with 7 heat pipes and well-endowed 4 airflows in the revolutionary cooling design.
 It ends up intensively and efficiently driving exhaust heat out of the system, raising the cooling technology to the highest level of its kind. Especially designed for generating gooder performance and lower temperature.

Giant Speaker:
5 times bigger than others louder sound, more resonance, and higher quality
Gamers can feel every engine sound roaring past with the upgraded giant speakers. Exclusive audio module design and independent sound chamber for top-notch auditory sensation.

Nahimic 3 Audio Technology delivering 360 degrees immersive audio experience
Get ready to be amazed by the all new Nahimic 3 and live the gaming immersion like never before. With simple and intuitive new UI, the Nahimic 3 not only further enhances in game 3D surround sound, but also offers even more finite control over your music, movies, and conference calls.

MSI APP PLAYER
Developed under an exclusive partnership with Blue Stacks, the MSI APP Player brings seamless gaming experience between mobile games and PC platform, and leverages customized features as specific keyboard lighting and better graphics with multi-task works.

Multi-task with up to 3 monitors
Expand the vision for extreme gaming experience. ETlight1 innovative Matrix Display supports up to 2 external displays simultaneously through 1x HDMI port and 1x Mini DisplayPort 1.2. Multi-task is made possible even during competitive gameplays. 
Connect the laptop to HDTV display, Matrix Display supports 4K output with a resolution up to 3840 x 2160. ETlight1 Matrix Display technology creates an ideal environment for extreme gaming experience and pleasant multimedia entertainment.',1100,'https://images-na.ssl-images-amazon.com/images/I/71-y89IOTRL._AC_SL1500_.jpg'),


('ETlightRTX2005','Laptop','The ETlightRTX2005 15 is the worlds smallest NVIDIA GeForce RTX powered laptop and features the latest 9th Gen Intel Core i7 6 core processor, to deliver amazing power and portability. The 15.6" thin bezel 240Hz Full HD display provides an immersive and insanely fast visual experience for gaming and beyond. 
The per-key RGB backlit keyboard is fully customizable, and inside the compact, precision crafted CNC aluminum chassis is an innovative vapor chamber cooling system. ',1598,'https://images-na.ssl-images-amazon.com/images/I/71lDLhePWVL._AC_SL1500_.jpg'),


('ETlight Zeus10XT','Laptop','The all-new ETlight Zeus10XT deftly balances exceptional portability with potent performance to bring ultra-slim Windows 10 gaming laptops to a bigger audience. Its AMD Ryzen 7 processor and GeForce GTX 1660 Ti graphics power through work and play, while up to 8.8 hours of battery life keeps you running on the road. 
Immerse yourself in up to a 120Hz display framed by super-narrow bezels that practically melt away, and turn up the volume with smart amp technology that gets louder with less distortion. ',1000,'https://images-na.ssl-images-amazon.com/images/I/617oI4O4E8L._AC_SL1000_.jpg'),


('ETtank Gamers Tuff3000','Desktop',' System: Intel Core i7-9700F Processor (8 Cores, 3.0GHz Base, 4.7GHz Turbo, 12MB Cache) | Intel B360 Chipset Motherboard | 16GB 2400MHz DDR4 RAM | 240GB SATA-III SSD | 2TB 7200RPM SATA-III HDD
Graphics: Nvidia GeForce RTX 2060 6GB Graphics Card | Displayport v1.4, HDMI 2.0b | 650W 80 Plus Rated Power Supply
Connectivity: 4x USB 3.1 Gen 1 | 2x USB 2.0 | 1x PS/2 KB or Mouse Port | 1x RJ45 Network Ethernet 10/100/1000 | 300Mbps 802.11n Wifi | 5.1-Channel High Definition Audio
Case & Cooling: Inwin 101 Mid Tower Case | Intel Standard Cooler | Red LED Lights
Warranty & Software: 2 Years Parts & 3 Years Labour | Lifetime Technical Support | Bullguard Internet Security 1 Year, 3 Devices | Windows 10 Home 64-bit ',1678,'https://images-na.ssl-images-amazon.com/images/I/812BFcNDP5L._AC_SL1500_.jpg'),

/*20000-DesktopPc*/
('ETtank Gamers Tuff 1050','Desktop','The ETtank Gamers Tuff 1050  Gaming PC is optimised for gaming at Ultra High gaming settings and high resolutions, and is also VR Ready. The CPU and High Performance GPU gives the computer the raw power it needs to function at a high level.
 Additionally, the high speed memory and large hard drive gives the ETtank Gamers Tuff 1050 Gaming PC all the space needed to only focus on gaming. ',1000,'https://images-na.ssl-images-amazon.com/images/I/71dsxbcxfOL._AC_SL1500_.jpg'),
('ETtank SpaceGamers A51','Desktop','The ETworld ETtank SpaceGamers A51  Gaming PC Range - we utilise specially selected components to provide unrivalled experience in both gaming and general computing environments.

The 12 cores of raw AMD CPU Power in this PC, working in tandem with 3000MHz DDR4 RAM, ensure top-end performance at all times across all applications.

Enjoy agile multitasking and exhilarating media operations straight out of the box - connect a wide range of High Definition displays for mind blowing audio and video quality, while experiencing the near-instant transfer speeds of USB 3.0 for all your devices and peripherals.

Turbocharge your gaming experience with the GeForce RTX 2060 6GB Graphics Card. VR / Oculus / Virtual Reality Ready - the flagship GeForce RTX 2060 is the most advanced gaming graphics card ever created.

Discover unprecedented performance, power efficiency, and gaming experiences-driven by the new NVIDIA Pascal architecture. This is the ultimate gaming platform.
',1350,'https://images-na.ssl-images-amazon.com/images/I/61neCI%2BhWBL._AC_SL1062_.jpg'),

/*30000-GammingLp*/
('ETgen1','Peripherals','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at porta urna. Morbi ullamcorper tincidunt velit, in pulvinar',2350,'C://home/image1'),
('ET Monitor NTZ3000','Enjoy high-quality, high-speed streaming - in style - with the ET Monitor NTZ3000  24 Monitor. Comfortable viewing is yours with a high contrast ratio and a 23.6-inch matte screen which minimizes reflection from indoor lighting. Improved thin bezels, a black piano finish and a robust stand combine for a modern look that goes with any home or home office. Thanks to the easy-access buttons on the bottom bezel, you can fine-tune the colours, brightness and contrast on your screen for just the right view. 
With ET Monitor NTZ3000, you can depend on the one monitor brand worldwide for the last four years. ',600,'https://images-na.ssl-images-amazon.com/images/I/A15HWd-sWHL._AC_SL1500_.jpg'),

/*40000-GamingDp*/
('Gaming Headset TX1500','Gaming Headset TX1500-USB Gaming Headset is a E-sports game of headset for PC, Laptops, MAC devices Communication which brings you vivid sound field, sound clarity and sound shock feeling, capable of various games and office business.',95,'https://images-na.ssl-images-amazon.com/images/I/61AhJkf3RdL._AC_SL1000_.jpg'),
('Gaming Mouse ZX2000',' 8 Programmable Buttons + Rapid Fire

Fully customizable via Software Suite, making it easy and convenient. Plus, the Rapid Fire button gives you the edge you need during those intensive FPS battles

1000Hz High Precision

Four polling rate is adjustable: 125Hz, 250Hz, 500Hz, 1000Hz, polling rate ensures smooth and high-speed movement, enjoy games more freely. Best PC & Laptop gaming mouse with good value.

Chroma RGB Blaze to Victory

Equipped with dynamic RGB effects and 7 backlight modes to match every computer setup, game, mood and occasion. Experience 3 zones of illumination that will light up your path to victory.

Ergonomic Ambidextrous Hand Grips

Designed with an ergonomic profile fit for all hand grip styles and perfect for FPS, MMO, RTS and MOBA right hand players. ',120,'https://images-na.ssl-images-amazon.com/images/I/71hkBxMPqEL._AC_SL1280_.jpg');
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
INSERT INTO `Payroll`(`FullName`,`Deductions`,`GrossPay`,`NetPay`,`Ni`,`PayrollDate`, `PayrollTime`)
VALUES
("Richard Mackenna ","-something0","Some ammount wihtout taxes","After taxes", "SB6549646E",'2018-09-13','09:50:00'),
("Simon STill","-something1 ","Some ammount wihtout taxes","After taxes", "SB6548746D",'2019-08-23','13:51:24'),
("Simon STill","-something","Some ammount wihtout taxes","After taxes", "DT1248746B",'2019-06-07','16:25:31');
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
