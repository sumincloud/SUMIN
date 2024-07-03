<?php 
  include('db_conn.php');

  $mb_id = $_POST['id'];
  $mb_name = $_POST['name'];
  $mb_pw = $_POST['pass'];
  $mb_email = $_POST['email'];
  $mb_address = $_POST['address'];
  $mb_phone = $_POST['mb_phone'];
  date_default_timezone_set('Asia/Seoul');
  $mb_datetime = date("Y-m-d H:i:s");

  $mb_pw = password_hash($mb_pw, PASSWORD_DEFAULT);

  // echo $mb_id . "<br>";
  // echo $mb_pw . "<br>";
  // echo $mb_address . "<br>";
  // echo $mb_datetime . "<br>";

  $sql = "INSERT INTO members
    SET mb_id = '$mb_id',
        mb_pw = '$mb_pw',
        mb_name = '$mb_name',
        mb_email = '$mb_email',
        mb_address = '$mb_address',
        mb_phone = '$mb_phone',
        mb_datetime = '$mb_datetime'";

  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>alert('회원 가입이 완료되었습니다. 로그인 페이지로 이동합니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";
  }

?>