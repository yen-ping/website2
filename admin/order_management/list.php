<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
$limit = 10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sth = $db->query("SELECT * FROM customer_order WHERE status=".$_GET['status']." ORDER BY orderDate DESC LIMIT ".$start_from.",". $limit);
$all_order = $sth->fetchAll(PDO::FETCH_ASSOC);
$totalRows = count($all_order);
$status = $_GET['status'];
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
              echo "交易完成";
              break;
            case 3:
              echo "取消訂單";
              break;

          } ?></strong></h1></div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="list.php">主控台</a>
              </li>
              <li>
                <a href="list.php" class="active">訂單管理</a>
              </li>
            </ul>
          </div>
        </div>
      <div class="row">
        <div class="col-md-12">
          <a href="add.php" class="btn btn-default">新增一筆</a>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                  <th>訂單日期</th>
                  <th>訂單編號</th>
                  <th>訂購人</th>
                  <th>行動電話</th>
                  <th>地址</th>
                  <th>金額</th>
                  <th>編輯</th>
                  <th>交易狀態</th>
              </tr>
            </thead>
            <tbody>
            <?php if($totalRows>0){ ?>
            <?php foreach ($all_order as $row) {?>
              <tr>
                    <td><?php echo $row["orderDate"]; ?></td>
                    <td><?php echo $row["orderNO"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["totalPrice"]; ?></td>
                    <td><a href="edit.php?ID=<?php echo $row["customer_orderID"];?>">編輯</a></td>
                    <td>
                      <?php $num=$row["status"];
                            switch ($num) {
                                case '0':
                                  echo "未付款";
                                  break;
                                case '1':
                                  echo "已付款";
                                  break;
                                case '2':
                                  echo "交易完成";
                                  break;
                                case '3':
                                  echo "取消訂單";
                                  break;
                                default:
                                  echo "錯誤";
                                  break;
                              }
                      ?>
                    </td>
                  </tr>
              <?php }}else { ?>
                <tr>
                      <td colspan="8" style="padding-left:40%;"><strong>尚未有訂單資料。</strong></td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
	  </div>
  </div>

  <div class="section">
        <div class="container">
          <?php  if($totalRows > 0){
             $sth = $db->query("SELECT * FROM customer_order WHERE status=".$_GET['status']." ORDER BY orderDate DESC");
             $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
             $total_pages = ceil($data_count / $limit);
            ?>
          <div class="row">
            <div class="col-md-12 text-center">
              <ul class="pagination">
                <?php   if($page > 1){ ?>
               <li>
                 <a href="list.php?page=<?php echo $page-1;?>">上一頁</a>
               </li>
               <?php }else{ ?>
                 <li>
                   <a href="#">上一頁</a>
                 </li>
                 <?php } ?>
                 <?php for ($i=1; $i<=$total_pages; $i++) { ?>
                    <li>
                      <a href="list.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                  <?php } ?>
                <?php if($page < $total_pages){ ?>
                <li>
                  <a href="list.php?page=<?php echo $page+1;?>">下一頁</a>
                </li>
                <?php }else{ ?>
                  <li>
                    <a href="#">下一頁</a>
                  </li>
                  <?php } ?>
              </ul>
            </div>
          </div>
          <?php } ?>
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
