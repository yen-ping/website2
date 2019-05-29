<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == "UPDATE"){
     $sql= "UPDATE page SET publishedDate =:publishedDate,
               title = :title,
               content = :content
                WHERE pageID=:pageID";
     $sth = $db ->prepare($sql);
     $sth ->bindParam(":publishedDate", $_POST['publishedDate'], PDO::PARAM_STR);
     $sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
     $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
     $sth ->bindParam(":pageID", $_POST['pageID'], PDO::PARAM_INT);
     $sth -> execute();

     header('Location: list.php');
   }
   $sth = $db->query("SELECT * FROM page WHERE pageID=".$_GET['pageID']);
   $page = $sth->fetch(PDO::FETCH_ASSOC);


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
            <li ><a href="list.php">頁面管理</a></li>
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
          <div class="col-lg-12"><h1><strong>最新優惠管理</strong></h1></div>
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
                  <label for="publishedDate" class="control-label">更新日期</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="publishedDate" name="publishedDate" value="<?php echo date('Y-m-d'); ?>" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="title" class="control-label">標題</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $page['title']; ?>" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="content" class="control-label">內容</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="content" name="content" data-minlength="6"><?php echo $page['content']; ?></textarea>
                  <div class="help-block">最少輸入6字元</div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="pageID" value="<?php echo $page['pageID'] ?>">
                  <input type="hidden" name="MM_update" value="UPDATE">
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
