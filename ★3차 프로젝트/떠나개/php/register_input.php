<!-- register_input.php : db에 전달받은 값을 입력 -->
<?php
  //db연결을 위한 주소
  include('./dbconn.php');

  //전달받은 값 변수에 담기
  $mb_id = trim($_POST['mb_id']); //아이디
  $mb_password = trim($_POST['mb_password']); //비밀번호
  $mb_name = trim($_POST['mb_name']); //이름
  $mb_tel = trim($_POST['mb_tel']); //전화번호
  $mb_email = trim($_POST['mb_email']); //이메일
  $mb_hobby = isset($_POST['mb_hobby']) ? implode(',', $_POST['mb_hobby']) : ""; // 관심사
  $mb_job = trim($_POST['mb_job']); //직업

  //현지 지역 시간으로 다시 설정
  date_default_timezone_set('Asia/Seoul');
  $mb_datetime = date('Y-m-d H:i:s', time());

  //패스워드 암호화
  $mb_password_hash = password_hash($mb_password, PASSWORD_DEFAULT);

  //값 출력하기
  echo "아이디 : $mb_id<br>";
  echo "패스워드 : $mb_password<br>";
  echo "이름 : $mb_name<br>";
  echo "전화번호 : $mb_tel<br>";
  echo "이메일주소 : $mb_email<br>";
  echo "현시간 : $mb_datetime<br>";
  echo "관심사 : $mb_hobby<br>";
  echo "직업 : $mb_job<br>";
  echo "출력완료";


  //db에 데이터 입력하기
  $sql = "INSERT INTO member (mb_id, mb_password, mb_name, mb_level, mb_tel, mb_email, mb_hobby, mb_job, mb_datetime) VALUES ('$mb_id', '$mb_password_hash', '$mb_name', 1, '$mb_tel', '$mb_email', '$mb_hobby', '$mb_job', '$mb_datetime')";

  // 쿼리 실행 및 오류 확인
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('회원가입이 완료되었습니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
  } else {
    echo "회원가입 오류: " . $sql . "<br>" . mysqli_error($conn);
  }


  // 연결 종료
  mysqli_close($conn);


?>