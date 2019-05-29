<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
$sth = $db->query("SELECT * FROM customer_order WHERE memberID=".$_SESSION["memberID"]);
$customer_orders= $sth->fetchALL(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>我的訂單-會員專區</title>
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
    <div class="container-fluid">
      <div class="row">
        <div id="mebmer_title">
          <h3>我的訂單<h3>
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
        <div class="row">
                <div class="col-md-12 col-sm-12">
                  <table id="order-tables">
                        	<thead>
                        		<tr>
                        			<th width="15%">訂購日期</th>
                        			<th width="40%">訂單編號</th>
                              <th width="10%">總金額</th>
                              <th width="10%">手續費</th>
                        			<th width="15%">訂單狀態</th>
                              <th width="10%" style="border-right:1px solid #ebebeb;">查看明細</th>
                        		</tr>
                        	</thead>
                          <tbody>
  													<?php foreach ($customer_orders as $order){  ?>
                            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                              <td data-title="訂購日期"><?php echo $order['orderDate']; ?></td>
                              <td data-title="訂單編號"><?php echo $order['orderNO']; ?></td>
                              <td data-title="總金額">$NT <?php echo $order['totalPrice']; ?></td>
                              <td data-title="運費">$NT <?php echo $order['processingFee']; ?></td>
                              <td data-title="訂單狀態"><?php switch ($order['status']) {
                              	case 0:
                              		echo "未付款";
                              		break;
  															case 1:
  	                            	echo "已付款";
  	                            	break;
  															case 2:
  	                            	echo "交易完成";
  	                            	break;
  															case 3:
  																echo "取消訂單";
  																break;
                              }?>
                              </td>
                              <td data-title="觀看明細" style="border-right:1px solid #ebebeb;"><a href="order_details.php?no=<?php echo $order['customer_orderID']; ?>">觀看明細</a></td>
                            </tr>
  													<?php } ?>
                          </tbody>
                        </table>
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
