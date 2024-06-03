<?php 
  include("../dbconn.php");
  //db연결을 위해 인클루드함.

  //id값 넘겨받기
  $id = $_GET['id'];

  if(empty($id)){
    echo "<script>alert('체크실패 : id값이 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('../index.php');</script>";
    exit;
  }else{ //아이값을 제대로 가져온 경우 아래 내용 실행
    $sql = "SELECT * FROM todo WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $checked = (int)$row['checked'];
    //8.0문법
    // $checked_re = match ($checked) {
    //   1 => 0,
    //   0 => 1,
    // };

    //8.0이하일 경우
    $checked_re = 0;

    switch ($checked) {
      case 1:
        $checked_re = 0;
        break;
      default :
        $checked_re = 1;
    };

    $sql = "update todo set checked = '$checked_re' where id='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../index.php");

  }

?>