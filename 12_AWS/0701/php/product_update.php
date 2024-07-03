<?php 
  include('../db/db_conn.php');

  $no = $_GET['no'];
  $no = mysqli_real_escape_string($conn, $no); 

  echo $no;
  echo '데이터 수정';

  $sql = "select * from shop_data where no='$no'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  echo $row[0]; //no값
  echo $row[1]; //cate값
  echo $row[2]; //img주소
  echo $row[3]; //name
  echo $row[4]; //parent
  echo $row[5]; //price
  echo $row[6]; //comment
  echo $row[7]; //memo

?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="반려동물용품 쇼핑몰">
		<meta name="author" content="STORE BOM 쇼핑몰">
    <title>쇼핑몰 관리자 화면</title>
  </head>
  <body>
    <header>
      <h1>상단로고</h1>
      <nav>
        <ul>
          <li><a href="product_mg.php" title="상품등록">상품등록</a></li>
          <li><a href="./php/product_list.php" title="상품목록">상품목록</a></li>
          <li><a href="" title="분류관리">분류관리</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section>
        <h2>상품수정</h2>
        <form action="./php/product_dbupdate.php" method="post" enctype="multipart/form-data">
          <p>
            <label>상품명</label>
            <input type="text" id="p_name" name="p_name" value="<?php echo $row['name']?>">
          </p>
          <p>
            <label>카테고리</label>
            <select name="p_cate">
              <option>카테고리 선택</option>
              <option value="cate01">함께하는 공간</option>
              <option value="cate02">함께하는 외출</option>
              <option value="cate03">함께하는 목욕</option>
              <option value="cate04">건강한 간식</option>
            </select>
          </p>
          <p>
            <label>상품가격</label>
            <input type="text" name="p_price" id="p_price" value="<?php echo $row['price']?>">원
          </p>

          <p>
            <label>상품사진</label>
            <input type="file" name="p_myfile" id="p_myfile" value="파일첨부">
            <?php 
              // if(!isset($_POST['p_myfile'])){
              //   echo "";
              // }else{
              //   echo "<img src='./uploads/".htmlspecialchars($img)."'>";
              // }              
            ?>
          </p>
          <p>
            <label for="parent">상품요약설명</label>
            <textarea name="p_parent" id="p_parent" cols="30" rows="10"><?php echo $row['parent']?></textarea>
          </p>

          <p>
            <label for="comment">설명</label>
            <textarea name="p_comment" id="p_comment" cols="30" rows="10"><?php echo $row['comment']?></textarea>
          </p>

          <p>
            <label for="memo">메모</label>
            <input type="text" id="p_memo" name="p_memo" value="<?php echo $row['memo']?>">
          </p>

          <p>
            <input type="submit" name="action" value="상품수정">
            <input type="reset" value="취소하기">
          </p>
        </form>
      </section>
    </main>

    <footer class="text-center">
			<address >copyright&copy;2023 shoppingmall allrightes resverved.</address>
		</footer>
  </body>
</html>
