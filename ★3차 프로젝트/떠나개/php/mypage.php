<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>마이페이지</title>
  <!-- 1. 부트스트랩 css연결하기 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 2. 부트스트랩 js연결하기 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 3. 부트스트랩 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- 스와이퍼 css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <!-- 스와이퍼 js -->
  <script src="../script/swiper.js"></script>
  <!-- 공통서식 연결 -->
  <link rel="stylesheet" href="../css/common.css">
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <style>
    /* -----------마이페이지 서식------------ */
    .content{
      padding: 0 6% 20px 6%;
      border-bottom: 10px solid #f1f3f5;
    }

    /* 로그인 및 회원가입 */
    .bi-person-circle{
      font-size:50px;
      margin-right: 30px;
      margin-top: -10px;
      color: #F2055C;
    }
    .bi-chevron-right{
      margin-top: 15px;
      color: #aaa;
    }
    /* 430px보다 화면 작아지면 사람모양 아이콘 사라지게 */
    @media (max-width: 430px) {
      .bi-person-circle {
        display: none;
      }
    }

    /* 광고배너 */
    .mySwiper{
    }
    .ad{
      border-radius: 10px;
      height: 100px;
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    .ad img{
      width: 100%;
      height: 100%;
      object-fit: cover;
      vertical-align: middle; /* 이미지의 수직 가운데 정렬을 위해 추가 */
    }
    .swiper-pagination{
      width: 60px;
      left: inherit;
      right:0 !important;
      color: #fff;
    }

    /* 오늘의 혜택 */
    .event{
      background: rgba(242, 5, 92, 0.05);
      height: 100px;
      border-radius: 10px;
    }
    .event img{
      width: 50px;
      height: 50px;
      margin-left:20px;
    }

  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./header.php')?>

  <main id="mypage">
    <div class="content">
      <div>
        <h2 class="fw-bold fs-3 pt-5 pb-3">마이페이지</h2>
        <?php
          session_start();
          if (isset($_SESSION['ss_mb_name'])) {
            $mb_name = $_SESSION['ss_mb_name'];
            echo "<div class='fw-bold fs-5 d-flex justify-content-between' title='마이페이지'>";
            echo "<div>";
            echo "<span style='color:#F2055C;'>$mb_name 님 환영합니다!</span>";
            echo "<div class='small text-muted fw-normal mt-1'>다양한 혜택을 누려보세요.</div>";
            echo "</div>";
            echo "<div class='d-flex'>";
            echo "<i class='bi bi-person-circle'></i>";
            echo "<i class='bi bi-chevron-right'></i>";
            echo "</div>";
            echo "</div>";
          } else {
            echo "<a href='./login.php' class='fw-bold fs-5 d-flex justify-content-between' title='로그인 및 회원가입하기'>";
            echo "<div>";
            echo "<span style='color:#F2055C;'>로그인 및 회원가입하기</span>";
            echo "<div class='small text-muted fw-normal mt-1'>3초 로그인하고 맞춤 여행지로 떠나개!</div>";
            echo "</div>";
            echo "<div class='d-flex'>";
            echo "<i class='bi bi-person-circle'></i>";
            echo "<i class='bi bi-chevron-right'></i>";
            echo "</div>";
            echo "</a>";
          }
        ?>
        <!-- <a href="./login.php" class="fw-bold fs-5 d-flex justify-content-between" title="로그인 및 회원가입하기">
          <div>
            <span style="color:#F2055C;">로그인 및 회원가입하기</span>
            <div class="small text-muted fw-normal mt-1">3초 로그인하고 맞춤 여행지로 떠나개!</div>
          </div>
          <div class="d-flex">
            <i class="bi bi-person-circle"></i>
            <i class="bi bi-chevron-right"></i>
          </div>
        </a> -->
      </div>
      <div>
        <div class="d-flex justify-content-between mt-5">
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_seoul.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;">메뉴</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_jeju.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;">메뉴</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_busan.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;">메뉴</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_006.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;">메뉴</p>
          </div>
          <div class="text-center categori" role="button">
            <img alt="" src="../images/icon_007.png" width="50px"/>
            <p class="fw-bold mt-1" style="font-size: 14px;">메뉴</p>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <!-- Swiper -->
        <div class="swiper mySwiper">
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
      </div>
    </div>

    <div class="content">
      <div class="pt-4 pb-3">
        <a href="#" class="fw-bold fs-5 d-flex justify-content-between" title="오늘의 혜택">
          <span style="font-size:18px;">꼭 받아가세요
            <span style="color:#1BC3EA;"> 오늘의 혜택</span>
          </span>
          <span class="fw-normal fs-6" style="color:#aaa;">더보기
            <i class="bi bi-chevron-right"></i>
          </span>
        </a>
      </div>
      <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="../images/stamp_1.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>출석체크 하고</span>
                <span style="display:block; color:#F2055C; font-size:18px;">경품 응모 하기</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="../images/도장 아이콘.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>출석체크 하고</span>
                <span style="display:block; color:#F2055C; font-size:18px;">경품 응모 하기</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="../images/도장 아이콘.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>출석체크 하고</span>
                <span style="display:block; color:#F2055C; font-size:18px;">경품 응모 하기</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="../images/도장 아이콘.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>출석체크 하고</span>
                <span style="display:block; color:#F2055C; font-size:18px;">경품 응모 하기</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="d-flex event align-items-center">
              <img src="../images/도장 아이콘.png" alt="이미지">
              <div style="margin: 0 15px;">
                <span>출석체크 하고</span>
                <span style="display:block; color:#F2055C; font-size:18px;">경품 응모 하기</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="content" style="border-bottom:1px solid #f1f3f5;">
      <div class="pt-4 pb-3">
        <span class="text-muted">여행</span>
        <a href="#" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="최근 본 여행">최근 본 여행</a>
        <a href="#" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="찜 한 여행">찜 한 여행</a>
      </div>
    </div>

    <div class="content" style="border-bottom: none;">
      <div class="pt-4 pb-3">
        <span class="text-muted">고객센터</span>
        <a href="#" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="문의내역">문의내역</a>
        <a href="#" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="FAQ">FAQ</a>
        <a href="#" class="fw-bold d-block mt-4" style="font-size:18px; width:100px;" title="공지사항">공지사항</a>
      </div>
    </div>


  </main>

  <!-- 공통 바텀바삽입 -->
  <?php include('./bottom.php')?>
  <script>
    //해당 페이지에 해당하는 하단 바텀바에 버튼색 생기게
    $(document).ready(function() {
      $('a[title="마이"]').find('i, span').addClass('active');
    });
  </script>


  <script>
    /* ------------제휴광고 슬라이드------------- */
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 0,
      centeredSlides: true,
      autoplay: {
        delay: 7000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    //-------------오늘의 혜택 슬라이드---------------
    var swiper = new Swiper(".mySwiper2", {
      //0 ~ 375일때 (작은 모바일일때 설정)
      slidesPerView: 1.2,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints : { //반응형 설정
        376 : { //376~767일때 (큰 모바일일때 설정)
          slidesPerView : 1.5,
          spaceBetween: 10,
        },
        768 : { //768~1023일때 (태블릿일때 설정)
          slidesPerView : 3.1,
          spaceBetween: 10,
        },
        1024 : {  //1024 이상 일때 (pc일때 설정)
          slidesPerView : 4.1,
          spaceBetween: 10,
        }
      },
    });

  </script>

</body>
</html>