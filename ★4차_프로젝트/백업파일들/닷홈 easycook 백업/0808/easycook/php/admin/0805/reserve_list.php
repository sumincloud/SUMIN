<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="요리 자격증, 요리 강의, 커피 자격증, 커피 강의, 베이커리 자격증, 베이커리 강의, 온라인 요리 수업, 요리 학원, 커피 학원, 베이커리 학원, 이지쿡, easycook, 요리 수강, 커피 수강, 베이킹 수강, 요리 온라인 강의, 커피 온라인 강의, 베이킹 온라인 강의, 요리 레시피, 베이킹 레시피">
  <meta name="description" content="이지쿡에서 요리, 커피, 베이커리 자격증과 수강, 온라인 강의를 배워보세요. 전문 강사진의 체계적인 교육으로 전문가가 되는 길을 안내합니다.">
  <meta name="Robots" content="Index, Follow">
  <meta http-equiv="Subject" content="이지하게 배우자, 이지쿡">
  <meta http-equiv="Title" content="이지쿡">
  <title>실습실 | 이지쿡</title>
  <?php include('header.php');   ?>
  <main>
    <section class="m-center m-auto mb-5 class_size">
      <!-- 부스러기 -->
      <p class="bread"><a href="index.php">홈</a> &#x003E; 학원 &#x003E; <span style="font-weight:bold">실습실</span></p>

      <!-- 제목 -->
      <h2 class="text-center mt-4 mb-4">실습실 예약 현황</h2>
      
      <!-- 실습실 예약 현황 보기 -->
      <article>
        <h3>예약현황 보기</h3>
        <!-- 날짜 선택 -->
        <?php
            // 현재 날짜와 시간 객체 생성
            $today = new DateTime();
            // 'Y-m-d' 형식으로 오늘 날짜 출력
            $todayTime = $today->format('Y-m-d'); //echo $todayTime;
        ?>
        <div class="mb-3">
          <label for="t_name" class="col-sm-2 col-form-label">날짜</label>
          <div>
            <form action="reserve_time.php" method="post" name="날짜 선택하기" id="reserve_time">
              <input type="date" class="form-control" name="select_time" id="select_time" value="<?php echo $todayTime;?>">
            </form>
          </div>
        </div>

        <script>
          $(document).ready(function(){
            //전송버튼 눌렀을 때 내용이 실행
            $('#select_time').on('change',function(){
              // alert('전송되었습니다.');
              let d = $(this).serialize();//데이터를 보내기 위해 폼 요소 집합을 문자열로 인코딩
              $.ajax({
                url:"reserve_time.php",
                type:"post",
                data:d,
                // dataType:"요청한데이터타입(html, xml, json, text, script)",
                success:function(result){
                  $('#txt1').html(result);
                }
                })
                return false; //action페이지로 전환되는 것을 방지
              });
          });
        </script>

        <!-- 데이터 출력 -->
        <div id="txt1">
        <?php
          // 101호 예약 현황
          $sql = "SELECT start, COUNT(*) FROM room WHERE room_date = '$todayTime' AND room = '101' GROUP BY start ORDER BY start";
          $result = mysqli_query($conn, $sql);

          // 102호 예약 현황
          $sql2 = "SELECT start, COUNT(*) FROM room WHERE room_date = '$todayTime' AND room = '102' GROUP BY start ORDER BY start";
          $result2 = mysqli_query($conn, $sql2);
          ?>

          <div class="admin_reserve">
            <!-- 실습실1 -->
            <div class="mb-3 admin_reserve_con">
              <p>실습실 101호</p>
              <div>
                <p>사용시간</p>
                <p>예약현황</p>
              </div>

              <?php 
              if (mysqli_num_rows($result) > 0) {
                while ($db = mysqli_fetch_array($result)) { ?>
                <div class="reserve_time">
                  <input type="checkbox" id="time<?php echo $db[0]*1 ?>">
                  <label for="time<?php echo $db[0]*1 ?>">
                    <ul>
                      <li><?php echo $db[0]*1 ?>:00 ~ <?php echo $db[0] + 1 ?>:00</li>
                      <li><span style="color:var(--red); font-weight:bold;"><?php echo $db[1] ?></span> / 8</li>
                    </ul>
                  </label>
                  <div class="reserve_p">
                    <ul>
                      <?php
                      $sql3 = "SELECT * FROM room WHERE `start` = '$db[0]' and room_date = '$todayTime' AND room = '101' GROUP BY start ORDER BY start";
                      $result3 = mysqli_query($conn, $sql3);
                      while($db3 = mysqli_fetch_array($result3)){?>
                      <li><?php echo $db3[7]."(".$db3[6].")";?></li>                
                      <?php }?>             
                    </ul>
                  </div>
                </div>
              <?php
                }} else {
                echo "<div class='text-center mt-1 mb-5 border rounded-1 p-3'>예약내역이 없습니다</div>";
              }
              ?>
            </div>

            <!-- 실습실2 -->
            <div class="mb-3 admin_reserve_con">
              <p>실습실 102호</p>
              <div>
                <p>사용시간</p>
                <p>예약현황</p>
              </div>

              <?php

              if (mysqli_num_rows($result2) > 0) {
                while ($db2 = mysqli_fetch_array($result2)) { ?>
                  <div class="reserve_time">
                    <input type="checkbox" id="time<?php echo $db2[0] ?>">
                    <label for="time<?php echo $db2[0] ?>">
                      <ul>
                        <li><?php echo $db2[0] ?>:00 ~ <?php echo $db2[0] + 1 ?>:00</li>
                        <li><span style="color:var(--red); font-weight:bold;"><?php echo $db2[1] ?></span> / 8</li>
                      </ul>
                    </label>
                    <div class="reserve_p">
                      <ul>
                      <?php
                        $sql3 = "SELECT * FROM room WHERE `start` = '$db[0]' and room_date = '$todayTime' AND room = '102' GROUP BY start ORDER BY start";
                        $result3 = mysqli_query($conn, $sql3);
                        while($db3 = mysqli_fetch_array($result3)){?>
                        <li><?php echo $db3[7]."(".$db3[6].")";?></li>                
                      <?php }?>         
                      </ul>
                    </div>
                  </div>
              <?php
                }} else {
                echo "<div class='text-center mt-1 mb-5 border rounded-1 p-3'>예약내역이 없습니다</div>";
              }
              ?>
            </div>
          </div>
        </div>

      </article>
  <?php include('footer.php');  ?>
