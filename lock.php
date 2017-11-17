<?php
header("Content-Type: text/html; charset=UTF-8");
//database 연동
$host = "localhost";          // MySQL DB서버 host
$user = "cseweb";                  // MySQL DB서버 접속 id
$password = "cseweb2017";  // MySQL DB서버 접속 password
$dbname = "cseweb";       // MySQL DB명
$dbconn = mysqli_connect($host,$user,$password,$dbname);
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query("select * from info where email='$user_check' ");
$row=mysqli_fetch_array($ses_sql);

$login_session=$row['name'];
$_SESSION['username'] = $login_session;

if(!isset($login_session))
{
header("Location: login.php");
}

?>
