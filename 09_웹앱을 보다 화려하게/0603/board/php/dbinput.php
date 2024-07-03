<!-- dbinput.php -->
<?php

include('./dbconn.php');

// 변수에 데이터 담기
$id = $_POST['id'];
$title = $_POST['title'];
$name = $_POST['name'];
$txtbox = $_POST['txtbox'];
$pwd = $_POST['pwd'];

$id = mysqli_real_escape_string($conn, $id);
$title = mysqli_real_escape_string($conn, $title);
$name = mysqli_real_escape_string($conn, $name);
$txtbox = mysqli_real_escape_string($conn, $txtbox);
$pwd = mysqli_real_escape_string($conn, $pwd);

date_default_timezone_set('Asia/Seoul');
$datetime = date('Y-m-d H:i:s');

// 값 출력하기 테스트
// echo $id. '<br>';
// echo $title. '<br>';
// echo $name. '<br>';
// echo $txtbox. '<br>';
// echo $pwd. '<br>';
// echo $datetime. '<br>';

// 사용자 아이피주소
$ip = $_SERVER['REMOTE_ADDR']; //사용자가 접속한 IP주소를 가져옴.
//echo $ip;

//패스워드 암호화
$pwd = PASSWORD_HASH('$pwd', PASSWORD_DEFAULT);//192.168.170.168 15글자

//DB INSERT문을 사용하여 데이터에 자료 입력하기
$sql = "insert into free_board(subject, name, memo, pwd, datetime, ip) value('$title','$name','$txtbox','$pwd', '$datetime', '$ip')";

$result = mysqli_query($conn, $sql);

if($result){
  echo "<script>alert('글작성이 완료되었습니다.');</script>";
  echo "<script>location.replace('../list.php')</script>";
  exit;
}else{
  echo "글입력 실패 : " . mysqli_error($conn);
  mysqli_close($conn); //데이터베이스 접속종료
}

?>