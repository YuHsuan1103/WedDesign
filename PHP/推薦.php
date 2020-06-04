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
    <link rel="stylesheet" type="text/css" href="../CSS/推薦.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/搜尋.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="#" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="../HTML/首頁.html" class="nav-link">Home </a>
                </li>
                <li class="nav-item">
                    <a href="../HTML/登入.html" class="nav-link">登入 |</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="../HTML/搜尋.html" class="nav-link">搜尋 |</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
    </nav>
    <!------- 搜尋結果 ----------->
    <div class="container">
    <?php
    require_once('connect.php');
    session_start();
    header("Content-Type: text/html; charset=utf8");
    $con = create_connection();
    $search = $_POST['search'];
    $sql_insert = "INSERT INTO search VALUES ('$search', '$_SESSION[user]')";
    $sql = "SELECT MovieTitle, Classification, Introduction FROM movie WHERE MovieTitle LIKE '%$search%'";
    $result = execute_sql($con, $sql);
    $result_insert = execute_sql($con, $sql_insert);
    ?>
        <div class="col-sm-9 container">
            <div class="bs-calltoaction bs-calltoaction-default">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<h2 class=\"cta-title\">%s</h2><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            setCookie('movie', $row['MovieTitle']);
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                    <?php
                        printf("<img src='img1.php' width=\"150px\">");
                    ?>

                    </div>
                </div>
            </div>
            <!--  第二項搜尋  -->
            <div class="bs-calltoaction bs-calltoaction-primary">
            <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<h2 class=\"cta-title\">%s</h2><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $_COOKIE['movie2'] = $row['MovieTitle'];
                            echo $_COOKIE['movie2'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                    <?php
                        printf("<img src='img2.php' width=\"150px\">");
                        
                    ?>
                    </div>
                </div>
            </div>
            <!-- 搜尋結果3 -->
            <div class="bs-calltoaction bs-calltoaction-info">
            <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<h2 class=\"cta-title\">%s</h2><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            #$_COOKIE['movie3'] = $row['MovieTitle'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                    <?php
                        printf("<img src='img3.php' width=\"150px\">");
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>