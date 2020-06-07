<!DOCTYPE html>
<html>

<head>
    <title>搜尋</title>
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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="../HTML/首頁.html" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-left">
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
                <a href="登出.php" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>
    <section class="search-sec" style="padding-top:50px;">
        <div class="container">
            <form action="搜尋結果.php" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="select">
                                    <option value="" disabled selected hidden>Select</option>
                                    <option value="search">Movie Title</option>
                                    <option value="searchclassification">Classification</option>
                                    <option value="searchcharacters">Character</option>
                                    <option value="searchdirectors">Director</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="輸入關鍵字" name = "search">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </section>
    <!------- 搜尋結果 ----------->
    
    <?php
    require_once('connect.php');
    session_start();
    checksession();
    header("Content-Type: text/html; charset=utf8");
    $con = create_connection();
    $search = $_POST['search'];
    $select = $_POST['select'];
    $sql_insert = "INSERT INTO $_POST[select] VALUES ('$search', '$_SESSION[user]')";
    if($_POST['select'] == "search"){
        $sql = "SELECT MovieTitle, Classification, Introduction, Cover
                FROM movies
                WHERE MovieTitle LIKE '%$search%'";
    }
    elseif($_POST['select'] == "searchclassification"){
        $sql = "SELECT MovieTitle, Classification, Introduction, Cover
                FROM movies
                WHERE classification LIKE '%$search%'";
    }
    elseif($_POST['select'] == "searchcharacters"){
        $sql = "SELECT MovieTitle, Classification, Introduction, Cover
                FROM movies, `character`
                WHERE MovieTitle = C_MovieTitle AND C_name LIKE '%$search%'";
    }
    elseif($_POST['select'] == "searchdirectors"){
        $sql = "SELECT m.MovieTitle, m.Classification, m.Introduction, m.Cover
                FROM director AS d, movies AS m
                WHERE d.MovieTitle = m.MovieTitle AND d.Dname LIKE '%$search%'";
    }
    $result = execute_sql($con, $sql);
    $result_insert = execute_sql($con, $sql_insert);
    $temp;
    $moviename;
    ?>
    <div class="container">
        <div class="col-sm-9">
            <div class="bs-calltoaction bs-calltoaction-default">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            $moviename = $row['MovieTitle'];
                            printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
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
                            $moviename = $row['MovieTitle'];
                            printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
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
                            $moviename = $row['MovieTitle'];
                            printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
                    </div>
                </div>
            </div>
            <div class="bs-calltoaction bs-calltoaction-primary">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            $moviename = $row['MovieTitle'];
                            printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
                    </div>
                </div>
            </div>
            <div class="bs-calltoaction bs-calltoaction-info">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<a href=\"電影內容.php\"  style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
                    </div>
                </div>
            </div>
            <div class="bs-calltoaction bs-calltoaction-primary">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            $moviename = $row['MovieTitle'];
                            printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                            printf("<p>%s<br>%s</p>",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 250px; height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>