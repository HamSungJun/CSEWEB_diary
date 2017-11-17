<?PHP
header("Content-Type: text/html; charset=UTF-8");
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
$find_user_name = htmlspecialchars($_POST["name"]);
$find_user_birth = htmlspecialchars($_POST["birth"]);
$find_user_phone_num = htmlspecialchars($_POST["phone_num"]);
$find_user_email = htmlspecialchars($_POST["email"]);

//입력된 email 정보가 없을 때(id 찾기 일때)
if(empty($find_user_email)){
  if(empty($find_user_name) || !isset($find_user_birth) || empty($find_user_phone_num)){
    echo '<script>alert("양식을 모두 채워주세요................")
        history.back()</script>';
  }
  //빈칸검사 결과 빈칸없을시
  else {
    //회원정보에 해당하는 아이디 유무 확인
    $sql="SELECT * FROM info WHERE birth = '$find_user_birth' and phone_num = '$find_user_phone_num' and name = '$find_user_name'";
    $result = mysqli_query($dbconn,$sql);
    if(!empty($result)) {
      
    }
    else {
      echo '<script>alert("해당하는 아이디가 존재하지 않습니다.")
             history.back()</script>';
    }
  }
}
//비밀번호 찾기
else{
  if(empty($find_user_name) || !isset($find_user_birth) || empty($find_user_phone_num) || empty($find_user_email)){
    echo '<script>alert("양식을 모두 채워주세요!!!!!!!!!!!!!!")
        history.back()</script>';
  }
  //빈칸검사 결과 빈칸없을시
  else {
    //회원정보에 해당하는 아이디 유무 확인
    $sql="SELECT * FROM info WHERE birth = '$find_user_birth' and phone_num = '$find_user_phone_num' and name = '$find_user_name'";
    $result = mysqli_query($dbconn,$sql);
    if(!empty($result)) {
      //html로 세로운 비밀번호 받는 폼 생성 후 change_pw.php로 정보를 보냄
      
    }
    else {
      echo '<script>alert("해당하는 아이디가 존재하지 않습니다.")
             history.back()</script>';
    }
  }
}
?>
