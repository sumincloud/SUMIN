<?php 
  include('../db/db_conn.php');

  $shop_id = trim($_POST['shop_id']);

  if($shop_id != NULL){
    $sql = "SELECT * FROM members WHERE mb_id='$shop_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($row['mb_id'])){
      echo "<span class='id_check2'>중복되는 아이디입니다.</span>";
    } else{
      echo "<span class='id_check1'>사용가능한 아이디입니다.</span>";
    }
  }

?>