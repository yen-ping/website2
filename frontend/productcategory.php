<?php
session_start();
require_once('../connection/database.php');
$sth = $db->query("SELECT * FROM product WHERE productCategoryID=".$_GET['id']);/* LIMIT ".$start_from.",". $limit*/
$product = $sth->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../TRAVELFUN2-logo.png">
    <title><?php if($_GET['id']==4){echo "日本";} if($_GET['id']==5){echo "中國";} if($_GET['id']==3){echo "台灣";}  ?>旅遊-TRAVELFUN</title>
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style1.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" style="background-image:url('../assets/images/background-1756615_1920.jpg')">

    <?php require_once("template/nav.php"); ?>
                    <div  class="container-fluid" style="margin-top:70px; margin-bottom:20px; border-bottom:5px double #000;">
                      <div class="row text-center">
                        <h2><?php if($_GET['id']==4){echo "日本";} if($_GET['id']==5){echo "中國";} if($_GET['id']==3){echo "台灣";}  ?>地區</h2>
                        <p><?php if($_GET['id']==4){echo "日本";} if($_GET['id']==5){echo "中國";} if($_GET['id']==3){echo "國內";} ?>優質旅行</p>
                      </div>
                    </div>

                    <div id="services" class="container-fluid">
                      <div class="row slideanim">
                          <?php foreach ($product as $row) {  ?>
                              <div class="col-sm-4 col-xs-12">
                                <div class="panel panel-default text-center panelist">
                                    <div class="panel-heading">
                                      <h1><?php echo $row['name']; ?></h1>
                                    </div>
                                    <img src="../uploads/products/small/2<?php echo $row['picture']; ?>" width="100%"  alt=""/>
                                    <div class="panel-body">
                                      <?php echo mb_substr($row['description'],0,70,"utf-8")."..."; ?>
                                    </div>
                                    <div class="panel-footer">
                                      <h3>NT$<?php echo $row['price']; ?>起</h3>
                                      <a href="../product/index.php?id=<?php echo $row['productID']; ?>&id2=<?php echo $row['productCategoryID']; ?>" class="btn btn-lg">查看內容</a>
                                    </div>
                                </div>
                              </div>
                          <?php } ?>
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


  </body>
</html>
