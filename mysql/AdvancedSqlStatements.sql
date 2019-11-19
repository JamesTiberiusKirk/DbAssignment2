SELECT * FROM Customer;  


SELECT * FROM Account;

SELECT * FROM Branch;
#Prints products based on price and orders them by price from lowe to higher 
SELECT COUNT(CurrentPrice), CurrentPrice, Type FROM Product 
WHERE CurrentPrice > 20  GROUP BY Type ; 
# This is working and based on a keyword does search of the type 
SELECT * FROM Product 
WHERE  Type LIKE 'La%' ORDER BY CurrentPrice;

SELECT Name FROM Customers WHERE EXISTS
(SELECT OrderPrice FROM CustomerOrder
WHERE IFNULL(CustomerOrderID) AND OrderPrice => 8000);


SELECT Description  FROM Product; 




