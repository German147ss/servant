<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-08-27 01:57:07 --> 404 Page Not Found: Robotstxt/index
ERROR - 2018-08-27 15:30:36 --> Severity: Notice --> Undefined property: stdClass::$payed /home/u733730158/public_html/application/views/services/servicelist.php 39
ERROR - 2018-08-27 15:30:36 --> Severity: Notice --> Undefined property: stdClass::$payed /home/u733730158/public_html/application/views/services/servicelist.php 39
ERROR - 2018-08-27 15:36:30 --> Severity: Notice --> Undefined property: stdClass::$ref /home/u733730158/public_html/application/views/services/servicelist.php 42
ERROR - 2018-08-27 16:33:47 --> Query error: Column 'local' in where clause is ambiguous - Invalid query: SELECT `transactions`.`ref`, `transactions`.`itemName`, `transactions`.`quantity`, `transactions`.`itemCode`, `transactions`.`totalPrice`, `transactions`.`unitPrice`, `transactions`.`local`, `transactions`.`totalMoneySpent`, `transactions`.`modeOfPayment`, `transactions`.`staffId`, `transactions`.`transDate`, `transactions`.`lastUpdated`, `transactions`.`amountTendered`, `transactions`.`changeDue`, `items`.`unitCost`
FROM `transactions`
LEFT JOIN `items` ON `transactions`.`itemCode` = `items`.`code`
WHERE DATE(transDate) >= '2018-08-27'
AND DATE(transDate) <= '2018-08-27'
AND `local` = 'patricios'
ORDER BY `transId` DESC
ERROR - 2018-08-27 16:33:47 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-08-27 17:21:52 --> Severity: Notice --> Undefined property: stdClass::$local /home/u733730158/public_html/application/views/services/servicelist.php 39
ERROR - 2018-08-27 17:23:04 --> Query error: Unknown column 'select' in 'field list' - Invalid query: SELECT `id`, `first_name`, `contact`, `description`, `price`, `select`, `created_on`, `payed`
FROM `service`
ORDER BY `first_name` ASC
ERROR - 2018-08-27 17:23:13 --> Query error: Unknown column 'select' in 'field list' - Invalid query: SELECT `id`, `first_name`, `contact`, `description`, `price`, `select`, `created_on`, `payed`
FROM `service`
ORDER BY `first_name` ASC
ERROR - 2018-08-27 17:53:23 --> 404 Page Not Found: Transactions/updatePay
ERROR - 2018-08-27 21:13:45 --> Severity: Notice --> Undefined offset: 1 /home/u733730158/public_html/application/controllers/Items.php 219
ERROR - 2018-08-27 21:16:29 --> Severity: Notice --> Undefined offset: 1 /home/u733730158/public_html/application/controllers/Items.php 219
ERROR - 2018-08-27 21:31:08 --> Severity: Notice --> Undefined offset: 1 /home/u733730158/public_html/application/controllers/Items.php 219
ERROR - 2018-08-27 22:00:10 --> Severity: Notice --> Undefined offset: 1 /home/u733730158/public_html/application/controllers/Items.php 219
ERROR - 2018-08-27 22:16:22 --> Severity: Notice --> Undefined offset: 1 /home/u733730158/public_html/application/controllers/Items.php 219
ERROR - 2018-08-27 22:16:28 --> Severity: Notice --> Undefined offset: 1 /home/u733730158/public_html/application/controllers/Items.php 219
