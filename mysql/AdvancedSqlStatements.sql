SELECT * FROM Customer; 
 
SELECT * FROM Branch;  


SELECT * FROM Account;

SELECT * FROM Staff;
#Prints products based on price and orders them by price from lowe to higher 
SELECT COUNT(CurrentPrice), CurrentPrice, Type FROM Product 
WHERE CurrentPrice > 20  GROUP BY Type ; 
# This is working and based on a keyword does search of the type 
SELECT * FROM Product 
WHERE  Type LIKE 'La%' ORDER BY CurrentPrice;

SELECT PayrollTime FROM Payroll;

SELECT StaffID, BranchID, Salary 
FROM Staff, Branch
WHERE BranchID IN (SELECT )





SELECT Description  FROM Product; 




