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
      echo $class_no;
    
      //academy_list에서 데이터 받아오기
      $sql = "select * from academy_list where class_no='$class_no';";
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
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; 나의 강의실 &#x003E; <span style="font-weight:bold">강의소개</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-5 mb-4"> [<?php echo $db['2'];?>][<?php echo  $db['3'];?>][<?php echo  $db['4'];?>]<?php echo  $db['1'];?></h2>

    <!-- 탭컨텐츠 -->
    <article id="tab_con">
      <ul>
        <li><a href="student.php?class_no=<?php echo $class_no;?>" title="">학생관리</a></li>
        <li><a href="class_info.php?class_no=<?php echo $class_no;?>" class="act">강의소개</a></li>
        <li><a href="notice_list.php?class_no=<?php echo $class_no;?>">공지사항</a></li>
      </ul>
    </article>

    <!-- 내용 -->
    <div class="class_info">
      <div class="mt-2 mb-2">
        <div class="thumbnail">
          <img src="" alt="">
        </div>
        <div class="class_detail">
          <ul>
            <li>일&#x3000;정 : </li>
            <li>차&#x3000;수 : </li>
            <li>난이도 : </li>
            <li>장&#x3000;소 : </li>
            <li>연락처 : </li>
          </ul>
        </div>
      </div>
      <div class="m-auto">
        <img src="../../images/admin/detail.png" alt="강의 상세 설명">
      </div>
    </div>  

    <!-- 목록으로 -->
    <a href="class.php" title="목록으로" class="admin_btn admin_btn_red">목록으로</a>
    <!-- 강의 개설 내용 수정 하기 -->
    <a href="class_update.php" title="강의수정" class="admin_btn admin_btn_red">강의수정</a>


    </section>
  </main>
    <?php
    include('footer.php');
    ?>
</body>
</html>
