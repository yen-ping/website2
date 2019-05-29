<?php
require("../../connection/database.php");
$sql = "DELETE FROM productcategory WHERE productCategoryID=".$_GET['productCategoryID'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list.php');
 ?>
