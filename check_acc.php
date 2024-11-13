<?php
if(!isset($_POST['username'])){
    // 密碼打錯踢回去
    header("location:login.php");
    exit();
}



$username=$_POST['username'];
$password=$_POST['password'];

if($username=='admin' && $password=='1324'){
    echo "帳號正確:登入成功";
    setcookie("login","$acc",time()+180);
    echo $_COOKIE['login'];
    echo "<br><a href='login.php'>回首頁</a>";
}else{
    echo "帳號錯誤:登入失敗";
}






?>