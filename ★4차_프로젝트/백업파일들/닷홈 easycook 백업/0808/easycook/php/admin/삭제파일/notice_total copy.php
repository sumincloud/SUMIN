<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공지관리 | 이지쿡</title>
  
  <?php
    include('header.php');
  ?>
</head>
<body>
  <main>
    <section class="m-center m-auto mb-5 class_size">
      <!-- 부스러기 -->
      <p class="bread"><a href="index.php">홈</a> &#x003E; 게시판 관리 &#x003E; <span style="font-weight:bold">공지관리</span></p>

      <!-- 제목 -->
      <h2 class="text-center mt-5 mb-4">나의 전체 공지</h2>

      <!-- 내용 -->
      <div class="con mt-2 mb-2 article">
        <table class="table table-hover notice table-responsive">
          <caption>Q&A 목록</caption>
          <thead class="text-center">
            <tr style="border-top: 3px solid black; line-height:50px;">
              <th >번호</th>
              <th style="width: 60%;">제목</th>
              <th style="width: 10%;">날짜</th>
              <th style="width: 20%;">강의실</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // 페이지 네이션 변수 설정
            $results_per_page = 5;
            if (!isset($_GET['page'])) {
              $page = 1;
            } else {
              $page = $_GET['page'];
            }
            $start_from = ($page - 1) * $results_per_page;

            // 아이디와 일치하는 강사코드 받아오기
            $sql_t = "SELECT * FROM register WHERE id='$s_id';";
            $result_t = mysqli_query($conn, $sql_t);
            $t = mysqli_fetch_array($result_t);
            $teacher_code = $t['teacher_code'];

            // 강사코드로 해당하는 강의번호 가져오기
            $sql_academy = "SELECT class_no FROM academy_list WHERE teacher_code = '$teacher_code'";
            $result_academy = mysqli_query($conn, $sql_academy);
            $class_nos = [];
            while ($row_academy = mysqli_fetch_assoc($result_academy)) {
              $class_nos[] = $row_academy['class_no'];
            }

            // 각 class_no에 해당하는 공지사항 가져오기
            $sql_boards = 
            "SELECT b.*, a.name as academy_name 
            FROM board b 
            JOIN academy_list a ON b.class_no = a.class_no 
            WHERE b.class_no IN (" . implode(",", $class_nos) . ") 
            ORDER BY b.no DESC 
            LIMIT ?, ?";
            $stmt_boards = $conn->prepare($sql_boards);
            $stmt_boards->bind_param('ii', $start_from, $results_per_page);
            $stmt_boards->execute();
            $result_boards = $stmt_boards->get_result();

            // 결과 출력
            $number = $start_from + 1;
            while ($row = $result_boards->fetch_assoc()) {
              echo "<tr>";
                echo "<td class='text-center' style='width: 10%;'>" . $number . "</td>";
                echo "<td style='width: 60%;'>" . $row['title'] . "</td>";
                echo "<td class='text-center' style='width: 10%;'>" . date("Y.m.d", strtotime($row['datetime'])) . "</td>";
                echo "<td style='width: 20%;' class='text-left'>
                        <a href='notice_list.php?class_no=" . $row['class_no'] . "' title='강의실 바로가기'><span class='span_title'>강의실</span>
                        </a>
                      </td>";
              echo "</tr>";
              $number++;
            }
            $stmt_boards->close();

            // 페이지 네이션 출력
            $sql_total = "
                SELECT COUNT(*) AS total 
                FROM board 
                WHERE class_no IN (" . implode(",", $class_nos) . ")";
            $result_total = mysqli_query($conn, $sql_total);
            $row_total = mysqli_fetch_assoc($result_total);
            $total_pages = ceil($row_total['total'] / $results_per_page);

            echo 
            "<tr>
              <td class='text-center' colspan='4' style='text-align:center;'>
              <div style='display:flex; justify-content:center;'>";

            // 이전 페이지 링크
            if ($page > 1) {
              echo "<a href='notice_total.php?page=" . ($page - 1) . "' class='page-link'><i class='fa-solid fa-angle-left'></i></a>";
            }

            // 페이지 번호 링크
            for ($i = 1; $i <= $total_pages; $i++) {
              echo "<a href='notice_total.php?page=" . $i . "' class='page-link'";
              if ($i == $page) {
                echo " active";
              }
              echo "'>" . $i . "</a> ";
            }

            // 다음 페이지 링크
            if ($page < $total_pages) {
              echo "<a href='notice_total.php?page=" . ($page + 1) . "' class='page-link'><i class='fa-solid fa-angle-right'></i></a>";
            }

            echo "</div></td></tr>";
            ?>
          </nav>  
          </tbody>
        </table>
        <div class="mt-5 mb-5" style="position:relative;">
        <a href="index.php" title="메인으로" class="admin_btn admin_btn_yellow position_l_b">메인으로</a>
      </div>
      </div>
  <?php
    include('footer.php');
  ?>
</body>
</html>
