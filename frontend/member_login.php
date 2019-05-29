<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../TRAVELFUN2-logo.png">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/validator.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="../../assets/js/jquery-ui/jquery-ui.min.js"></script>
    <link href="../../assets/js/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css">

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">

  </head>
<body>
<div class="navbar1">
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#1">Page 1-1</a></li>
            <li><a href="#2">Page 1-2</a></li>
            <li><a href="#3">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#4">Page 2</a></li>
        <li><a href="#5">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#6"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="frontend/member/member_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

</div>

<div class="jumbotron text-center">
  <h1>會員登入</h1>
</div>
<div class="row" id="MemberForm">
        <div class="col-md-12">
       <form action="login.php" method="post" data-toggle="validator">
         <div class="form-group">
           <div class="col-sm-2">
             <label for="Account" class="control-label">帳號</label>
           </div>
           <div class="col-sm-10">
             <input type="email" class="form-control" id="Account" name="account"  style="margin-bottom:10px;" data-error="請輸入帳號" required>
             <div class="help-block with-errors"></div>
           </div>
         </div>
         <div class="form-group">
           <div class="col-sm-2">
             <label for="Password" class="control-label">密碼</label>
           </div>
           <div class="col-sm-10">
             <input type="password" class="form-control" id="Password" name="password"  pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,12}$" data-minlength="6" data-error="請至少輸入一個英文，長度至少6個英文數字為密碼，最多12個" required>
             <div class="help-block with-errors"></div>
           </div>
         </div>

         <div class="form-group">
           <div class="col-sm-12 text-center">
             <input type="hidden" name="MM_login" value="LOGIN">
             <button type="submit" class="btn btn-default" style="width:200px;">登入</button>
             <a href="forget_password.php" style="margin-left:30px;">忘記密碼?</a>
           </div>
         </div>
       </form >
       <hr>
       <h1>社群登入</h1>
       <form action="apply_success.php" style="width:50%; left:auto; right:auto;" >
         <input class="facebook" type="submit" value="facebook 登入" id="submit">
       </form>
       </div>
     </div>



</body>
</html>
