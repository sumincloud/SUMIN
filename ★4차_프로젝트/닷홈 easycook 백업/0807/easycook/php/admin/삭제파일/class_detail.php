<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>나의 강의실 | 이지쿡</title>
<?php
  include('header.php');

  $class_status = $_GET['class_status'];          
  // echo $class_status  ;

?>
<main>
  <section class="m-center m-auto mb-5 class_size">
    <h2 class="text-center mt-5 mb-5">관리자 페이지 - 나의 강의실</h2>

    <form action="">   
    <!-- 검색버튼 -->
      <div class="input-group mb-5" style="background-color: #F7F7F7;border-radius: 5px; color: white;">
        <input type="search" placeholder="검색어를 입력하세요" aria-label="검색어를 입력하세요"
          class="form-control"  style="background-color: #F7F7F7; border: none;">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="border: none;">
          <i class="bi bi-search"></i>
        </button>
      </div>

      <div class="list list1">
        <ul>
          <li><a href="class.php" title="전체 강의">전체</a></li>
          <li><a href="class_detail.php?class_status=지난강의" title="지난 강의" id="class2">지난 강의</a></li>
          <li><a href="class_detail.php?class_status=현재강의" title="현재 강의" id="class3">현재 강의</a></li>
          <li><a href="class_detail.php?class_status=예정강의" title="보류 &#x007C; 예정" id="class4">보류 &#x007C; 예정</a></li>
        </ul>
      </div>

    <!-- 선 -->
      <div class="border border-dark border-2 mb-2"></div>

    <!-- 테이블 시작 -->
      <table class="table table-hover">
        <caption>Q&A 목록</caption>
        <thead class="text-center">
          <tr>
            <th>강의번호</th>
            <th>강의명</th>
            <th>강사명</th>
            <th>구분</th>
            <th>난이도</th>
            <th>강의상태</th>
            <th>종료여부</th>
          </tr>
        </thead>
        <!-- 테이블 불러오기 php -->
        <?php
          // 페이지네이션 만들기
          $query = "select count(*) from question";
          $result = mysqli_query($conn, $query);
          $max_Num = mysqli_fetch_array($result);

          // echo $max_Num[0];

          // 전체 목록의 갯수
          $num = $max_Num[0];

          //한 페이지에 보여질 게시물 개수
          $list_num = 5;
          
          //이전, 다음 버튼 클릭시 나오는 페이지 수
          $page_num =3;
          
          //현재 페이지
          $page = isset($_GET["page"])? $_GET["page"] : 1;
          
          // 전체페이지수 계산
          $total_page = ceil($num / $list_num);
          //10페이지 = 게시물 50개 / 5 한페이지 출력개수
          
          //전체블럭 계산
          $total_block = ceil($total_page / $page_num);
          //3.333333 =  10/3
          
          //현재블럭번호 계산
          $now_block = ceil($page / $page_num);
          
          //블럭당 시작페이지 번호
          $s_pageNum = ($now_block - 1) * $page_num + 1;
          
          //데이터가 0인 경우
          if($s_pageNum <= 0){ $s_pageNum = 1; };
          
          //블럭당 마지막페이지 번호
          $e_pageNum = $now_block * $page_num;
          
          //마지막 번호가 전체 페이지번호보다 크다면 동일한 값을 준다.
          if($e_pageNum > $total_page){ $e_pageNum = $total_page; };

          $start = ($page - 1) * $list_num;
          $cnt = $start + 1;
      

          //반복문 while
          $datetime = date('y-m-d'); 
        ?>
        <tbody>
          <!-- 카테고리별 강의 보기 -->
          <?php 
          $sql = "select * from academy_list where class_status='$class_status' order by class_no DESC limit $start, $list_num";
          $result = mysqli_query($conn, $sql);     

          while($db=mysqli_fetch_row($result)){   ?>
          
          <tr>
            <td><a href="" title="" ><?php echo $db['0'];?></a></td>
            <td class="text-center">
              <a href="" title="">
                [<?php echo $db['2'];?>][<?php echo  $db['4'];?>]<?php echo $db['2'];?>
              </a>
            </td>
            <td class="text-center"><a href="" title=""><?php echo $db['6'];?></a></td>
            <td class="text-center"><a href="" title=""><?php echo $db['3'];?></a></td>
            <td class="text-center"><a href="" title=""><?php echo $db['9'];?></a></td>
            <td class="text-center"><a href="" title=""><?php echo $db['16'];?></a></td>
            <td class="text-center"><a href="" title=""><?php echo $db['17'];?></a></td>
          </tr>

          <?php     }; ?> 
        </tbody>
      </table>

      <!-- 페이지 네이션 -->
      <nav aria-label="페이지네이션" class="padding50">
      <ul class="pagination justify-content-center">

      <?php //페이지네이션이 들어가는 곳
        //이전페이지
        if($page <= 1){ ?> 
          <li class="page-item"><a href="list.php?page=1" class="page-link">이전</a></li>
          <?php } 
          else{ ?> 
          <li class="page-item"><a href="list.php?page=<?php echo ($page-1); ?>" class="page-link ">이전</a></li>
          <?php };
          ?> 
      <?php //여기서부터 페이지 번호출력하기
        for($print_page=$s_pageNum;$print_page<=$e_pageNum;$print_page++){?>
          <li class="page-item"><a href="list.php?page=<?php echo $print_page; ?>" class="page-link">
            <?php echo $print_page ?>
          </a></li>
        <?php }; ?>  

        <!-- 다음 버튼 나오는 곳 -->
        <?php if($page>=$total_page){ ?>
          <li class="page-item"><a href="list.php?page=<?php echo $total_page; ?>" title="다음페이지로" class="page-link">다음</a></li>
        <?php }else{ ?>
          <li class="page-item"><a href="list.php?page=<?php echo ($page+1); ?>" class="page-link " >다음</a></li>
      <?php };    
      ?>    
      </ul>
    </nav>

      <!-- 강의 개설 하기 -->
      <a href="question.php" title="강의개설" class="btn btn-primary">강의개설</a>
      <!-- 상태 수정 하기 -->
      <a href="question.php" title="상태수정" class="btn btn-primary">상태수정</a>
    </form><!-- 검색 끝 -->
  </section>
  </main>
  <?php
  include('footer.php');
  ?>
</body>
</html>