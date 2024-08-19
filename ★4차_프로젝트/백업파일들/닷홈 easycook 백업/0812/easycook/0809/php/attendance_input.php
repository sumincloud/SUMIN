<?php
  session_start(); // 세션 시작

  // 데이터베이스 연결
  include('./include/dbconn.php');
  // 세션 ID 확인
  if (!isset($_SESSION['id'])) {
    echo "<script>
          alert('로그인이 필요합니다.');
          </script>";
    exit(); // 스크립트 종료
  }

  $class_no = $_POST['class_no'];
  $id = $_SESSION['id'];
  date_default_timezone_set('Asia/Seoul');
  $datetime = date('Y-m-d H:i:s', time());

  // register 테이블에서 세션id의 name과 teacher_code 가져오기
  $sql = "SELECT name, teacher_code FROM register WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $name = $row['name'];
  $teacher_code = $row['teacher_code'];

  // 데이터 삽입 쿼리 작성
  $sql = "INSERT INTO attendance (class_no, id, name, teacher_code, datetime) 
          VALUES ('$class_no', '$id', '$name', '$teacher_code', '$datetime')";

  // 쿼리 실행
  if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success', 'message' => '출석이 완료되었습니다.']);
  } else {
    echo json_encode(['status' => 'error', 'message' => '출석 실패: ' . mysqli_error($conn)]);
  }


  // 데이터베이스 연결 종료
  mysqli_close($conn);
?>