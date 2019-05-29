<?php
session_start();
$is_existed = "false";
if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){
  for ($i=0; $i < count($_SESSION['Cart']) ; $i++) {
    if($_POST['productID'] == $_SESSION['Cart'][$i]['productID']){
        $is_existed = "true";
        goto_previousPage($is_existed);
    }
  }
}
if($is_existed == "false"){
  $temp['productCategoryID'] = $_POST['productCategoryID'];
  $temp['productID'] = $_POST['productID'];
  $temp['name'] = $_POST['name'];
  $temp['picture'] = $_POST['picture'];
  $temp['price'] = $_POST['price'];
  $temp['Quantity'] = 1;
  $_SESSION['Cart'][] = $temp;
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
