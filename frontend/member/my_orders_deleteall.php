<?php
session_start();
unset($_SESSION['Cart']);
header('Location: my_cart.php');
 ?>
