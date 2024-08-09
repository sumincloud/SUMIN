<?php
  // 세션이 이미 시작되었는지 확인
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  // 사용자가 로그인한 경우, 값을 세션에서 가져옴
  if (isset($_SESSION['id'])){
    $name = htmlspecialchars($_SESSION['name']);
    $profile = htmlspecialchars($_SESSION['profile']);
  }
?>

<head>
  <style>
  
    /* ----------------상단 헤더------------ */
    header{
      position: fixed;
      width: 100%; height: 70px;
      background: var(--white);
      border-bottom: 1px solid var(--gray);
      top:0;
      z-index: 1000;
    }
    header > div{
      position: absolute;
      width: 100%; height: 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      top: 50%;
      transform: translateY(-50%);
      padding: 0 var(--p_20);
    }
    /* 1400px 이상일때 헤더크기 */
    @media (min-width: 1400px) {
      header > div{
        width: 1400px;
        left:50%;
        transform: translate(-50%, -50%);
      }
    }
  
    header > div h1{
      height: 100%;
      width: 120px;
    }
    header > div h1 > a{
      display: block;
      height: 100%;
    }
    header > div h1 > a img{
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    header > div ul{
      display:flex;
      justify-content:center;
    }
    header > div ul li{
      width: 40px;
      text-align: center;
      cursor: pointer;
    }
    header > div ul li a{
      display: block;
    }
    header > div ul li i{
      line-height: 40px;
      font-size: 30px;
    }
    header > div ul .bi-bell::before{
      transform: scale(0.8);
    }
  
  
    /* ----------------사이드바 메뉴------------ */
    .side{
      width:100%; height: 100vh;
      position: absolute;
      z-index: 100;
      right:-100%;
      transition: 0.5s;
      background: #fff;
    }
    .side.open{
      right:0;
    }
    .a_side.open{
      right:0;
    }
    /* 닫기 버튼 */
    #toggle_close{
      position: absolute;
      top:30px; right: 30px;
      cursor: pointer;
    }
    #toggle_close i{
      font-size: var(--fs-xlarge);
    }
    /* -------------로그인 타이틀 부분--------- */
    .side .info{
      padding: 80px 20px 30px 20px;
      border-bottom: 1px solid var(--light-gray);
    }
    .side .info > div{
      display: flex;
      gap: 10px;
      justify-content: space-between;
      align-items: center;
    }
    .side .info img{
      width: 50px; height: 50px;
      border-radius:50%;
    }
    .side .info a{
      color:#666;
      text-wrap:nowrap;
    }
    .side .info > div a:first-of-type{
      color: var(--black);
      font-weight: var(--fw-bold);
      font-size: var(--fs-large);
      margin-right: auto;
    }
  
    /* -------------카테고리 부분------------ */
    .side .depth{
      position: relative;
      background: var(--light-gray);
      padding: 30px 20px;
      height: 100vh;
    }
    /* 큰 카테고리 */
    .side .depth1 {
      margin-bottom:40px;
    }
    .side .depth1 > a{
      position: relative;
      z-index: 500;
      font-size:var(--fs-medium-large);
      background: none;
      color: #000;
      padding: 15px 20px;
      width: calc(40% + 20px);
      border-radius: 50px
    }
    .side .depth1 > a.active{
      display:block;
      background: var(--red);
      color: #fff;
    }
    /* 작은 카테고리 */
    .side .depth2{
      display: none;
      position: absolute;
      height: 100%;
      top: 0;
      right: 0;
      left: 40%;
      padding: 45px 0 0 60px;
      background: #fff;
    }
    .side .depth2 li{
      margin-bottom: 40px;
    }
    .side .depth2 a {
      padding: 15px 0;
      font-size:var(--fs-medium-large);
    }
    .side .depth2 a:hover {
      color: var(--red);
    }
  
    /* -----------로그인 밑에 아이콘들----------- */
    .icon_menu{
      width: 100%;
      background: #fff;
      margin-top: 20px;
    }
    .icon_menu ul{
      display: flex;
      justify-content: space-evenly;
      width: 100%;
      padding: 0;
    }
    .icon_menu ul li{
      text-align: center;
      width: 60px; height: 60px;
      list-style: none;
    }
    .icon_menu a{
      display: flex;
      flex-direction: column;
      text-decoration: none;
      width: 100%;
      height: 100%;
      color: #666;
      justify-content: center;
      align-items: center;
      gap: 5px;
    }
    /* 아이콘 크기 조정 */
    .icon_menu ul li i{
      font-size: var(--fs-xlarge);
      color: var(--black);
    }
    .bi-heart::before{
      transform: scale(0.9);
    }
    .bi-person::before{
      transform: scale(1.1);
    }
  
    /* 글씨 스타일 조정 */
    .icon_menu ul li span{
      text-align: center;
      font-size: var(--fs-small);
      font-weight: var(--fw-light);
      color: var(--black);
      text-wrap: nowrap;
      margin-top: 5px;
    }

    /*---------------알림창-------------- */
    header .a_side{
      top:0px;
      display:block;
      transform:translateY(-61px);
      padding:61px 0px 0px 0px ;
      right: -100%;
      background: pink;
    }
    .a_side > div{
      height:70px;
      border-bottom:1px solid var(--gray);
      background: #fff;
    }
    /*알림과 X 가로 정렬 */
    .a_side h2, .a_side > div > p{
      display: inline-block;
    }
    .a_side h2{
      font-size:var(--fs-xlarge);
      font-weight:var(--fw-bold);
      padding:20px;
    }
    .a_side > div > p{float:right;padding:20px;}
    .a_side > div > p i{
      cursor: pointer;
      font-size:var(--fs-xlarge);
      font-weight:var(--fw-bold);
      
    }

    /*알림창 내용 */
    .a_side ul{
      display: inline-block;
      width:100%;
      margin:0 auto;
      background: #fff;
      padding: 20px;
      height: 100vh;
    }
    .a_side ul>li{
      width:100%;
      height: 85px;
      text-align:left;
      border:1px solid var(--gray);
      border-radius:5px;
      margin-top:10px;
      
    }
    .a_side ul>li >p:first-child{
      font-size:var(--fs-medium);
      font-weight:var(--fw-bold);
      padding:10px 0px 0px 10px ;
    }
    .a_side ul>li >p:nth-child(2){
      display: inline-block;
      float:right;
      font-size:var(--fs-small);
      font-weight:var(--fw-light);
      transform:translate(-10px,-15px);
    }
    .a_side ul>li >p:last-child{
      font-size:var(--fs-medium);
      font-weight:var(--fw-normal);
      padding:25px 10px 0px 10px;
    }

    
  </style>
