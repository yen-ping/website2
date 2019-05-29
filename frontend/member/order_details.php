<?php
session_start();
require_once("../../connection/database.php");
$sth = $db->query("SELECT * FROM customer_order WHERE customer_orderID=".$_GET["no"]);
$customer_order= $sth->fetch(PDO::FETCH_ASSOC);

$sth2 = $db->query("SELECT * FROM order_details WHERE customer_orderID=".$_GET["no"]);
$order_details= $sth2->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>行程明細-會員專區</title>
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
      <h3>會員專區-行程明細<h3>
    </div>
    <div class="container" id="Membertable">
      <div class="row">
          <div class="row" id="MemberForm">

            <ul class="Category">
      					<li><a href='my_cart.php' class="btn btn-lg">返回上一頁</a></li>
      			</ul>

						<table id="order-tables">
            	<thead>
            		<tr>
            			<th width="15%">商品圖片</th>
            			<th width="30%">商品名稱</th>
									<th width="15%" class="price">單價</th>
            			<th width="15%" class="subtotal">小計</th>
            		</tr>
            	</thead>
              <tbody>
								<?php foreach ($order_details as $row){  ?>
                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
									<td data-title="商品圖片">
											<a href=""><img src="../../uploads/products/<?php echo $row['picture']; ?>" alt="" width="200" height="150"></a>
									</td>
									<td class="cart_description" data-title="商品名稱">
											<h4><a href="product_content.php?productID=<?php echo $row['productID']; ?>"><?php echo $row['name'] ?></a></h4>
									</td>
                  <td data-title="單價">NT$<?php echo $row['price']; ?></td>
									<td data-title="小計">NT$<?php echo $row['price']; ?></td>
                </tr>
							<?php } ?>

              </tbody>
            </table>
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
