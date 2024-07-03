<?php
  include("./php/dbconn.php"); //db연결하기

  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);

  //echo $id; //넘겨받은 id값 출력해보기
  $sql = "select * from free_board where id='$id'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
?>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>게시판 만들기 - 내용보기</title>
    <style>
      table{
        width:100%;
        border:1px solid #333;
        border-collapse:collapse;
      }
      table th{width:10%;}
      table th, table td{
        border:1px solid #333;line-height:40px;
      }
      table tr:last-child{text-align:center;}
      .btn{
        background:#333;
        text-decoration:none;
        padding:6px 6px;color:#fff;
      }
      input[type=button]{
        padding:6px 20px;
        border:none;color:#fff;
      }
      #btn01{background:#00f;}
      #btn02{background:#f00;}
    </style>
  </head>
  <body>
    <form name="글내용보기" method="post" action="./delete.php">
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <main>
        <section>
          <h2>글내용 보기</h2>
          <table>
            <caption>글내용 보기</caption>
              <tr>
                <th>No.</th><td>
                <?php echo $row['id']?></td>
              </tr>
              <tr>
                <th>작성자</th>
                <td><?php echo $row['name']?></td>
              </tr>
              <tr>
                <th>제목</th>
                <td><?php echo $row['subject']?></td>
              </tr>
              <tr>
                <th>내용</th>
                <td><?php echo $row['memo']?></td>
              </tr>
              <tr>
                <th>작성일</th>         
                <td><?php echo substr($row['datetime'],0,10)?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <a href="./list.php" title="목록보기" class="btn">목록보기</a>
                  <input type="button" value="수정" id="btn01">

                  <label for="pwd">비밀번호 : </label><input type="password" id="pwd" name="pwd">
                  <input type='submit' id="btn02" onclick="return f_check();" value="삭제">
                </td>
              </tr>
          </table>
        </section>
      </main>
    </form>
    <script>
      function f_check(){
        if(document.getElementById('pwd').value<1){
          alert('비밀번호를 입력하지 않았습니다. 다시확인하세요.');
          return false;
        }else{
          return;
        }
      };
    </script>
  </body>
</html>