<?php
session_start();

require "function.php";

$email = $_POST['email'];
$password = $_POST['password'];
$password1=$_POST['password1'];

$user = get_user_by_email($email);//что делать

if (!empty($user)){
     set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем!');
    redirect_to("page_register.php");
}
elseif ($password!=$password1){
    set_flash_message('warning', "Пароли не совпадают!");
    redirect_to("page_register.php");}

add_user($email, $password);
set_flash_message('success', "Регистрация успешна");
redirect_to("page_login.php");

