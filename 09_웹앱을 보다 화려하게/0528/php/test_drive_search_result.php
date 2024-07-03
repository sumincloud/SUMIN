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
    .online_reserve > h2{display:none;}
    .car_reverse{
      border:1px solid #ccc;
      border-collapse:collapse;
      width:1000px;
      margin:0px auto 30px auto;
    }
    .car_reverse caption{
      font-weight:bold;
      font-size:20px;
      padding:20px 0px;
    }
    .car_reverse th{background:#111;color:#fff;}
    .car_reverse td, .car_reverse th{
      border:1px solid #ccc;
      line-height:34px;
      text-align:center;
    }
    /* 메인으로 버튼 */
    .t_drive_btn{ text-align:center;margin:30px 0px;}
    .t_drive_btn > a{
        padding:10px 100px;
        background:var(--s_color01);color:#fff;
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

      <section class="online_reserve">
        <h2>시승신청 온라인 조회결과</h2>
        <?php
          $search_txt = $_POST['search_txt'];
          
          //1. 변수선언(서버주소, 아이디, 패스워드, 데이터베이스명)
          $mysql_host='localhost';
          $mysql_user='root';
          $mysql_password='1234';
          $mysql_db='product';

          // 2. 데이터베이스 계정연결 변수생성
          $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

          //3. 데이터베이스 연결 오류구문작성
          if(!$conn){
            die('연결실패 : ' .mysqli_connect_error());
          }

          //4. 데이터베이스 자료 조회(select)하여 결과 변수에 담기
          $query = "select name, region, s_car, e_date from test_drive where name='$search_txt'";

          //5. 조회한 최종 결과값을 변수에 담는다.
          $result = mysqli_query($conn, $query);

          //6. 변수출력하기
          //echo $result; //데이터 베이스 자료는 여러개이기 때문에 배열로 담아서 출력해야 한다.

          // 출력방법 echo, print
          print "<table class='car_reverse'><caption>현대자동차 시승신청 예약조회 결과</caption>" .  
          "<th>성명</th>" . 
          "<th>희망지점</th>" . 
          "<th>시승차량</th>" . 
          "<th>예약날짜</th>" . 
          "</tr>";

          //반복문 for, while, do while
          while($row=mysqli_fetch_row($result)){
            print "<tr><td>" . $row[0] . "</td>" .
            "<td>" . $row[1] . "</td>" .
            "<td>" . $row[2] . "</td>" .
            "<td>" . $row[3] . "</td></tr>";
          }
          print "</table>";
          mysqli_free_result($result); //쿼리 결과를 메모리에서 제거함
          mysqli_close($conn); //데이터베이스 접속종료
        ?>

        <p class="t_drive_btn">
          <a href="../index.html" title="메인으로">메인으로</a>
        </p>
        <br><br>
      </section>
    </form>
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