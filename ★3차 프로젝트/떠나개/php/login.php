<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인페이지</title>
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

  <!-- 자바스크립트 쿠키파일 연결 -->
  <script src="../script/javascript_cookie.js"></script>

  <style>
    /* 로그인페이지 서식 */
    #login_box{
      padding: 50px 6%;
    }

    .logo img{
      width: 160px;
    }
    .login_large_txt{
      font-size: 20px;
      font-weight: bold;
    }
    input{
      height: 50px;
    }
    .invalid-feedback{
      font-size: 0.9rem;
    }

    #login{
      background: #F2055C;
      height: 50px;
      color: white;
    }
    #easy_login{
      margin-bottom: 100px;
    }

  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./header.php')?>

  <main>
    <div id="login_box">
      <div>
        <div class="login_txt_wrap">
          <div class="logo mb-4"><img src="../images/logo_4.png" alt="로고"></div>
          <div class="login_large_txt">함께 여행을 떠나볼까요?</div>
          <div class="small text-secondary mb-4">로그인이 필요한 서비스에요</div>
        </div>
        <div class="login_form">
          <form action="./login_check.php" id="loginForm" name="loginForm" method="post" class="needs-validation" novalidate>
            <div class="fs-4 mb-2">
              <label for="mb_id" class="form-label fw-bold fs-6">아이디</label>
              <input type="text" class="form-control" name="mb_id" id="mb_id" placeholder="아이디를 입력해주세요" required>
              <div class="invalid-feedback">
                아이디를 입력해주세요.
              </div>
              <input type="checkbox" id="id_save" name="id_save" class="form-check-input">
              <label for="id_save" class="form-check-label fs-6">아이디 저장</label>
            </div>
            <div class="fs-4 mb-4">
              <label for="mb_password" class="form-label fw-bold fs-6">비밀번호</label>
              <small class="d-block text-secondary" style="font-size: 14px;">8자 이상의 영문,숫자,특수문자(!@#$%&amp;)사용</small>
              <div style="position: relative;">
                <input type="password" class="form-control" name="mb_password" id="mb_password" placeholder="비밀번호를 입력해 주세요" required>
                <div class="invalid-feedback">
                  비밀번호를 입력해주세요.
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="container text-center fs-5 mb-4">
          <div class="row fs-6" style="text-wrap: nowrap;">
            <div class="col border-end"><a href="#" class="link-secondary">아이디 찾기</a></div>
            <div class="col border-end"><a href="#" class="link-secondary">비밀번호 찾기</a></div>
            <div class="col"><a href="./register.php" class="link-secondary">회원가입</a></div>
          </div>
        </div>
        <div class="d-grid gap-2 mb-5">
          <button id="login" class="btn" type="submit">로그인</button>
        </div>
        <div class="fs-6 mb-3">
          <div class="text-center text-secondary mb-2">간편로그인</div>
        </div>
        <div class="container text-center fs-5" id="easy_login">
          <div class="row">
            <div class="col">
              <a href="javascript:void(0);" class="link-secondary" onclick="kakaoLogin()">
                <img src="../images/login_kakao.png" alt="카카오톡 로그인">
              </a>
            </div>
            <div class="col">
              <a href="#" class="link-secondary">
                <img src="../images/login_naver.png" alt="네이버 로그인">
              </a>
            </div>
            <div class="col">
              <a href="#" class="link-secondary">
                <img src="../images/icon_goggle.png" alt="구글 로그인">
              </a>
            </div>
        </div>
      </div>
    </div>

  </main>

  <!-- 공통 바텀바삽입 -->
  <?php include('./bottom.php')?>



  <script>
    $(document).ready(function() {
      //해당 페이지에 해당하는 하단 바텀바에 버튼색 생기게
      $('a[title="마이"]').find('i, span').addClass('active');
    });

    $(document).ready(function(){

      $('#login').click(function(e) {
        // 폼의 기본 동작인 submit을 막음
        e.preventDefault();
        //validateCheck();
        if (validateCheck()) {
          $('#loginForm').submit();
        }
      });
      $('input').keyup(function() {
        // input에 입력할때마다 함수체크
        validateCheck();
      });

      //로그인 빈칸 유효성 검사
      function validateCheck() {

        const id = $('#mb_id').val();
        const password = $('#mb_password').val();
        let isValid = true;

        if (id === '') {
          $('#mb_id').addClass('is-invalid');
          isValid = false;
        } else {
          $('#mb_id').removeClass('is-invalid');
        }

        if (password === '') {
          $('#mb_password').addClass('is-invalid');
          isValid = false;
        } else {
          $('#mb_password').removeClass('is-invalid');
        }
        return isValid;
      }

      //--------아이디 저장하는 쿠키 함수----------
      let key = getCookie('idCookie'); //쿠키이름 저장

      if(key!=""){ //만약에 key값이 있다면
        $('#mb_id').val(key); //id값을 저장
      }

      if($('#mb_id').val() !=""){ //만약에 id값이 있다면
        $('#id_save').attr('checked',true); //체크박스에 체크를 해준다.
      }

      $('#id_save').change(function(){ //체크박스의 상태가 바뀌면 아래내용 실행
        if($('#id_save').is(':checked')){ //체크박스에 체크가 된 경우라면
          setCookie('idCookie', $('#mb_id').val(), 7); //쿠키를 생성하고
        }else{ //그렇지 않으면
          deleteCookie('idCookie'); //쿠키를 삭제한다.
        }
      })
      
      $('#mb_id').keyup(function(){ //아이디 입력창에 키를 눌렀을 경우
        if($('#id_save').is(':checked')){ //체크박스에 체크가 된 경우라면
          setCookie('idCookie', $('#mb_id').val(), 7); //쿠키를 생성한다.
        }
      })






    });








  </script>




  <!-- 카카오 로그인 -->
  <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
  <script>
    Kakao.init('eae1a42f5aae28538a34a719867bc196');
    // sdk초기화여부판단 
    console.log(Kakao.isInitialized());
    //카카오로그인 
    function kakaoLogin() {
      //Kakao.Auth.authorize()
      Kakao.Auth.login({
        success: function (response) {
          Kakao.API.request({ 
          url: '/v2/user/me', success: function (response) {
              console.log(response)
              }, fail: function (error) { 
              console.log(error)
              }, 
            })
            }, fail: function (error) { 
            console.log(error) 
          }, 
        }) 
      } 
    //카카오로그아웃 
    function kakaoLogout() {
    if (Kakao.Auth.getAccessToken()) { 
      Kakao.API.request({
      url: '/v1/user/unlink',
    })
    .then(function(response) {
      console.log(response);
    })
    .catch(function(error) {
      console.log(error);
    });
    // Kakao.API.request({ 
    // url: '/v1/user/unlink', success: function (response) { 
    // console.log(response) 
    // }, fail: function (error) { 
    //   console.log(error) }, 
    //});
      Kakao.Auth.setAccessToken(undefined) 
    }}
  </script>


</body>
</html>