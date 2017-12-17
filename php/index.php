<?php
header("Content-Type: text/html; charset=UTF-8");
//database 연동
$host = "localhost";          // MySQL DB서버 host
$user = "cseweb";                  // MySQL DB서버 접속 id
$password = "cseweb2017";  // MySQL DB서버 접속 password
$dbname = "cseweb";       // MySQL DB명
$dbconn = mysqli_connect($host,$user,$password,$dbname);
mysqli_query($dbconn, "set session character_set_connection=utf8;");
mysqli_query($dbconn, "set session character_set_results=utf8;");
mysqli_query($dbconn, "set session character_set_client=utf8;");

//입력정보 변수에 저장
$user_email = $_POST["email"];
$user_password = $_POST["pw"];
$sql="SELECT name,profile FROM info WHERE email = '$user_email' and password = '$user_password'";
$result = mysqli_query($dbconn,$sql);
$user_info = mysqli_fetch_array($result);
if(isset($user_info)){
  $final = array(
    "result" => true
  );
  session_start();
  $_SESSION['login_user']=$user_email;
  $_SESSION['name'] = $user_info['name'];
  $_SESSION['path'] = $user_info['profile'];
  header("Content-Type: application/json; charset=UTF-8");
  print json_encode($final);
  //echo("<script>location.href='./home.html';</script>");
}
else{
  $final = array(
    "result" => false
  );
  header("Content-Type: application/json; charset=UTF-8");
  print json_encode($final);
  //echo("<script>alert('로그인 실패'); location.href='./index.html';</script>");
}
?>