<?php
session_start();
require('../../connection/database.php');

$sth = $db->query("SELECT * FROM member WHERE account='".$_POST['account']."' AND password='".$_POST['password']."'");

$member = $sth->fetch(PDO::FETCH_ASSOC);

if($member != NULL){
  $_SESSION['account'] = $member['account'];
  $_SESSION['memberID'] = $member['memberID'];
  header('Location: my_cart.php?memberID='.$member['memberID']);
}else{
  header('Location: login_error.php');
}
 ?>
