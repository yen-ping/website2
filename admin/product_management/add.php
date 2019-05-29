<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    if (!file_exists('../../uploads/products')) mkdir('../../uploads/products', 0755, true);
    $path = $_FILES['picture']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    //重新命名, 2位數加時間
    $filename = rand(10,100).date('His').".".$ext;
    move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/products/".$filename);   // 搬移上傳檔案
  }
if (isset($_POST["MM_insert"]) && $_POST["MM_insert"] == "INSERT") {
  $sql= "INSERT INTO product
          (name,
          price,
          productCategoryID,
          picture,
          day,
          description,createdDate) VALUES (
          :name,
          :price,
          :productCategoryID,
          :picture,
          :day,
          :description,:createdDate)";
    $sth = $db ->prepare($sql);
    $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
    $sth ->bindParam("price", $_POST['price'], PDO::PARAM_STR);
    $sth ->bindParam("productCategoryID", $_POST['productCategoryID'], PDO::PARAM_STR);
    $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
    $sth ->bindParam(":day", $_POST['day'], PDO::PARAM_STR);
    $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
    $sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
    $sth -> execute();

  header("Location: list.php?productCategoryID=".$_POST['productCategoryID']);
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
    <link href="../../assets/js/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../../tinymce/skins/lightgray/skin.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../assets/js/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="../../tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
    $( function() {
      $( "#publishedDate" ).datepicker({
          dateFormat: "yy-mm-dd"
        });
    } );
      //textarea
      tinymce.init({
          selector: 'textarea',
          height: 500,
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help'
          ],
          toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
        });
    </script>


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
          <div class="col-lg-12"><h1><strong>地區分類管理-新增</strong></h1></div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="list.php">主控台</a>
              </li>
              <li>
                <a href="add.php" class="active">新增地區分類</a>
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
                  <label for="picture" class="control-label">產品圖片</label>
                </div>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="picture" name="picture" data-error="未選擇任何檔案" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">行程名稱</label>
                </div>
                <div class="col-sm-10">
                  <input type="input" class="form-control" id="name" name="name" data-error="請輸入行程名稱" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="price" class="control-label">行程價格</label>
                </div>
                <div class="col-sm-10">
                  <input type="input" class="form-control" id="price" name="price" data-error="請輸入行程價格" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="day" class="control-label">行程天數</label>
                </div>
                <div class="col-sm-10">
                  <input type="input" class="form-control" id="day" name="day" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="description" class="control-label">行程說明</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="description" name="description" data-minlength="6"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="productCategoryID" value="<?php echo $_GET['productCategoryID']; ?>">
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
