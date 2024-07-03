<?php
  //회원가입폼
  include('./db_conn.php'); //데이터베이스 연결

  //세션정보가 있다면 회원정보를 가져오고 회원정보 수정 mode로 설정한다.
  if(isset($_SESSION['ss_mb_id'])){
    $mb_id = $_SESSION['ss_mb_id'];
    $sql = "select * from member where mb_id = '$mb_id'"; //아이디가 일치하는 데이터를 찾는다.
    $result = mysqli_query($conn, $sql); //데이터베이스 조회값을 저장
    $mb = mysqli_fetch_assoc($result); //반복문을 통해 검색
    mysqli_close($conn); //데이터베이스 접속종료


    $mode = 'modify'; //회원정보가 있을 경우 수정
    $title = '회원정보 수정';
    $modify_mb_info = 'readonly';
    $href = './member_list.php';
  }else{
    $mode = 'insert'; //회원정보가 없을 경우 새로 추가
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
  <!-- 초기화 서식 -->
  <link rel="stylesheet" href="../css/reset.css" type="text/css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="../css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <style>
    header{
      position:relative !important;
      background:var(--m_bg_color);
    }
    header .gnb li a{color:var(--f_color01) !important;}
    header i.fa-regular{color:var(--f_color01) !important;}

    

    /* 회원가입폼 서식 */
    fieldset{
      border: none;
      background: rgb(240, 240, 255);
      height: auto;
    }
    fieldset > div{
      width: 450px;
      margin: 100px auto 100px auto;
      text-align: center;
    }
    fieldset > div > legend{display:none;}
    fieldset > div h3{
      font-size: 1.5rem;font-weight: bold;
      margin-bottom: 50px;
      text-align: center;
    }
    legend{}
    p{display: flex;
      justify-content: space-between;
    }
    p > label:first-of-type{
      width: 30%;
      text-align: left;
      display:block;
      line-height: 40px;
    }

    
    input[type='text'],input[type='email'],input[type='password'],#mb_job{
      width: 70%;height: 40px;
      font-size: 1rem;text-indent: 10px;
      margin-bottom: 10px;
      border: 1px solid rgba(0,0,0,0.1);
    }
    input:focus{outline: 2px solid var(--s_color01);}
    input[type='radio']:focus{outline: none;}

    p:nth-of-type(7){justify-content: inherit;}
    p > span{
      text-align: left;
    }
    p:nth-of-type(8){flex-wrap:wrap;}
    p:nth-of-type(8) span{width: 70%;}

    button, form a{
      width: 220px;height: 50px;
      border: none;
      background: var(--s_color01);
      color: #fff;
      font-size: 1rem;
      margin: 20px 0 20px 0;
      display:inline-block;
      line-height: 50px;
      cursor: pointer;
    }

  </style>
</head>
<body>
  <!-- 상단헤더영역 -->
  <header>
    <h1><a href="../index.html" title="메인페이지로 바로가기">
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
      <a href="../login.php" title="로그인"><i class="fa-regular fa-user"></i></a>
      <a href="#" title="알림"><i class="fa-regular fa-bell"></i></a>
    </div>
  </header>

  <!-- 메인영역 -->
  <main>
    <form name ="회원가입" action="register_update.php" method="post">
      <fieldset>
        <div>
          <legend>회원가입폼</legend>
          <h3><?php echo $title?></h3>
          <input type="hidden" name="mode" value="<?php echo $mode?>">
    
          <p>
            <label for="mb_id">아이디 : </label>
            <input type="text" id="mb_id" name="mb_id" value="<?php echo $mb['mb_id'] ?? ''?>" <?php echo $modify_mb_info ?> required>
    
          </p>
          <p>
            <label for="mb_password">비밀번호 : </label>
            <input type="password" id="mb_password" name="mb_password" required>
          </p>
          <p>
            <label for="mb_password_re">비밀번호 확인 : </label>
            <input type="password" id="mb_password_re" name="mb_password_re" required>
          </p>
          <p>
            <label for="mb_name">이름 : </label>
            <input type="text" id="mb_name" name="mb_name" value="<?php echo $mb['mb_name'] ?? ''?>" required>
          </p>
          <p>
            <label for="mb_email">이메일 : </label>
            <input type="email" id="mb_email" name="mb_email" value="<?php echo $mb['mb_email'] ?? ''?>" required>
          </p>
          <p>
            <label>직업 : </label>
            <select name="mb_job" id="mb_job">
              <option value="">선택하세요</option>
              <option value="학생" <?php echo ($mb['mb_job']=="학생")?"selected":"";?>>학생</option>
              <option value="회사원" <?php echo ($mb['mb_job']=="회사원")?"selected":"";?>>회사원</option>
              <option value="공무원" <?php echo ($mb['mb_job']=="공무원")?"selected":"";?>>공무원</option>
              <option value="주부" <?php echo ($mb['mb_job']=="주부")?"selected":"";?>>주부</option>
              <option value="무직" <?php echo ($mb['mb_job']=="무직")?"selected":"";?>>무직</option>
            </select>
          </p>
          <p>
            <label>성별 : </label>
            <span>
              <input type="radio" name="mb_gender" id='gender1' value="남자" <?php echo ($mb['mb_gender'] == "남자") ? "checked" : "";?>>
              <label for="gender1">남자</label>

              <input type="radio" name="mb_gender" id='gender2' value="여자" <?php echo ($mb['mb_gender'] == "여자") ? "checked" : "";?>>
              <label for="gender2">여자</label>
            </span>
          </p>
          <p>
            <label>관심언어 : </label>
            <span>
              <!-- str_contrains (php8)
              : 전체문자열, 찾을문자열을 파라미터로 받아서 있을경우 true, 없을경우 false를 return한다. -->
              <input type="checkbox" name="mb_language[]" id="mb_language1" value="HTML" <?php echo strpos($mb['mb_language'], 'HTML') !== false ? 'checked':'' ?>>
              <label for="mb_language1">HTML</label>

              
              <input type="checkbox" name="mb_language[]" id="mb_language2" value="CSS" <?php echo strpos($mb['mb_language'], 'CSS') !== false ? 'checked':'' ?>>
              <label for="mb_language1">CSS</label>
              <input type="checkbox" name="mb_language[]" id="mb_language3" value="JAVASCRIPT" <?php echo strpos($mb['mb_language'], 'JAVASCRIPT') !== false ? 'checked':'' ?>>
              <label for="mb_language1">JAVASCRIPT</label>
              <input type="checkbox" name="mb_language[]" id="mb_language4" value="JQUERY" <?php echo strpos($mb['mb_language'], 'JQUERY') !== false ? 'checked':'' ?>>
              <label for="mb_language1">JQUERY</label>
              <input type="checkbox" name="mb_language[]" id="mb_language5" value="PHP" <?php echo strpos($mb['mb_language'], 'PHP') !== false ? 'checked':'' ?>>
              <label for="mb_language1">PHP</label>
              <input type="checkbox" name="mb_language[]" id="mb_language6" value="SQL" <?php echo strpos($mb['mb_language'], 'SQL') !== false ? 'checked':'' ?>>
              <label for="mb_language1">SQL</label>
              <input type="checkbox" name="mb_language[]" id="mb_language7" value="REACT" <?php echo strpos($mb['mb_language'], 'REACT') !== false ? 'checked':'' ?>>
              <label for="mb_language1">REACT</label>
            </span>
          </p>
          


          <button type="submit"><?php echo $title?></button>
          <a href="<?php echo $href?>">취소</a>

        </div>

      </fieldset>

    </form>

  </main>

  <!-- 푸터영역 -->
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

  </body>
  </html>
