<?php 
  include('../db/db_conn.php');

  $mb_id = $_POST['id'];
  $mb_name = $_POST['name'];
  $mb_pw = $_POST['pass'];
  $mb_email = $_POST['email'];
  $mb_address = $_POST['address'];
  $mb_phone = $_POST['phone'];

  // 현재지역시간으로 변경해줌
  date_default_timezone_set('Asia/Seoul');
  $mb_datetime = date('Y-m-d H:i:s', time());

  $mb_pw = password_hash($mb_pw, PASSWORD_DEFAULT);

  echo $mb_id . "<br>";
  echo $mb_name . "<br>";
  echo $mb_pw . "<br>";
  echo $mb_email . "<br>";
  echo $mb_address . "<br>";
  echo $mb_phone . "<br>";

  $sql = "insert into members(mb_id, mb_name, mb_password, mb_email, mb_address, mb_phone, datetime) value('$mb_id', '$mb_name', '$mb_pw', '$mb_email', '$mb_address','$mb_phone', '$mb_datetime')";

  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>alert('회원 가입이 완료되었습니다. 로그인 페이지로 이동합니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";
  }

?>