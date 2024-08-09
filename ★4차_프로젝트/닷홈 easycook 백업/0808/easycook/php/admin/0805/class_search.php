<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>나의 강의실 | 이지쿡</title>
  <?php
    include('header.php');      
  ?>
<main>
  <section class="m-center m-auto mb-5 class_size">

    <!-- 부스러기 -->
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4">나의 강의실</h2>

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
      <!-- 내용 -->
      <div class="mt-2 mb-2" id="content">
        <div id="container">
          <table class="table table-hover table-responsive">
            <caption>Q&A 목록</caption>
            <thead class="text-center">
              <tr style="border-top: 3px solid black; line-height:50px;">
                <th>강의번호</th>
                <th>강의명</th>
                <th>난이도</th>
                <th>강의상태</th>
              </tr>
            </thead>    
            <!-- 테이블 불러오기 php -->
            <tbody>
              <!-- 전체강의 보기 -->
              <?php 
              while($row = mysqli_fetch_array($result)){

                echo
                "<tr>
                  <td><a href='student.php?class_no=".$row[0]."' title='학생페이지로'>" . $row[0]. "</a></td>"."
                  <td><a href='student.php?class_no=".$row[0]."' title='학생페이지로'>[".$row[3]."][". $row[4]."][".$row[5]."]". $row[1]."</a></td>"."
                  <td><a href='student.php?class_no=".$row[0]."' title='학생페이지로'>" . $row[10]. "</a></td>";?> 
                  <!-- 현재강의 이면 녹색으로 하기 -->
                  <?php if($row[16] == '현재강의'){?>
                    <td class="text-center"><a href="student.php?class_no=<?php echo $row[0];?>" title="학생페이지로"><span class="span_title" style="background-color:var(--green);"><?php echo $row[17];?><span></a></td>
                    <?php     }elseif($row[17] == '예정강의'){; ?> 
                      <td class="text-center"><a href="student.php?class_no=<?php echo $row[0];?>" title="학생페이지로"><span class="span_title" style="background-color:var(--yellow); color:var(--darkbrown);"><?php echo $row[17];?></span></a></td>
                      <?php     }else{ ?> 
                        <td class="text-center"><a href="student.php?class_no=<?php echo $row[0];?>" title="학생페이지로"><span class="span_title" style="background-color:var(--darkbrown);"><?php echo $row[17];?></span></a></td>
                      <?php echo "</tr>";}; ?> 
                <?php  } ?> 
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="mt-5 mb-3" style="position:relative;">
        <a href="class_1.php" title="다시 검색하기" class="admin_btn admin_btn_yellow position_l_b">다시 검색</a>
      </div>

    </article>
  <?php
  include('footer.php');
  ?>
</body>
</html>
