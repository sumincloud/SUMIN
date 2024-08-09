<?php
  include('./php/include/dbconn.php');

  $comu = isset($_GET['comu']) ? trim($_GET['comu']) : '';
  $tab = isset($_GET['tab']) ? trim($_GET['tab']) : '';
  $Fm = isset($_GET['Fm']) ? trim($_GET['Fm']) : '';

  $sql = "select * from review";
  $result = mysqli_query($conn,$sql);

  $query = "select count(*) from board ";
  $result2 = mysqli_query($conn, $query);
  $max_Num = mysqli_fetch_array($result2);

  // 전체 목록의 갯수
  $num = $max_Num[0];
  //한 페이지에 보여질 게시물 개수
  $list_num = 7;    
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
  //블럭당 시작페이지 번호$start
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 후기</title>
    <!-- 공통 헤드정보 삽입 -->
    <?php include('./php/include/head.php'); ?>
    <!--sub 페이지 css 하나에 우겨넣기-->
    <link rel="stylesheet" href="./css/sub.css" type="text/css">
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header_sub_category.php');?>

  <main>
    <!--이거 클래스명이 이렇게 되면 안될것같은데-->
    <section class="sub_header">
      <h2 class="hide">커뮤니티 페이지</h2>
      <article class="tab_con intro">
        <h2 class="hide">커뮤니티 페이지</h2>
        <ul class="tab_menu">
          <li><a href="?comu=<?php echo $comu; ?>&tab=후기" class="<?php echo ($tab == '후기') ? 'on' : ''; ?>">후기</a></li>
          <li><a href="?comu=<?php echo $comu; ?>&tab=상담신청" class="<?php echo ($tab == '상담신청') ? 'on' : ''; ?>">상담신청</a></li>
          <li><a href="?comu=<?php echo $comu; ?>&tab=고객센터&Fm=공지사항" class="<?php echo ($tab == '고객센터') ? 'on' : ''; ?>">고객센터</a></li>
        </ul>
      </article>
    </section>

    <section>
      <article class="community_con">
        <?php if($tab == '후기') {?>
          <div class="community">
            <ul>
              <?php 
                while($row = mysqli_fetch_array($result)){ 
                  $class_no = $row['class_no'];
                  $arry_img = $row['img'];
                  $id = $row['id'];
                  
                  // echo $class_no;
                  $sql2 = "select * from academy_list where class_no = '$class_no'";
                  $result2 = mysqli_query($conn,$sql2);
                  $row2 = mysqli_fetch_array($result2);
                  //강으명은 row2['name']로 

                  //이건 프로필 가져올 sql문
                  $sql3 = "select * from register where id = '$id'";
                  $result3 = mysqli_query($conn,$sql3);
                  $row3 = mysqli_fetch_array($result3);
              ?>
                <li>
                  <p class="profile_img_size">
                    <!--이미지 바꾸기-->
                    <!-- <img src="./images/sub/user.png"> -->
                    <img src="./uploads/profile/<?php echo $row3['profile'] ?>">
                  </p>

                  <div>
                    <p>
                      <?php echo $row["name"] ?>
                    </p>
                    <p>
                      <!--강의명-->
                      <?php echo $row2["name"] ?>
                    </p>
                  </div>
                  
                  <!--별점-->
                  <p class="day_gray">
                  <?php
                    $review_star = "";
                    $star = $row["star"];
                    for($i = 0; $i < 5; $i++){
                      if($i < $star){
                        $review_star .= '<i class="bi bi-star-fill active"></i>' ;
                      }else{
                        $review_star .= '<i class="bi bi-star-fill"></i>' ;
                      }
                    }
                  ?>
                  <span class="star"><?php echo $review_star; ?></span>

                  <!--몇개월전-->
                  <?php
                    $datetime = $row["datetime"];
                    $date = new DateTime($datetime);

                    $today = new DateTime();
                    $interval = $today->diff($date);

                    // 차이 계산
                    $years = $interval->y;
                    $months = $interval->m;
                    $days = $interval->d;
                    $hours = $interval->h;
                    $minutes = $interval->i;
                    $seconds = $interval->s;

                    // 결과 출력
                    if ($years > 0) {
                        echo "{$years}년 전";
                    } elseif ($months > 0) {
                        echo "{$months}개월 전";
                    } elseif ($days > 0) {
                        echo "{$days}일 전";
                    } elseif ($hours > 0) {
                        echo "{$hours}시간 전";
                    } elseif ($minutes > 0) {
                        echo "{$minutes}분 전";
                    } else {
                        echo "{$seconds}초 전";
                    }
                  ?>
                  </p>

                  <!--내용-->
                  <p class="comu_review"><?php echo $row['review']; ?></p>

                  <!--사진-->
                  <p class="review_img">
                    <?php foreach (explode(",",$row['img']) as $file) { ?>
        
                      <?php if($file == ''){ ?>
                        <img src="./uploads/review/<?php echo $file; ?>" alt="" class="hide">
                      <?php }else{ ?>
                        <img src="./uploads/review/<?php echo $file; ?>" alt="">
                      <?php } ?>
        
                    <?php } ?>
                  </p>

                </li>
              <?php } ?>
            </ul>
          </div>


        <?php }else if($tab == '상담신청') { ?>
          <!--위에 사진이랑 말있는곳-->
          <article id="page1">
            <h2>상담 신청</h2>
            <p>더 자세한 상담은 방문상담을 신청하세요.</p>
            <p>방문상담을 위해 아래에 정보를 입력해 주세요.</p>
          </article>
          <!--상담신청 작성 부분 form있는곳-->
          <article id="page2" class="inquire">
            <h2 class="hide">전화 상담신청 </h2>
            <form name="" method="post" action="./php/off_inq_send.php">
              <!--강의 내용 hidden으로 담아서 보내기-->
              <input type="hidden" value="<?php echo $row['name']?>" name="academy_name">
              <label for="inquire_name" >이름</label>
              <input type="text" value="" name="inquire_name" id="inquire_name" >
              <!-- <br> -->
              <label for="inquire_phone" >전화번호</label>
              <input type="text" value="" name="inquire_phone" id="inquire_phone" >

              <label for="inquire_memo" >상담 내용</label>
              <input type="text" value="" name="inquire_memo" id="inquire_memo" placeholder="ex)국비과정 상담, 한식요리사 상담">
              
              <p>방문 날짜</p>
              <!--여기에 달력들어가게하기-->
              <input type="date" value="" name="inquire_date" id="inquire_date" >

              <p>오전</p>
              <ul>
                <li >
                  <input type="radio" name="inquire_time" id="T10" value="10:00">
                  <label for="T10" class="time_on">10 : 00</label>
                </li>
                <li>
                  <input type="radio" name="inquire_time" id="T11" value="11:00">
                  <label for="T11">11 : 00</label>
                </li>
                <li >
                  <input type="radio" name="inquire_time" id="T11" value="11:00">
                  <label for="T11"class="hiden"></label>
                </li>
              </ul>
                
              <p>오후</p>
              <ul>
                <li>
                  <input type="radio" name="inquire_time" id="T13" value="13:00">
                  <label for="T13">13 : 00</label>
                </li>
                <li>
                  <input type="radio" name="inquire_time" id="T14" value="14:00">
                  <label for="T14">14 : 00</label>
                </li>
                <li>
                  <input type="radio" name="inquire_time" id="T15" value="15:00">
                  <label for="T15">15 : 00</label>
                </li>
                <li>
                  <input type="radio" name="inquire_time" id="T16" value="16:00">
                  <label for="T16">16 : 00</label>
                </li>
                <li>
                  <input type="radio" name="inquire_time" id="T17" value="17:00">
                  <label for="T17">17 : 00</label>
                </li>
                <li>
                  <input type="radio" name="inquire_time" id="T18" value="18:00">
                  <label for="T18">18 : 00</label>
                </li>
              </ul>

              <p>
                <input type="submit" value="상담 신청">
              </p>
            </form>
          </article>
        <?php }else if($tab == '고객센터') { ?>
          <script>
            (function(){var w=window;if(w.ChannelIO){return w.console.error("ChannelIO script included twice.");}var ch=function(){ch.c(arguments);};ch.q=[];ch.c=function(args){ch.q.push(args);};w.ChannelIO=ch;function l(){if(w.ChannelIOInitialized){return;}w.ChannelIOInitialized=true;var s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="https://cdn.channel.io/plugin/ch-plugin-web.js";var x=document.getElementsByTagName("script")[0];if(x.parentNode){x.parentNode.insertBefore(s,x);}}if(document.readyState==="complete"){l();}else{w.addEventListener("DOMContentLoaded",l);w.addEventListener("load",l);}})();

            ChannelIO('boot', {
              "pluginKey": "b6fe6414-7ada-4d01-9b81-bd54fcacd091"
            });
          </script>
          <article id="page1_2">
            <h2>고객 센터</h2>
            <p>궁금한 내용을 확인해보세요</p>
            <!--탭컨텐츠 공지사항 자주묻는 질문 버튼-->
            <ul class="tab_mnu2">
              <li><a href="?comu=<?php echo $comu; ?>&tab=고객센터&Fm=공지사항" title="" class="<?php echo ($Fm == '공지사항') ? 'inq_on' : ''; ?>">공지사항</a></li>
              <li ><a href="?comu=<?php echo $comu; ?>&tab=고객센터&Fm=자주묻는질문" title="" class="<?php echo ($Fm == '자주묻는질문') ? 'inq_on' : ''; ?>">자주묻는 질문</a></li>
            </ul>
          </article>
          <!-- 고객센터안 탭컨텐츠 공지사항,자주 묻는 질문-->
          <?php 
            if($Fm == '공지사항'){
          ?>
          <!--공지사항 페이지 첫페이지만 구현 보여지는것만-->
          <article class="notice">
            <h2 class="hide">공지사항 페이지</h2>
            <ul>
              <li>
                <p>07.02</p>
                <p>대학생 여름방학 할인 이벤트</p>
              </li>
              <li>
                <p>06.02</p>
                <p>첫 커피 커리어, 바리스타 실무를 위한 특강</p>
              </li>
              <li>
                <p>05.01</p>
                <p>5월 가정의 달, 코리아바리스타제과제빵학원의 특별한 혜택</p>
              </li>
              <li>
                <p>04.02</p>
                <p>4월 한정혜택! 만족 못하셨다면 전액반환 해드립니다.</p>
              </li>
              <li>
                <p>01.12</p>
                <p>특별한 1+1이벤트 수강료 최대 40%할인</p>
              </li>
            </ul>

            <nav aria-label="페이지네이션" class="padding50 mt-3 mb-3" style="position: relative;">
              <ul class="pagination justify-content-center">

              <?php //페이지네이션이 들어가는 곳
                //이전페이지
                if($page <= 1){ ?> 
                  <li class="page-item"><a href="notice_list.php?class_no='<?echo $class_no;?>'page=<?php echo ($page-1); ?>" class="page-link"><i class="bi bi-chevron-left"></i></a></li>
                  <?php } 
                  else{ ?> 
                  <li class="page-item"><a href="notice_list.php?class_no='<?echo $class_no;?>'page<?php echo ($page-1); ?>" class="page-link "><i class="bi bi-chevron-left"></i></a></li>
                  <?php };
                  ?> 
              <?php //여기서부터 페이지 번호출력하기
                for($print_page=$s_pageNum;$print_page<=$e_pageNum;$print_page++){?>
                  <li class="page-item"><a href="notice_list.php?class_no='<?echo $class_no;?>'page<?php echo $print_page; ?>" class="page-link">
                    <?php echo $print_page ?>
                  </a></li>
                <?php }; ?>  

                <!-- 다음 버튼 나오는 곳 -->
                <?php if($page>=$total_page){ ?>
                  <li class="page-item"><a href="notice_list.php?class_no='<?echo $class_no;?>'page<?php echo $total_page; ?>" title="다음페이지로" class="page-link"><i class="bi bi-chevron-right"></i></i></a></li>
                <?php }else{ ?>
                  <li class="page-item"><a href="notice_list.php?class_no='<?echo $class_no;?>'page<?php echo ($page+1); ?>" class="page-link ">
                  <i class="bi bi-chevron-right"></i></a></li>
              <?php };    
              ?>    
              </ul>
            </nav>  

          </article>
          
          <?php }else if($Fm =='자주묻는질문'){ ?>
            <!--질문 페이지 토글메뉴 첫페이지만 구현 보여지는것만-->
            <article class="faq">
              <h3 class="hide">자주묻는질문 페이지</h3>
              <ul >
                <li class="s_toggleQ"><span>Q</span> 수강 신청을 했는데 개강일날 그냥 가면 될까요?</li>
                <li class="s_toggle">
                  <span>A</span> 개강일이 가까워지면 문자로 해당 강의 개설 혹은 폐강문자가 갈예정입니다. 미뤄지는 경우 02-1234-1234 이 번호로 전화가 갈 예정입니다.
                </li>
                <li class="s_toggleQ"><span>Q</span> 수업시간 이외에도 선생님께 질문을 하고싶어요</li>
                <li class="s_toggle">
                  <span>A</span> <img src="./images/sub/inq_Q.png" alt="선생님 질문 사진">
                </li>
                <li class="s_toggleQ"><span>Q</span> 휴게 공간이 있나요</li>
                <li class="s_toggle">
                  <span>A</span> 저희 학원은 장시간 수업을 받는 학생들을 위한 휴게공간이 있습니다. 실습실이 있는 층인 1층에 103호실이 휴게 공간입니다.
                </li>
                <li class="s_toggleQ"><span>Q</span> 재수강이 가능한가요?</li>
                <li class="s_toggle">
                  <span>A</span> 재수강 가능합니다
                </li>
                <li class="s_toggleQ"><span>Q</span> HRD에서 신청햇는데 결제는 어디서 하나요</li>
                <li class="s_toggle">
                  <span>A</span> 학원에서 신청 확인후 메세지와 메일이 갈 예정입니다. 
                </li>
              </ul>
            </article>

          <?php } ?>

        <!--이아래 중괄호는 고객센터 중괄호 -->
        <?php } ?>
      </div>

    </article>
  </main>

  <!-- 공통푸터삽입 -->
  <?php include('./php/include/footer.php');?>
  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  


  <script>  
    let tab_mnu = $('.tab_mnu')
    let tab_mnu2 = $('.tab_mnu2> li> a')
    tab_mnu.click(function(){
      $(this).addClass('on').parent().siblings().find('a').removeClass('on')

    })

    tab_mnu2.click(function(){
      $(this).addClass('inq_on').parent().siblings().find('a').removeClass('inq_on')
    })

    $('input[type="radio"]').change(function() {
      // 모든 레이블에서 'time_on' 클래스를 제거
      $('.inquire label').removeClass('time_on');
      // 선택된 라디오 버튼에 연결된 레이블에만 'time_on' 클래스를 추가
      $('input[type="radio"]:checked').next('label').addClass('time_on');
    });

    $('.s_toggleQ').click(function(){
      $(this).next().slideToggle()
      // $('.s_toggle').slideToggle()
    })




  </script>

</body>
</html>