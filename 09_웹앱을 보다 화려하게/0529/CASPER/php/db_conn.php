<?php
  // db연결 변수설정
  $mysql_host='localhost'; //호스트명
  $mysql_user='root'; //사용자명
  $mysql_password='1234'; //패스워드
  $mysql_db='product'; //데이터베이스명
  
  //데이터베이스에 연결
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
  
  if(!$conn){
    die('연결실패 : ' .mysqli_connect_error());
  }

  session_start(); //세션시작






?>