</head>


<header>
  <div>
    <h1>
      <a href="./index.php" title="메인페이지로 이동">
        <img src="./images/common/logo.png" alt="로고">
      </a>
    </h1>
    <ul>
      <li id="alram">
        <a href="#" title="알림">
          <i class="bi bi-bell"></i>
        </a>
      </li>
      <li id="list">
        <i class="bi bi-list"></i>
      </li>
    </ul>
  </div>

  <!-- 사이드바 -->
  <nav class="side">
    <div class="clearfix">
      <div>
        <div id="toggle_close">
          <i class="bi bi-x-lg"></i>
        </div>
        <div class="info">
          <div>
            <?php
              if (isset($_SESSION['id'])) {
                echo "
                <img src='./uploads/profile/$profile' alt='프로필이미지'>
                <a href='./mypage.php' title='마이페이지'>$name 님 환영합니다.</a>
                <a href='./php/logout.php' title='로그아웃'>로그아웃</a>
                ";
              } else {
                echo "
                <img src='./uploads/profile/profile.png' alt='프로필이미지'>
                <a href='./login.php' title='로그인'>로그인을 해주세요.</a>
                <a href='./login.php' title='로그인'>로그인</a>
                <a href='./register_pre.php' title='회원가입'>회원가입</a>
                ";
              }
            ?>
          </div>
          <?php
            if (isset($_SESSION['id'])) {
              echo "
              <div class='icon_menu'>
                <ul>
                  <li>
                    <a href='./mypage.php' title='나의 정보'>
                      <i class='bi bi-person'></i>
                      <span class=''>나의 정보</span>
                    </a>
                  </li>
                  <li>
                    <a href='./order_list.php' title='신청목록'>
                      <i class='bi bi-bag-check'></i>
                      <span>신청목록</span>
                    </a>
                  </li>
                  <li>
                    <a href='./cart.php' title='찜목록'>
                      <i class='bi bi-heart'></i>
                      <span>찜목록</span>
                    </a>
                  </li>
                  <li>
                    <a href='./inquire_list.php' title='나의 문의'>
                      <i class='bi bi-chat-square-dots'></i>
                      <span>나의 문의</span>
                    </a>
                  </li>
                  <li>
                    <a href='./review_list.php' title='나의 후기'>
                      <i class='bi bi-pencil-square'></i>
                      <span>나의 후기</span>
                    </a>
                  </li>
                </ul>
              </div>";
            }
          ?>
        </dl>
      </div>
      <!-- 카테고리 목록 -->
      <ul class="depth">
        <li class="depth1">
          <a href="./academy.php?category1=기능사" title="depth1" class="active">요리</a>
          <div class="depth2">
            <ul>
              <!-- 카테고리 페이지로 이동 -->
              <li><a href="./academy.php?category1=기능사&type=국비" title="국비">국비</a></li>
              <li><a href="./academy.php?category1=기능사&type=일반" title="일반">일반</a></li>
              <li><a href="./academy.php?category1=기능사&type=창업" title="창업">창업</a></li>
              <li><a href="./academy.php?category1=기능사&type=취미" title="취미">취미</a></li>
              <li><a href="./academy.php?category1=기능사&type=자격증" title="자격증">자격증</a></li>
            </ul>
          </div>
        </li>
        <li class="depth1">
          <a href="./academy.php?category1=바리스타" title="바리스타">바리스타</a>
          <div class="depth2">
            <ul>
              <!-- 카테고리 페이지로 이동 -->
              <li><a href="./academy.php?category1=바리스타&type=국비" title="국비">국비</a></li>
              <li><a href="./academy.php?category1=바리스타&type=일반" title="일반">일반</a></li>
              <li><a href="./academy.php?category1=바리스타&type=창업" title="창업">창업</a></li>
              <li><a href="./academy.php?category1=바리스타&type=취미" title="취미">취미</a></li>
              <li><a href="./academy.php?category1=바리스타&type=자격증" title="자격증">자격증</a></li>
            </ul>
          </div>
        </li>
        <li class="depth1">
          <a href="./academy.php?category1=베이커리" title="베이커리">베이커리</a>
          <div class="depth2">
            <ul>
              <!-- 카테고리 페이지로 이동 -->
              <li><a href="./academy.php?category1=베이커리&type=국비" title="국비">국비</a></li>
              <li><a href="./academy.php?category1=베이커리&type=일반" title="일반">일반</a></li>
              <li><a href="./academy.php?category1=베이커리&type=창업" title="창업">창업</a></li>
              <li><a href="./academy.php?category1=베이커리&type=취미" title="취미">취미</a></li>
              <li><a href="./academy.php?category1=베이커리&type=자격증" title="자격증">자격증</a></li>
            </ul>
          </div>
        </li>
        <li class="depth1">
          <a href="./intro.php?cata=소개&tab=소개" title="소개">소개</a>
          <div class="depth2">
            <ul>
              <!-- 카테고리 페이지로 이동 -->
              <li><a href="./intro.php?cata=소개&tab=소개" title="소개">소개</a></li>
              <li><a href="./intro.php?cata=소개&tab=강사진" title="강사진">강사진</a></li>
            </ul>
          </div>
        </li>
        <li class="depth1">
          <a href="./community.php?comu=커뮤니티&tab=후기" title="커뮤니티">커뮤니티</a>
          <div class="depth2">
            <ul>
              <!-- 카테고리 페이지로 이동 -->
              <li><a href="./community.php?comu=커뮤니티&tab=후기" title="수강생 후기">후기</a></li>
              <li><a href="./community.php?comu=커뮤니티&tab=FAQ" title="자주묻는 질문">FAQ</a></li>
              <li><a href="./community.php?comu=커뮤니티&tab=QA" title="QA">Q&A</a></li>
              <li><a href="./community.php?comu=커뮤니티&tab=상담신청" title="상담신청">상담신청</a></li>
              <li><a href="./community.php?comu=커뮤니티&tab=공지사항" title="공지사항">공지사항</a></li>
            </ul>
          </div>
        </li>
        <li style="padding: 30px 20px; border-top:1px solid #ccc; width: calc(40% - 20px);">
          <a href="./academy_all.php" title="전체강의" style="color:#666;">전체강의</a>
        </li>
      </ul>
    </div>
  </nav>


  <!--알림창-->
  <div class="a_side">
    <div>
      <!--여기 높이 70 아래보더 1px 색상은 그레이-->
      <h2>알림</h2>
      <!--X 버튼 displya:inline요소 주기 p 사이즈는 padding이나 i에 폰트사이즈로-->
      <p id="toggle_close2">
        <i class="bi bi-x-lg"></i>
      </p>
    </div>

    <!--알림 내용-->
    <ul>
      <li>
        <p>추석연휴 안내</p>
        <p>2024-07-30</p>
        <p>9월달 추석 휴강일 안내드립니다. </p>
      </li>
      <li>
        <p>추석연휴 안내</p>
        <p>2024-07-30</p>
        <p>9월달 추석 휴강일 안내드립니다. </p>
      </li>
      <li>
        <p>추석연휴 안내</p>
        <p>2024-07-30</p>
        <p>9월달 추석 휴강일 안내드립니다. </p>
      </li>
      <li>
        <p>추석연휴 안내</p>
        <p>2024-07-30</p>
        <p>9월달 추석 휴강일 안내드립니다. </p>
      </li>
    </ul>
  </div>




