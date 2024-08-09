<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>나의 강의실 | 이지쿡</title>
  <?php include('header.php'); ?>
</head>
<body>
  <main>
    <section class="m-center m-auto mb-5 class_size">
      <?php
      // 번호 받아오기
      $class_no = '1';   

      //academy_list에서 데이터 받아오기
      $sql = "SELECT * FROM academy_list WHERE class_no='$class_no';";
      $result = mysqli_query($conn, $sql);
      $db = mysqli_fetch_array($result);

      // student_list에서 받아오기
      $sql2 = "SELECT * FROM student_list WHERE class_no='$class_no';";
      $result2 = mysqli_query($conn, $sql2);

      // attendance에서 출석일
      $sql3 = "SELECT * FROM attendance WHERE class_no='$class_no';";
      $result3 = mysqli_query($conn, $sql3);

      ?>

      <!-- 부스러기 -->
      <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

      <!-- 제목 -->
      <h2 class="text-center mt-5 mb-4"> [<?php echo $db['2'];?>][<?php echo $db['3'];?>][<?php echo $db['4'];?>]<?php echo $db['1'];?></h2>

      <!-- 탭컨텐츠 -->
      <article id="tab_con">
        <ul>
          <li><a href="student.php?class_no=<?php echo $class_no;?>" title="" class="act">학생관리</a></li>
          <li><a href="class_info.php?class_no=<?php echo $class_no;?>">강의소개</a></li>
          <li><a href="notice_list.php?class_no=<?php echo $class_no;?>">공지사항</a></li>
        </ul>
      </article>

      <!-- 내용 -->
      <article class="mt-2 mb-2 scrollable">
        <h3>테이블</h3>
        <table class="table table-hover text-center student">
          <caption>Q&A 목록</caption>
          <thead>
            <?php
            while ($class_c = mysqli_fetch_array($result)) {
              $class_start = $class_c['시작일']; // 시작일
              $class_end = $class_c['종료일'];   // 종료일
              date_default_timezone_set('Asia/Seoul'); //서울시간대
              $class_day = date('Y-m-d'); // 오늘날짜

              // DateTime 객체 생성
              $startDate = new DateTime($class_start);
              $endDate = new DateTime($class_end);
              $toDay = new DateTime($class_day);

              // 날짜 차이 계산
              $interval2 = $toDay->diff($startDate); // 진행 수업 일수 = 오늘날짜 - 시작날짜
              $interval = $endDate->diff($startDate); // 총 수업 일수

              $ing = ($interval2->days / $interval->days) * 100;

              echo "<tr>";
              echo "<th>No.</th>";
              echo "<th>ID</th>";
              echo "<th>출석률</th>";

              // 시작일부터 종료일까지의 날짜 출력
              while ($startDate <= $endDate) {
                echo '<th>' . $startDate->format('m/d') . '</th>';
                $startDate->modify('+1 day'); // 날짜 증가
              }
              echo "</tr>";
            }
            ?>
          </thead>
          <tbody>
            <?php
            if ($result2->num_rows > 0) {
              $count = 1;
              while ($student = mysqli_fetch_assoc($result2)) {
                $student_id = $student["id"];

                // 출석률 계산
                $sql_1 = "
                SELECT COUNT(*) AS 출석횟수
                FROM attendance 
                WHERE id = '$student_id'
                  AND class_no = '$class_no'
                  AND datetime BETWEEN '$class_start' AND '$class_end';
                ";
                
                $result_4 = mysqli_query($conn, $sql_1);
                $row_4 = mysqli_fetch_assoc($result_4);

                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $student_id . "</td>";

                // 출석률 출력
                if ($interval2->days > 0) {
                  $attendance_rate = ($row_4['출석횟수'] / $interval2->days) * 100;
                  echo "<td>" . round($attendance_rate, 2) . "%</td>";
                } else {
                  echo "<td>0%</td>";
                }

                // 학생의 출석 상태 표시
                $currentDate = new DateTime($class_start);
                while ($currentDate <= $endDate) {
                  $attendance_date = $currentDate->format('Y-m-d');

                  // 해당 날짜에 학생의 출석 데이터 확인
                  $sql_attendance = "
                    SELECT * FROM attendance 
                    WHERE id = '$student_id' 
                      AND datetime = '$attendance_date' 
                      AND class_no = '$class_no'
                  ";

                  $result_attendance = $conn->query($sql_attendance);

                  if ($result_attendance->num_rows > 0) {
                    // 출석 데이터가 있으면 O 출력
                    echo '<td style="color: var(--green); background-color: var(--green);">O</td>';
                  } else {
                    // 출석 데이터가 없으면 빈 셀 출력
                    echo '<td></td>';
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
      </article>

      <!-- 목록으로 -->
      <a href="class.php" title="목록으로" class="admin_btn">목록으로</a>
    </section>
  </main>
  <?php include('footer.php'); ?>
</body>
</html>
