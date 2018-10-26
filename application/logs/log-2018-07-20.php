<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-20 02:12:42 --> Could not find the language line "form_validation_Por favor Ingrese Codigo de Referido"
ERROR - 2018-07-20 02:12:42 --> Could not find the language line "form_validation_Por favor Ingrese Codigo de Empresario"
ERROR - 2018-07-20 02:19:12 --> Query error: Unknown column 'mobile1' in 'where clause' - Invalid query: SELECT *
FROM `employees`
WHERE `mobile1` = '42901234'
 LIMIT 1
ERROR - 2018-07-20 02:19:26 --> Query error: Unknown column 'mobile1' in 'where clause' - Invalid query: SELECT *
FROM `employees`
WHERE `mobile1` = '42901234'
 LIMIT 1
ERROR - 2018-07-20 02:23:13 --> Query error: Unknown column 'mobile1' in 'where clause' - Invalid query: SELECT *
FROM `employees`
WHERE `mobile1` = '42070707'
 LIMIT 1
ERROR - 2018-07-20 02:25:56 --> Query error: Unknown column 'mobile1' in 'where clause' - Invalid query: SELECT *
FROM `employees`
WHERE `mobile1` = '42070707'
 LIMIT 1
ERROR - 2018-07-20 02:27:52 --> Query error: Unknown column 'mobile1' in 'where clause' - Invalid query: SELECT *
FROM `employees`
WHERE `mobile1` = '42017898'
 LIMIT 1
ERROR - 2018-07-20 02:30:52 --> Could not find the language line "form_validation_Ingrese codigo postal"
ERROR - 2018-07-20 02:30:52 --> Could not find the language line "form_validation_Por favor Ingrese Codigo de Referido"
ERROR - 2018-07-20 02:30:52 --> Could not find the language line "form_validation_Por favor Ingrese Codigo de Empresario"
ERROR - 2018-07-20 02:32:25 --> Could not find the language line "form_validation_Por favor Ingrese Codigo de Referido"
ERROR - 2018-07-20 02:32:25 --> Could not find the language line "form_validation_Por favor Ingrese Codigo de Empresario"
ERROR - 2018-07-20 02:35:47 --> Severity: error --> Exception: Too few arguments to function Employee::add(), 8 passed in C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\controllers\Employees.php on line 114 and exactly 9 expected C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\models\Employee.php 66
ERROR - 2018-07-20 02:39:31 --> Query error: Unknown column 'mobile1' in 'field list' - Invalid query: INSERT INTO `employees` (created_on, `first_name`, `last_name`, `email`, `customer_id`, `customer_ref`, `mobile1`, `address`, `dni`, `cp`) VALUES (NOW(), 'Flavor', 'Types', 'S123', 'german@gmail.com', 'S120', '42019898', 'cmte lucena 100', '41430699', '1925')
ERROR - 2018-07-20 03:27:58 --> 404 Page Not Found: Employee/add
ERROR - 2018-07-20 03:29:05 --> Query error: Table '1410inventory.employee' doesn't exist - Invalid query: INSERT INTO `employee` (created_on, `first_name`, `last_name`, `email`, `customer_id`, `customer_ref`, `mobile`, `address`, `dni`, `cp`) VALUES (NOW(), 'fghjkl', 'rtyuio', 's12', 'dfgh@ghjk.com', 's11', '123456789', 'fghj 09', '234567890', '1234')
ERROR - 2018-07-20 03:30:27 --> Query error: Table '1410inventory.employee' doesn't exist - Invalid query: INSERT INTO `employee` (created_on, `first_name`, `last_name`, `email`, `customer_id`, `customer_ref`, `mobile`, `address`, `dni`, `cp`) VALUES (NOW(), 'GERMAN HUGO', 'MARTINEZ MENDIETA', 'S999', 'gmerna@gmail.com', 'S998', '99999999', 'LUCENA 51', '999999999', '9999')
ERROR - 2018-07-20 04:26:22 --> Severity: error --> Exception: syntax error, unexpected 'switch' (T_SWITCH) C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\views\employees\employeeslist.php 34
ERROR - 2018-07-20 04:33:41 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\views\employees\employeeslist.php 39
ERROR - 2018-07-20 06:11:57 --> Severity: error --> Exception: Too few arguments to function Transaction::add(), 19 passed in C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\controllers\Transactions.php on line 276 and exactly 20 expected C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\models\Transaction.php 103
ERROR - 2018-07-20 06:12:11 --> Severity: error --> Exception: Too few arguments to function Transaction::add(), 19 passed in C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\controllers\Transactions.php on line 276 and exactly 20 expected C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\models\Transaction.php 103
ERROR - 2018-07-20 06:15:45 --> Severity: error --> Exception: Too few arguments to function Transaction::add(), 19 passed in C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\controllers\Transactions.php on line 276 and exactly 20 expected C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\models\Transaction.php 103
ERROR - 2018-07-20 06:15:51 --> Severity: error --> Exception: Too few arguments to function Transaction::add(), 19 passed in C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\controllers\Transactions.php on line 276 and exactly 20 expected C:\xampp\htdocs\mini-inventory-and-sales-management-system\application\models\Transaction.php 103
ERROR - 2018-07-20 06:26:18 --> Query error: Column 'cust_code' cannot be null - Invalid query: INSERT INTO `transactions` (transDate, `itemName`, `itemCode`, `description`, `quantity`, `unitPrice`, `totalPrice`, `amountTendered`, `changeDue`, `modeOfPayment`, `transType`, `staffId`, `totalMoneySpent`, `ref`, `vatAmount`, `vatPercentage`, `discount_amount`, `discount_percentage`, `cust_code`, `cust_name`, `cust_phone`, `cust_email`) VALUES (NOW(), 'Flex De Carga Iphone 7 Plus - Original', '1002', '', 1, 850, 850, 1000, '150', 'Cash', 1, '1', '850', '207459287', 0, '0', 0, '0', NULL, 'German Hugo', '42016798', 'german@gmail.com')
