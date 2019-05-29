<?php
session_start();
require_once('../../connection/database.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>會員登入</title>
    <!-- Bootstrap -->
	<link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../assets/css/animate.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../assets/css/style1.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <?php require_once("../template/nav2.php"); ?>
    <div class="container-fluid" id="member_banner">
        <div class="row">
          <img src="../../assets/images/cal/product-img_03.jpg" alt="">
        </div>
    </div>
    <div id="mebmer_title">
      <h3>會員登入<h3>
    </div>
    <div class="container" id="Membertable">
      <div class="row">
        <div class="row" id="MemberForm">
                <div class="col-md-12">
               <form action="login.php" method="post" data-toggle="validator">
                 <div class="form-group">
                   <div class="col-sm-2">
                     <label for="Account" class="control-label">帳號</label>
                   </div>
                   <div class="col-sm-10">
                     <input type="email" class="form-control" id="Account" name="account"  style="margin-bottom:10px;" data-error="請輸入帳號" required>
                     <div class="help-block with-errors"></div>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-sm-2">
                     <label for="Password" class="control-label">密碼</label>
                   </div>
                   <div class="col-sm-10">
                     <input type="password" class="form-control" id="Password" name="password"  pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,12}$" data-minlength="6" data-error="請至少輸入一個英文，長度至少6個英文數字為密碼，最多12個" required>
                     <div class="help-block with-errors"></div>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="col-sm-12 text-center">
                     <input type="hidden" name="MM_login" value="LOGIN">
                     <button type="submit" class="btn btn-default" style="width:200px;">登入</button>
                     <!-- <a href="forget_password.php" style="margin-left:30px;">忘記密碼?</a> -->
                   </div>
                 </div>
               </form >

            </div>
        </div>
      </div>
    </div>

    <div id="footer" class="container-fluid">
      <div class="row">
      <div class="col-sm-2"></div>
           <div class="col-sm-6">
              <h1>TRAVELFUNS</h1>
              <p contenteditable="true">版權所有 © 2017 &nbsp; St WHISKYBAR All Right Reserved.</p>
          </div>
      </div>
    </div>

  </body>
</html>
