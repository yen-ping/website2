<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
$sth = $db->query("SELECT * FROM product WHERE productCategoryID=".$_GET['productCategoryID']);/* LIMIT ".$start_from.",". $limit*/
$all_product = $sth->fetchAll(PDO::FETCH_ASSOC);
$total = count($all_product);
/*$totalRows = count($all_news);*/
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>後台管理系統-TRAVELFUNS</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/adminstyle.css" rel="stylesheet" type="text/css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="../js/jquery-1.11.2.min.js"></script>

  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="../js/bootstrap.js"></script>
    <script src="../js/validator.min.js"></script>


  </head>
  <body>
    <div class="navbar navbar-default navbar-static-top" id="nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=	"#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <img src="images/whisky-logo.png" width="50" height="36" alt="" style="float:left; margin-top:10px;"/>
          <a class="navbar-brand" href="#">TRAVELFUNS</a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
          <ul class="nav navbar-nav navbar-left">
            <li ><a href="../page/list.php">頁面管理</a></li>
            <li ><a href="../news/list.php">最新優惠管理</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">訂單管理<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../order_management/list.php?status=0">未付款</a></li>
                <li><a href="../order_management/list.php?status=1">已付款</a></li>
                <li><a href="../order_management/list.php?status=2">交易完成</a></li>
                <li><a href="../order_management/list.php?status=3">取消訂單</a></li>
              </ul>
            </li>
            <li><a href="list.php">產品管理</a></li>
            <li><a href="../member_management/list.php">會員管理</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li></li>
            <li><a href="../logout.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          </ul>
        </div>
      </div>
    </div>



   <div class="section">
    <div class="container" id="area-contant">
    	 <div class="row">
          <div class="col-lg-12"><h1><strong>行程管理-列表</strong></h1></div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="list.php">主控台</a>
              </li>
              <li>
                <a href="list.php" class="active">行程管理</a>
              </li>
            </ul>
          </div>
        </div>
      <div class="row">
        <div class="col-md-12">
          <a href="add.php?productCategoryID=<?php echo $_GET['productCategoryID'];?>" class="btn btn-default">新增行程</a>
          <a href="../productcategory_management/list.php?productCategoryID=<?php echo $_GET['productCategoryID'];?>" class="btn btn-default">返回</a>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>促銷行程</th>
                <th>行程</th>
                <th>編輯</th>
                <th>刪除</th>
              </tr>
            </thead>
            <tbody>
            <?php if($total>0){ ?>
            <?php foreach ($all_product as $row) {?>
              <tr>
                <td><a href="../news/add.php?productID=<?php echo $row['productID']; ?>&productCategoryID=<?php echo $row['productCategoryID'];?>" onclick="if(!confirm('是否加入促銷商品？')){return false;};">加入</a></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="edit.php?productID=<?php echo $row['productID']; ?>&productCategoryID=<?php echo $row['productCategoryID'];?>">編輯</a></td>
                <td><a href="delete.php?productID=<?php echo $row['productID']; ?>&productCategoryID=<?php echo $row['productCategoryID'];?>" onclick="if(!confirm('是否刪除此筆資料？')){return false;};">刪除</a></td>
              </tr>
            <?php }}else{ ?>
              <tr>
                <td colspan="5">目前無資料，請新增一筆</td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
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
