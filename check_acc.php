<?php
$username=$_POST['username'];
$password=$_POST['password'];

if($username=='admin' && $password=='1324'){
    echo "帳號正確:登入成功";
}else{
    echo "帳號錯誤:登入失敗";
}






?>