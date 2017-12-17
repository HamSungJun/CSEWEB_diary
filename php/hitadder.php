<?php
header("Content-Type: text/html; charset=UTF-8");

session_start();
$user_email = $_SESSION['login_user'];
$host = "localhost";
$user = "cseweb";
$password = "cseweb2017";
$dbname = "cseweb";
$dbconn = mysqli_connect($host,$user,$password,$dbname);
if(!$dbconn) {
   echo("DB 연결 실패");
   exit;
}
$path = $_POST["Path"];
mysqli_query($dbconn, "set session character_set_connection=utf8;");
mysqli_query($dbconn, "set session character_set_results=utf8;");
mysqli_query($dbconn, "set session character_set_client=utf8;");
$data = mysqli_query($dbconn,"select hits from board B join Path P on B.board_no = P.id  where file_path = '$path'");
$HIT_NUMBER = mysqli_fetch_row($data);
$HIT_NUMBER[0]++;
$SQL ="update board B join Path P on B.board_no = P.id set hits = $HIT_NUMBER[0] where file_path = '$path' and user_id = '$user_email'";
$dbconn->query($SQL);



$SQL_GET_HITDATA = "SELECT hits FROM board B join css C on B.board_no = C.id join Path P on B.board_no = P.id WHERE user_id = '$user_email'";

$result = mysqli_query($dbconn,$SQL_GET_HITDATA);

$Hits = array(
    "Hits" => array(
      
    )
  );
while($DATA = mysqli_fetch_assoc($result)){
    array_push($Hits["Hits"],$DATA["hits"]);
}

header("Content-Type: application/json; charset=UTF-8");
print json_encode($Hits);

?>