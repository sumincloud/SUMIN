<!-- add.php  데이터베이스 자료 입력해주는 파일 -->

<?php 
  include("../dbconn.php");

  $title = trim($_POST['title']);
  $datetime = date('Y-m-d H:i:s', time());

  //출력
  echo $title;
  echo $datetime;

  //데이터베이스에 입력한다.
  if(empty($title)){ //제목에 빈값이 있다면
    echo "<script>alert('입력실패 : 내용을 입력하지 않았습니다.');</script>";
    echo "<script>location.replace('../index.php');</script>";
    exit;
  }else{
    $sql = "insert into todo SET title='$title', datetime='$datetime'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location: ../index.php');
  }

?>