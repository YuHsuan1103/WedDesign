<?php
    require_once("connect.php"); //連結到connect.php
    $con = create_connection();
    $sql=sprintf("select * from movies where MovieTitle = '$_COOKIE[movie]'");
    $result = execute_sql($con, $sql);
    //顯示圖片
    if($row = mysqli_fetch_assoc($result)) {
        header('Content-type: image/jpeg');    
        print $row['cover'];
        
    }
    
    mysqli_close($con);
?>