<!DOCTYPE html>
<html>

<head>
    <title>評論</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/評論.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <a href="首頁.html" class="navbar-brand">Projectxx2020</a>
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
    <div class="container a">
            <form action="評論.php" method="POST" class="">
                <div class="row">
                    <div class="col-md-1" style="font-size: large;">
                        
                    </div>
                    <div class="col-md-5"><span>
                        <div class="form-group">
                            <?php
                                require_once('connect.php');
                                session_start();
                                checksession();
                                header("Content-Type: text/html; charset=utf8");
                                $con = create_connection();
                                $movietitle = '1917';
                                setcookie('movietitle', $movietitle);
                                printf("<span style=\"color: aliceblue;\">%s</span>",$_COOKIE['movietitle']);
                            ?>
                        </div>
                    </span></div>
                </div>
                <div class="row">
                    <div class="col-md-1" style="font-size: large;">
                        <span style="color: aliceblue;">評分</span>
                    </div>
                    <div class="col-md-5 btn-group"><span>
                        <div class="abgne-menu-20140101-1">
                            <input type="radio" id="one" name="grade">
                            <label for="one">1</label>
                            <input type="radio" id="two" name="grade">
                            <label for="two">2</label>
                            <input type="radio" id="three" name="grade">
                            <label for="three">3</label>
                            <input type="radio" id="four" name="grade">
                            <label for="four">4</label>
                            <input type="radio" id="five" name="grade">
                            <label for="five">5</label>
                        </div>
                        </span></div>
                </div>
                <div class="row">
                    <div class="col-md-1" style="font-size: large;">
                        <span style="color: aliceblue;">內文</span>
                    </div>
                    <div class="col-md-11 form-group">
                        <textarea name="content" id="" style="width: 680px; height: 275px;" class="form-control content" placeholder="content"></textarea>
                    </div>
                    
                </div>
                <div class="row">
                    
                    <div class="col-md-7 form-group">
                        <input type="submit" value="submit" class="btn float-right login_btn b">
                    </div>
                </div>
            </form>
            <!-- 將表單傳回資料庫 -->
            <?php
                $grade = $_POST['grade'];
                $content = $_POST['content'];
                $user = $_SESSION['user'];
                $sql = "INSERT INTO comment VALUE ('$_COOKIE[movietitle], $grade, $content)"
            ?>
    </div>
</body>

</html>