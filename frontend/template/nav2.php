<nav class="navbar navbar-default navbar-fixed-top" >
      <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a href="../../index.php#myPage"><img src="../../assets/images/travel2.png" width="80" height="50" alt=""/></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" style="margin-left:10px;">
          <!--<li><a href="frontend/member/logout.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
          <?php if(!isset($_SESSION['account'])){ ?>
            <li><a href="member_apply.php"><span class="glyphicon glyphicon-log-in"></span>加入會員</a></li>
            <li><a href="member_login2.php"><span class="glyphicon glyphicon-log-in"></span>會員登入</a></li>
          <?php }else{ ?>
            <li><a href="my_cart.php"><span class="glyphicon glyphicon-log-in"></span>會員專區</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>會員登出</a></li>
            <li><a href="member_edit.php"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a></li>
          <?php } ?>

        </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="../../index.php#news">最新優惠</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">旅遊地區 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="color-white"><a href="../productcategory.php?id=3">台灣地區</a></li>
          <li class="color-white"><a href="../productcategory.php?id=4">日本地區</a></li>
          <li class="color-white"><a href="../productcategory.php?id=5">大陸地區</a></li>
          </ul>
      </li>
      <li><a href="#">自由行</a></li>
      <li><a href="../../index.php#contact">聯絡專區</a></li>
      </ul>

      </div>
      </div>
</nav>
