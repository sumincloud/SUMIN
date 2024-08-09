<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>떠나개</title>
  <!-- 1. 부트스트랩 css연결하기 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 2. 부트스트랩 js연결하기 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 3. 부트스트랩 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- 공통서식 연결 -->
  <link rel="stylesheet" href="../css/common.css">
  <!-- 메인 css 서식 연결 -->
  <link rel="stylesheet" href="../css/main.css">
  <!-- 스와이퍼 css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <!-- 스와이퍼 js -->
  <script src="../script/swiper.js"></script>
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- 메인 스크립트 -->
  <script src="../script/main.js"></script>
</head>
<body>
  <?php
  // 세션 시작
  session_start();

  // 사용자가 로그인한 경우, mb_name을 세션에서 가져옴
  if (isset($_SESSION['ss_mb_name'])) {
    $mb_name = $_SESSION['ss_mb_name'];
  } else {
    $mb_name = null;
  }
  ?>


  <!-- 공통헤더삽입 -->
  <?php include('./header.php')?>

  <!-- 메인서식 -->
  <main>
    <!-- 1. 메인배너 -->
    <section id="sec01">
      <!-- Swiper -->
      <div class="swiper mySwiper1">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="main_img">
              <img src="../images/main_visual_01.jpg" alt="">
            </div>
            <div class="main_txt">
              <span>서울부터 부산까지<br>한 번에 떠나개</span>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="main_img">
              <img src="../images/main_visual_01.jpg" alt="">
            </div>
            <div class="main_txt">
              <span>서울부터 부산까지<br>한 번에 떠나개</span>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="main_img">
              <img src="../images/main_visual_01.jpg" alt="">
            </div>
            <div class="main_txt">
              <span>서울부터 부산까지<br>한 번에 떠나개</span>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="input-group mb-3" id="search_box">
        <span class="input-group-text" style="background: #fff; border-radius: 30px 0 0 30px;">
          <i class="bi bi-search"></i>
        </span>
        <input type="text" id="main_search" class="form-control" aria-label="검색창" placeholder="반려견이랑 어디로 떠날까?" style="border-left: none; border-radius: 0 30px 30px 0;">
      </div>
    </section>

    <!-- 2. 카테고리 -->
    <section class="padding">
      <div class="d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">카테고리</h2>
        <a href="#" title="카테고리 전체보기" style="color: var(--main_color); line-height: 32px;">+ 전체보기</a>
      </div>
      <div>
        <div class="d-flex justify-content-between mb-2">
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_seoul.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">서울</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_jeju.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">제주</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_busan.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">부산</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_001.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">강릉</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_002.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">인천</p>
          </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_003.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">경주</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_004.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">가평</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_005.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">여수</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_006.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">이벤트</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_007.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;text-rendering: optimizeLegibility;">쿠폰</p>
          </div>
        </div>

      </div>
    </section>

    <!-- 3. 딱 맞는 여행지 -->
    <section style="padding-left: 6%;">
      <div class="d-flex justify-content-between mt-5 mb-4" style="padding-right: 6%;">
        <h2 class="fw-bold">
        <?php if (!empty($mb_name)) : ?>
          <span style="color:var(--main_color)"><?php echo $mb_name; ?></span>에게 딱 맞는 여행지예요 🏝️</h2>
        <?php else : ?>
          <span style="color:var(--main_color)">반려견</span>에게 딱 맞는 여행지예요 🏝️</h2>
        <?php endif; ?>
        <a href="#" title="추천여행지 전체보기" style="color: #aaa; width: 40px; text-align: center;">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      
      <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.6; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.6; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.6; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.6; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.6; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.6; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
        </div>
      </div>
    
    </section>

    <!-- 4. 여행 메이트 구해요 -->
    <section class="padding">
      <div class="d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">
          여행 메이트 구해요 🐾</h2>
        <a href="#" title="여행메이트 전체보기" style="color: #aaa; width: 40px; text-align: center;">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>

      <div class="container" style="margin: 0;padding: 0; max-width: inherit;">
        <div class="row m-0">
          <div class="col-6 col-lg-3 mb-3">
            <div class="card">
              <img src="../images/find_deabu_01.jpg" alt="">
              <div class="card-top">
                <h4 class="card-title">6월 23일 출발</h4>
              </div>
              <div class="card-body">
                <h4 class="card-title">대부도 먹고 뜯고 즐기자</h4>
                <p class="card-text">: 으르렁파크 호캉스</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 mb-3">
            <div class="card">
              <img src="../images/find_gongju_01.jpg" alt="">
              <div class="card-top">
                <h4 class="card-title">6월 25일 출발</h4>
              </div>
              <div class="card-body">
                <h4 class="card-title">공주에서 제대로 '쉼'</h4>
                <p class="card-text">: 자연속으로 떠나개</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 mb-3">
            <div class="card">
              <img src="../images/find_deabu_01.jpg" alt="">
              <div class="card-top">
                <h4 class="card-title">6월 26일 출발</h4>
              </div>
              <div class="card-body">
                <h4 class="card-title">대부도 먹고 뜯고 즐기자</h4>
                <p class="card-text">: 으르렁파크 호캉스</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3 mb-3">
            <div class="card">
              <img src="../images/find_deabu_01.jpg" alt="">
              <div class="card-top">
                <h4 class="card-title">6월 27일 출발</h4>
              </div>
              <div class="card-body">
                <h4 class="card-title">대부도 먹고 뜯고 즐기자</h4>
                <p class="card-text">: 으르렁파크 호캉스</p>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>

    <!-- 5. 제휴배너 광고 -->
    <section class="padding mb-5">
      <!-- Swiper -->
      <div class="swiper mySwiper3">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="ad">
              <img src="../images/ad_1.jpeg" alt="광고배너">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="ad">
              <img src="../images/ad_2.jpeg" alt="광고배너">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="ad">
              <img src="../images/ad_3.jpeg" alt="광고배너">
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>


    <!-- 6. 이달의 인기여행 테마 -->
    <section id="sec06">
      <div class="d-flex justify-content-between mb-4 padding pt-5 pb-2">
        <h2 class="fw-bold">
          이 달의 인기 여행 테마 🏆</h2>
        <a href="#" title="인기여행테마 전체보기" style="color: #aaa; width: 40px; text-align: center;">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <div class="slider">
        <div class="inner">
          <ul class="swiper-wrapper slide_list">
            <li class="swiper-slide">
              <span class="img">
                <img src="https://picsum.photos/id/10/1000/600" alt="썸네일 이미지">
                <div class="card-body">
                  <p class="card-text d-inline">자연에서 쉬고 싶은 댕댕이</p>
                  <h4 class="card-title fs-6 fw-bold">자연힐링 테마여행 베스트 모음집</h4>
                  <div class="mt-3">
                    <span class="hash_btn">#서울전체</span>
                    <span class="hash_btn">#전시회</span>
                    <span class="hash_btn">#카페</span>
                  </div>
                </div>
              </span>
              <div class="flag d-inline">
                <svg width="26" height="33" fill="none">
                  <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                </svg>
                <span>1</span>
              </div>
            </li>
            <li class="swiper-slide">
              <span class="img">
                <img src="https://picsum.photos/id/20/1000/600" alt="썸네일 이미지">
                <div class="card-body">
                  <p class="card-text d-inline">자연에서 쉬고 싶은 댕댕이</p>
                  <h4 class="card-title fs-6 fw-bold">자연힐링 테마여행 베스트 모음집</h4>
                  <div class="mt-3">
                    <span class="hash_btn">#서울전체</span>
                    <span class="hash_btn">#전시회</span>
                    <span class="hash_btn">#카페</span>
                  </div>
                </div>
              </span>
              <div class="flag d-inline">
                <svg width="26" height="33" fill="none">
                  <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                </svg>
                <span>2</span>
              </div>
            </li>
            <li class="swiper-slide">
              <span class="img">
                <img src="https://picsum.photos/id/30/1000/600" alt="썸네일 이미지">
                <div class="card-body">
                  <p class="card-text d-inline">자연에서 쉬고 싶은 댕댕이</p>
                  <h4 class="card-title fs-6 fw-bold">자연힐링 테마여행 베스트 모음집</h4>
                  <div class="mt-3">
                    <span class="hash_btn">#서울전체</span>
                    <span class="hash_btn">#전시회</span>
                    <span class="hash_btn">#카페</span>
                  </div>
                </div>
              </span>
              <div class="flag d-inline">
                <svg width="26" height="33" fill="none">
                  <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                </svg>
                <span>3</span>
              </div>
            </li>
            <li class="swiper-slide">
              <span class="img">
                <img src="https://picsum.photos/id/40/1000/600" alt="썸네일 이미지">
                <div class="card-body">
                  <p class="card-text d-inline">자연에서 쉬고 싶은 댕댕이</p>
                  <h4 class="card-title fs-6 fw-bold">자연힐링 테마여행 베스트 모음집</h4>
                  <div class="mt-3">
                    <span class="hash_btn">#서울전체</span>
                    <span class="hash_btn">#전시회</span>
                    <span class="hash_btn">#카페</span>
                  </div>
                </div>
              </span>
              <div class="flag d-inline">
                <svg width="26" height="33" fill="none">
                  <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                </svg>
                <span>4</span>
              </div>
            </li>
            <li class="swiper-slide">
              <span class="img">
                <img src="https://picsum.photos/id/50/1000/600" alt="썸네일 이미지">
                <div class="card-body">
                  <p class="card-text d-inline">자연에서 쉬고 싶은 댕댕이</p>
                  <h4 class="card-title fs-6 fw-bold">자연힐링 테마여행 베스트 모음집</h4>
                  <div class="mt-3">
                    <span class="hash_btn">#서울전체</span>
                    <span class="hash_btn">#전시회</span>
                    <span class="hash_btn">#카페</span>
                  </div>
                </div>
              </span>
              <div class="flag d-inline">
                <svg width="26" height="33" fill="none">
                  <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                </svg>
                <span>5</span>
              </div>
            </li>
            <li class="swiper-slide">
              <span class="img">
                <img src="https://picsum.photos/id/60/1000/600" alt="썸네일 이미지">
                <div class="card-body">
                  <p class="card-text d-inline">자연에서 쉬고 싶은 댕댕이</p>
                  <h4 class="card-title fs-6 fw-bold">자연힐링 테마여행 베스트 모음집</h4>
                  <div class="mt-3">
                    <span class="hash_btn">#서울전체</span>
                    <span class="hash_btn">#전시회</span>
                    <span class="hash_btn">#카페</span>
                  </div>
                </div>
              </span>
              <div class="flag d-inline">
                <svg width="26" height="33" fill="none">
                  <path d="m13 24.25-13 10V0h26v34.25l-13-10Z" fill="#F2055C"></path>
                </svg>
                <span>6</span>
              </div>
            </li>
          </ul>
          <div class="swiper-pagination" style="margin: 30px 0 25px 0;"></div>
        </div>
      </div>
    </section>

    <!-- 7. 베스트 이용리뷰 -->
    <section class="padding">
      <div class="d-flex justify-content-between mt-5 mb-4">
        <h2 class="fw-bold">
          베스트 이용 리뷰 🏅</h2>
        <a href="#" title="이용 리뷰 전체보기" style="color: #aaa; width: 40px; text-align: center;">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <div>
        <div id="review">
          <div>
            <img src="../images/busan_01.jpg" alt="이미지">
          </div>
          <div style="padding: 10px 10px;">
            <div class="d-flex justify-content-between mb-1">
              <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
              <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 100px; display: flex; align-items: flex-start; white-space: nowrap;">
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
              </div>
            </div>
            <p class="sub_txt mb-1">
            안녕하세요~ 처음으로 떠나개를 이용해보고 너무 마음에 들어서 후기 남깁니다! 
            우선 숙소부터 교통까지 한 번에 알아서 되어있는게 너무 마음에 처음으로 떠나개를 이용해보고 너무 마음에 들어서 후기 남깁니다! 
            우선 숙소부터 교통까지 한 번에 알아서 되어있는게 너무 마음에
            </p>
          </div>
        </div>
        <div id="review">
          <div>
            <img src="../images/busan_01.jpg" alt="이미지">
          </div>
          <div style="padding: 10px 10px;">
            <div class="d-flex justify-content-between mb-1">
              <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
              <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 100px; display: flex; align-items: flex-start; white-space: nowrap;">
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
              </div>
            </div>
            <p class="sub_txt mb-1">
            안녕하세요~ 처음으로 떠나개를 이용해보고 너무 마음에 들어서 후기 남깁니다! 
            우선 숙소부터 교통까지 한 번에 알아서 되어있는게 너무 마음에 처음으로 떠나개를 이용해보고 너무 마음에 들어서 후기 남깁니다! 
            우선 숙소부터 교통까지 한 번에 알아서 되어있는게 너무 마음에
            </p>
          </div>
        </div>
        <div id="review">
          <div>
            <img src="../images/busan_01.jpg" alt="이미지">
          </div>
          <div style="padding: 10px 10px;">
            <div class="d-flex justify-content-between mb-1">
              <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
              <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 100px; display: flex; align-items: flex-start; white-space: nowrap;">
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
              </div>
            </div>
            <p class="sub_txt mb-1">
            안녕하세요~ 처음으로 떠나개를 이용해보고 너무 마음에 들어서 후기 남깁니다! 
            우선 숙소부터 교통까지 한 번에 알아서 되어있는게 너무 마음에 처음으로 떠나개를 이용해보고 너무 마음에 들어서 후기 남깁니다! 
            우선 숙소부터 교통까지 한 번에 알아서 되어있는게 너무 마음에
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- 8. 실시간 인기 여행지 -->
    <section style="padding-left: 6%;">
      <div class="d-flex justify-content-between mt-5 mb-4" style="padding-right: 6%;">
        <h2 class="fw-bold">실시간 인기 여행지 🔥</h2>
        <a href="#" title="실시간 인기 여행지 전체보기" style="color: #aaa; width: 40px; text-align: center;">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.4; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.4; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.4; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.4; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.4; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>
          <div class="swiper-slide recommend">
            <div>
              <img src="../images/busan_01.jpg" alt="이미지">
            </div>
            <div style="padding: 10px 5px;">
              <div class="d-flex justify-content-between mb-1">
                <span class="title_txt">부산 바다 패키지 여행코스 초보자도 쉽게 여행</span>
                <div style="font-size: 13px; font-weight: bold; text-wrap: none; width: 60px; display: flex; align-items: flex-start; white-space: nowrap;">
                  <i class="bi bi-star-fill" style="color: #ffc000; margin-right: 4px;"></i>
                  <span>4.8</span>
                </div>
              </div>
              <p class="sub_txt mb-1">부산의 바다냄새를 맡으러 댕댕이와 여행가자</p>
              <span class="title_txt">
                <i class="bi bi-geo-alt-fill"></i>
                부산 해운대구 
                <span style="opacity: 0.4; font-weight: normal;">/ 1박추천</span>
              </span>
            </div>
          </div>


        </div>
      </div>
    
    </section>

    <!-- 9. 내 주변 핫플레이스 -->
    <section class="padding" id="sec09">
      <div class="d-flex justify-content-between mt-5 mb-3">
        <h2 class="fw-bold">
          내 주변 핫 플레이스 ✨</h2>
        <a href="#" title="내 주변 핫플레이스 전체보기" style="color: #aaa; width: 40px; text-align: center;">
          <i class="bi bi-chevron-right fs-4"></i>
        </a>
      </div>
      <!-- 탭 버튼 -->
      <div class="mb-3">
        <button class="tab-btn active-tab" data-tab="애견카페">#애견카페</button>
        <button class="tab-btn" data-tab="강아지공원">#강아지공원</button>
        <button class="tab-btn" data-tab="애견숙소">#애견숙소</button>
      </div>
      <!-- 컨텐츠 -->
      <div class="container" style="margin: 0;padding: 0; max-width: inherit;">
        <div class="row">
          <div class="col-12 col-md-6 mb-4" alt="애견카페">
            <div class="card">
              <img src="../images/cafe_1.jpg" alt="애견카페이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="애견카페">
            <div class="card">
              <img src="../images/cafe_2.jpg" alt="애견카페">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="애견카페">
            <div class="card">
              <img src="../images/cafe_3.jpg" alt="애견카페">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="강아지공원">
            <div class="card">
              <img src="../images/ground_1.jpg" alt="강아지공원 이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="강아지공원">
            <div class="card">
              <img src="../images/ground_2.jpeg" alt="강아지공원 이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="강아지공원">
            <div class="card">
              <img src="../images/ground_3.png" alt="강아지공원 이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="애견숙소">
            <div class="card">
              <img src="../images/house_1.jpeg" alt="애견숙소 이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="애견숙소">
            <div class="card">
              <img src="../images/house_2.jpg" alt="애견숙소 이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4" alt="애견숙소">
            <div class="card">
              <img src="../images/house_3.png" alt="애견숙소 이미지">
              <div class="card-body">
                <h4 class="card-title">[입장료 무료] 댕댕이와 함께 시원하게 힐링타임 즐기러 가자!</h4>
                <span class="card-text">#강아지많음 #완전시원 #맛도보장</span>
                <span class="card-text" style="float:right">
                  <i class="bi bi-geo-alt-fill"></i>
                  내 근처
                  <span style="font-weight: bold; color: var(--main_color);font-size: 16px;">264m</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  
  <!-- 푸터 영역 -->
  <footer class="footer mt-5">
    <div class="padding">
      <div class="container">
        <div class="row">
          <div class="mt-3 p-0">
            <img src="../images/logo_1.png" alt="하단로고" height="30px">
          </div>
          <div class="col-md-12 p-0 mt-3">
            <p class="fs-6 fw-bold">고객센터 1234-5678</p>
            <div class="footer-links d-flex">
              <a href="#" style="color: #000;">개인정보처리방침</a>
              <a href="#">이용약관</a>
              <a href="#">소비자 분쟁해결 기준</a>
              <a href="#">사업자 정보확인</a>
              <a href="#">콘텐츠산업진흥법에 의한 표시</a>
            </div>
            <p class="mt-3"><strong>(주)떠나개</strong> | 대표: 박수민<br>
              사업자등록번호: 123-45-67890<br>
              통신판매업신고번호: 2024-서울 광진-0000<br>
              이메일: abc@naver.com<br>
              대표전화: 1234-5678<br>
              소재지: 서울특별시 광진구 자양로 123 - 45
            </p>
            <p>떠나개는 통신판매중개자이며 통신판매의 당사자가 아닙니다. 여행상품의 예약 분쟁 및 거래에 대해 책임지지 않습니다.</p>
            <p>© 떠나개 All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- 공통 바텀바삽입 -->
    <?php include('./bottom.php')?>

  </footer>





  <script>
    //해당 페이지에 해당하는 하단 바텀바에 버튼색 생기게
    $(document).ready(function() {
      $('a[title="홈"]').find('i, span').addClass('active');
    });


    $(document).ready(function() {
      var searchInput = $('#main_search');
      
      // PHP에서 가져온 mb_name을 JavaScript 변수에 할당
      var mbName = "<?php echo $mb_name; ?>";

      // mbName 변수가 비어있지 않으면 (즉, 로그인 상태)
      if (mbName.trim() !== "") {
        searchInput.attr('placeholder', mbName + '랑 어디로 떠날까?');
      }

    });





  </script>

</body>
</html>