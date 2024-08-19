<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>강사 | 이지쿡</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="요리 자격증, 요리 강의, 커피 자격증, 커피 강의, 베이커리 자격증, 베이커리 강의, 온라인 요리 수업, 요리 학원, 커피 학원, 베이커리 학원, 이지쿡, easycook, 요리 수강, 커피 수강, 베이킹 수강, 요리 온라인 강의, 커피 온라인 강의, 베이킹 온라인 강의, 요리 레시피, 베이킹 레시피">
  <meta name="description" content="이지쿡에서 요리, 커피, 베이커리 자격증과 수강, 온라인 강의를 배워보세요. 전문 강사진의 체계적인 교육으로 전문가가 되는 길을 안내합니다.">
  <meta name="Robots" content="Index, Follow">
  <meta http-equiv="Subject" content="이지하게 배우자, 이지쿡">
  <meta http-equiv="Title" content="이지쿡">
  <title>이지쿡</title>
  <?php
    include('header.php'); 
  ?>
  <main>     
    <?php  
      // echo "아이디는 ".$id;
    ?> 
      <h3>1</h3>
      <div class="board">
        <div class="board_con">
          <div class="board_title">
            <h4>학원소식</h4>
            <span><a href="EC_notice.php" title="학원소식">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul><!-- 학원 소식 부르기 -->
            <?php 
              $sql = "select * from ec_notice order by no desc limit 4";
              $result = mysqli_query($conn, $sql);              
              while($db=mysqli_fetch_array($result)){                
            ?>
              <li>
                <a href="EC_notice.php"  title="학원 소식 가기">
                  <ul>
                    <li><input type="hidden" value="<?php echo $db[0]?>"><?php echo $db[1]?></li>
                    <li><span><?php echo date("Y-m-d",strtotime($db['3']))?></span></li>
                  </ul>
                </a>
              </li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>나의 강의실</h4>
            <span><a href="class_3.php" title="나의 강의실 가기">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul><!-- 나의 강의이름만 부르기 -->
            <?php 
              // echo $s_id;
              $sql2 = "select * from register where id='$s_id'";
              $result2 = mysqli_query($conn, $sql2); 
              $db2 = mysqli_fetch_array($result2);     //echo "안녕".$db2[7];

              $sql3 = "select * from academy_list where teacher_code='$db2[7]' and class_status='현재강의'"; 
              $result3 = mysqli_query($conn, $sql3);  
              while($db3=mysqli_fetch_array($result3)){                  
            ?>
              <li>
                <a href="student.php?class_no=<?php echo $db3[0];?>"  title="강의실 바로가기">
                  <ul>
                    <li><?php echo $db3[1];?></li>
                    <li><span><?php echo $db3[13]?></span></li>
                  </ul>
                </a>
              </li>
            <?php } ?>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>퀵메뉴</h4>
          </div>
          <div class="board_q_menu">
            <p><a href="class_create.php" title="강의등록하기"><img src="../../images/admin/board1.png" alt="강의등록"><span>강의등록</span></a></p>
            <p><a href="notice_select.php" title="공지등록하기"><img src="../../images/admin/board2.png" alt="공지등록"><span>공지등록</span></a></p>
            <p><a href="question_1.php" title="문의게시판가기"><img src="../../images/admin/board3.png" alt="문의답변"><span>문의답변</span></a></p>
            <p><a href="EC_notice.php" title="학원소식가기"><img src="../../images/admin/board4.png" alt="학원소식"><span>학원소식</span></a></p>
            <p><a href="#" title="실습실바로가기"><img src="../../images/admin/board5.png" alt="실습실"><span>실습실</span></a></p>
            <p><a href="review_list.php" title="수강후기 보기"><img src="../../images/admin/board6.png" alt="SMS"><span>수강후기</span></a></p>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>나의 공지사항</h4>
            <span><a href="notice_list.php" title="공지사항으로">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul><!-- 나의 공지사항 -->
              <?php
                // board에서 데이터 가져오기
                $sql_b = "select * from board where id='$s_id' order by no desc limit 4";
                $result_b = mysqli_query($conn, $sql_b);
                while($db_b = mysqli_fetch_array($result_b)){

                //강의 번호 받아오기
                $sql_no = "select * from academy_list where class_no='$db_b[1];'";
                $result_no = mysqli_query($conn, $sql_no);
                $db_no = mysqli_fetch_array($result_no);
              ?>
              <li>
                <a href="notice_total.php"  title="나의 공지사항 바로가기">
                  <ul>
                    <li class="board_sub"><?php echo $db_b[2];?>
                    <span><?php echo $db_no[1];?></span>
                    </li>
                    <li><span><?php echo date("Y-m-d",strtotime($db_b[5]));?></span></li>
                  </ul>
                </a>
              </li>
              <?php }   ?>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>NEW 문의</h4>
            <span><a href="question_1.php" title="문의관리로 바로가기">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul><!-- 문의관리 바로가기 -->
            <?php 
            // question 테이블에서 가져오기
            $sql_q = "select * from question where answer='' order by no desc limit 4";
            $result_q = mysqli_query($conn, $sql_q);
            while($db_q = mysqli_fetch_array($result_q)){
              //강의 번호 받아오기
              $sql_no2 = "select * from academy_list where class_no='$db_q[0];'";
              $result_no2 = mysqli_query($conn, $sql_no2);
              $db_no2 = mysqli_fetch_array($result_no2);
              ?>
              <li>
                <a href="question_view.php?no=<?php echo $db_q[0];?>"  title="">
                  <ul>
                    <li class="board_sub"><?php echo $db_q[3];?>
                    <span><?php echo $db_no2[1];?></span>
                    </li>
                    <li><span><?php echo date("Y-m-d",strtotime($db_q[5]));?></span></li>
                  </ul>
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>다가오는 일정</h4>
            <span><a href="" title="">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul>
            <?php 
              $sql3 = "select * from academy_list where teacher_code='$db2[7]' and class_status='예정강의' limit 4"; 
              $result3 = mysqli_query($conn, $sql3);  
              while($db3=mysqli_fetch_array($result3)){                  
            ?>
              <li>
                <a href="student.php?class_no=<?php echo $db3[0];?>"  title="강의실 바로가기">
                  <ul>
                    <li><?php echo $db3[1];?></li>
                    <li><span> D - 00 일</span></li>
                  </ul>
                </a>
              </li>
            <?php } ?>
            </ul>
          </div>
        </div>
      </div>
  <?php
  include('footer.php');
  ?>
</body>
</html>