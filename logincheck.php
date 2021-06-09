<?php
session_start();
require "function.php";
$email = $_POST['email'];
$password = $_POST['password'];
$user=get_user_by_email($email);

if ($user['email']==$email && (password_verify($password,$user['password']))==true ){
    $_SESSION['log-in']=$email;
}
//else{
//    set_flash_message('danger','Пароли не совпадают!')||
//    set_flash_message('danger','Нет такого пользователя!');
//    redirect_to("page_login.php");
elseif ($user['email']!=$email){
    set_flash_message('danger','Нет такого пользователя!');
    redirect_to("page_login.php");
}
elseif ((password_verify($password,$user['password']))==false){
    set_flash_message('danger','Пароли не совпадают!');
    redirect_to("page_login.php");
}
if ($_SESSION['log-in']==true){
    set_flash_message('success','Профиль обновлен!');
    redirect_to("users.php");
}
is_user($user);
