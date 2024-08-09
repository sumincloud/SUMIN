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
    <?php
    // 번호 받아오기
    $class_no = $_GET['class_no'];    
    echo "번호".$class_no;

    // 아이디와 일치하는 강사코드 받아오기
    $sql_t = "select teacher_code from register where id='$s_id';";
    $result_t = mysqli_query($conn, $sql_t);
    echo $result_t;

    //academy_list에서 데이터 받아오기
    $sql = "select * from academy_list where class_no='$class_no' and teacher_code='$teacher_code';";
    $result = mysqli_query($conn, $sql);
    $db = mysqli_fetch_array($result);

    // student_list에서 받아오기
    $sql2 = "select * from student_list where class_no='$class_no';";
    $result2 = mysqli_query($conn, $sql2);
    $student = mysqli_fetch_array($result2);
    echo "왜 안나오냐".$student['0'];

    // register에서 회원 이름 받아오기
    $sql3 = "
    select r.name
    from register as r inner join student_list as s 
    on r.id=s.id;";    
    $result3 = mysqli_query($conn, $sql3);
    $attendance = mysqli_fetch_array($result3);
    echo $attendance['0'];   
    
    ?>

    <!-- 부스러기 -->
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4"> [<?php echo $db['2'];?>][<?php echo  $db['3'];?>][<?php echo  $db['4'];?>]<?php echo  $db['1'];?></h2>

    <!-- 탭컨텐츠 -->
    <article id="tab_con">
      <ul>
        <li><a href="class_1.php" title="" class="act">전체</a></li>
        <li><a href="class_2.php" title="" >지난 강의</a></li>
        <li><a href="class_3.php" title="" >현재 강의</a></li>
        <li><a href="class_4.php" title="" >보류 &#x007C; 예정</a></li>
      </ul>
    </article>

    <!-- 내용 -->
    <article class="display_flex mt-2 mb-2">
      <!-- 학생리스트 -->
      <div>
        <table class="table table-hover ">
          <caption>Q&A 목록</caption>
          <thead class="text-center">
            <tr style="border-top: 3px solid black; line-height:50px;">
            <th class="">번호</th>
            <th class="">학생명(아이디)</th>
            <th class="">결석일</th>
            <th class="">상태</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($student = mysqli_fetch_array($result2)){                            
            ?>
            <tr>
              <td><a href="" title="">1</a></td><!-- 자바스크립트로 번호 호출하기 -->
              <td><a href="" title="">이름(<?php echo $student['2'];?>)</a></td>
              <td><a href="" title=""></a></td><!--날짜중에 아이디가 있는지-->
              <td><a href="" title=""><?php echo $student['3'];?></a></td>
            </tr>
            <?php
            };?>
          </tbody>
        </table>
      </div>

      <!-- 출석부 -->
      <div>
        <table class="table table-hover">
          <caption>출석부</caption>
          <thead class="text-center">
            <tr style="border-top: 3px solid black; line-height:50px;">
              <th>
              학생명
              </th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </article>
    <!-- 목록으로 -->
    <a href="class.php" title="목록으로" class="admin_btn admin_btn_yellow">목록으로</a>
  </section>
  </main>
  <?php
  include('footer.php');
  ?>
</body>
</html>
