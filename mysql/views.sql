DROP VIEW IF EXISTS `CustomerInformation`;
$sql = CREATE VIEW `CustomerInformation` AS SELECT
A.AccountID, 
CustomerID, 
CustomerFirstName,
CustomerLastName,
CustomerAddress,
Phone,
BankAccountID,
CardNUmber,
CVC,
AccountNUmber,
SortCode,
ExpiryDate,
FullName,
CardType
FROM Customer AS A , BankAccount AS B
WHERE A.AccountID = B.AccountiD and A.AccountID = ?;

DROP VIEW IF EXISTS `StaffInformation`;
$sql = CREATE VIEW `StaffInformation` AS SELECT
Sta.AccountID,
Sta.StaffID,
Sta.FullName,
Salary,
Role,
Address,
Phone,
PayrollID,
Deductions,
GrossPay,
NetPay,
Ni,
Sta.BranchID,
BranchType,
BranchAddress,
ContactNumber
FROM Staff AS Sta, Branch AS Bran, Payroll AS Pay
WHERE (Sta.StaffID = Pay.StaffID and Sta.StaffID = 583) and (Sta.BranchID = Bran.BranchID and Sta.BranchID = 103);


DROP VIEW IF EXISTS `CustomerOrderInformation`;
$sql = CREATE VIEW `CustomerOrderInformation` AS SELECT
Cus.CustomerID,
Quantity,
OrderPrice,
DeliveryAddress,
Time
FROM Customer AS Cus , CustomerOrder AS CusOrder
WHERE Cus.CustomerID = CusOrder.CustomerID and Cus.CustomerID = ?;