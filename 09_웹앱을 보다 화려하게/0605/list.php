    <?php
      include('./php/db_conn.php');
    ?>

    <form name="검색하기" method="post" action="./list_search.php">
    <table>
      <caption>게시판 목록</caption>
        <tr>
          <th>NO.</th>
          <th>제목</th>
          <th>작성자</th>
          <th>날짜</th>
        </tr>

      <?php
          $query = 'select * from free_board order by id DESC';
          $result = mysqli_query($conn, $query);
          //반복문 while
          while($row = mysqli_fetch_array($result)){
      ?>
      
      <tr>
          <td><?=$row['id']?></td>
          <td><a href="view.php?id=<?=$row['id']?>" title="<?=$row['memo']?>">
              <?=$row['memo']?>
            </a></td>
          <td><?=$row['subject']?></td>
          <td>
            <?=date("Y-m-d",strtotime($row['datetime']))?>
          </td>
          
          <!--substr($date['datetime'],0,10)-->
      </tr>
      <?php
          }

          mysqli_free_result($result);
          mysqli_close($conn);
      ?>
    </table>
    <p>
      <input type="search" id="search" name="search">
      <input type="submit" value="검색(제목 + 내용)" id="search_btn" >
      <a href="./write.php" title="글쓰기">글쓰기</a>
    </p>
    </form>
  </main>

  <script>
    let s_btn = document.getElementById('search_btn');
    s_btn.addEventListener('click', function(){
      console.log('click');
      form_check();
    });
    
    function form_check(){
      //alert('검색어를 입력하지 않았습니다.')
      if(document.getElementById('search').value.length<1){
        alert('검색어를 입력하지 않았습니다. 확인하세요');
        return false;
      }
      return true;
    }

  </script>
</body>
</html>

