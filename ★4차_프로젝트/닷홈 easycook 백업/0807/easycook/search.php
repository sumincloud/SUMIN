<?php
  include('./php/include/dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 - 검색</title>
    <!-- 공통 헤드정보 삽입 -->
    <?php include('./php/include/head.php'); ?>

    <!-- 서식 연결 -->
    <link rel="stylesheet" type="text/css" href="./css/search.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <!--검색 창-->
    <section class="search">
      <h2 class="hide">검색창</h2>
      <article >
        <input type="search" class="search_bar">
        <h2 class="hide">검색창</h2>
        <i class="bi bi-search"></i>
      </article>
    </section>
    <!--최근검색어-->
    <section class="new_search"> 
      <h2>최근 검색어</h2>
      <article>
        <h2 class="hide">최근 검색어</h2>
        <div class="swiper mySwiper6">
          <ul class="swiper-wrapper">
            <li class="swiper-slide">#자격증</li>
            <li class="swiper-slide">#베이커리</li>
            <li class="swiper-slide">#바리스타</li>
            <li class="swiper-slide">#한식조리</li>
            <li class="swiper-slide">#중식조리</li>
            <li class="swiper-slide">#비건</li>
            <li class="swiper-slide">#국비반</li>
            <li class="swiper-slide">#양식조리</li>
          </ul>
        </div>
      </article>
    </section>
    <!--광고배너-->
    <section id="sec05">
      <!-- Swiper -->
      <div class="swiper mySwiper4">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./images/main/ad_1.png" alt="이미지">
          </div>
          <div class="swiper-slide">
            <img src="./images/main/ad_2.png" alt="이미지">
          </div>
          <div class="swiper-slide">
            <img src="./images/main/ad_3.png" alt="이미지">
          </div>
          <div class="swiper-slide">
            <img src="./images/main/ad_4.png" alt="이미지">
          </div>
        </div>
      </div>
    </section>
    <!--가장많이 검색중-->
    <section class="many_search">
      <h2>가장 많이 검색하고 있어요</h2>
      <article class="">
        <h2 class="hide">가장 많이 검색하고 있어요</h2>
        <ul>
          <li><span>1</span>한식조리기능사</li>
          <li><span>2</span>한식조리</li>
          <li><span>3</span>홈베이킹</li>
          <li><span>4</span>디저트</li>
          <li><span>5</span>양식조리</li>
        </ul>
        <ul>
          <li><span>6</span>자격증</li>
          <li><span>7</span>재직자과정</li>
          <li><span>8</span>실업자</li>
          <li><span>9</span>취미반</li>
          <li><span>10</span>카페창업</li>
        </ul>
      </article>
    </section>
  </main>

  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    var swiper4 = new Swiper(".mySwiper4", {
      spaceBetween: 0,
      centeredSlides: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction", // 페이지네이션을 번호로 표시
        clickable: true,
      },
  });


    var swiper = new Swiper(".mySwiper6", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>
</html>