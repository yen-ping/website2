<?php
require_once('../../connection/database.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>加入會員-會員專區</title>
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
    <script src="../../assets/bootstrap/js/bootstrap.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/validator.min.js"></script>

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
      <h3>加入會員<h3>
    </div>
    <div class="container-fluid" id="Membertable">
      <div class="row">
        <div class="row">
                <div class="col-md-12">
                  <form action="apply_success.php" method="post" data-toggle="validator">
   						<div class="form-group">
   							<div class="col-sm-2">
   								<label for="Account" class="control-label">帳號</label>
   							</div>
   							<div class="col-sm-10">
   								<input type="email" class="form-control" id="Account" name="account"  style="margin-bottom:10px;" data-error="請輸入E-mail做為帳號" required>
   								<div class="help-block with-errors"></div>
   							</div>
   						</div>
   						<div class="form-group">
   							<div class="col-sm-2">
   								<label for="Password" class="control-label">密碼</label>
   							</div>
   							<div class="col-sm-10">
   								<input type="password" class="form-control" id="Password" name="password" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,12}$" data-minlength="6" data-error="請至少輸入一個英文，長度至少6個英文數字為密碼，最多12個">
   								<div class="help-block with-errors"></div>
   							</div>
   						</div>
   						<div class="form-group">
   							<div class="col-sm-2">
   								<label for="ConfirmPas" class="control-label">確認密碼</label>
   							</div>
   							<div class="col-sm-10">
   								<input type="password" class="form-control" id="ConfirmPas" name="ConfirmPas" data-match="#Password" data-match-error="密碼不符，請重新輸入">
   								<div class="help-block with-errors"></div>
   							</div>
   						</div>
   						<div class="form-group">
   							<div class="col-sm-2">
   								<label for="phone" class="control-label">聯絡電話</label>
   							</div>
   							<div class="col-sm-10">
   								<input type="text" class="form-control" id="Phone" name="phone" data-error="請輸入聯絡電話" required>
   								<div class="help-block with-errors"></div>
   							</div>
   						</div>
   						<div class="form-group">
   							<div class="col-sm-12 text-center" style="margin-bottom:10px;">
   								<input type="checkbox" id="Agree" data-error="請勾選我同意會員條款" required>
           我同意 TRAVELFUNS <a href="#">會員條款</a>
   							</div>
   						</div>
   						<div class="form-group">
   							<div class="col-sm-12 text-center">
   								<input type="hidden" class="form-control" id="createdDate" name="createdDate" value="<?php echo date("Y-m-d H:i:s"); ?>">
   								<button type="submit" class="btn btn-default" style="width:200px;">確認送出</button>
   							</div>
   						</div>
   					</form>

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
