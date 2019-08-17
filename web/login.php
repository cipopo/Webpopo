<?php

// header('content-type:text/html;charset=utf-8');
require_once 'functions.php';

$username=$_POST['username'];
$password=$_POST['password'];

if(!$conn){
    echo "<script>alert('连接数据库失败！')</script>";
}else{
    if(isset($_POST['submit'])){
        $query = "SELECT * FROM admins WHERE user = '$username' and passwd = '$password'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 1){
            header("Location: /sqli.php");
        }else{
            header("Location: /index.html");
        }
    }
}
?>