<?php
session_start();
function get_user_by_email($email){
    $pdo = new PDO("mysql:host=localhost;dbname=usersDB;charset=utf8;","root","root");
    $sql="SELECT * FROM ussers WHERE email=:email ";
    $statement=$pdo->prepare($sql);
    $statement->execute(['email'=>$email]);
    $user=$statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}//как делать
function add_user($email,$password){
    $pdo = new PDO("mysql:host=localhost;dbname=usersDB;charset=utf8;","root","root");
    $sql = "INSERT INTO ussers (email,password) values(:email,:password)";
    $statement=$pdo->prepare($sql);
    $result=$statement->execute(['email'=>$email,'password'=>password_hash($password,PASSWORD_DEFAULT)]);
    return $pdo->lastInsertId();
}
function set_flash_message($name,$message){
    $_SESSION[$name]=$message;
}
function redirect_to($path){
    header("Location: {$path}");
    exit;
}
function display_message($name){
    if(isset($_SESSION[$name])){
        echo "<div class=\"alert alert-{$name} text-dark\"  role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);}
}
function checking_password($password,$password1,$name){
    if ($password!=$password1){
        echo "<div class=\"alert alert-{$name} text-dark\"  role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);}}

function login($email)
    {
        if (isset($_SESSION['log -in'])){
            return true;}
        else{
            return false;
    }}

//проверить явл ли при входе в профиль пользователь едмином,если да,то показать кнопку добавить и разрешить редактирование
//function is_loged($email){
//    if (isset());
function is_user($user){
    if ($user['role']==$user){
        echo "<a class=\"btn btn-success\" href=\"create_user.php\">Добавить</a>";
    }}