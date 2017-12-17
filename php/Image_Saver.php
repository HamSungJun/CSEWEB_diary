<?PHP
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

//페이지 넘버 확인
$Font = $_POST["Font"];
$GrayScale = $_POST["GrayScale"];
if(!isset($GrayScale)){
  $GrayScale = 0;
}
$Opacity = $_POST["Opacity"];
$Radius = $_POST["Radius"];
$Border_Thick = $_POST["Border_Thick"];
$Border_Type = $_POST["Border_Type"];
$Border_Color = $_POST["Border_Color"];
$Subject = $_POST["Subject"];
$Date = $_POST["Date"];
$Comment = $_POST["Comment"];

$user_email = $_SESSION['login_user'];
$user_name = $_SESSION['name'];

$SQL_Css = "insert into css(font_name , opacity , radius , border_thickness , border_type , border_color , grayscale) values('$Font' , '$Opacity', '$Radius', '$Border_Thick', '$Border_Type', '$Border_Color', '$GrayScale')";
$dbconn -> query($SQL_Css);

$SQL_Text = "insert into board(user_id , user_name , subject , content , reg_date)values('$user_email' , '$user_name','$Subject','$Comment','$Date')";
$dbconn -> query($SQL_Text);

?>
