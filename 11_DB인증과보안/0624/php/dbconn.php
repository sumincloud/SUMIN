<!-- dbconn.php -->

<?php 
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_password = '1234';
  $mysql_db = 'test';

  // 데이터베이스 연결 변수
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

  if(!$conn){ //db연결이 실패라면
    die('db연결 실패: ' . mysqli_connect_error());
  }

  // 세션연결을 위해서
  session_start();

?>
