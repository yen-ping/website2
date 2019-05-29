<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");

if(isset($_POST['MM_update']) && $_POST['MM_update'] == "UPDATE"){

  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){

   //取得檔名
   $path = $_FILES['picture']['name'];
   //取得副檔名
   $ext = pathinfo($path, PATHINFO_EXTENSION);
   //重新命名, 2位數加時間
   $filename = rand(10,100).date('His').".".$ext;
   move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/members/".$filename);   // 搬移上傳檔案

 }else{
   $filename = $_POST['picture1'];
 }

   $sql= "UPDATE member SET
             picture = :picture,
             phone = :phone,
             email = :email,
             address = :address,
             updatedDate = :updatedDate WHERE memberID=:memberID";
   $sth = $db ->prepare($sql);
   $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
   $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
   $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
   $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
   $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
   $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
   $sth -> execute();
   header('Location: list.php');
 }
 $sth = $db->query("SELECT * FROM member WHERE memberID=".$_GET['memberID']);
 $member = $sth->fetch(PDO::FETCH_ASSOC);

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
          <div class="col-lg-12"><h1><strong>會員管理-編輯</strong></h1></div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="list.php">主控台</a>
              </li>
              <li>
                <a href="edit.php?memberID=<?php echo $member['memberID'];?>" class="active">編輯會員</a>
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
          <form class="form-horizontal" role="form" data-toggle="validator" action="edit.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="picture" class="control-label">會員照片</label>
                </div>
                <div class="col-sm-10">
                  <img src="../../uploads/members/<?php echo $member['picture'];?>"><?php echo "<br>".$member['picture']; ?>
                  <input type="file" class="form-control" id="picture" name="picture" required>
                  <input type="hidden" name="picture1" value="<?php echo $member['picture']; ?>">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">會員姓名</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $member['name']; ?>"  required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">會員帳號</label>
                </div>
                <div class="col-sm-10">
                  <?php echo $member['account']; ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="phone" class="control-label">電話</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $member['phone']; ?>" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="email" class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $member['email']; ?>"  required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="address" class="control-label">地址</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" name="address" value="<?php echo $member['address']; ?>"  required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="memberID" value="<?php echo $member['memberID'] ?>">
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
