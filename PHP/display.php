<?php
    require_once("connect.php"); //連結到connect.php
    
    //從資料庫取得圖片
    $con = create_connection();
    $sql=sprintf("select * from movie where MovieTitle = '1917'");
    $result = execute_sql($con, $sql);        
    
    //顯示圖片
    if($row = mysqli_fetch_assoc($result)) {    
        header('Content-type: image/jpeg');    
        print $row['Cover'];
    }
    
    mysqli_close($con);
?>