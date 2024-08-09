<?php
  // 세션이 이미 시작되었는지 확인
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('./php/include/dbconn.php');

  //사용자가 로그인한 경우, 데이터베이스에서 정보 가져옴
  if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM register WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = htmlspecialchars($row['name']);
    $profile = htmlspecialchars($row['profile']);

    // 세션 정보를 업데이트
    $_SESSION['name'] = $name;
    $_SESSION['profile'] = $profile;

    // --------------내 강의 정보 불러오는 부분----------------
    // order 테이블에서 세션ID와 일치하는 class_no 값을 가져오기
    $sql_my = "SELECT class_no FROM `order` WHERE id='$id'";
    $result_my = mysqli_query($conn, $sql_my);

    // class_no 값을 배열로 저장
    $class_no = array();
    while ($row_my = mysqli_fetch_array($result_my)) {
      $class_no[] = $row_my['class_no'];
    }

    // 강의목록
    $class_list = [];
    if (!empty($class_no)) {

      $class_no_str = implode(',', array_map('intval', $class_no));
      $class_sql = "SELECT * FROM academy_list WHERE class_no IN ($class_no_str)";
      $class_result = mysqli_query($conn, $class_sql);
      
      // 결과를 배열로 저장
      while ($row = mysqli_fetch_assoc($class_result)) {
          // 각 강의의 결제 정보 가져오기
          $class_no = intval($row['class_no']);
          $order_info_sql = "SELECT name, datetime FROM `order` WHERE class_no = $class_no AND id = '$id'";
          $order_info_result = mysqli_query($conn, $order_info_sql);
          $order_info = mysqli_fetch_assoc($order_info_result);
          $row['order_name'] = $order_info['name'];
          $row['order_datetime'] = $order_info['datetime'];

          // 강의목록 저장
          $class_list[] = $row;
      }
    }
  } else {
    $class_list = [];
  }


?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>신청 목록</title>
  <!-- 공통 헤드정보 삽입 -->
  <?php include('./php/include/head.php'); ?>

  <style>
    /* -----------신청목록 서식------------ */
    section{
      padding: 0 20px;
      max-width: 1025px;
      margin: 0 auto;
    }
    section > h2{
      font-size: var(--fs-large);
      font-weight: var(--fw-bold);
      padding: 40px 0 20px 0;
      text-align: center;
    }
    main{
      height: 100%;
      min-height: 100vh;
    }

    /* ---------모달 스타일--------- */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      padding-top: 60px;
    }
    .modal-content {
      background-color: #fefefe;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #888;
      top: 50%;
      transform: translateY(-50%);
      width: 300px;
      min-height: 300px;
    }
    .modal-content h2{
      margin: 10px 0;
      text-align: center;
      font-size: var(--fs-medium-large);
    }
    .modal-content p{
      line-height: 160%;
    }
    .close {
      color: #aaa;
      font-size: 30px;
      font-weight: bold;
      width: 40px;height: 40px;
      text-align: center;
      position: absolute;
      top: 10px; right:10px;
    }
    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <section>
      <p class="bread_c">
        <a href="./index.php" title="홈">홈</a> &#62; 
        <a href="./mypage.php" title="마이페이지">마이페이지</a> &#62; 
        <b><a href="./order_list.php" title="신청목록">신청목록</a></b>
      </p>
      <h2>신청 목록</h2>
      <!-- 상품목록 카드 스타일 -->
      <ul class="card-list">
        <!-- 태그에 맞는 강의 가져와서 리스트로 넣기 -->
        <?php if (isset($_SESSION['id'])): ?>
          <?php if (empty($class_list)): ?>
            <li>신청한 강의가 없습니다.</li>
          <?php else: ?>
            <?php foreach ($class_list as $row): ?>
              <li id="class-<?= $row['class_no']; ?>" 
                data-order-name="<?= $row['order_name'] ?>" 
                data-order-datetime="<?= $row['order_datetime'] ?>">
                <div onclick="location.href='./detail.php?class_no=<?= $row['class_no']; ?>'" style="cursor:pointer;">
                  <!-- 강의 썸네일 이미지 -->
                  <a href="./detail.php?class_no=<?= $row['class_no']; ?>" title="상세페이지로 이동">
                    <img src="./uploads/class_main/<?php echo $row['thumnail_img']; ?>" alt="강의 썸네일 사진">
                  </a>
                  <!-- 강의 이름 -->
                  <div>
                    <h2>
                      <a href="./detail.php?class_no=<?= $row['class_no']; ?>" title="상세페이지로 이동">
                        <?php echo $row['name']; ?>
                      </a>
                    </h2>

                    <!-- 강의 # 태그 -->
                    <p>
                      <span>#<?php echo $row['category2']; ?></span>
                      <span>#<?php echo $row['category1']; ?></span>
                      <span>#<?php echo $row['category3']; ?></span>
                    </p>

                    <!-- 기간 -->
                    <div>
                      <span><?php echo $row['start_date']; ?> ~ <?php echo $row['end_date']; ?></span>
                    </div>
                  </div>
                </div>

                <!-- 버튼이 들어가는 경우에만 삽입 -->
                <div>
                  <div class="btn-box-s mt-4">
                    <button class="btn-s" onclick="removeOrder('<?= $row['class_no']; ?>')">신청취소</button>
                    <button class="btn-s order_info" data-class-no="<?= $row['class_no']; ?>">결제정보</button>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
          <?php else: ?>
            <!-- 세션 ID가 없을 때 출력할 메시지 -->
            <li>로그인이 필요한 서비스입니다.</li>
        <?php endif; ?>
      </ul>
    </section>
  </main>
  
  
  <!-- 결제정보 모달 -->
  <div id="paymentModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>결제 정보</h2>
      <p id="orderName">이름: <span></span></p>
      <p id="orderDateTime">결제시간: <span></span></p>
    </div>
  </div>



  <!-- 공통푸터삽입 -->
  <?php include('./php/include/footer.php');?>

  <!-- 공통 바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>


  <script>
    $(document).ready(function() {
      // 결제정보 버튼 기능
      $('.order_info').on('click', function() {
        var classNo = $(this).data('class-no');
        var classElement = $('#class-' + classNo);

        // 선택한 강의 항목에서 결제 정보를 가져옴
        var orderName = classElement.data('order-name');
        var orderDateTime = classElement.data('order-datetime');

        // 모달에 결제 정보 표시
        $('#orderName span').text(orderName);
        $('#orderDateTime span').text(orderDateTime);

        // 모달 표시
        $('#paymentModal').show();
      });

      // 모달 닫기 버튼
      $('.close').on('click', function() {
        $('#paymentModal').hide();
      });


    });




    //신청취소 누르면 삭제하는 기능
    function removeOrder(classNo) {
      if (confirm('신청을 취소하시겠습니까?')){
        $.ajax({
          url: './php/order_list_delete.php',
          type: 'POST',
          data: {
            class_no: classNo,
            action: 'remove'
          },
          success: function(response) {
            console.log(response);
            alert('신청이 취소되었습니다.');
            // 삭제 성공 후 리스트에서 항목 제거
            $('#class-' + classNo).remove();
          },
          error: function(xhr, status, error) {
            console.error('요청 실패:', error);
          }
        });
      }
    }


  </script>
</body>
</html>