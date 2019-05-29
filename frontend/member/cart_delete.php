<?php
require("../../connection/database.php");
$sql = "DELETE FROM order_details WHERE productID=".$_GET['productID'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: my_cart.php');
 ?>
