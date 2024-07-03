<?php 
  include('./php/dbconn.php');
?>

  <html lang="ko">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, intial-scale=1">
      <title>대한항공 - 로그인</title>
    </head>
    <body>

      <main>
        <section>
          <h2>로그인</h2>
          <form name="login" methoe="post" action="login_check.php" onsubmit="return form_check();>
            <p>
              <label for="mb_id">아이디</label>
              <input type="text" id="mb_id" name="mb_id">
            </p>

            <p>
              <label for="mb_password">패스워드</label>
              <input type="text" id="mb_password" name="mb_password">
            </p>

            <p>
              <input type="checkbox" id="id_save">
              <label type="id_save">아이디저장</label>
            </p>

            <p>
              <input type="submit" value="로그인" id="login_btn">
            </p>

            <p>
              <a href="index.html" title="메인화면으로">메인화면으로</a>
              <a href="id_search.php" title="아이디찾기">아이디찾기</a>
              <a href="pw_search.php" title="비번찾기">비번찾기</a>
              <a href="join.php" title="회원가입">회원가입</a>
            </p>
            
            <h3>SNS로그인</h3>
            <a href="#" title="카카오 로그인">카카오 로그인</a>            
            <a href="#" title="네이버 로그인">네이버 로그인</a>            
            <a href="#" title="구글 로그인">구글 로그인</a>            
          </form>
      </main>
      <script>
        function form_check(){
          //아이디, 비밀번호 값 체크
        }
      </script>
    </body>
  </html>

<?php ?>