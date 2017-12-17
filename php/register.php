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

//받은 회원정보 변수에 저장
$user_email = htmlspecialchars($_POST["email"]);
$user_password = htmlspecialchars($_POST["pw"]);
$user_name = htmlspecialchars($_POST["name"]);
$user_birth = htmlspecialchars($_POST["birthday"]);
$user_phone_num = htmlspecialchars($_POST["phone_num"]);

$uploaddir = "../upload_img/";
$file_name = explode('.', $_FILES['file']['name']);
$uploadfile = $uploaddir.basename($user_email."_profile_.".$file_name[1]);
move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

if($user_name==''|| $user_password==''|| $user_email=='' || $user_birth=='' || $user_phone_num==''|| $file_name[0]==''){
  echo '<script>alert("양식을 모두 채워주세요");history.back();</script>';
}
else if(!preg_match("/^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/",$user_phone_num)){
  echo '<script>alert("번호를 양식에 맞게 작성해주세요");history.back();</script>';
}
//빈칸검사 결과 없을시
else {
  //email 중복 여부 체크
  $tableemtpy = TRUE;
  $result = FALSE;
  $data = mysqli_query($dbconn,"select email from info");

  while($finddata = mysqli_fetch_assoc($data)){
    $tableemtpy = FALSE;
    //중복존재시
    if(!strcmp($user_email,$finddata["email"])){
      echo '<script>alert("같은 이메일이 존재합니다.")
      history.back()</script>';
    }
    //중복없을시
    else{
      $result = TRUE;
    }
  }
  //테이블이 empty일 경우
  if($tableemtpy) {
    $result = TRUE;
  }
  //중복이 없으면 회원정보 db에 저장
  if($result){
    $sql = "insert into info(email,password,name,birth,phone_num,profile) values('$user_email','$user_password','$user_name','$user_birth','$user_phone_num','$uploadfile')";
    if($dbconn->query($sql)){
      echo("<script>alert('회원가입 성공'); location.href='../index.html';</script>");
    }
    else{
      echo("<script>alert('알 수 없는 오류가 발생했습니다.'); location.href='../index.html';</script>");
    }
  }
}
?>
