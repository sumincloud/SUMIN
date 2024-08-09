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
    // echo $class_no;
  
    //academy_list에서 데이터 받아오기
    $sql = "select * from academy_list where class_no='$class_no';";
    $result = mysqli_query($conn, $sql);
    $db = mysqli_fetch_array($result);

    // student_list에서 받아오기
    $sql2 = "select * from student_list where class_no='$class_no';";
    $result2 = mysqli_query($conn, $sql2);
    $student = mysqli_fetch_array($result2);
    // echo "왜 안나오냐".$student['0'];

    // attendance에서 출석일
    $sql3 = " select * from attendance";    
    $result3 = mysqli_query($conn, $sql3);
    $attendance = mysqli_fetch_array($result3);
    // echo $attendance['0'];   
    
    ?>

    <!-- 부스러기 -->
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-5 mb-4"> [<?php echo $db['2'];?>][<?php echo  $db['3'];?>][<?php echo  $db['4'];?>]<?php echo  $db['1'];?></h2>

    <!-- 탭컨텐츠 -->
    <article id="tab_con">
      <ul>
        <li><a href="student.php?class_no=<?php echo $class_no;?>" title="" class="act">학생관리</a></li>
        <li><a href="class_info.php?class_no=<?php echo $class_no;?>">강의소개</a></li>
        <li><a href="notice_list.php?class_no=<?php echo $class_no;?>">공지사항</a></li>
      </ul>
    </article>

    <!-- 내용 -->
    <article class="mt-2 mb-2">
    <table class="table table-hover">
      <caption>Q&A 목록</caption>
      <thead class="text-center">
        <?php
        $sql_c = "SELECT * FROM academy_list WHERE class_no = 1;";
        $result_c = mysqli_query($conn, $sql_c);
        while ($class_c = mysqli_fetch_array($result_c)) {
          $class_start = $class_c[12]; // 시작일
          $class_end = $class_c[13];   // 종료일
          date_default_timezone_set('Asia/Seoul'); //서울시간대
          $class_day = date('m/d');//오늘날짜

          echo $class_day;

          // DateTime 객체 생성
          $startDate = new DateTime($class_start);
          $endDate = new DateTime($class_end);

          // 테이블 헤더 출력
          echo '<tr style="border-top: 3px solid black; line-height:50px;">';
          echo '<th>번호</th>';
          echo '<th>학생명</th>';
          echo '<th>결석일</th>';
          echo '<th>상태</th>';


          // 시작일부터 종료일까지의 날짜 출력
          while ($startDate <= $endDate) {
            echo '<th>' . $startDate->format('m/d') . '</th>';
            $startDate->modify('+1 day'); // 날짜 증가
          }
          echo '</tr>';
        }
        ?>
      </thead>
      <tbody>
        <?php
        $sql_students = "SELECT * FROM student_list";
        $result_students = $conn->query($sql_students);
        if ($result_students->num_rows > 0) {
          $count = 1;
          while ($student = $result_students->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $student["name"] . "(" . $student["id"] . ")</td>";
            echo "<td></td>";
            echo "<td>" . $student["student_status"] . "</td>";

            // 학생의 출석 상태 표시
            $currentDate = new DateTime($class_start);
            while ($currentDate <= $endDate) {
              $attendance_date = $currentDate->format('Y-m-d');

              // 해당 날짜에 학생의 출석 데이터 확인
              $student_id = $student["id"];
              $sql_attendance = "SELECT * FROM attendance WHERE id = '$student_id' AND datetime = '$attendance_date'";
              $result_attendance = $conn->query($sql_attendance);

              if ($result_attendance->num_rows > 0) {
                // 출석 데이터가 있으면 O 출력
                echo '<td>0</td>';
              } else {
                // 출석 데이터가 없으면 X 출력
                echo '<td>1</td>';
              }

              $currentDate->modify('+1 day');
            }

            echo "</tr>";
            $count++;
          }
        } else {
          echo "<tr><td colspan='100'>학생 데이터가 없습니다.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <!-- 목록으로 -->
    <a href="class.php" title="목록으로" class="admin_btn">목록으로</a>
  </section>
  </main>
  <?php
  include('footer.php');
  ?>
</body>
</html>
