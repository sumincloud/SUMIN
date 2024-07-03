<?php

  //변수선언
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $sms = $_POST['sms'];
  $email = $_POST['email'];
  $region = $_POST['region'];
  $car = $_POST['car'];
  $my_car = $_POST['my_car'];
  $e_date = $_POST['e_date'];
  
  //1. db연결을 위한 변수선언과 값 설정
  $mysql_host='localhost';
  $mysql_user='root';
  $mysql_password='1234';
  $mysql_db='product';
  
  //2. 데이터베이스에 연결을 위한 함수작성
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
  
  if(!$conn){
    die('연결실패 : ' .mysqli_connect_error());
  }
  //echo '연결성공';

  //3. 데이터베이스 연결 성공하면 아래 쿼리문 실행
  $query = "insert into test_drive (name, phone, sms, email, region, s_car, my_car, e_date) values('$name', '$phone', '$sms', '$email', '$region', '$car', '$my_car', '$e_date')";

  //4. 데이터 쿼리문 실행하여 결과 저장하기
  $result = mysqli_query($conn, $query);

  echo '입력완료'
  
  
  






?>