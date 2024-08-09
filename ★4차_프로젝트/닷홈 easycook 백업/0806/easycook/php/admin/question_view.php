<!-- 문의 보기 -->

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>문의 보기 | 이지쿡</title>
  <?php include('header.php');        ?>
  <main>
    <section class="m-center m-auto mb-5 class_size">

    <!-- 부스러기 -->
      <p class="bread">홈 &#x003E; 게시판 관리 &#x003E; <span style="font-weight:bold">문의 관리</span></p>

      <!-- 제목 -->
      <h2 class="text-center mt-4 mb-4">문의 보기</h2>
    
      <!-- 질문과 답변 -->
      <form action="answer_input.php" name="답변하기" method="post">
        <table class="table m-auto mt-5">
          <caption>질문과 답변</caption>
          <?php      
          //질문번호 겟방식으로 가져오기
          $no = $_GET['no'];
          
          // 질문 내용 가져오기
          $sql = "select * from question where no='$no;'";
          $result = mysqli_query($conn, $sql);
          $q=mysqli_fetch_row($result);
          
          // 강의정보 가져오기
          $query = "select * from academy_list where class_no='$q[1]'";
          $result2 = mysqli_query($conn, $query);
          $class = mysqli_fetch_array($result2);
          ?>
          <thead>
            <tr>
              <th>
                <input type="hidden" value="<?php echo $no;?>" name="q_num">
                <span style="font-weight:var(--fw-light);">No. <?php echo $no;?></span>
                <span style="font-weight:var(--fw-light);"> [<?php echo  $class[2];?>][<?php echo  $class[3];?>]<?php echo  $class[1];?></span>
                <span style="float: right; font-weight:var(--fw-light);"><?php echo $q[2];?> &nbsp;&nbsp;</span>
                <span style="float: right; font-weight:var(--fw-light);"><?php echo date("Y.m.d",strtotime($q[5]));?></span>
              </th>
            </tr>
            <tr>
              <th><?php echo $q[3];?></th>
            </tr>
          </thead>
          <tbody style="height: 359px;">
            <tr>
              <td><?php echo $q[4];?></td>
            </tr>
            <tr style="border-top: 3px solid black;">
              <td>
                <label for="answer">답변내용</label>
                <textarea name="answer" id="answer" class="form-control" cols="30" rows="10"><?php echo $q[7]?></textarea>
              </td>
            </tr>
          </tbody> 
        </table>
        <div class="mt-5 mb-3" style="position:relative;">
          <a href="question_1.php" title="목록으로" class="admin_btn admin_btn_yellow position_l_b" >이전페이지</a>
          <input type="submit" value="답변완료" class="admin_btn admin_btn_red position_r_b">
        </div>
      </form>

      <!-- 글 수정시 br태그 안나오게 하기 -->
      <script>
        //텍스트 박스 변수
        let txtbox = document.getElementById('answer');

        //텍스트 박스 안의 텍스트값을 변수에 저장
        let txtboxv = txtbox.value;

        //텍스트 박스안의 내용을 br 태그 제거하여 다시 저장
        let txtbox2 = txtboxv.replace(/(<br>|<br\/>|<br \/>)/g,'\r\n');

        console.log(txtbox2);

        //화면에 나온 내용을 지우고
        txtbox.value= "";

        //br 태그가 제거된 택스트를 출력한다.
        txtbox.value= txtbox2;

      </script>
    </section>
  <?php include('footer.php');  ?>
</body>
</html>