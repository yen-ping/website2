<?php
  require_once("../template/login_check.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../TRAVELFUN2-logo.png">
    <title>購物車-TRAVELFUN</title>
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
    <script type="text/javascript">
      $( function() {
        $( "#birthday" ).datepicker({
            dateFormat: "yy-mm-dd"
          });
      });
  </script>
  <?php
        if(isset($_GET['Existed']) && $_GET['Existed'] != null){
        if($_GET['Existed'] == 'false'){
          echo "<script>alert('成功加入購物車!')</script>";
        }elseif ($_GET['Existed'] == 'delete') {
          echo "<script>alert('成功刪除訂單!')</script>";
        }else{
          echo "<script>alert('此商品已存在購物車。')</script>";
        }
      }
   ?>
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
    <div class="container-fluid" style="margin-top:5px;">
      <div class="row">
        <ul class="col-sm-12 Category">
  					<li><a href="member_edit.php">會員資料修改</a></li>
  					<li><a href="my_cart.php">我的購物車</a></li>
  					<li><a href="my_orders.php">下單行程</a></li>
  			</ul>
      </div>
    </div>
    <div class="container-fluid" id="Membertable" style="margin-bottom:5px;">
      <div class="row">
            <div class="col-md-12 col-sm-12">
                <table id="order-tables">
            	<thead>
            		<tr>
            			<th width="25%">商品圖片</th>
            			<th width="30%">商品名稱</th>
            			<th width="10%" class="subtotal">小計</th>
                  <th width="10%">更新</th>
                  <th width="10%">刪除</th>
            		</tr>
            	</thead>
              <tbody>
									<?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){
										$sumtotal=0;
										?>
										<?php for ($i=0; $i < count($_SESSION['Cart']); $i++) { ?>
											<tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
												<td data-title="商品圖片">
														<a href=""><img src="../../uploads/products/<?php echo $_SESSION['Cart'][$i]['picture']; ?>" alt="" width="200" height="150"></a>
												</td>
												<td class="cart_description" data-title="商品名稱">
														<h4><a href="#"><?php echo $_SESSION['Cart'][$i]['name'];?></a></h4>
												</td>

												<td data-title="小計">NT$ <?php $subtotal=$_SESSION['Cart'][$i]['price']; echo $subtotal; ?></td>
			                  <td data-title="更新">
													<a href="my_cart_edit.php?CartID=<?php echo $i;?>" class="btn btn-default update" style=""><i class="fa fa-upload"></i></a>
												</td>
												<td data-title="刪除">
													<a class="btn btn-default" href="../deleteCart.php?CartID=<?php echo $i;?>" onclick="if(!confirm('是否刪除此商品？')){return false;};" ><i class="fa fa-times"></i></a>
												</td>
			                </tr>
										<?php $sumtotal+=$subtotal; } ?>
											<tr>
														<td colspan="4" style="text-align: right;font-weight:bold;">手續費</td>
														<td style="text-align: left;font-weight:bold;">$NT<?php if($sumtotal>1000) echo "0"; else echo "150";?></td>
													</tr>
													<tr>
														<td colspan="4" style="text-align: right;font-weight:bold;">總金額</td>
														<td style="text-align: left;font-weight:bold;">$NT <?php echo $sumtotal; ?></td>
													</tr>
														<tr>
															<td colspan="5" >
																	<input type="hidden" name="" value="">
																	<input type="hidden" name="freight" value="<?php if($sumtotal>1000) echo "0"; else echo "150";?>">
																	<input type="hidden" name="totoal" value="<?php echo $sumtotal; ?>">
																	<a href="order_confirm.php" class="edit-button cart">我要結帳</a>
															</td>
												</tr>
										<?php }else{ ?>
									<tr>
										<td colspan="6">
											目前購物車無商品，請<a href="../../index.php">前往首頁</a>選購商品。
										</td>
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
