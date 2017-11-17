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
$sql="SELECT * FROM info WHERE email = '$user_email' and password = '$user_password'";
$result = mysqli_query($dbconn,$sql);
$value = mysqli_fetch_assoc($result);
if(empty($user_email)){
  echo("<script>alert('아이디를 입력해주세요!'); location.href='./index.html';</script>");
}
else if(empty($user_password)){
  echo("<script>alert('비밀번호를 입력해주세요!'); location.href='./index.html';</script>");
}
else if(strcmp($user_email,$value['email'])==0 && strcmp($user_password,$value['password'])==0){
  session_start();
  $_SESSION['login_user']=$user_email;
  $_SESSION['name'] = $value['name'];
  echo("<script>alert('로그인 성공'); location.href='./home.php';</script>");
}
else{
  echo("<script>alert('로그인 실패'); location.href='./index.html';</script>");
}
?>
