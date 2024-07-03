<?php
  include('./db/db_conn.php');
  
  $no = $_GET['no'];
  $userid = $_SESSION['mb_id'];

  $quan = $_POST['quantity']; //수량

  echo $no . "<br>"; //id값
  echo $userid . "<br>"; //아이디명
  echo $quan . "<br>"; //수량

  $sql = "select * from shop_data where no='$no'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  // 현재 지역시간으로 설정해서 저장
  date_default_timezone_set('Asia/Seoul');
  $mb_datetime = date("Y-m-d H:i:s");

  $name = $row['name'];//상품명
  $parent = $row['parent']; //보조설명
  $count = $quan; //개수
  $price = $row['price']; //개수
  $money = $quan*$row['price']; //수량*가격
  $img = $row['img']; //가격
  $comment = $row['comment'];//총합
  
  // echo $name .'<br>';
  // echo $parent .'<br>';
  // echo $price .'<br>';
  // echo $money .'<br>';
  // echo $img .'<br>';
  // echo $comment .'<br>';
  // echo $mb_datetime .'<br>';

  $sql = "insert into shop_temp(name, parent, count, price, money, img, comment, session_id, datetime) value ('$name', '$parent', '$count', '$price', '$money', '$img', '$comment', '$userid', '$mb_datetime')";
  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>alert('장바구니에 선택하신 내용을 담았습니다.');</script>";
    echo "<script>location.replace('../cart.php');</script>";
    exit;
  }
?>