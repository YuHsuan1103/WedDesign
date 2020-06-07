<!DOCTYPE html>
<html>

<head>
    <title>推薦</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/電影內容.css" />
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="../HTML/首頁.html" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="../HTML/登入.html" class="nav-link">Sign In </a>
                </li>
                
                <li class="nav-item">
                    <a href="個人訊息.php" class="nav-link">我的首頁 |</a>
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
                <a href="#" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>
    <?php
    require_once('connect.php');
    session_start();
    checksession();
    header("Content-Type: text/html; charset=utf8");
    $con = create_connection();
    $movie = $_GET['movie'];
    $sql = "SELECT MovieTitle, Classification, Introduction, Cover
            FROM movies
            WHERE MovieTitle = '$movie'";
    $sql_C = "SELECT C_name
                FROM `character`
                WHERE C_MovieTitle = '$movie'";
    $sql_D = "SELECT Dname
            FROM director
            WHERE MovieTitle = '$movie'";
    $result = execute_sql($con, $sql);
    $resultC = execute_sql($con, $sql_C);
    $resultD = execute_sql($con, $sql_D);
    $temp;
    ?>
<div class="container">
   <div class="row">
      <div class="col">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
               <strong class="d-inline-block mb-2 text-primary">
                <?php
                    if($row = mysqli_fetch_assoc($result)){
                        printf("<h2 class=\"cta-title\">%s</h2>", $row['MovieTitle']);
                        $temp = "data:image/jpeg;base64,".$row['Cover'];
                    }
                ?>
               </strong>
               <h6 class="mb-0">
               <?php
                    if($rowC = mysqli_fetch_assoc($resultC)){
                        printf("%s", $rowC['C_name']);
                    }
                    while($rowC = mysqli_fetch_assoc($resultC)){
                        printf(",&emsp;%s", $rowC['C_name']);
                    }
                ?>
               <h6 class="mb-0">
               <?php
                    if($rowD = mysqli_fetch_assoc($resultD)){
                        printf("<br>%s", $rowD['Dname']);
                    }
                    while($rowD = mysqli_fetch_assoc($resultD)){
                        printf(",&emsp;%s", $rowD['Dname']);
                    }
                ?>
               </h6>
               <br><br>
               <?php
                    printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
               ?>
               <a class="btn btn-outline-primary btn-sm" role="button" href="">Watch Now</a>
            </div>
            <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
         </div>
      </div>
</div>

    

</body>

</html>