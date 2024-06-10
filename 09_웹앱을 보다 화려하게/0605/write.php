<?php 
  include('./php/db_conn.php'); //db계정과 연결
?>

<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-wdith, intial-scale=1">
    <title>자유게시판 - 글쓰기</title>
  </head>
  <body>
    <form name="글쓰기" method="post" action="./dbinput.php" onsubmit="return formCheck()">
      <section class="board">
        <h2>게시판 글입력</h2>
        <table class="free_board">
          <caption>글입력하기</caption>
          <thead>
            <tr>
              <td scope='row'><label for="title">글제목</label></td>
              <td scope='row'>
                <input type="text" maxlength="255" id="title" name="title"></td>
            </tr>
          </thead>  

          <tbody>
            <tr>
              <td><label for="name">작성자</label></td>
              <td><input type="text" maxlength="50" name="name" id="name"></td>
            </tr>
            <tr>
              <td><label for="txtbox">내용</label></td>
              <td><textarea cols="80" rows="30" name="txtbox" id="txtbox"></textarea></td>
            </tr>
            <tr>
              <td><label for="pwd">비밀번호</label></td>
              <td><input type="password" maxlength="255" id="pwd" name="pwd"></td>
            </tr>
          </tbody>            
        </table>
        <p>
          <input type="submit" value="글입력 완료">
          <input type="reset" value="입력취소">
        <p>
      </section>
    </form>

    <script>
      function formCheck(){

        //제목체크
        if(document.getElementById('title').value.length<1){
          alert('제목을 입력하세요.');
          document.getElementById('title').focus();
          return false;
        }
        //작성자명 체크
        if(document.getElementById('name').value.length<1){
          alert('작성자명을 입력하세요.');
          document.getElementById('name').focus();
          return false;
        }    
        //내용체크
        if(document.getElementById('txtbox').value.trim().length===0){
          alert('내용을 입력하세요.');
          document.getElementById('txtbox').focus();
          return false;
        }
        //패스워드체크
        if(document.getElementById('pwd').value.length<1){
          alert('패스워드를 입력하세요.');
          document.getElementById('pwd').focus();
          return false;
        }
        return true;
      }
    </script>
  </body>
</html>