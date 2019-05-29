<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
$sql= "INSERT INTO customer_order
				(memberID,orderNO,orderDate,totalPrice,processingFee,name,phone,email,createdDate) VALUES (
				:memberID,
				:orderNO,
				:orderDate,
				:totalPrice,
				:processingFee,
				:name,
				:phone,
				:email,
				:createdDate)";
	$sth = $db ->prepare($sql);
	$sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
	$sth ->bindParam("orderNO", $_POST['orderNO'], PDO::PARAM_STR);
	$sth ->bindParam(":orderDate", $_POST['orderDate'], PDO::PARAM_STR);
	$sth ->bindParam(":totalPrice", $_POST['totalPrice'], PDO::PARAM_INT);
	$sth ->bindParam(":processingFee", $_POST['processingFee'], PDO::PARAM_INT);
	$sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
	$sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
	$sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
	$sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
	$sth -> execute();
	$sth2 = $db->query("SELECT * FROM customer_order WHERE memberID=".$_POST["memberID"]." ORDER BY createdDate DESC");
	$last_order = $sth2->fetch(PDO::FETCH_ASSOC);

for ($i=0; $i < count($_SESSION['Cart']); $i++) {
	$sql= "INSERT INTO order_details
					(customer_orderID,productID,picture,name,price,createdDate) VALUES (
					:customer_orderID,
					:productID,
					:picture,
					:name,
					:price,
					:createdDate)";
		$sth = $db ->prepare($sql);
		$sth ->bindParam(":customer_orderID", $last_order['customer_orderID'], PDO::PARAM_INT);
		$sth ->bindParam("productID", $_SESSION['Cart'][$i]['productID'], PDO::PARAM_INT);
		$sth ->bindParam(":picture", $_SESSION['Cart'][$i]['picture'], PDO::PARAM_STR);
		$sth ->bindParam(":name",  $_SESSION['Cart'][$i]['name'], PDO::PARAM_STR);
		$sth ->bindParam(":price",  $_SESSION['Cart'][$i]['price'], PDO::PARAM_INT);
		$sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
		$sth -> execute();
}

unset($SESSION['Cart']);
//寄信會員(管理者)

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>訂單加入成功-會員專區</title>
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
      <h3>會員專區<h3>
    </div>
    <div class="container" id="Membertable">
      <div class="row">
          <div class="row" id="MemberForm">
						<h3>
							您已成功預定行程，請至「<a href="my_orders.php">預定行程</a>」查詢預定行程進度。
						</h3>
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
