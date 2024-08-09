<?php
  include('./php/include/dbconn.php');

    // 세션이 이미 시작되었는지 확인
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    if (isset($_SESSION['id'])) {
      $id = $_SESSION['id'];
      $name = $_SESSION['name'];
    }else{
      $id = null;
    }

    //여기는 리뷰 불러오는곳
    $sql = "SELECT * FROM review WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    //row3[star],row3[img],row3[review],row3[name],row3[datetime]
    $total_review= mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 | 나의 후기</title>
    <!-- 공통 헤드정보 삽입 -->
    <?php include('./php/include/head.php'); ?>
    <!-- 서브서식 연결 -->
    <link rel="stylesheet" href="./css/sub.css">
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <section class="review_list">
      <p class="bread_c">
        <a href="./index.php" title="홈">홈</a> &#62; 
        <a href="./mypage.php" title="마이페이지">마이페이지</a> &#62; 
        <b><a href="./review_list.php" title="나의 후기">나의 후기</a></b>
      </p>

      <h2>내가 쓴 후기 총 <?php echo $total_review ?>개</h2>
      <p>리뷰 수정 안내 <i class="bi bi-info-circle"></i></p>
      <article class="review_detail">
      <ul>
        <?php 
          while($row = mysqli_fetch_array($result)){ 
            $class_no = $row['class_no'];
            $arry_img = $row['img'];
            
            // echo $class_no;
            $sql2 = "select * from academy_list where class_no = '$class_no'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_array($result2);
            //강으명은 row2['name']로 
        ?>
          <li>
            <!--강의명-->
            <h2><?php echo $row2['name'] ?> <i class="bi bi-chevron-right"></i></h2>
            
            <!--별점-->
            <p class="day_gray">
            <?php
              $review_star = "";
              $star = $row["star"];
              for($i = 0; $i < 5; $i++){
                if($i < $star){
                  $review_star .= '<i class="bi bi-star-fill active"></i>' ;
                }else{
                  $review_star .= '<i class="bi bi-star-fill"></i>' ;
                }
              }
            ?>
            <span class="star"><?php echo $review_star; ?></span>
            <!--몇개월전-->
            <?php
              $datetime = $row["datetime"];
              $date = new DateTime($datetime);

              $today = new DateTime();
              $interval = $today->diff($date);

              // 차이 계산
              $years = $interval->y;
              $months = $interval->m;
              $days = $interval->d;
              $hours = $interval->h;
              $minutes = $interval->i;
              $seconds = $interval->s;

              // 결과 출력
              if ($years > 0) {
                  echo "{$years}년 전";
              } elseif ($months > 0) {
                  echo "{$months}개월 전";
              } elseif ($days > 0) {
                  echo "{$days}일 전";
              } elseif ($hours > 0) {
                  echo "{$hours}시간 전";
              } elseif ($minutes > 0) {
                  echo "{$minutes}분 전";
              } else {
                  echo "{$seconds}초 전";
              }
            ?>
            </p>

            <!--내용-->
            <p><?php echo $row['review']; ?></p>

            <!--사진-->
            <p class="review_img">
              <?php foreach (explode(",",$row['img']) as $file) { ?>
  
                <?php if($file == ''){ ?>
                  <img src="./uploads/review/<?php echo $file; ?>" alt="" class="hide">
                <?php }else{ ?>
                  <img src="./uploads/review/<?php echo $file; ?>" alt="">
                <?php } ?>
  
              <?php } ?>
            </p>

            <p class="ud_btn">
              <a href="./review_edit.php?no=<?php echo $row['no'] ?>" title="수정">수정</a>
              <a href="./php/review_del.php?no=<?php echo $row['no'] ?>" title="삭제">삭제</a>
            </p>

          </li>
        <?php } ?>
        </ul>
      </article>
    </section>
  </main>

  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>

</body>
</html>