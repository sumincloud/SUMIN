<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>시승신청조회</title>
  <!-- 초기화 -->
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- 서브페이지 서식 -->
  <style>
    header{
      position:static !important;
      background:var(--m_bg_color);
    }
    header .gnb li a{color:var(--f_color01) !important;}
    header i.fas{color:var(--f_color01) !important;}
    .sub_top{
      background:url('../images/bg-main-test-driving.125a037.jpg') 100%;
      height:400px;
      color:var(--m_bg_color);text-align: center;
    }
    .sub_top nav{text-align:left;line-height:150px;padding-left:200px;font-size:var(--f_size2);}
    .sub_top > h2{font-size:40px;padding:20px 0px;}
    .sub_top > p{font-size:20px;}
    /* 폼태그 서식 */
    .t_drive_btn{ text-align:center;padding-bottom:100px;}
    .t_drive_btn > a{
        padding:10px 100px;
        background:var(--s_color01);color:#fff;
    }

    .result_txt{text-align:center;padding:100px 0px;}
    .result_txt span{
      background:var(--f_color1);color:#fff;
      padding:10px 60px;
    }
  </style>
</head>
<body>
  <!-- 상단헤더영역 -->
  <header>
    <h1>
      <a href="../index.html" title="메인페이지로 바로가기">
        <img src="../images/logo-casper_black.png" alt="캐스퍼로고">
      </a>
    </h1>

    <!-- 내비게이션 -->
    <nav class="gnb">
      <ul>
        <li><a href="#" title="소개">소개</a></li>
        <li><a href="#" title="체험">체험</a></li>
        <li><a href="#" title="이벤트">이벤트</a></li>
        <li><a href="#" title="구매">구매</a></li>
        <li><a href="#" title="고객지원">고객지원</a></li>
      </ul>
    </nav>

    <a href="login.html" title="로그인"><i class="fas fa-user"></i></a>
    <i class="fas fa-bell"></i><!-- 알림아이콘 -->
  </header>

  <!-- 메인콘텐츠영역 -->
  <main>
    <div class="sub_top">
      <nav>홈 &gt; 체험 &gt; <b>시승신청 조회</b></nav>
      <h2>시승 신청조회</h2>
      <p>캐스퍼가 제공하는 편리한 시승 서비스를 이용해보세요.</p>
    </div>

  <?php 
    // phpinfo();
    
    //변수선언
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sms = $_POST['sms'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $car = $_POST['car'];
    $my_car = $_POST['my_car'];
    $date = $_POST['e_date'];

    // echo '변수값 출력하기<br>';
    // echo '이름' $name '<br>';
    // echo '전화번호' $phone '<br>';
    // echo '수신여부' $sms '<br>';
    // echo '이메일주소' $email '<br>';
    // echo '지점명' $region '<br>';
    // echo '차량명' $car '<br>';
    // echo '보유차량' $my_car '<br>';
    // echo '날짜' $date '<br>';

    //데이터베이스 연결하기 절차지향 스타일
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '1234';
    $mysql_db='product';

    //데이터 연결 변수
    $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

    //데이터베이스 연결테스트
    if(!$conn){
      die('연결실패 : ' .mysqli_connect_error());
    }

    //데이터베이스 연결 성공이면 아래 쿼리문 실행
    $query = "insert into test_drive (name, phone, sms, email, region, s_car, my_car, e_date) values('$name', '$phone', '$sms', '$email', '$region', '$car', '$my_car', '$date')";

    //데이터 쿼리문 실행하여 결과 저장하기
    $result = mysqli_query($conn, $query);

    echo '<p class="result_txt"><span>입력완료</span></p>';

  ?>
    <div class="t_drive_btn">
      <a href="/test_drive_print.php" title="이전 페이ㅣㅈ">이전 페이지</a>
      <a href="../text_drive.html" title="예약조회">예약조회</a>
    </div>
  </main>

  <!-- 푸터영역 -->
  <footer>
    <div class="f_inner">
      <h2>
        <a href="../index.html" title="메인페이지로 바로가기">
          <img src="../images/logo-hyundai.a9ebdc6.png" alt="하단로고">
        </a>
      </h2>

      <nav class="f_lnb">
        <ul>
          <li><a href="#" title="이용약관">이용약관</a></li>
          <li><a href="#" title="개인정보 처리방침">개인정보 처리방침</a></li>
          <li><a href="#" title="저작권안내">저작권안내</a></li>
          <li><a href="#" title="공동인증서 안내">공동인증서 안내</a></li>
          <li><a href="#" title="현대자동차 홈페이지">현대자동차 홈페이지</a></li>
        </ul>
      </nav>

      <address>
        <dl>
          <dt>사업자등록번호 :</dt>
          <dd>101-00-00000</dd>
          <dt>통신판매업신고번호 : </dt>
          <dd>2022-012345</dd>
          <dt>대표이사 : </dt>
          <dd>장재훈</dd>
          <dt>주소 : </dt>
          <dd>서울시 서초구 헌릉로 12</dd>
          <dt>호스팅 서비스 제공 : </dt>
          <dd>현대오토에버(주)</dd>
        </dl>
        <p>copyright&copy; 2023 hyundai motor company, all rights reserved.</p>
      </address>
    </div>
  </footer>
</body>
</html>