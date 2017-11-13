<?php
header("Content-Type: text/html; charset=UTF-8");
//database 연동
$host = "localhost";          // MySQL DB서버 host
$user = "cseweb";                  // MySQL DB서버 접속 id
$password = "cseweb2017";  // MySQL DB서버 접속 password
$dbname = "cseweb";       // MySQL DB명
$dbconn = mysqli_connect($host,$user,$password,$dbname);

//입력정보 변수에 저장
$user_email = $_POST["email"];
$user_password = $_POST["pw"];
$sql="SELECT * FROM info WHERE email = '$user_email' and password = '$user_password'";
$result = mysqli_query($dbconn,$sql);
if(isset($result)){
  session_start();
  $arr = mysqli_fetch_array($result);
  $_SESSION['login_user']=$user_email;
  $_SESSION['name'] = $arr['name'];
  echo("<script>alert('로그인 성공'); location.href='./home.php';</script>");
}
else{
  echo("<script>alert('로그인 실패'); location.href='./index.html';</script>");
}
?>
