<?php
  include('./php/include/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 | 준비중입니다</title>
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
        font-size:84px;
        color:#a8a8a8;
      }
      .re_com h2{
        font-size:var(--fs-xlarge);
        font-weight:var(--fw-bold);
        margin-top:28px;
        margin-bottom:28px;
      }
      .re_com span{
        color:var(--green);
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
      <h2 class="hide">현재 페이지는 <span>준비중</span>입니다</h2>
      <article>
        <i class="bi bi-alarm"></i>
        <h2>현재 페이지는 <span>준비중</span>입니다</h2>
        <p>이용에 불편을 드려 죄송합니다.<br>빠른 시일 내에 더욱 나은 모습으로 <br> 찾아뵙겠습니다.</p>
        <div class="btn-box-l">
          <!--여기 예약보는 페이지로 가기 reserve_list.php 페이지-->
          <button class="btn-l"><a href="javascript:history.back();">메인으로</a></button>
        </div>
      </article>
    </section>
  </main>

  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>

</body>
</html>