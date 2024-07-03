<?php
   // product_dbupdate.php

  $name = trim($_POST['p_name']);
  $price = trim($_POST['p_price']);
  $img = trim($_POST['p_myfile']);
  $p_parent = trim($_POST['p_parent']);
  $comment = trim($_POST['p_comment']);
  $memo = trim($_POST['p_memo']);

  //넘겨온 값 확인하기
  echo $name;
  echo $price;
  echo $img;
  echo $p_parent;
  echo $comment;
  echo $memo;

  $sql = "update from product";
?>