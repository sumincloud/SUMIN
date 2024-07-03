<?php 
  include('../db/db_conn.php');

  $no = $_GET['no'];

  echo $no;
  echo '데이터 삭제';

  $sql = "DELETE FROM shop_data WHERE no = '$no'";
  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>alert('삭제 완료되었습니다.');</script>";
    echo "<script>location.replace('./product_list.php');</script>;";
  };
  

?>