<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공지 작성 | 이지쿡</title>

  <?php
    include('header.php');  
  ?>
  <main>
    <section class="m-center m-auto mb-5 class_size">
      <!-- 부스러기 -->
      <p class="bread">홈 &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">공지작성</span></p>

      <!-- 제목 -->
      <h2 class="text-center mt-4 mb-4">공지작성</h2>

      <!-- 입력폼 -->
      <form action="notice_input.php" name="답변하기" method="post">

        <?php
          $class_no = $_GET['class_no'];        // echo "번호는".$class_no;

          // 강의정보 가져오기
          $query = "select * from academy_list where class_no='$class_no'";
          $result = mysqli_query($conn, $query);
          $class = mysqli_fetch_array($result);

          $class_no = $_GET['class_no'];        // echo "번호는".$class_no;

          // 강의정보 가져오기
          $query = "select * from academy_list where class_no='$class_no'";
          $result = mysqli_query($conn, $query);
          $class = mysqli_fetch_array($result);
        ?>
        <div class="mb-3 mt-5">
          <label for="title" class="form-label">제목</label>
          <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3">
          <label for="class_no" class="form-label">과목명</label>
          <input type="text" class="form-control"  name="class_no" id="class_no" readonly value="<?php echo $class[1];?>">
          <input type="hidden" value="<?php echo $class_no;?>">  
        </div>
        <div class="mb-3">
          <label for="memo" class="form-label">공지내용</label>
          <textarea name="memo" id="memo" class="form-control" cols="50" rows="10"></textarea>
        </div>
        <div class="mt-5" style="position:relative;">
          <a href="class_1.php" class="admin_btn admin_btn_yellow position_l_b">이전페이지</a>
          <input type="submit" value="작성완료" class="admin_btn admin_btn_red position_r_b">        
        </div>
      </form>
    </section>
  <?php include('footer.php');    ?>
</body>
</html>
