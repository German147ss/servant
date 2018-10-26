<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-08-04 02:14:28 --> Severity: Parsing Error --> syntax error, unexpected end of file /home/u201535648/public_html/application/controllers/Items.php 294
ERROR - 2018-08-04 03:44:07 --> Severity: Notice --> Undefined offset: 1 /home/u201535648/public_html/application/controllers/Items.php 218
ERROR - 2018-08-04 03:54:03 --> Severity: Notice --> Undefined variable: cust_loca /home/u201535648/public_html/application/views/transactions/transreceipt.php 38
ERROR - 2018-08-04 03:54:39 --> Severity: Notice --> Undefined variable: cust_loca /home/u201535648/public_html/application/views/transactions/transreceipt.php 38
ERROR - 2018-08-04 11:16:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10' at line 4 - Invalid query: SELECT `transactions`.`ref`, `transactions`.`totalMoneySpent`, `transactions`.`modeOfPayment`, `transactions`.`staffId`, `transactions`.`transDate`, `transactions`.`lastUpdated`, `transactions`.`amountTendered`, `transactions`.`local`, `transactions`.`changeDue`, CONCAT_WS(" ", `admin`.`first_name`, admin.last_name) as "staffName", `transactions`.`cust_name`, `transactions`.`cust_phone`, `transactions`.`cust_email`, SUM(`transactions`.`quantity`) AS `quantity`
FROM `transactions`
LEFT JOIN `admin` ON `transactions`.`staffId` = `admin`.`id`
WHERE `local` = = 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10
ERROR - 2018-08-04 11:16:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10' at line 4 - Invalid query: SELECT `transactions`.`ref`, `transactions`.`totalMoneySpent`, `transactions`.`modeOfPayment`, `transactions`.`staffId`, `transactions`.`transDate`, `transactions`.`lastUpdated`, `transactions`.`amountTendered`, `transactions`.`local`, `transactions`.`changeDue`, CONCAT_WS(" ", `admin`.`first_name`, admin.last_name) as "staffName", `transactions`.`cust_name`, `transactions`.`cust_phone`, `transactions`.`cust_email`, SUM(`transactions`.`quantity`) AS `quantity`
FROM `transactions`
LEFT JOIN `admin` ON `transactions`.`staffId` = `admin`.`id`
WHERE `local` = = 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10
ERROR - 2018-08-04 11:16:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10' at line 4 - Invalid query: SELECT `transactions`.`ref`, `transactions`.`totalMoneySpent`, `transactions`.`modeOfPayment`, `transactions`.`staffId`, `transactions`.`transDate`, `transactions`.`lastUpdated`, `transactions`.`amountTendered`, `transactions`.`local`, `transactions`.`changeDue`, CONCAT_WS(" ", `admin`.`first_name`, admin.last_name) as "staffName", `transactions`.`cust_name`, `transactions`.`cust_phone`, `transactions`.`cust_email`, SUM(`transactions`.`quantity`) AS `quantity`
FROM `transactions`
LEFT JOIN `admin` ON `transactions`.`staffId` = `admin`.`id`
WHERE `local` = = 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10
ERROR - 2018-08-04 11:18:14 --> Query error: Column 'local' in where clause is ambiguous - Invalid query: SELECT `transactions`.`ref`, `transactions`.`totalMoneySpent`, `transactions`.`modeOfPayment`, `transactions`.`staffId`, `transactions`.`transDate`, `transactions`.`lastUpdated`, `transactions`.`amountTendered`, `transactions`.`local`, `transactions`.`changeDue`, CONCAT_WS(" ", `admin`.`first_name`, admin.last_name) as "staffName", `transactions`.`cust_name`, `transactions`.`cust_phone`, `transactions`.`cust_email`, SUM(`transactions`.`quantity`) AS `quantity`
FROM `transactions`
LEFT JOIN `admin` ON `transactions`.`staffId` = `admin`.`id`
WHERE `local` = 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10
ERROR - 2018-08-04 11:18:18 --> Query error: Column 'local' in where clause is ambiguous - Invalid query: SELECT `transactions`.`ref`, `transactions`.`totalMoneySpent`, `transactions`.`modeOfPayment`, `transactions`.`staffId`, `transactions`.`transDate`, `transactions`.`lastUpdated`, `transactions`.`amountTendered`, `transactions`.`local`, `transactions`.`changeDue`, CONCAT_WS(" ", `admin`.`first_name`, admin.last_name) as "staffName", `transactions`.`cust_name`, `transactions`.`cust_phone`, `transactions`.`cust_email`, SUM(`transactions`.`quantity`) AS `quantity`
FROM `transactions`
LEFT JOIN `admin` ON `transactions`.`staffId` = `admin`.`id`
WHERE `local` = 'patricios'
GROUP BY `ref`
ORDER BY `transId` DESC
 LIMIT 10
