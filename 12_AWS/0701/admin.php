<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STORE BOM</title>
  </head><!--/head-->  
  <body>
    <header id="header"><!--header-->
      <a href="index.php">
        <img src="./images/logo.png" alt="상단로고" />
      </a>
    </header>								
    
    <main>
      <section>
        <h2>관리자 로그인</h2>
        <!-- 로그인 폼 -->
          <form name="loginForm" action="./php/login_check.php" method="POST">  
            <input type="text" placeholder="아이디" name="id" />
            <input type="password" placeholder="비밀번호" name="pw" />
            <span>
              <input type="checkbox" class="checkbox">아이디저장</span><br>
            <button type="submit" class="btn btn-default" style="display: inline;">로그인</button>
          </form>
      </section>
    </main>
  </body>
</html>