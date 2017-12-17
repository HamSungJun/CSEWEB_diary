<?php
session_start();

$host = "localhost";          // MySQL DB서버 host
$user = "cseweb";                  // MySQL DB서버 접속 id
$password = "cseweb2017";  // MySQL DB서버 접속 password
$dbname = "cseweb";       // MySQL DB명
$dbconn = mysqli_connect($host,$user,$password,$dbname);
if(!$dbconn) {
   echo("DB 연결 실패");
   exit;
}
//한글깨짐방지
mysqli_query($dbconn, "set session character_set_connection=utf8;");
mysqli_query($dbconn, "set session character_set_results=utf8;");
mysqli_query($dbconn, "set session character_set_client=utf8;");
$valid_mime_types = array(
    "image/gif",
    "image/png",
    "image/jpg",
    "image/jpeg",
    "image/pjpeg",
    "image/bmp"
);
if (in_array($_FILES["file"]["type"], $valid_mime_types)) {
    $user_email = $_SESSION['login_user'];
    $uploaddir = "../board_img/";
    $file_name = explode('.', $_FILES['file']['name']);
    $now = date("Y-m-d H:i:s", time());
    $uploadfile = $uploaddir.basename($user_email."_write_".$now.".$file_name[1]");
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
    
    $SQL_File = "insert into Path (file_path) values('$uploadfile')";
    $dbconn -> query($SQL_File);
    echo("<script>location.href='../mymemories.html';</script>");
}
else{
   
    echo("<script>location.href='../writing.html';</script>");

}

?>
