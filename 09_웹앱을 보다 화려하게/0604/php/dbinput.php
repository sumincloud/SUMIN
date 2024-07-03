<!-- dbinput.php -->
<?php

include('./dbconn.php');

// 변수에 데이터 담기
$id = $_POST['id'];
$title = $_POST['title'];
$name = $_POST['name'];
$txtbox = nl2br($_POST['txtbox']);
$pwd = $_POST['pwd'];

//nl2br : 데이터입력시 텍스트정보는 그대로 입력되고, 출력시에만 br태그 사용한것처럼 자동 줄변경이 됨. 

$id = mysqli_real_escape_string($conn, $id);
$title = mysqli_real_escape_string($conn, $title);
$name = mysqli_real_escape_string($conn, $name);
$txtbox = mysqli_real_escape_string($conn, $txtbox);
$pwd = mysqli_real_escape_string($conn, $pwd);

/*
mysqli_real_escape_string
  php에서 제공하는 함수로서 MYSQL과 커넥션을 할때 string을 Escape한 상태로 만들어주는 함수
  string을 입력할 때  jeon's person 처럼 sql문에 앞서 있던 '기호와 중첩이 될 수 있다. 이러한 문제를 해결하기 위해 \n, \r \" 처럼 구별해주는 형태로 만들어주는 것을 escape_string이라고 함.
  예) select * from table where ''
*/

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