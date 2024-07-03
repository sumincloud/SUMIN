<?php
include('./php/db_conn.php');
$id = $_GET['id'];
$id = mysqli_real_escape_string($conn,$id);
// echo $id;

$sql = "select * from free_board where id='$id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
  <form action="delete.php" method="post" name="전송">
    <input type="hidden" name="id" value="<?php echo $row['id']?>">
  <main>
    <section>
      <table>
        <h2>글 내용 보기</h2>
        <caption>글내용 보기</caption>
        <tr>
          <th>No.</th>
          <td><?php echo $row['id']  ?></td>
        </tr>
        <tr>
          <th>작성자</th>
          <td><?php echo $row['name']  ?></td>
        </tr>
        <tr>
          <th>제목</th>
          <td><?php echo $row['subject']  ?></td>
        </tr>
        <tr>
          <th>내용</th>
          <td><?php echo $row['memo']  ?></td>
        </tr>
        <tr>
          <th>작성일</th>
          <td><?php echo substr( $row['datetime'],0,10)  ?></td>
        </tr>
        <tr>
            <th><label for="pwd"> 비밀번호 : </label></th>
            <td><input type="password" id="pwd" name="pwd"></td>
          </tr>
        </table>
        <!--글삭제하기랑 글수정하기 버튼 만들기-->
        <p>
          <a href='./list.php' title="목록보기">목록보기</a>
          <input type="submit" value="삭제하기"onclick="return f_check();">
          <!-- <a href="delet.php?id=<?=$row['id']?>"  title="삭제하기" onclick="return f_check();">삭제하기</a> -->
          <a href='' title="">수정하기</a>
        </p>
    </section>
  </main>
</form>
  
  <script>
    function f_check(){
      if(document.getElementById('pwd').value < 1){
        alert('비밀번호를 입력하지 않았습니다 다시확인하세요')
        return false
      }else{
        return true
      };
    };
  </script>
</body>
</html>