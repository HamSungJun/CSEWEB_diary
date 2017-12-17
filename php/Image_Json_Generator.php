<?PHP
session_start();

$user_email = $_SESSION['login_user'];


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

//페이지 넘버 확인




if (true) {
 
// select MG.genre FROM movies M JOIN movies_genres MG ON M.id = MG.movie_id group by MG.genre ORder by sum(M.rank) desc limit 3;
// 
$SQL_GETDATAS = "SELECT * FROM board B join css C on B.board_no = C.id join Path P on B.board_no = P.id WHERE user_id = '$user_email'"; 
$result = mysqli_query($dbconn , $SQL_GETDATAS);

// print_r($result);

$IMAGES = array(
  "IMAGE" => array(
    
  )
);

while($DATA = mysqli_fetch_assoc($result)){
  
  array_push($IMAGES["IMAGE"],array(

    "Path" => $DATA["file_path"],
    "Font" => $DATA["font_name"],
    "GrayScale" => $DATA["grayscale"],
    "Opacity" => $DATA["opacity"],
    "Radius" => $DATA["radius"],
    "Border_Thick" => $DATA["border_thickness"],
    "Border_Type" => $DATA["border_type"],
    "Border_Color" => $DATA["border_color"],
    "Subject" => $DATA["subject"],
    "Comment" => $DATA["content"],
    "Date" => $DATA["reg_date"],
    "Hits" => $DATA["hits"]
  )
);
};






  header("Content-Type: application/json; charset=UTF-8");
  print json_encode($IMAGES);
  
}


?>
