<?php
  include('./db_conn.php'); //db연결을 위한 파일 인클루드

  //member 테이블 등록되어 있는 회원수 조회
  $sql = "select count(*) as 'cnt' from member";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $total_count = $row['cnt'];

  //echo $total_count; //회원수 결과
  $sql = "select * from member order by mb_datetime desc";
  $result =mysqli_query($conn, $sql);

  if(!$_SESSION['ss_mb_id']){ //세션아이디가 기록되어있지 않다면
    echo "<script>alert('로그인 후 사용가능합니다.')</script>";
    echo "<script>location.replace('../login.php')</script>";
  }
?>

<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원목록보기</title>
  <!-- 초기화 서식 -->
  <link rel="stylesheet" href="../css/reset.css" type="text/css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<style>
  header{
    position:relative !important;
    background:var(--m_bg_color);
  }
  header .gnb li a{color:var(--f_color01) !important;}
  header i.fa-regular{color:var(--f_color01) !important;}

  /* 메인 서식 */
  main{
    background: rgb(240, 240, 255);
    padding:100px 0 100px 0;
  }
  section{
    display:block;
    margin: 0 auto;
    width: 800px;
  }
  section > h2{
    text-align: center;
    font-size: 1.4rem;
    font-weight: 550;
  }
  section caption{display:none;}

  section table{
    table-layout: auto;
    width: 100%;
    text-align: center;
    line-height: 30px;
    margin-top: 50px;
  }
  section table th{
    height: 30px;
    background: var(--s_color01);
    font-weight: 550;
    border: 1px solid rgba(0,0,0,0.3);
    padding:5px;
    color: #fff;
  }
  section table td{
    height: 30px;
    border: 1px solid rgba(0,0,0,0.3);
    background: #fff;
    padding:5px;
  }
  section .total td{
    background: rgba(33, 84, 153,0.6);
    color: #fff;
  }
  section .btn{text-align: center;}
  section a{
    text-align: center;
    display:inline-block;
    width: 200px;
    height: 40px;
    line-height: 40px;
    background:  var(--s_color02);
    color: #fff;
    font-weight: 400;
    margin-top:50px;
  }
  section a:hover{
    filter: brightness(1.5);
  }
</style>
<body>
  <header>
    <h1><a href="index.html" title="메인페이지로 바로가기">
      <img src="../images/logo-casper_black.png" alt="캐스퍼 로고"></a>
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
    <!-- 마이페이지, 알림 -->
    <div class="util">
      <a href="./login.php" title="로그인"><i class="fa-regular fa-user"></i></a>
      <a href="#" title="알림"><i class="fa-regular fa-bell"></i></a>
    </div>
  </header>

  <main>
    <section>
      <h2>회원목록 리스트</h2>
      <table>
        <caption>리스트</caption>
        <thead>
          <tr>
            <th>No.</th>
            <th>아이디</th>
            <th>이름</th>
            <th>이메일</th>
            <th>직업</th>
            <th>성별</th>
            <th>관심언어</th>
            <th>가입날짜</th>
          </tr>
        </thead>
        <tbody>  <!-- for(초기값;조건식;증감식){출력내용} -->
          <?php for($i=0;$row=mysqli_fetch_assoc($result);$i++): ?>
            <tr>
              <td><?php echo $i+1 ?></td>
              <td><?php echo $row['mb_id'] ?></td>
              <td><?php echo $row['mb_name'] ?></td>
              <td><?php echo $row['mb_email'] ?></td>
              <td><?php echo $row['mb_job'] ?></td>
              <td><?php echo $row['mb_gender'] ?></td>
              <td><?php echo $row['mb_language'] ?></td>
              <td><?php echo $row['mb_datetime'] ?></td>
            </tr>
          <?php endfor; ?>
          <tr class="total"><td colspan="8">총 회원수 : <?php echo $total_count?>명</td></tr>
          <?php
            if($total_count==0){  //가입된 정보가 없다면
              echo "<tr><td colspan='8'> 등록된 회원정보가 없습니다.</td></tr>;";
            };
          ?>
        </tbody>
      </table>
      <div class="btn">
        <a href="./register.php" title="회원정보수정">회원정보수정</a>
        <a href="./logout.php" title="로그아웃">로그아웃</a>
      </div>
    </section>
  </main>
  <footer>
    <div class="f_inner">
      <h2>
        <a href="index.html" title="메인페이지로 바로가기">
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

  <?php
    mysqli_close($conn);

  ?>
  
</body>
</html>