ERROR - 2018-08-04 11:18:44 --> Severity: error --> Exception: /home/u201535648/public_html/application/models/Transaction.php exists, but doesn't declare class Transaction /home/u201535648/public_html/system/core/Loader.php 336
ERROR - 2018-08-04 11:18:44 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-08-04 11:24:08 --> Severity: error --> Exception: /home/u201535648/public_html/application/models/Transaction.php exists, but doesn't declare class Transaction /home/u201535648/public_html/system/core/Loader.php 336
ERROR - 2018-08-04 14:17:13 --> Severity: Notice --> Undefined offset: 1 /home/u201535648/public_html/application/controllers/Items.php 218
ERROR - 2018-08-04 14:17:25 --> Severity: Notice --> Undefined offset: 1 /home/u201535648/public_html/application/controllers/Items.php 218
ERROR - 2018-08-04 14:23:19 --> Severity: Notice --> Undefined offset: 1 /home/u201535648/public_html/application/controllers/Items.php 218
ERROR - 2018-08-04 14:37:51 --> Severity: Notice --> Undefined offset: 1 /home/u201535648/public_html/application/controllers/Items.php 218
ERROR - 2018-08-04 15:03:12 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-08-04 15:19:02 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 6
ERROR - 2018-08-04 15:19:02 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 8
ERROR - 2018-08-04 15:46:29 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 6
ERROR - 2018-08-04 15:46:29 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 8
ERROR - 2018-08-04 15:46:30 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 6
ERROR - 2018-08-04 15:46:30 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 8
ERROR - 2018-08-04 15:46:30 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 6
ERROR - 2018-08-04 15:46:30 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 8
ERROR - 2018-08-04 15:46:31 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 6
ERROR - 2018-08-04 15:46:31 --> Severity: Notice --> Undefined variable: cum_cost /home/u201535648/public_html/application/views/items/itemslisttable.php 8
ERROR - 2018-08-04 16:21:13 --> Severity: Notice --> Undefined property: stdClass::$id /home/u201535648/public_html/application/views/transactions/transtable.php 55
ERROR - 2018-08-04 16:21:13 --> Severity: Notice --> Undefined property: stdClass::$id /home/u201535648/public_html/application/views/transactions/transtable.php 55
ERROR - 2018-08-04 16:26:38 --> 404 Page Not Found: Transactions/delete
ERROR - 2018-08-04 17:42:31 --> Severity: Notice --> Undefined property: stdClass::$local /home/u201535648/public_html/application/views/transactions/transtable.php 29
ERROR - 2018-08-04 17:42:31 --> Severity: Notice --> Undefined property: stdClass::$local /home/u201535648/public_html/application/views/transactions/transtable.php 29
ERROR - 2018-08-04 21:07:25 --> 404 Page Not Found: Google66ae45706d357fb4html/index
ERROR - 2018-08-04 21:07:25 --> 404 Page Not Found: Google53731ab8942861f7html/index
ERROR - 2018-08-04 21:07:26 --> 404 Page Not Found: GoldCoin-1/google66ae45706d357fb4.html
ERROR - 2018-08-04 21:07:27 --> 404 Page Not Found: GoldCoin-1/google53731ab8942861f7.html
