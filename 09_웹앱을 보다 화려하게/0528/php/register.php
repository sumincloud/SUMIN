<?php 
  //회원가입폼
  include("./dbconn.php"); //데이터베이스 연결을 위해 include한다.

  //세션정보가 있다면 회원정보를 가져오고 회원정보 수정 mode로 설정한다.
  if(isset($_SESSION['ss_mb_id'])){
    $mb_id = $_SESSION['ss_mb_id'];
    $sql = "select * from member where mb_id='$mb_id'"; //아이디가 일치하는 데이터를 찾는다.
    $result = mysqli_query($conn, $sql); //데이터베이스 조회값을 저장
    $mb = mysqli_fetch_assoc($result); //반복문을 통해 검색
    mysqli_close($conn); // 데이터베이스 접속 종료

    $mode = 'modify'; //회원정보가 있을 경우 수정으로 제목을 표현
    $title = '회원정보수정';
    $modify_mb_info = 'readonly';
    $href = './php/member_list.php';

  }else{

    $mode = 'insert'; //회원정보가 없는 경우 새로추가
    $title = '회원가입';
    $modify_mb_info = '';
    $href = '../login.php';
  } 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>캐스퍼 - 회원가입하기</title>
  <!-- 초기화 -->
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- 로그인폼 서식 -->
  <link rel="stylesheet" href="../css/login.css" type="text/css">
  <style>
    header{
      position:static !important;
      background:var(--m_bg_color);
    }
    header .gnb li a{color:var(--f_color01) !important;}
    header i.fas{color:var(--f_color01) !important;}
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

    <a href="../login.html" title="로그인"><i class="fas fa-user"></i></a>
    <i class="fas fa-bell"></i><!-- 알림아이콘 -->
  </header>

  <!-- 메인콘텐츠영역 -->
  <main>
    <form name="회원가입" method="post" action="register_update.php">
      <fieldset>
        <h2>회원가입</h2>
        <legend>회원가입 폼</legend>
        <h3><?php echo $title ?></h3>
        <input type='hidden' name='mode' value="<?php echo $mode?>">

        <p>
          <label for="mb_id">아이디</label>
          <input type="text" id="mb_id" name="mb_id" value="<?php echo $mb['mb_id'] ?? '' ?>"<?php echo $modify_mb_info ?>>
        </p>

        <p>
          <label for="mb_password">비밀번호</label>
          <input type="password" id="mb_password" name="pw_txt">
        </p>

        <p>
          <label for="mb_password_re">비밀번호 확인</label>
          <input type="password" id="mb_password_re" name="mb_password_re">
        <p>

        <p>
          <label for="mb_name">이름</label>
          <input type="text" id="mb_name" name="mb_name" value="<?php echo $mb['mb_name'] ?? '' ?>">
          <!-- php문법  삼항조건 연산자 ??
          ??를 기준으로 앞 수식이 null인지 체크하고 null이면 ?? 우측을 적용하고 null이 아니면 좌측을 적용
          -->
        </p>
          <p>
          <label for="mb_email">이메일</label>
          <input type="email" id="mb_email" name="mb_email" value="<?php echo $mb['mb_email'] ?? '' ?>">
        </p>

        <p>
          <label>직업</label>
          <select name="mb_job">
            <option value="">선택하세요</option>
            <option value="학생" <?php echo ($mb['mb_job']=="학생")?"selected":"";?>>학생</option>
						<option value="회사원" <?php echo ($mb['mb_job']=="회사원")?"selected":"";?>>회사원</option>
						<option value="공무원" <?php echo ($mb['mb_job']=="공무원")?"selected":"";?>>공무원</option>
						<option value="주부" <?php echo ($mb['mb_job']=="주부")?"selected":"";?>>주부</option>
						<option value="무직" <?php echo ($mb['mb_job']=="무직")?"selected":"";?>>무직</option>
          </select>
        </p>

        <p>
          <label>성별</label>
          <input type="radio" name="mb_gender" id='gender1' value="남자" <?php echo ($mb['mb_gender'] == "남자") ? "checked" : "";?>>
          <label for="gender1">남자</label>

          <input type="radio" name="mb_gender" id='gender2' value="여자" <?php echo ($mb['mb_gender'] == "여자") ? "checked" : "";?>>
          <label for="gender2">여자</label>
        </p>
        
        <p>
        <label>관심언어</label>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input type="checkbox"
                    id="mb_language1"
                    name="mb_language[]"
                    class="form-check-input"
                    value="HTML" <?php echo strpos($mb['mb_language'], 'HTML') !== false ?'checked':'' ?>>
                <label for="mb_language1">HTML</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                    id="mb_language2"
                    name="mb_language[]"
                    class="form-check-input"
                    value="CSS" <?php echo strpos($mb['mb_language'], 'CSS') !== false ?'checked':'' ?>>
                <label for="mb_language2">CSS</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                    id="mb_language3"
                    name="mb_language[]"
                    class="form-check-input"
                    value="PHP" <?php echo strpos($mb['mb_language'], 'PHP') !== false ?'checked':'' ?>>
                <label for="mb_language3">PHP</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                    id="mb_language4"
                    name="mb_language[]"
                    class="form-check-input"
                    value="MySQL" <?php echo strpos($mb['mb_language'], 'MySQL') !== false ?'checked':'' ?>>
                <label for="mb_language4">MySQL</label>
            </div>
        </div>
        <p>
          <button type="submit"><?php echo $title ?></button>
          <a href="<?php echo $href ?>">취소</a>
        </p>
      </fieldset>
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