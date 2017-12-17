<?PHP

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

//받은 회원정보로 아이디 찾기

$name = $_POST["name"];
$birthday = $_POST["birthday"];
$phone_num = $_POST["phone_num"];

if (!isset($_POST["email"])) {
  // ID 찾기인 경우.
  $SQL = "SELECT email FROM info WHERE birth = '$birthday' and phone_num = '$phone_num' and name= '$name'";
  $result = mysqli_query($dbconn,$SQL);
  
  $E_data = mysqli_fetch_row($result);
  
  $JSON_ID = array(
    "ID" => $E_data
  );
  header("Content-Type: application/json; charset=UTF-8");
  print json_encode($JSON_ID);
}
else{
  // PW 찾기인 경우.
  $email = $_POST["email"];

  $SQL = "SELECT password FROM info WHERE birth = '$birthday' and phone_num = '$phone_num' and name = '$name' and  email = '$email'";

  $result = mysqli_query($dbconn,$SQL);

  $P_data = mysqli_fetch_row($result);

  $JSON_PW = array(
    "PW" => $P_data
  );
  header("Content-Type: application/json; charset=UTF-8");
  print json_encode($JSON_PW);

}