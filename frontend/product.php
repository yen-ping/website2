<?php
session_start();
require_once('../connection/database.php');
$sth = $db->query("SELECT * FROM product WHERE productCategoryID=".$_GET['id2']);/* LIMIT ".$start_from.",". $limit*/
$All_product = $sth->fetchAll(PDO::FETCH_ASSOC);
$sth2 = $db->query("SELECT * FROM product WHERE productID=".$_GET['id']);/* LIMIT ".$start_from.",". $limit*/
$product = $sth2->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../TRAVELFUN2-logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $product['name']; ?>-TRAVELFUN</title>
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style1.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
    <?php
          if(isset($_GET['Existed']) && $_GET['Existed'] != null){
        if($_GET['Existed'] == 'true'){
          echo "<script>alert('此商品已存在購物車。')</script>";
        }else{
          echo "<script>alert('成功加入購物車!')</script>";
        }
      }
   ?>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <?php require_once("template/nav.php"); ?>


                    <div id="<?php if($_GET['id']==3) echo '#portfolio'; else echo '#services'; ?>" class="container-fluid">
                      <div class="text-center">
                        <h3>--------</h3>
                      </div>
                      <div class="row slideanim">
                        <div class="col-sm-2 col-xs-12">
                          <div class="panel panel-default text-center">

                            <div class="panel-body">
                              <h3>相關行程</h3>
                            </div>
                            <div class="panel-footer">

                              <?php foreach ($All_product as $row ) { ?>
                              <a href="product.php?id=<?php echo $row['productID'];?>&id2=<?php echo $row['productCategoryID'];?>"><h3 id="namehover"><?php echo $row['name']; ?></h3></a>
                              <?php } ?>

                              <button class="btn btn-lg"><a href="productcategory.php?id=<?php echo $row['productCategoryID'];?>">返回上一層</a></button>
                            </div>

                          </div>
                        </div>
                        <div class="col-sm-10 col-xs-12">
                          <div class="panel panel-default" >
                            <div class="panel-heading text-center">
                              <h1><?php echo $product['name']; ?></h1>
                            </div>
                            <div class="panel-body">
                              <img src="../uploads/products/<?php echo $product['picture']; ?>" width="100%" alt="">
                              <?php echo $product['description']; ?>
                            </div>
                            <div class="panel-footer">
                              <form  action="addCart.php" method="post">
                  							<table id="ProductTable">
                  								<tr>
                  									<td><strong>價格：NT$<?php echo $product['price']; ?></strong></td>
                  								</tr>
                  								<tr>
                                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                    <input type="hidden" name="picture" value="<?php echo $product['picture']; ?>">
                                    <input type="hidden" name="productID" value="<?php echo $product['productID']; ?>">
                                    <input type="hidden" name="productCategoryID" value="<?php echo $product['productCategoryID']; ?>">
                                    <?php
                                    if(!isset($_SESSION['account'])&&!isset($_SESSION['memberID'])){
                                      echo "<td><a href='member/member_login2.php' class='cart' style='text-align:center;'>登入會員</a></td>";
                                    } else{?>
                  									<td ><input type="submit" class="cart" value="加入購物車"></td>
                                  <?php  }?>
                  								</tr>
                  							</table>
                  						</form>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>



                      <div class="container-fluid" id="footer">
                        <div class="row">
                        <div class="col-sm-2"></div>
                             <div class="col-sm-6">
                                <h1>TRAVELFUNS</h1>
                                <p contenteditable="true">版權所有 © 2017 &nbsp; St WHISKYBAR All Right Reserved.</p>
                              </div>
                        </div>
                      </div>

			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->

  </body>
</html>
