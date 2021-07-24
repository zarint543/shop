<?php
require('./Database/DbController.php');
require('./Database/Product.php');
require('./Database/Cart.php');
$db = new DbController();
$product = new Product($db);

$cart = new Cart($db);
