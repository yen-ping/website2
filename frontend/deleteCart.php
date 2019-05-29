<?php
session_start();
$is_existed = "delete";
  if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){
    unset($_SESSION['Cart'][$_GET['CartID']]);
    goto_previousPage($is_existed);

  }
  function goto_previousPage($is_existed){
    $url = explode('?',$_SERVER['HTTP_REFERER']);
    $location = $url[0];
    $location.= "?id=".$_POST['productID']."&&id2=".$_POST['productCategoryID'];
    $location.="&Existed=".$is_existed;
    header(sprintf('Location: %s ',$location));
  }

 ?>