</header>




<script>
  $(document).ready(function(){
    //사이드바 열고 닫기
    $('#list').click(function(){
      $('.side').addClass('open');
    })
    $('#toggle_close').click(function(){
      $('.side').removeClass('open');
    })
    //알림창 열고 닫기
    $('#alram').click(function(){
      $('.a_side').addClass('open');
    })
    $('#toggle_close2 i').click(function(){
      $('.a_side').removeClass('open');
    })



    // depth1 클릭 이벤트
    $('.depth1 > a').click(function(e) {
      e.preventDefault();

      $('.depth1 > a').removeClass('active');
      $(this).addClass('active');
      
      $('.depth2').hide();
      var nextDepth2 = $(this).next('.depth2');
      nextDepth2.show();

      //depth2 글씨 숨김
      nextDepth2.find('a').hide();
      // depth2 글씨 반짝임 효과
      nextDepth2.find('a').fadeOut(50).fadeIn(50);
    });

    // 초기 활성화된 depth2 표시
    $('.depth1 > a.active').next('.depth2').show();


    // ----------모든 <style> 태그를 찾아서 <head>로 이동---------
    $('style').each(function() {
      // <head>가 존재하는지 확인
      if ($('head').length) {
        // <style> 태그를 <head>로 이동
        $('head').append($(this));
      }
    });




  })
</script>
