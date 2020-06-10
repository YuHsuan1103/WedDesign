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
                    <a href="#" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li>
                <a href="登出.php" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>
    <!------- 搜尋結果 ----------->
    
    <?php
    
    require_once('connect.php');
    session_start();
    checksession();
    header("Content-Type: text/html; charset=utf8");
    $con = create_connection();

    $sql = "SELECT MovieTitle, Classification, Introduction, Cover
            FROM movies
            WHERE Classification IN (SELECT Classification
                                    FROM member_watchhistory,movies
                                    WHERE  WatchHistory = MovieTitle) ORDER BY Classification DESC ";   
            $result = execute_sql($con, $sql);
    ?>
    
    <br><br><br><br><br>
    <h2 style="padding-left: 200px;"><b>為您推薦</b></h2><br>
    <div class="container">
        <div class="col-sm-9">
            <?php
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                if($count % 2 != 0){
                    echo
                    "<div class=\"bs-calltoaction bs-calltoaction-primary\">
                        <div class=\"row\">
                            <div class=\"col-md-6 cta-contents\">
                                <div class=\"cta-desc\">";
                                    $moviename = $row['MovieTitle'];
                                    printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                                    printf("<p>%s<br><br>%s</p>",$row['Classification'], $row['Introduction']);
                                    $temp = "data:image/jpeg;base64,".$row['Cover'];
                                
                                echo
                                "</div>
                            </div>
                            <div class=\"col-md-3 cta-button\">
                                <img src=\""; echo $temp; echo "\" alt=\"\" style = \"weight: 250px; height: 250px;\">
                            </div>
                        </div>
                    </div>";
                }
                else{
                    echo
                    "<div class=\"bs-calltoaction bs-calltoaction-default\">
                        <div class=\"row\">
                            <div class=\"col-md-6 cta-contents\">
                                <div class=\"cta-desc\">";
                                    $moviename = $row['MovieTitle'];
                                    printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                                    printf("<p>%s<br><br>%s</p>",$row['Classification'], $row['Introduction']);
                                    $temp = "data:image/jpeg;base64,".$row['Cover'];
                                
                                echo
                                "</div>
                            </div>
                            <div class=\"col-md-3 cta-button\">
                                <img src=\""; echo $temp; echo "\" alt=\"\" style = \"weight: 250px; height: 250px;\">
                            </div>
                        </div>
                    </div>";
                }
                $count ++;
            }
            ?>
        </div>
    </div>
    
</body>

</html>