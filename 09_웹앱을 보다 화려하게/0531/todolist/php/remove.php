<?php
  include("../dbconn.php"); //db연결을 위하여 인클루드 함.

  //id값 넘겨 받기
  $id = $_GET['id'];
  echo $id;  //아이디 값 확인

  if(empty($id)){ //id값이 없다면
    echo "<script>alert('삭제실패 : id값이 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('../index.php');</script>";
    exit;
  }else{ //id값이 존재한다면
    // 삭제 쿼리문
    $sql = "delete from todo where id = '$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    //header("Location: ../index.php");  //1. 응답헤더를 사용하는 방법
    echo "<script>location.replace('../index.php');</script>"; //2. 자바스크립트 사용
  }
?>