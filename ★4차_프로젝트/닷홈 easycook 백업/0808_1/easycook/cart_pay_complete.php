<?php
  include('./php/include/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 | 찜 완료</title>
    <!-- 공통 헤드정보 삽입 -->
    <?php include('./php/include/head.php'); ?>
    <!-- 메인서식 연결 -->
    <link rel="stylesheet" href="./css/main.css">

    <style>
      .hide{display:none;}
      .re_com{
        width:90%;
        margin:0 auto;
      }
      .re_com article{
        width:100%;
        text-align:center;
        padding-top:115px;
      }
      .re_com a{
        color:#fff;
        font-weight:var(--fw-normal);
      }
      .re_com i{
        font-size:100px;
        color:var(--red);
      }
      .re_com h2{
        font-size:var(--fs-xlarge);
        font-weight:var(--fw-bold);
        margin-top:13px;
        margin-bottom:28px;
      }
      .re_com p{
        font-size:var(--fs-medium-large);
        margin-bottom:62px;
      }
      @media (min-width: 1400px) {
        .re_com {
          width: 1400px;
        }
        .re_com article{
          width:50%;
          margin:0 auto;
          text-align:center;
          padding-top:180px;
        }
      }
    </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <section class="re_com">
      <h2 class="hide">결제완료</h2>
      <article>
        <i class="bi bi-check-circle"></i>
        <h2>예약 완료</h2>
        <p>강의 신청이 완료되었습니다.</p>
        <div class="btn-box-l">
          <!--여기 예약보는 페이지로 가기 reserve_list.php 페이지-->
          <button class="btn-l"><a href="./cart_list.php">신청 목록으로</a></button>
        </div>
      </article>
    </section>
  </main>

  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>

</body>
</html>