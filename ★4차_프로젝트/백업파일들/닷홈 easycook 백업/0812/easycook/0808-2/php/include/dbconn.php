<?php
// db연결 변수설정
$mysql_host='localhost'; //호스트명
$mysql_user='easycook'; //사용자명
$mysql_password='green1!1!'; //패스워드
$mysql_db='easycook'; //데이터베이스명

//localhost에서 쓸 때
// $mysql_host = 'localhost'; //호스트명
// $mysql_user = 'root';      //사용자명
// $mysql_password = "1234";  //비밀번호
// $mysql_db='easycook'; //데이터베이스명

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password, $mysql_db);

if(!$conn){ //만약 conn이 실패한다면 
  die("연결실패 : ". mysqli_connect_error()); //스크립트를 종료한다
}

session_start(); //세션을 시작한다.

ini_set('display_errors','on'); //에러메세지를 띄우지 말라 : off이면 에러메세지가 안보인다.

?>
