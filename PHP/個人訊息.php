
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>個人訊息</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/個人訊息.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <style>
        body {
            background-image: url('../Picture/1.jfif');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }
    </style>

</head>

<body>
<?php
    require_once('connect.php');
    session_start();
    checksession();
    if($_SESSION['user'] == NULL){
        $sign = "Sign In";
    }
    else{
        $sign = "$_SESSION[user]";
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="首頁.php" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="../HTML/登入.html" class="nav-link"><?php echo $sign;?> </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">我的首頁 |</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="../HTML/搜尋.html" class="nav-link">搜尋 |</a>
                </li>
                <li class="nav-item">
                    <a href="推薦.php" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li>
                <a href="登出.php" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>
    <?php
        header("Content-Type: text/html; charset=utf8");
        $con = create_connection();
        $sql = "SELECT Fname, Lname, M_Account 
                FROM member, user 
                WHERE '$_SESSION[user]' = M_Account AND Ssn = M_Ssn";
        $result = execute_sql($con, $sql);
        $size = 4;
        $row = mysqli_fetch_assoc($result);
    ?>
<div class="page-wrapper chiller-theme toggled">
  <nav id="sidebar" class="sidebar-wrapper" style="padding-top: 75px;">
    <div class="sidebar-content">
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
            <?php
                echo "<font><b>" . $row["Fname"]. " ". $row["Lname"].
                 "</b></font><br>" . $row["M_Account"]. "<br>";
            ?>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-menu">
        <ul>
            <li class="header-menu">
                <span>選單</span>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-gem"></i>
                    <span>個人訊息</span>
                </a>
            </li>
            <li>
                <a href="個人_觀看紀錄.php">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>觀看紀錄</span>
                </a>
            </li>
            <li>
                <a href="個人_我的評論.php">
                    <i class="fa fa-shopping-cart"></i>
                    <span>我的評論</span>
                </a>
            </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content" style="padding-top: 75px;">
    <div class="container-fluid">
      <h2><b>個人訊息</b></h2><br>
      <div style="border-top:4px solid rgba(78, 78, 78, 0.582); height: 15px;width:101%" class="w3-panel"></div>
      <div class="row">
        <div class="form-group col-md-12">
        <?php
            $sql = "SELECT Fname, Lname, Ssn, Gender, B_Date, Pnumber, Address, Email 
            FROM member, user WHERE '$_SESSION[user]' = M_Account AND Ssn = M_Ssn";
            $result = execute_sql($con, $sql);
        ?>
        </div>
      </div>
      <form>
        <div class="row w3-panel">
            <div class="form-group col-md-12" style="border-right:5px solid rgba(78, 78, 78, 0.582)">
                <?php
                    $row = mysqli_fetch_assoc($result);
                    echo "<font size = $size><b>Name&emsp;&emsp;</b>" . $row["Fname"]. " " . $row["Lname"]. "<br><br><br></font>";
                    echo "<font size = $size><b>Ssn&emsp;&emsp;</b>" . $row["Ssn"]. "<br><br><br></font>";
                ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <?php
                            echo "<font size = $size><b>Gender&emsp;&emsp;</b>" . $row["Gender"]. "<br><br><br></font>";
                        ?>
                    </div> 
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <?php
                            echo "<font size = $size><b>Birth Date&emsp;&emsp;</b>" . $row["B_Date"]. "<br><br><br></font>";
                        ?>
                    </div>
                </div>
                <?php
                    echo "<font size = $size><b>Phone Number&emsp;&emsp;</b>" . $row["Pnumber"]. "<br><br><br></font>";
                    echo "<font size = $size><b>Address&emsp;&emsp;</b>" . $row["Address"]. "<br><br><br></font>";
                    echo "<font size = $size><b>Email&emsp;&emsp;</b>" . $row["Email"]. "<br><br></font>";
                ?>
            </div>
        </div>
      </form>
    </div>
  </main>
  <!-- page-content" -->
</div>
    
</body>

</html>