<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");

if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    if (!file_exists('../../uploads/members')) mkdir('../../uploads/members', 0755, true);
    $path = $_FILES['picture']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    //重新命名, 2位數加時間
    $filename = rand(10,100).date('His').".".$ext;
    move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/members/".$filename);   // 搬移上傳檔案
  }

if (isset($_POST["MM_insert"]) && $_POST["MM_insert"] == "INSERT") {
  $sql= "INSERT INTO member
          (account,
           password,
           name,
           phone,
           email,
           address,
           picture,
          createdDate) VALUES (
          :account,
          :password,
          :name,
          :phone,
          :email,
          :address,
          :picture,
          :createdDate)";
    $sth = $db ->prepare($sql);
    $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
    $sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
    $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
    $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
    $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
    $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
    $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
    $sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
    $sth -> execute();

  header('Location: list.php');
}

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
            <li><a href="../productcategory_management/list.php">產品管理</a></li>
            <li><a href="list.php">會員管理</a></li>
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
          <div class="col-lg-12"><h1><strong>會員管理-新增</strong></h1></div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="list.php">主控台</a>
              </li>
              <li>
                <a href="add.php" class="active">新增會員</a>
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
          <form class="form-horizontal" role="form" data-toggle="validator" action="add.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="picture" class="control-label">會員照片</label>
                </div>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="picture" name="picture" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">會員姓名</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name"  required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="account" class="control-label">帳號</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="account" name="account" data-error="" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="password" class="control-label">密碼</label>
                </div>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" data-error="" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="phone" class="control-label">電話</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="phone" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="email" class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email"  required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="address" class="control-label">地址</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" name="address"  required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_insert" value="INSERT">
                  <input type="hidden" name="createdDate" value="<?php echo date('Y-m-d H-i-s'); ?>">
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
