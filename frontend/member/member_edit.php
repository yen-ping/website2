<?php
    require_once("../template/login_check.php");
   require_once("../../connection/database.php");
	 if(isset($_POST['MM_update']) && $_POST['MM_update'] == "UPDATE"){
      $sql= "UPDATE member SET
                name = :name,
                birthday = :birthday,
                phone = :phone,
                email = :email,
                address = :address,
                updatedDate = :updatedDate WHERE memberID=:memberID";
      $sth = $db ->prepare($sql);
      $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
      $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
      $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
      $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
      $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
      $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
      $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
      $sth -> execute();
      header('Location: member_edit.php?memberID='.$_POST['memberID']);
    }
		$sth = $db->query("SELECT * FROM member WHERE memberID=".$_SESSION['memberID']);
    $member = $sth->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>修改資料-會員專區</title>
    <!-- Bootstrap -->
	<link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
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
    <script type="text/javascript">
      $( function() {
        $( "#birthday" ).datepicker({
            dateFormat: "yy-mm-dd"
          });
      });
  </script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <?php require_once("../template/nav2.php"); ?>
    <div class="container-fluid" id="member_banner">
        <div class="row">
          <img src="../../assets/images/cal/product-img_03.jpg" alt="">
        </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div id="mebmer_title">
          <h3>會員專區<h3>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <ul class="col-sm-12 Category">
  					<li><a href="member_edit.php">會員資料修改</a></li>
  					<li><a href="my_cart.php">我的購物車</a></li>
  					<li><a href="my_orders.php">下單行程</a></li>
  			</ul>
      </div>
    </div>
    <div class="container-fluid" id="Membertable">

        <div class="row" id="MemberForm">
                <div class="col-md-12">
                  <form class="form-horizontal" role="form" action="member_edit.php" method="post" data-toggle="validator">
  						<input type="hidden" name="MM_update" value="EditForm">

  						<table>
  								<tr>
  									<th>帳號：</th>
  									<td><?php echo $member['account']; ?></td>
  								</tr>
  								<tr>
  									<th>姓名：</th>
  									<td>
  										<input type="text" name="name" value="<?php echo $member['name']; ?>">
  										<div class="help-block with-errors"></div>
  									</td>
  								</tr>
  								<tr>
  									<th>性別：</th>
  									<td>
  										<input type="radio" name="Gender" value="0" checked="true"> 男
  										<input type="radio" name="Gender" value="1" > 女
  									</td>
  								</tr>
                  <tr>
  									<th>生日：</th>
  									<td><input type="input" class="form-control" id="birthday" name="birthday" value="<?php echo $member['birthday']; ?>"></td>
  								</tr>
  								<tr>
  									<th>EMAIL：</th>
  									<td><input type="email" name="email" value="<?php echo $member['email']; ?>"></td>
  								</tr>
  								<tr>
  									<th>行動電話：</th>
  									<td><input type="text" name="phone" value="<?php echo $member['phone']; ?>"></td>
  								</tr>
  								<tr>
  									<th>地址：</th>
  									<td><input type="text" name="address" value="<?php echo $member['address']; ?>"></td>
  								</tr>
  								<tr>
  									<input type="hidden" name="memberID" value="<?php echo $member['memberID'] ?>">
                    <input type="hidden" name="MM_update" value="UPDATE">
  									<input type="hidden" name="updatedDate" value="<?php echo date('Y-m-d H-i-s'); ?>">
  									<td colspan="2" align="center"><input type="submit" value="更新資料" id="submit" ></td>
  								</tr>
  						</table>
  					</form>

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
