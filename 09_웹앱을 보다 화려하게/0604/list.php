<?php
  // 글목록을 출력하기 위한 문서
  include('./php/dbconn.php'); //db계정과 연결
?>

<main>
  <section>
    <h2>게시판</h2>
    <table>
      <caption>게시판</cation>
      <thead>
        <tr>
          <th>No.</th><th>제목</th><th>작성자</th><th>날짜</th>
        </tr>
      </thead>

      <tbody>
        <?php 
          $sql = "select * from free_board";
          $result = mysqli_query($conn, $sql);
          for($i=0;$row=mysqli_fetch_assoc($result);$i++):
        ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><a href="view.php?id=<?php echo $row['id']?>" title="<?php echo $row['subject']?>">
            <?php echo $row['subject']?></a></td>
            <td><?php echo $row['name']?></td>
            
            <td><?php echo date("Y-m-d", strtotime($row['datetime']))?></td>
            <!-- 
              2번째 방법
              substr($row['datetime'],0,10)
            -->
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
    <p><a href="write.php" title="글쓰기">글쓰기</a></p>
  </section>
</main>