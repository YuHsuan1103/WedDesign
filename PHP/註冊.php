<?php
header("Content-Type:text/html; charset=utf-8");
  //建立連線：
  $link = mysqli_connect("localhost", "Sisia", "Annie26468230", "test");
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $Ssn = $_POST['Ssn'];
  $Birthdate = $_POST['Birthdate'];
  $Gender = $_POST['Gender'];
  $Address = $_POST['Address'];
  $Email = $_POST['Email'];
  $Phonenumber = $_POST['Phonenumber'];
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $getDate= date("Y-m-d");
  //在html的name上面寫什麼這邊就宣告什麼，後面POST是資料庫欄位
  // 建立SQL語法，使用$query
  $query = "INSERT INTO users VALUES ('$Phonenumber', '$Fname','$Lname', '$Ssn', '$Birthdate', '$Address', '$Gender', '$Email')";
  $query2 = "INSERT INTO member VALUES ('$Username', '$getDate', '$Ssn', '$Password')";
  //送出SQL語法到資料庫系統
mysqli_query($link, 'SET NAMES utf8'); 
mysqli_query($link, $query);
mysqli_query($link, $query2);
?>