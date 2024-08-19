<!-- 나의 강의실 중 지난강의 -->

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
    <p class="bread"><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">나의 강의실</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4">나의 강의실</h2>

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

            $query = "select count(*) from academy_list where teacher_code='$teacher_code'and class_status='현재강의' ";
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
          <li><a href="class_1.php" title="전체">전체</a></li>
          <li><a href="class_2.php" title="지난 강의" >지난 강의</a></li>
          <li><a href="class_3.php" title="현재 강의" class="act">현재 강의</a></li>
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
        <div id="container" style="position:relative;">
          <table class="table table-hover">
            <caption>Q&A 목록</caption>
            <thead class="text-center">
              <tr style="border-top: 3px solid black; line-height:50px;">
                <th class="w-10">강의번호</th>
                <th class="w-50">강의명</th>
                <th class="w-10">난이도</th>
                <th class="w-10">강의상태</th>
              </tr>
            </thead>    
            <!-- 테이블 불러오기 php -->
            <tbody>
              <!-- 카테고리별 강의 보기 -->
              <?php 
                    $sql = "select * from academy_list where teacher_code='$teacher_code' and class_status='현재강의' order by class_no DESC limit $start, $list_num";
                    $result = mysqli_query($conn, $sql);     

                    while($db=mysqli_fetch_row($result)){   ?>
                    
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
                <!-- 현재강의 이면 녹색으로 하기 -->
                <?php if($db['17'] == '현재강의'){?>
                  <td class="text-center"><a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><span class="span_title" style="background-color:var(--green);"><?php echo $db['17'];?><span></a></td>
                <?php     }elseif($db['17'] == '예정강의'){; ?> 
                  <td class="text-center"><a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><span class="span_title" style="background-color:var(--yellow); color:var(--darkbrown);"><?php echo $db['17'];?></span></a></td>
                <?php     }else{ ?> 
                  <td class="text-center"><a href="student.php?class_no=<?php echo $db['0'];?>" title="학생페이지로"><span class="span_title" style="background-color:var(--darkbrown);"><?php echo $db['17'];?></span></a></td>
                <?php }; ?> 
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
                <li class="page-item"><a href="class_3.php?page=1" class="page-link"><i class="fa-solid fa-angle-left"></i></a></li>
                <?php } 
                else{ ?> 
                <li class="page-item"><a href="class_3.php?page=<?php echo ($page-1); ?>" class="page-link "><i class="fa-solid fa-angle-left"></i></a></li>
                <?php };
                ?> 
            <?php //여기서부터 페이지 번호출력하기
              for($print_page=$s_pageNum;$print_page<=$e_pageNum;$print_page++){?>
                <li class="page-item"><a href="class_3.php?page=<?php echo $print_page; ?>" class="page-link">
                  <?php echo $print_page ?>
                </a></li>
              <?php }; ?>  

              <!-- 다음 버튼 나오는 곳 -->
              <?php if($page>=$total_page){ ?>
                <li class="page-item"><a href="class_3.php?page=<?php echo $total_page; ?>" title="다음페이지로" class="page-link"><i class="fa-solid fa-angle-right"></i></a></li>
              <?php }else{ ?>
                <li class="page-item"><a href="class_3.php?page=<?php echo ($page+1); ?>" class="page-link " ><i class="fa-solid fa-angle-right"></i></a></li>
            <?php };    
            ?>    
          </table>
        </div>
      </div>
      
      <div class="mt-5" style="position:relative;">
        <a href="class_create.php" title="강의개설" class="admin_btn admin_btn_red position_r_b">강의개설</a>
      </div>
    </article>
  </section>
  <?php
  include('footer.php');
  ?>
</body>
</html>
