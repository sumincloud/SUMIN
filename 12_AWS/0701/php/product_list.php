<style>
  .product_list{
    border:1px solid #ccc;
    border-collapse:collapse;
    width:1200px;
    margin:0px auto 30px auto;
  }
  .product_list caption{
    font-weight:bold;
    font-size:20px;
    padding:20px 0px;
  }
  .product_list th{background:#111;color:#fff;}
  .product_list td:first-child{width:50px;}
  .product_list td:nth-child(2){width:110px;}
  .product_list td:nth-child(3){width:150px;}
  .product_list td:nth-child(4){width:250px;}
  .product_list td:nth-child(5){width:100px;}
  .product_list td:nth-child(6){width:150px;}
  .product_list td:nth-child(7){width:150px;}
  .product_list td:nth-child(8){width:120px;}
  .product_list td:nth-child(9){width:120px;}
  .product_list td:last-child{width:100px;}
  .product_list td, .product_list th{
    border:1px solid #ccc;
    line-height:34px;
    text-align:center;
  }
  img{width:120px;}
</style>
<?php 
  include('../db/db_conn.php');

  $sql = "SELECT * FROM shop_data";

  $result = mysqli_query($conn, $sql);
  // $row = mysql_fetch_assoc($result);

  echo "<table class='product_list'><caption>상품목록 리스트</caption>";
  echo "<tr><th>No.</th><th>상품분류</th><th>상품명</th><th>보조설명</th><th>가격</th><th>설명</th><th>메모</th><th>등록일</th><th>상품이미지</th><th>등록일</th></tr>";
  
  //반복문 for, do while , while, foreach
  //fetch_row : 인덱스값을 가지고 출력
  //fetch_assoc : 컬럼명을 가지고 출력
  while($row=mysqli_fetch_row($result)){
    echo "<tr><td>" . $row[0] . "</td>"; //no
    echo "<td>" . $row[1] . "</td>"; //분류
    echo "<td>" . $row[3] . "</td>"; //상품명
    echo "<td>" . $row[4] . "</td>"; //보조설명
    echo "<td>" . $row[5] . "</td>"; //가격
    echo "<td>" . $row[6] . "</td>"; //설명
    echo "<td>" . $row[7] . "</td>"; //메모
    echo "<td>" . date('Y-m-d', strtotime($row[8])) . "</td>"; //등록일
    echo "<td><img src='../images/shop/" . $row[2] . "' alt='상품이미지'></td>";
    echo "<td><a href='product_update.php?no=" . $row[0] . "' title='수정하기'>&#91;수정&#93;</a><a href='product_del.php?no=" . $row[0] . "' title='삭제하기'>	&#91;삭제&#93;</a></td></tr>";
  }

  echo "</table><p><a href='../admin.php' title='관리자'>&#91;관리자&#93;</a>&nbsp;<a href='../index.php' title='홈으로'>&#91;홈으로	&#93;</a></p>";

  //mysqli_free_result($result); //쿼리내용을 메모리에서 제거
  mysqli_close($conn); //데이터베이스 연결종료.
?>