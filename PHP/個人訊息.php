<?php 
$con=mysqli_connect("localhost","Sisia","Annie26468230","作業"); 
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 
else {
    echo "连接 MySQL 成功: "; 
}
 
// 执行查询
$sql = "SELECT * FROM user";
mysqli_query($con, $sql);

$result = mysqli_query($con, $sql);
if ($result) {
    $num = mysqli_num_rows($result);
    echo "condb 資料表有 " . $num . " 筆資料<br>";
}

// --- 顯示資料 --- //

echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

$result = mysqli_query($con, $sql);
/*while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    printf("<pre>Name     %s %s</pre>", $row[1], $row[2]);
    printf("<pre>Ssn      %s</pre>", $row[3]);
    printf("<pre>Gender   %s</pre><br>", $row[6]);
}*/
$row = mysqli_fetch_array($result, MYSQLI_NUM);
    printf("<pre>Name     %s %s</pre>", $row[1], $row[2]);
    printf("<pre>Ssn      %s</pre>", $row[3]);
    printf("<pre>Gender   %s</pre><br>", $row[6]);
    
// 釋放記憶體
mysqli_free_result($result);
mysqli_close($con);
?>