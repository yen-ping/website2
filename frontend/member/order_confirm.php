<?php
	require_once("../template/login_check.php");
	require_once("../../connection/database.php");
	$sth = $db->query("SELECT * FROM member WHERE account="."'".$_SESSION["account"]."'");
	$member = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
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
      <h3>會員專區<h3>
    </div>
    <div class="container" id="Membertable">
      <div class="row">
          <div class="row" id="MemberForm">
						<ul class="Category">
							<li><a href="member_edit.php">會員資料修改</a></li>
							<li><a href="my_cart.php">我的購物車</a></li>
							<li><a href="my_orders.php">我的訂單</a></li>
						</ul>
				</div>
				<div class="row">
				<div id="OrderForm">
					<h1>商品資訊</h1>

						<table id="order-tables">
            	<thead>
            		<tr>
            			<th width="15%">商品圖片</th>
            			<th width="40%">商品名稱</th>
									<th width="22.5%" class="price">單價</th>
            			<th width="22.5%" class="subtotal">小計</th>
            		</tr>
            	</thead>
              <tbody>
							<?php
									$sumtotal=0;
									for ($i=0; $i < count($_SESSION['Cart']); $i++) {
								?>
                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
									<td data-title="商品圖片">
											<a href=""><img src="../../uploads/products/<?php echo $_SESSION['Cart'][$i]['picture']; ?>" alt="" width="200" height="150"></a>
									</td>
									<td class="cart_description" data-title="商品名稱">
											<h4><?php echo $_SESSION['Cart'][$i]['name'];?></h4>
									</td>
                  <td data-title="單價">$NT <?php echo $_SESSION['Cart'][$i]['price']; ?></td>
									<td data-title="小計">$NT <?php $subtotal=$_SESSION['Cart'][$i]['price'];echo $subtotal; ?></td>
                </tr>
							<?php $sumtotal+=$subtotal; } ?>
								<tr>
									<td colspan="3" style="text-align: right;font-weight:bold;">手續費</td>
									<td style="text-align: left;font-weight:bold;">$NT<?php if($sumtotal>1000) $shipping=0; else $shipping=150; echo $shipping;?></td>
								</tr>
								<tr>
									<td colspan="3" style="text-align: right;font-weight:bold;">總金額</td>
									<td style="text-align: left;font-weight:bold;">$NT <?php echo $sumtotal; ?></td>
								</tr>
              </tbody>
            </table>
						<hr>
						<h1>訂購資訊</h1>
						<div id="OrderForm">
							<div class="col-md-12">
		            <form class="form-horizontal" role="form" action="order_success.php" method="post">
		              <input type="hidden" class="form-control" name="MM_insert" value="AddForm">
		              <div class="form-group">
		                <div class="col-sm-2">
		                  <label for="name" class="control-label">客戶名字</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $member['name']; ?>" required>
		                </div>
		              </div>
									<div class="form-group">
		                <div class="col-sm-2">
		                  <label for="phone" class="control-label">聯絡電話</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $member['phone']; ?>" required>
		                </div>
		              </div>

									<div class="form-group">
		                <div class="col-sm-2">
		                  <label for="email" class="control-label">E-mail</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $member['email']; ?>">
											<input type="hidden" name="orderNO" value="<?php echo 'SH'.date('YmdHis'); ?>">
											<input type="hidden" name="orderDate" value="<?php echo date('Y-m-d H-i-s'); ?>">
											<input type="hidden" name="memberID" value="<?php echo $member['memberID']; ?>">
											<input type="hidden" name="totalPrice" value="<?php echo $sumtotal;?>">
											<input type="hidden" name="processingFee" value="<?php echo $shipping;?>">
											<input type="hidden" name="createdDate" value="<?php echo date('Y-m-d H-i-s'); ?>">
										</div>
		              </div>
		              <div class="form-group">
		                <div class="col-sm-10 col-sm-offset-2 text-right">
		                  <button type="submit" class="edit-button cart">確定結帳</button>
		                </div>
		              </div>
		            </form>
		          </div>
						</div>
				</div>
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
