<?php
  include("./dbconn.php"); //데이터베이스 연결을 위한 파일을 불러온다.

  $sql = "select * from todo order by id DESC"; //데이터 정렬하여 목록을 가져옴.
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn); //데이터베이스 접속종료
?>

<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>오늘의 할일 - todolist</title>
    <style>
      .cancle_line{
        text-decoration:line-through;
        font-style:italic;
        color:#ccc;
      }
    </style>
  </head>
  <body>
    <!-- 상단 헤더영역 시작 -->
    <header>
      <form name="오늘의 할일" method="post" action="./php/add.php">
        <h1>ToDoList - 오늘의 할일</h1>
        <div><input type="text" name="title" placeholder="오늘의 일정을 입력하세요."></div>
        <div>
          <!-- <input type="submit" value="입력(추가)"> -->
          <button type="submit">입력(추가)</button>
        </div>
      </form>
    </header>

    <!-- 메인영역 시작,  리스트 출력하는 곳 -->
    <main>
      <section>
        <h2>글목록 출력</h2>
        <?php if(mysqli_num_rows($result) <= 0) { ?> <!-- 데이터베이스 자료가 없다면 -->
          <div>등록된 글내용이 없습니다.</div>
        <?php } ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>

          <div>
            <input type="checkbox" onclick="location.href='./php/check.php?id=<?php echo $row['id'] ?>'" <?php echo $row['checked'] ? 'checked' : '' ?>>
            <h3 class="<?php echo $row['checked'] ? 'cancle_line':''?>">
              <?php echo $row['title'] ?>
            </h3>
          </div>

          <a href="./php/remove.php?id=<?php echo $row['id']?>" id="<?php echo $row['id']?>" title="삭제하기">삭제</a>
          <div>
            <small>등록일시 : <?php echo $row['datetime'] ?></small>
          </div>
        <?php endwhile; ?>
      </section>
    </main>

    <!-- 푸터영역 시작 -->
    <footer>
      <address>Copyright&copy;2024 TodoList allrights reserved.</address>
    </footer>
  </body>
</html>