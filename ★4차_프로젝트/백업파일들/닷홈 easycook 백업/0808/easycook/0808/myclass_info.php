<?php
  // 세션이 이미 시작되었는지 확인
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('./php/include/dbconn.php');

  //사용자가 로그인한 경우 나의 강의정보 보여줌
  if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];

    $class_no = $_GET['class_no'];

    $sql = "select * from academy_list where class_no = '$class_no'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    // 출석 현황 조회
    $sql_attendance = "
        SELECT
        a.class_no,
        a.id,
        a.datetime AS attendance_time,
        al.start_time,
        al.end_time,
        CASE
          WHEN TIME(a.datetime) <= TIME(al.start_time) THEN '출석' -- 수업 시작 전 출석
          WHEN TIME(a.datetime) <= TIME(al.start_time) + INTERVAL 10 MINUTE THEN '출석' -- 수업 시작 후 10분 이내 출석
          WHEN TIME(a.datetime) <= TIME(al.end_time) THEN '지각' -- 수업 종료 전 지각
          ELSE '결석' -- 수업 종료 후 결석
        END AS status
    FROM
        attendance a
    JOIN
        academy_list al ON a.class_no = al.class_no
    WHERE
        a.id = '$id'
    AND
        a.class_no = '$class_no';
    ";
    $result_attendance = mysqli_query($conn, $sql_attendance);

    // 출석 상태 카운트
    $attendance_count = ['출석' => 0, '지각' => 0, '결석' => 0];
    while ($attendance_row = mysqli_fetch_array($result_attendance)) {
        $attendance_count[$attendance_row['status']]++;
    }

    // 강의 전체 기간 계산
    $start_date = new DateTime($row['start_date']);
    $end_date = new DateTime($row['end_date']);
    $current_date = new DateTime(); // 현재 날짜
    $interval = $start_date->diff($end_date);
    $total_days = $interval->days + 1; // 전체 기간 (포함)

    // 진행된 기간 계산
    $progress_interval = $start_date->diff($current_date);
    $progress_days = $progress_interval->days + 1; // 현재 날짜까지의 기간 (포함)

    // 날짜가 현재 날짜보다 이후인 경우 진행된 기간을 전체 기간으로 설정
    if ($current_date > $end_date) {
        $progress_days = $total_days;
    }

    // 출석률 계산
    $attend_rate = ($attendance_count['출석'] / $total_days) * 100;


  } else {
    echo "<script>
            alert('로그인이 필요한 서비스입니다.');
            window.location.href = './login.php';
          </script>";
  }


