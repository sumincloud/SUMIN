<!-- 나의 강의실 중 전체강의 -->

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>나의 강의실 | 이지쿡</title>
  <?php
    include('header.php');      
  ?>
<main>
  <section class="m-center m-auto mb-5 class_size">

  <!-- 부스러기 -->
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실 &#x007C; 상태수정</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4">나의 강의실 &#x007C; 상태수정</h2>

    <!-- 검색영역 -->
    <form action="class_search.php" name="검색하기" method="post">  
      <!-- 검색버튼 -->
      <div class="mb-2 admin_search_box">
        <input type="search" placeholder="검색어를 입력하세요" aria-label="검색어를 입력하세요"
          class="admin_search">
        <button class="btn" type="submit" id="button-addon2" style="border: none;">
          <i class="bi bi-search"></i>
        </button>        
      </div> 

          <!-- 페이지네이션 만드는 php 수식 -->
          <?php
            // echo $s_id;

            // 아이디와 일치하는 강사코드 받아오기
            $sql_t = "select * from register where id='$s_id';";
            $result_t = mysqli_query($conn, $sql_t);
            $t = mysqli_fetch_array($result_t);
            // echo "선생님 코드".$t[7];
            $teacher_code = $t['teacher_code'];
            // echo "선생님 코드11".$teacher_code;

            $query = "select count(*) from academy_list where teacher_code='$teacher_code'";
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

    <article class="class_1">
      <!-- 탭컨텐츠 -->
      <div id="tab_con">
        <ul>
          <li><a href="class_1.php" title="전체" class="act">전체</a></li>
          <li><a href="class_2.php" title="지난 강의" >지난 강의</a></li>
          <li><a href="class_3.php" title="현재 강의">현재 강의</a></li>
          <li><a href="class_4.php" title="보류 &#x007C; 예정">보류 &#x007C; 예정</a></li>
        </ul>
      </div>
      
      <form method="post" name="강의 상태 수정" action="class_update_input.php?class_no='<?php echo $db['0'];?>'">
        <!-- 내용 -->
        <div class="mt-2 mb-2">
          <div>
            <table class="table table-hover">
              <caption>Q&A 목록</caption>
              <thead>
                <tr style="border-top: 3px solid black; line-height:50px;">
                  <th class="text-center">강의번호</th>
                  <th class="text-center">강의명</th>
                  <th class="text-center">강사명</th>
                  <th class="text-center">구분</th>
                  <th class="text-center">난이도</th>
                  <th class="text-center">강의상태</th>
                  <th class="text-center">수정</th>
                </tr>
              </thead>    
              <!-- 테이블 불러오기 php -->
              <tbody>
                <!-- 전체강의 보기 -->
                <?php 
                // 강사코드가 일치하는 모든 것들을 가져오기
                $sql = "select * from academy_list where teacher_code='$teacher_code' order by class_no DESC limit $start, $list_num;";
                $result = mysqli_query($conn, $sql);
      
                while($db=mysqli_fetch_array($result)){   ?>
                <tr>
                  <td><input type="checkbox" id="check<?php echo $db['0'];?>" name="check"><label for="check"><?php echo $db['0'];?></td>
                  <td><label for="check<?php echo $db['0'];?>">[<?php echo $db['2'];?>][<?php echo  $db['4'];?>]<?php echo  $db['2'];?></label></td>
                  <td class="text-center"><label for="check<?php echo $db['0'];?>"><?php echo $db['6'];?></label></td>
                  <td class="text-center"><label for="check<?php echo $db['0'];?>"><?php echo $db['3'];?></label></td>
                  <td class="text-center"><label for="check<?php echo $db['0'];?>"><label for="check"><?php echo $db['9'];?></label></td>
                  <td class="text-center">                
                    <select name="" id="" class="form-select">
                      <option value="<?php echo $db['16'];?>"><?php echo $db['16'];?></option>
                      <option value="현재강의">현재강의</option>
                      <option value="지난강의">지난강의</option>
                      <option value="예정강의">예정강의</option>
                    </select>
                  </td>
                  <td>                    
                    <input type="submit" class="admin_btn admin_btn_red" value="선택수정">
                  </td>
                  </tr>
                  <?php     }; ?> 
                </tbody>
              </table>
            </form>

          <!-- 페이지 네이션 -->
          <nav aria-label="페이지네이션" class="padding50">
            <ul class="pagination justify-content-center">

            <?php //페이지네이션이 들어가는 곳
              //이전페이지
              if($page <= 1){ ?> 
                <li class="page-item"><a href="class_1.php?page=1" class="page-link"><i class="fa-solid fa-angle-left"></i></a></li>
                <?php } 
                else{ ?> 
                <li class="page-item"><a href="class_1.php?page=<?php echo ($page-1); ?>" class="page-link "><i class="fa-solid fa-angle-left"></i></a></li>
                <?php };
                ?> 
            <?php //여기서부터 페이지 번호출력하기
              for($print_page=$s_pageNum;$print_page<=$e_pageNum;$print_page++){?>
                <li class="page-item"><a href="class_1.php?page=<?php echo $print_page; ?>" class="page-link">
                  <?php echo $print_page ?>
                </a></li>
              <?php }; ?>  

              <!-- 다음 버튼 나오는 곳 -->
              <?php if($page>=$total_page){ ?>
                <li class="page-item"><a href="class_1.php?page=<?php echo $total_page; ?>" title="다음페이지로" class="page-link"><i class="fa-solid fa-angle-right"></i></a></li>
              <?php }else{ ?>
                <li class="page-item"><a href="class_1.php?page=<?php echo ($page+1); ?>" class="page-link " ><i class="fa-solid fa-angle-right"></i></a></li>
            <?php };    
            ?>    
          </table>
        </div>
      </div>      
      <!-- 상태 수정 하기 -->
      <a href="class_1.php" title="이전으로" class="admin_btn admin_btn_yellow">이전으로</a>
    </article>
    </form>
  </section>
  <?php
  include('footer.php');
  ?>
</body>
</html>
