<?php
    function create_connection() { //連接資料庫
        $dbhost = "localhost";
        $dbuser = "Sisia";
        $dbpasswd = "Annie26468230";
        $dbname = "作業";
        $con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname) or die ("Error Connection");
        mysqli_query($con, "SET NAME utf8");
        return $con;
    }

    function execute_sql($con, $sql) { //傳SQL指令
        $result = mysqli_query($con, $sql);
        return $result;
    }

    #require_once('connect.php');
?>