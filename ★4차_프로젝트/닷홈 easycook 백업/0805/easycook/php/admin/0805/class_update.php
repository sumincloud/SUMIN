<!-- 나의 강의실 중 전체강의 -->

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>나의 강의실 | 이지쿡</title>
  <script>
      // 모든 버튼과 select 요소를 처리하는 함수
      function updateLinks() {
          // 모든 select 요소를 가져옵니다
          var selects = document.querySelectorAll('.class_status');
          
          selects.forEach(function(select) {
              var selectedValue = select.value;
              
              // 해당 select와 관련된 버튼을 찾습니다
              var button = select.closest('td').nextElementSibling.querySelector('.update_link');
              
              // 링크의 href 속성을 업데이트합니다
              if (button) {
                  button.href = 'class_update_input.php?no=' + encodeURIComponent(select.getAttribute('data-no')) + '&class_status=' + encodeURIComponent(selectedValue);
              }
          });
      }

      // 페이지가 로드된 후 이벤트 리스너를 추가합니다
      window.onload = function() {
          // 모든 select 요소에 change 이벤트 리스너를 추가합니다
          var selects = document.querySelectorAll('.class_status');
          selects.forEach(function(select) {
              select.addEventListener('change', updateLinks);
          });

          // 페이지 로드 시에도 링크를 업데이트합니다
          updateLinks();
      };
  </script>
  <?php
    include('header.php');      
  ?>
<main>
  <section class="m-center m-auto mb-5 class_size">

  <!-- 부스러기 -->
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4">나의 강의실</h2>

    <!-- 검색영역 -->
    <form action="" name="검색하기" method="">  
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
        // 아이디와 일치하는 강사코드 받아오기
        $sql_t = "select * from register where id='$s_id';";
        $result_t = mysqli_query($conn, $sql_t);
        $t = mysqli_fetch_array($result_t);            // echo "선생님 코드".$t[7];
        $teacher_code = $t['teacher_code'];            // echo "선생님 코드11".$teacher_code;

        $query = "select count(*) from academy_list where teacher_code='$teacher_code' ";
        $result = mysqli_query($conn, $query);
        $max_Num = mysqli_fetch_array($result);            // echo $max_Num[0];

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
        //전체블럭 계산
        $total_block = ceil($total_page / $page_num);            
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

      <!-- 비동기방식으로 하기 script -->
      <script>
        // 새개의 문서를 하나의 주소로 연결하기
        $(document).ready(function(){
          // 메뉴를 클릭시 함수내용 실행
          $('#tab_con a').click(function(e){
            // 새로고침 방지
            e.preventDefault();

            let url = this.href; //속성값 변수에 담기
            console.log(url); //출력하기

            // 클래스 제거 및 추가하기
            $('#tab_con a.act').removeClass('act');
            $(this).addClass('act');
            
            $('#container').remove();
            $('#content').load(`${url} #container`).hide().fadeIn('slow');
            
          });
        });
      </script>
  
    <!-- 내용 -->
    <div class="mt-2 mb-2" id="content">
      <div id="container">
            <table class="table table-hover">
              <caption>Q&A 목록</caption>
              <thead class="text-center">
                <tr style="border-top: 3px solid black; line-height:50px;">
                  <th class="w-10">강의번호</th>
                  <th class="w-40">강의명</th>
                  <th class="w-10">난이도</th>
                  <th class="w-10">강의상태</th>
                  <th class="w-10">수정</th>
                </tr>
              </thead>    
              <tbody>
                <?php 
                // 강사코드가 일치하는 모든 것들을 가져오기
                $sql = "select * from academy_list where teacher_code='$teacher_code' order by class_no DESC limit $start, $list_num  ";
                $result = mysqli_query($conn, $sql);
                
                while($db=mysqli_fetch_array($result)){   ?>
                <tr>
                  <td>
                    <a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><?php echo $db['0'];?></a>
                  </td>
                  <td >
                    <a href="student.php?class_no=<?php echo $db['0'];?>" title="">
                    [<?php echo $db['3'];?>][<?php echo  $db['4'];?>][<?php echo  $db['5'];?>]<?php echo  $db['1'];?>
                    </a>
                  </td>
                  <td class="text-center"><a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><?php echo $db['10'];?></a></td>
                  <!-- 강의상태 수정하기  -->
                  <td class="text-center">
                    <select name="class_status" class="form-select class_status" data-no="<?php echo $db['0'];?>">
                          <option value="<?php echo $db['17'];?>"><?php echo $db['17'];?></option>
                          <option value="현재강의">현재강의</option>
                          <option value="지난강의">지난강의</option>
                          <option value="예정강의">예정강의</option>
                      </select>
                  </td>
                  <td>
                    <a href="class_update_input.php?no=<?php echo $db['0'];?>" class="update_link admin_btn admin_btn_red" title="상태수정">상태수정</a>
                  </td>
                </tr>              
                <?php  }; ?> 
              </tbody>
                        <!-- 페이지 네이션 -->
          <nav aria-label="페이지네이션" class="padding50">
            <ul class="pagination justify-content-center">

            <?php //페이지네이션이 들어가는 곳
              //이전페이지
              if($page <= 1){ ?> 
                <li class="page-item"><a href="class_update.php?page=1" class="page-link"><i class="fa-solid fa-angle-left"></i></a></li>
                <?php } 
                else{ ?> 
                <li class="page-item"><a href="class_update.php?page=<?php echo ($page-1); ?>" class="page-link "><i class="fa-solid fa-angle-left"></i></a></li>
                <?php };
                ?> 
            <?php //여기서부터 페이지 번호출력하기
              for($print_page=$s_pageNum;$print_page<=$e_pageNum;$print_page++){?>
                <li class="page-item"><a href="class_update.php?page=<?php echo $print_page; ?>" class="page-link">
                  <?php echo $print_page ?>
                </a></li>
              <?php }; ?>  

              <!-- 다음 버튼 나오는 곳 -->
              <?php if($page>=$total_page){ ?>
                <li class="page-item"><a href="class_update.php?page=<?php echo $total_page; ?>" title="다음페이지로" class="page-link"><i class="fa-solid fa-angle-right"></i></a></li>
              <?php }else{ ?>
                <li class="page-item"><a href="class_update.php?page=<?php echo ($page+1); ?>" class="page-link " ><i class="fa-solid fa-angle-right"></i></a></li>
            <?php };    
            ?>   
            </table>
          </div>
        </div>
      </form>
      
      <div class="mt-5 mb-3" style="position:relative;">
        <!-- 상태 수정 하기 -->
        <a href="class_1.php" title="이전으로" class="admin_btn admin_btn_yellow position_l_b">이전으로</a>
      </div>

    </article>
    </form>
  <?php
  include('footer.php');
  ?>
</body>
</html>
