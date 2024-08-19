<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 | 나의 강의실</title>
  <?php
    include('header.php');      
  ?>
<main>
  <section class="m-center m-auto mb-5 class_size">

    <!-- 부스러기 -->
    <p class="bread">홈 &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-5">나의 강의실</h2>

    <?php
      // 아이디와 일치하는 강사코드 받아오기
      $sql_t = "select * from register where id='$s_id';";
      $result_t = mysqli_query($conn, $sql_t);
      $t = mysqli_fetch_array($result_t);// echo "선생님 코드".$t[7];
      $teacher_code = $t['teacher_code'];// echo "선생님 코드".$teacher_code;

      //입력한  search 값 받아오고
      $search = $_POST['search'];    // echo $search;

      //입력한 값이랑 데이터 값을 비교한다
      $sql = "select * from academy_list where 
      (name like '%".$search."%' or category1 like '%".$search."%' or category2 like '%".$search."%'or category3 like '%".$search."%')
      and teacher_code='$teacher_code';";
      $result = mysqli_query($conn, $sql);
  ?>

    <article class="class_1">
      <h3>나의 강의실</h3>
      <!-- 내용 -->
      <div class="mt-4 mb-2" id="content">
        <div id="container">
          <table class="table table-hover table-responsive">
            <caption>Q&A 목록</caption>
            <thead class="text-center">
              <tr style="border-top: 3px solid black; line-height:50px;">
                <th>No.</th>
                <th>강의명</th>
                <th>상태</th>
              </tr>
            </thead>    
            <tbody>
              <!-- 전체강의 보기 -->
              <?php 
              while($row = mysqli_fetch_array($result)){
                echo
                "<tr>
                  <td><a href='student.php?class_no=".$row[0]."' title='학생페이지로'>" . $row[0]. "</a></td>"."
                  <td><a href='student.php?class_no=".$row[0]."' title='학생페이지로'>[".$row[3]."][". $row[4]."][".$row[5]."]". $row[1]."</a></td>";?> 
                  <!-- 현재강의 이면 녹색으로 하기 -->
                  <?php
                  $today = (new DateTime())->format('Y-m-d');
                  if($db['13'] <= $today and $db['14'] >= $today){
                    ?>
                    <td class="text-center">
                      <a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><span class="span_title green">현재강의<span></a>
                    </td>
                  <?php }elseif($db['13'] > $today ){; ?> 
                    <td class="text-center">
                      <a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><span class="span_title yellow">예정강의</span></a>
                    </td>
                  <?php }else{ ?> 
                    <td class="text-center">
                      <a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><span class="span_title darkbrown">지난강의</span></a>
                  </td>
                  <?php }; ?> 
                <?php  } ?> 
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="mt-5 mb-3" style="position:relative;">
        <a href="class_1.php" title="다시 검색하기" class="admin_btn admin_btn_yellow position_l_b">다시 검색</a>
      </div>

    </article>
  </section>
<?php
include('footer.php');
?>
</body>
</html>
