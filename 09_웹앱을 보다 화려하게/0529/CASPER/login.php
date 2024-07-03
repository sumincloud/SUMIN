<?php
  include('./php/db_conn.php');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원 로그인</title>
  <!-- 초기화 서식 -->
  <link rel="stylesheet" href="./css/reset.css" type="text/css">
  <!-- 기본서식 -->
  <link rel="stylesheet" type="text/css" href="./css/base.css">
  <!-- 공통서식 -->
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <!-- 아이콘폰트 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- 로그인폼 서식 -->
  <link rel="stylesheet" href="./css/login.css" type="text/css">
  <style>
    header{
      position:relative !important;
      background:var(--m_bg_color);
    }
    header .gnb li a{color:var(--f_color01) !important;}
    header i.fa-regular{color:var(--f_color01) !important;}
  </style>
</head>
<body>
  <!-- 상단헤더영역 -->
  <header>
    <h1><a href="index.html" title="메인페이지로 바로가기">
      <img src="./images/logo-casper_black.png" alt="캐스퍼 로고"></a>
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

  <!-- 메인콘텐츠 영역 -->
  <main>
    <form name="login" onsubmit="return form_check();" method="post" action="./php/login_check.php">
      <fieldset>
        <div>
          <h2>로그인</h2>
          <legend>로그인 폼</legend>
          <p>
            <label for="id_txt">ID : </label>
            <input type="text" maxlength="16" id="id_txt" name="id_txt" placeholder="아이디를 입력해주세요." autocomplete="off">
    
          </p>
          <p>
            <label for="pw_txt">PASSWORD : </label>
            <input type="password" maxlength="16" id="pw_txt" name="pw_txt" placeholder="비밀번호를 입력해주세요." autocomplete="off">
          </p>
          <p>
            <input type="checkbox" id="id_save">
            <label for="id_save">아이디 저장</label>
          </p>
          <p><input type="submit" value="로그인" id="login_btn"></p>
          <p>
            <a href="#" title="아이디 찾기">아이디 찾기</a>
            <a href="#" title="비밀번호 찾기">비밀번호 찾기</a>
            <a href="./php/register.php" title="회원가입">회원가입</a>
          </p>
        </div>
      </fieldset>
    </form>
  </main>

  <!-- 푸터영역 -->
  <footer>
    <div class="f_inner">
      <h2>
        <a href="index.html" title="메인페이지로 바로가기">
          <img src="./images/logo-hyundai.a9ebdc6.png" alt="하단로고">
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

  <!-- 제이쿼리 라이브러리 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- 자바스크립트 쿠키 -->
  <script src="./script/javascript_cookie.js"></script>

  <script>
    $(document).ready(function(){
      let key = getCookie('idCookie'); //쿠키이름 저장

      if(key!=""){ //만약에 key값이 있다면
        $('#id_txt').val(key); //id값을 저장
      }

      if($('#id_txt').val() !=""){ //만약에 id값이 있다면
        $('#id_save').attr('checked',true); //체크박스에 체크를 해준다.
      }

      $('#id_save').change(function(){ //체크박스의 상태가 바뀌면 아래내용 실행
        if($('#id_save').is(':checked')){ //체크박스에 체크가 된 경우라면
          setCookie('idCookie', $('#id_txt').val(), 7); //쿠키를 생성하고
        }else{ //그렇지 않으면
          deleteCookie('idCookie'); //쿠키를 삭제한다.
        }
      })
      
      $('#id_txt').keyup(function(){ //아이디 입력창에 키를 눌렀을 경우
        if($('#id_save').is(':checked')){ //체크박스에 체크가 된 경우라면
          setCookie('idCookie', $('#id_txt').val(), 7); //쿠키를 생성한다.
        }
      })
    })



    function form_check(f){

      //아이디와 패스워드 입력했는지 여부 검사 = 유효성 검사
      if(f.id_txt.value.length<1){
        alert('아이디를 입력하지 않았습니다.');
        f.id_txt.focus();
        return false;
      }
      if(f.pw_txt.value.length<1){
        alert('패스워드를 입력하지 않았습니다.');
        f.pw_txt.focus();
        return false;
      }
      return true;
    }
  </script>
  
</body>
</html>