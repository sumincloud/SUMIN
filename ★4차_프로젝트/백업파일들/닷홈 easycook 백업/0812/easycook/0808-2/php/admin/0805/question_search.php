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
    <p class="bread"><a href="index.php">홈</a> &#x003E; 게시판 관리 &#x003E; <span style="font-weight:bold">문의 관리</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4">전체 문의 관리</h2>

    <div class="class_1">
      <!-- 내용 -->
      <div class="mt-2 mb-2" id="content">
        <div id="container">
          <table class="table table-hover question_list">
            <caption>Q&A 목록</caption>
            <thead class="text-center">
              <tr style="border-top: 3px solid black; line-height:50px;">
                <th style="width: 5%;">번호</th>
                <th style="width: 15%;">상태</th>
                <th style="width: 50%;">제목</th>
                <th style="width: 15%;">작성자</th>
                <th style="width: 15%;">날짜</th>
              </tr>
            </thead>    
            <!-- 테이블 불러오기 php -->
            <tbody>
              <!-- 전체강의 보기 -->
              <?php 
                //입력한  search 값 받아오고
                $search = $_POST['search'];    // echo $search;

                //입력한 값이랑 데이터 값을 비교한다
                $sql = "select * from question where question like '%".$search."%' or question_memo like '%".$search."%' order by no DESC";
                $result = mysqli_query($conn, $sql);

                
                while($q=mysqli_fetch_row($result)){
                  $query = "select * from academy_list where class_no='$q[1]'";
                  $result2 = mysqli_query($conn, $query);
                  $class = mysqli_fetch_array($result2);
                  if(empty($q[7])){
                    print 
                    "<tr>
                    <td style='width: 5%;'><a href='question_view.php?no=".$q[0]."' title=''>".$q[0]."</a></td>
                    <td style='width: 15%;'><a href='question_view.php?no=".$q[0]."' title=''><span class='question_r1'>질문</span></a></td>
                    <td style='width: 50%;'>
                      <a href='question_view.php?no=".$q[0]."' title=''>".$q[3]."
                      <span>".$class[3]."</span>
                      </a>
                    </td>
                    <td style='width: 15%;'><a href='question_view.php?no=".$q[0]."' title=''>".$q[2]."</a></td>
                    <td style='width: 15%;'><a href='question_view.php?no=".$q[0]."' title=''>".date("Y.m.d",strtotime($q[5]))."</a></td>
                  </tr>";
                  }else{
                    print 
                    "<tr>
                    <td style='width: 5%;'><a href='question_view.php?no=".$q[0]."' title=''>".$q[0]."</a></td>
                    <td style='width: 15%;'><a href='question_view.php?no=".$q[0]."' title=''><span class='question_r2'>답변완료</span></a></td>
                    <td style='width: 50%;'>
                      <a href='question_view.php?no=".$q[0]."' title=''>".$q[3]."
                      <span>".$class[3]."</span>
                      </a>
                    </td>
                    <td style='width: 15%;'><a href='question_view.php?no=".$q[0]."' title=''>".$q[2]."</a></td>
                    <td style='width: 15%;'><a href='question_view.php?no=".$q[0]."' title=''>".date("Y.m.d",strtotime($q[5]))."</a></td>
                  </tr>";
                };
                };
              ?>
            </tbody>
          </table>      
        </div>
      </div> 
    </div>

    <div class="mt-5 mb-3" style="position:relative;">
        <a href="question_1.php" title="다시 검색하기" class="admin_btn admin_btn_yellow position_l_b">다시 검색</a>
      </div>

  <?php
  include('footer.php');
  ?>
</body>
</html>
