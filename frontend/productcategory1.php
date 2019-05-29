<?php
require_once('../connection/database.php');
$sth = $db->query("SELECT * FROM product WHERE productCategoryID=".$_GET['id']);/* LIMIT ".$start_from.",". $limit*/
$product = $sth->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/validator.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css">
    <script>
      $(function(){
      	$('.hoverA').hover(
          function(){
            //滑入
            $(this).find('img').animate({opacity: 0.5},100);
          },
          function(){
            //滑出
            $(this).find('img').animate({opacity: 1},100);
          }
        )

      });
      </script>

  </head>
<body>
<div id="navbar1" class="bounceInDown">
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">TRAVELFUNS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">公司經營理念</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">國外旅遊<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="foreign.php">日本</a></li>
            <li><a href="#2">大陸</a></li>
            <li><a href="#3">東南亞</a></li>
            <li><a href="#4">歐洲</a></li>
          </ul>
        </li>
        <li><a href="domestic.php">國內旅遊</a></li>
        <li><a href="#5">聯絡方式</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#6"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="frontend/member_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div class="jumbotron text-center title">
  <h1 class="bounceInDown"><?php if($_GET['id']==3) echo "國內旅遊"; else echo "日本旅遊"; ?></h1>
</div>

  <div class="container">
    <div class="row">
      <?php foreach ($product as $row) {
        ?>
      <div class="col-sm-4 hoverA" >
        <a href="product.php?id=<?php echo $row['productID'];?>&id2=<?php echo $row['productCategoryID'];?>"><img src="../uploads/products/<?php echo $row['picture'];?>" style="height:200px; weight:120px;" alt=""></a>
        <h3><?php echo $row['name']; ?></h3>
        <p>NT$<?php echo $row['price']; ?></p>
        <p><?php echo mb_substr($row['description'],0,100,"utf-8")."..."; ?></p>
        <button type="button" class="btn btn-info" style="margin-left:30%;"><a href="product.php?id=<?php echo $row['productID'];?>&id2=<?php echo $row['productCategoryID'];?>" class="more">查看更多</a></button>
      </div>
    <?php } ?>
    </div>
  </div>
  <hr>
  <div class="container" style="height:10px;">
    <div class="row">
    </div>
  </div>

    <footer class="section section-primary" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>TRAVELFUNS</h1>
            <p contenteditable="true">版權所有 © 2017 &nbsp; St WHISKYBAR All Right Reserved.</p>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
