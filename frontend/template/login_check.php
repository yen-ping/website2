<?php
session_start();
if(!isset($_SESSION['account'])&&!isset($_SESSION['memberID'])){
  header('Location: member_login2.php');
}
?>