?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>나의 강의정보</title>
  <!-- 공통 헤드정보 삽입 -->
  <?php include('./php/include/head.php'); ?>

  <!-- Chart.js CDN 원형그래프 -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    /* -----------강의정보 페이지 서식------------ */
    section{
      padding: 0 20px;
    }
    section > h2{
      font-size: var(--fs-large);
      font-weight: var(--fw-bold);
      padding: 40px 0 20px 0;
      text-align: center;
    }
    .col{
      max-width: 600px;
      margin: 0 auto;
    }
    .card{
      padding: 20px;
    }
    .card img{
      max-height: 200px;
      object-fit: cover;
      border-radius: 5px;
    }
    .card-body{
      padding: 10px 10px 0 10px;
    }
    .card-title{
      font-size: var(--fs-medium-large);
      margin: 10px 0;
    }
    .card-text{
      line-height: 160%;
    }

    /* 이전 버튼 */
    .gray_btn{
      background: #D9D9D9 !important;
      color: #000000 !important;
    }

    /* 원형 그래프 */
    .circles{
      display: flex;
      width: 65%;
      margin: 190px auto;
    }
    .circle{
      margin: 0 auto;
      width: 160px;
      height: 160px;
      position: relative;
      align-items: center;
    }
    .outer{
      height: 160px; width: 160px;
      border-radius: 50%;
      padding: 20px;
      border: none;
      background: rgba(38, 164, 80, 0.15);
    }
    .inner{
      height: 120px; width: 120px; 
      border-radius: 50%;
      display: flex; align-items: center; 
      justify-content: center;
      background: #fff;
    }
    .inner > p{
      font-size: 24px;
      color: var(--green);
      font-weight: 550;
    }

    .circle_cap{
      display: inline-block;
      fill: none;
      stroke: url(#gauge);
      stroke-width: 20px;
      stroke-dasharray: 472;
      stroke-dashoffset: 472;
      transform: rotate(-90deg);
      transform-origin: 50% 50%;
    }
    svg{
      position: absolute;
      top: 0; left: 0;
      margin-left: auto;
    }

    /* 테이블 및 flexbox 스타일 */
    .attend_box {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      align-items: center;
    }
    .table-wrapper {
      flex: 1;
      max-width: 600px;
      width: 100%;
    }

  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <section class="container mt-5">
      <h2 class="mb-3">나의 강의정보</h2>
      <!-- 상품목록 카드 스타일 -->
      <ul class="row">
        <li class="col">
          <div class="card">
            <img src="./uploads/class_main/<?php echo $row['thumnail_img']; ?>" class="card-img-top" alt="강의 썸네일 사진">
            <div class="card-body">
              <p class="card-title"><strong><?php echo $row['name']; ?></strong></p>
              <hr>
              <p class="card-text">
                  일정 : <?php echo $row['start_date']; ?> ~ <?php echo $row['end_date']; ?><br>
                  차수 : <?php echo $row['nth']; ?>차<br>
                  난이도 : <?php echo $row['grade']; ?><br>
                  장소 : <?php echo $row['place']; ?><br>
                  강사명 : <?php echo $row['teacher']; ?><br>
                  연락처 : 02-1234-1234
              </p>
            </div>
          </div>
          <div class="card" style="border:none;">
            <div class="card-body">
              <p class="card-title text-center"><strong>출석현황</strong></p>
              <div class="attend_box mt-5">
                <!-- 원형 그래프 -->
                <div class="circle">
                  <div class="outer">
                    <div class="inner">
                      <p><!-- 퍼센트 들어가는 부분 --></p>
                    </div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160">
                    <defs>
                      <linearGradient id="gauge">
                        <stop offset="0%" stop-color="#26A450"></stop>
                        <stop offset="100%" stop-color="#26A450"></stop>
                      </linearGradient>
                    </defs>
                    <circle class="circle_cap" cx="80" cy="80" r="70" stroke-linecap="round" style="stroke-dashoffset: 115.75px;"></circle>
                  </svg>
                </div>
                <!-- 출석일자 -->
                <div class="table-wrapper">
                  <table class="table table-bordered text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>출석</th>
                        <th>지각</th>
                        <th>결석</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $attendance_count['출석']; ?>일</td>
                        <td><?php echo $attendance_count['지각']; ?>일</td>
                        <td><?php echo $attendance_count['결석']; ?>일</td>
                      </tr>
                      <tr>
                        <td colspan="3" class="pt-4" style="color: #888;">
                          <span style="margin-right:15px;">강의 진행률</span>
                          <span><?php echo $progress_days; ?> / <?php echo $total_days; ?>일</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="btn-box-l mb-5 mt-4">
            <button class="btn-l gray_btn" onclick="history.back();">이전으로</button>
          </div>
        </li>
      </ul>
    </section>


  </main>

  <!-- 공통푸터삽입 -->
  <?php include('./php/include/footer.php');?>

  <!-- 공통 바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>


  <script>
    //찜목록에서 삭제하는 기능
    function removeCart(classNo) {
      $.ajax({
        url: './php/cart_toggle.php',
        type: 'POST',
        data: {
          class_no: classNo,
          action: 'remove'
        },
        success: function(response) {
          console.log(response);
          // 삭제 성공 후 리스트에서 항목 제거
          $('#class-' + classNo).remove();
        },
        error: function(xhr, status, error) {
          console.error('요청 실패:', error);
        }
      });
    }

    //-----------------원형 그래프--------------- 
    $(document).ready(function() {
        // 원형 그래프 애니메이션 함수
        function circle() {
          $('.circle').each(function() {
            const $this = $(this);
            const $inner = $this.find('.inner p');
            const $circle = $this.find('circle');
            const circleLength = $circle[0].getTotalLength(); 
            // PHP에서 계산된 출석률을 JavaScript 변수에 전달
            const attendLate = <?php echo $attend_rate; ?>;
            $circle.css({
              'stroke-dasharray': circleLength,
              'stroke-dashoffset': circleLength
            });

            $({ rate: 0 }).animate({ rate: attendLate}, {
              duration: 1500,
              step: function() {
                const currentOffset = circleLength - (circleLength * this.rate / 100);
                $circle.css('stroke-dashoffset', currentOffset);
              }
            });
            // 출석률 %를 원형 안에 설정
            $inner.text(Math.round(attendLate) + '%');
          });
        }

        // 페이지 로딩 시 애니메이션 실행
        circle();
      
    });



  </script>
</body>
</html>