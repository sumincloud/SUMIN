<?php
  // db연결 변수설정
  $mysql_host = 'localhost';
  $mysql_user = 'allblue0121';
  $mysql_password = 'p03010301!';
  $mysql_db = 'allblue0121';
  
  //데이터베이스에 연결
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
  
  if(!$conn){
    die('연결실패 : ' .mysqli_connect_error());
  }

  session_start(); //세션시작






?>