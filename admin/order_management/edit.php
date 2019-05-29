<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == "UPDATE"){
      $sql= "UPDATE customer_order SET status =:status,
                updatedDate = :updatedDate WHERE customer_orderID=:customer_orderID";
      $sth = $db ->prepare($sql);
      $sth ->bindParam(":status", $_POST['status'], PDO::PARAM_INT);
      $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
      $sth ->bindParam(":customer_orderID", $_POST['customer_orderID'], PDO::PARAM_INT);
      $sth -> execute();

      header('Location: list.php?status='.$_POST['status']);
    }
    $sth = $db->query("SELECT * FROM customer_order WHERE customer_orderID=".$_GET['ID']);
    $orderone = $sth->fetch(PDO::FETCH_ASSOC);
    $status=$orderone['status'];
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
                <li><a href="list.php?status=0">未付款</a></li>
                <li><a href="list.php?status=1">已付款</a></li>
                <li><a href="list.php?status=2">交易完成</a></li>
                <li><a href="list.php?status=3">取消訂單</a></li>
              </ul>
            </li>
            <li><a href="../productcategory_management/list.php">產品管理</a></li>
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
          <div class="col-lg-12"><h1><strong>訂單管理-<?php switch ($status) {
            case 0:
              echo "未付款";
              break;
            case 1:
              echo "已付款";
              break;
            case 2:
              echo "行程進行中";
              break;
            case 3:
              echo "交易完成";
              break;

          } ?>編輯</strong></h1></div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="#">主控台</a>
              </li>
              <li>
                <a href="#" class="active">最新優惠管理</a>
              </li>
            </ul>
          </div>
        </div>
      <div class="row">
        <div class="col-md-12">
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" role="form" data-toggle="validator" action="edit.php" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="updatedDate" class="control-label">訂單日期</label>
                </div>
                <div class="col-sm-10">
                  <?php echo $orderone['orderDate']; ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="title" class="control-label">訂單編號</label>
                </div>
                <div class="col-sm-10">
                  <?php echo $orderone['orderNO']; ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="status" class="control-label">訂單狀態</label>
                </div>
                <div class="col-sm-10">
                    <input type="radio" name="status" value="0" <?php if($orderone['status']==0) echo "checked"; ?>>未付款
                    <input type="radio" name="status" value="1" <?php if($orderone['status']==1) echo "checked"; ?>>已付款出貨中
                    <input type="radio" name="status" value="2" <?php if($orderone['status']==2) echo "checked"; ?>>交易完成
                    <input type="radio" name="status" value="3" <?php if($orderone['status']==3) echo "checked"; ?>>取消訂單
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="title" class="control-label">訂購人</label>
                </div>
                <div class="col-sm-10">
                    <?php  echo $orderone['name']; ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="customer_orderID" value="<?php echo $orderone['customer_orderID'] ?>">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="updatedDate" value="<?php echo date('Y-m-d H-i-s'); ?>">
                  <button type="submit" class="btn btn-primary">送出</button>
                </div>
              </div>
            </form>
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
