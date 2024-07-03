<?php
  include("./php/dbconn.php"); //db연결하기

  $id = $_POST['id'];
  $pwd = $_POST['pwd'];

  $id=mysqli_real_escape_string($conn, $id);
  $pwd=mysqli_real_escape_string($conn, $pwd);
  
  $pwd = PASSWORD_HASH('$pwd', PASSWORD_DEFAULT);
  // $pwd = PASSWORD('$pwd');

  $sql = "select * from free_board where id='$id' and PASSWORD_HASH('$pwd', PASSWORD_DEFAULT))";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  //echo $id . '<br>';
  //echo $pwd;

  //만약에 넘겨받은 id값이 없다면
  if(!$row[id]){
    echo "<script>alert('비밀번호가 달라 삭제 할 수 없습니다. 다시 확인하세요.');</script>";
    echo "<script>history.back(1);</script>"; //이전화면으로 돌아가기
    exit;
  }else{ //아이디와 패스워가 일치된다면 아래 쿼리 실행하여 게시물 삭제
    $sql = "delete from free_board where id='$id'";
    mysqli_query($conn, $sql);
    exit;
  }
?>

<script>location.replace('./view.php');</script>;
