<?php
require_once("../template/login_check.php");
	session_start();
	$id=$_GET['CartID'];

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>Untitled Document</title>
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
      <h3>修改訂單-會員專區<h3>
    </div>
    <div class="container" id="Membertable">
      <ul class="Category">
					<li><a href="member_edit.php">會員資料修改</a></li>
					<li><a href="my_cart.php">我的購物車</a></li>
					<li><a href="my_orders.php">我的訂單</a></li>
			</ul>
      <div class="row">
        <div class="row" id="MemberForm">
                <div class="col-md-12">
                  <form action="my_cart.php" method="post">
						         <input type="hidden" name="MM_update" value="QuantityEdit">

          						<table id="order-tables">
                      	<thead>
                      		<tr>
                      			<th width="15%">商品圖片</th>
                      			<th width="30%">商品名稱</th>
          									<th width="10%" class="price">單價</th>
                      			<th width="10%" class="quantity">數量</th>
                      			<th width="10%" class="subtotal">小計</th>
                            <th width="8%">更新</th>
                            <th width="8%">刪除</th>
                      		</tr>
                      	</thead>
                        <tbody>
          	                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
          										<td data-title="商品圖片">
          												<a href=""><img src="../../uploads/products/<?php echo $_SESSION['Cart'][$id]['picture']; ?>" alt="" width="200" height="150"></a>
          										</td>
          										<td class="cart_description" data-title="商品名稱">
          												<h4><a href=""><?php echo $_SESSION['Cart'][$id]['name']; ?></a></h4>
          										</td>
          	                  <td data-title="單價">$NT <?php echo $_SESSION['Cart'][$id]['price']; ?></td>
          	                  <td class="quantity" data-title="數量">
          												<input type="text" name="Quantity" value="<?php echo $_SESSION['Cart'][$id]['Quantity']; ?>" >
          										</td>
          										<td data-title="小計"><?php echo $_SESSION['Cart'][$id]['price']*$_SESSION['Cart'][$id]['Quantity']; ?></td>
          	                  <td data-title="更新">
          											<input type="hidden" name="CartID" value="<?php echo $_GET['CartID']; ?>">
          											<button type="submit" class="btn btn-default update" style=""><i class="fa fa-upload"></i></button>
          										</td>
          										<td data-title="刪除">
          											<button class="btn btn-default" href="#" ><i class="fa fa-times"></i></button>
          										</td>
          	                </tr>
                        </tbody>
                      </table>
    						<div class="edit-button">

    								<button type="submit" class="cart">確定修改</button>
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
