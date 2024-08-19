<?php
  include('./php/include/dbconn.php');

  $class_no = $_GET['class_no'];
  // echo $class_no;
  $sql = "select * from academy_list where class_no = '$class_no'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  // echo $row['catagory2'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <!-- 공통 헤드정보 삽입 -->
    <?php include('./php/include/head.php'); ?>
    <link rel="stylesheet" href="./css/sub.css"> 
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <section class="sub_header">
      <select name="" onchange="if(this.value) location.href=(this.value);">
      <option value="./coffee_academy.php?catagory2=국비">바리스타</option>
      <option value="./intro.php?cata=소개">소개</option>
      <option value="./cook_academy.php?catagory2=국비">요리</option>
      <option value="./coffee_academy.php?catagory2=국비">바리스타</option>
      <option value="./bread_academy.php?catagory2=국비">제과제빵</option>
      <option value="./community.php?comu=후기">커뮤니티</option>
      </select>

      <article class="tab_con cook">
        <h2 class="hide">카테고리 소개페이지</h2>
        <?php
            if($row['category2'] == '자격증' ){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class=' tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class='on tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($row['category2'] == '국비'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='on tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($row['category2'] == '일반'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='on tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($row['category2'] == '창업'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='on tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($row['category2'] == '취미'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='on tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            };
        ?>

      </article>
      <article class="cook_tail">
        <h2 class="hide">강의 상세 페이지</h2>

        <img src="./uploads/class_main/<?php echo $row['thumnail_img'] ?>" alt="강의 썸네일 사진">
        <ul>
          <li>과목명 : <b> <?php echo $row['name'] ?> </b></li>
          <li>일&nbsp;&nbsp;&nbsp;정 : <?php echo $row['start_date'] ?> ~ <?php echo $row['end_date'] ?></li>
          <li>차&nbsp;&nbsp;&nbsp;수 : <?php echo $row['nth'] ?> 차</li>
          <li>난이도 : <?php echo $row['grade'] ?></li>
          <li>장&nbsp;&nbsp;&nbsp;소 : <?php echo $row['place'] ?></li>
          <li>강사명 : <?php echo $row['teacher'] ?></li>
          <li>연락처 : 02-1234-1234</li>
        </ul>

        <div class="btn-box-s">
          <button class="btn-s">수강신청</button>
          <!--여기 찜하기 버튼 서식 만들기-->
          <button class="btn-s line">찜하기</button>
        </div>
      </article>

      <div class="cook_hr"></div>

      <!--여기서부터는 탭컨텐츠 상세, 후기 ,문의 -->

      <article class="t_con cook">
        <h2 class="hide">카테고리 소개페이지</h2>
        <ul>
          <li>
            <a href="./cook_academy_detail.php?class_no=<?= $row['class_no']; ?>" title="상세정보" class=" t_mnu">상세정보</a>
          </li>

          <li>
            <a href="./cook_academy_detail2.php?class_no=<?= $row['class_no']; ?>" title="수강생 후기" class=" t_mnu" >수강생 후기</a>
          </li>
          <li>
            <a href="./cook_academy_detail3.php?class_no=<?= $row['class_no']; ?>" title="상담" class="on2 t_mnu" >상담</a>
          </li>

        </ul>

      </article>
      <article id="page">
        <div id="page2" class="inquire">
          <h2>해당과정 바로 상담 (신청)</h2>
          <form name="" method="post" action="./php/inquire_send.php">
            <!--강의 내용 hidden으로 담아서 보내기-->
            <input type="hidden" value="<?php echo $row['name']?>" name="academy_name">

            <label for="inquire_name" >이름</label>
            <input type="text" value="" name="inquire_name" id="inquire_name" >
            <br>
            <label for="inquire_phone" >전화번호</label>
            <input type="text" value="" name="inquire_phone" id="inquire_phone" >
  
            <p>
              <input type="submit" value="문의하기">
            </p>
          </form>
        </div>
      </article>

    </section>


  </main>
  <!-- 공통푸터삽입 -->
  <?php include('./php/include/footer.php');?>

  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>  
    let tab_mnu = $('.t_mnu')
    tab_mnu.click(function(e){
      e.preventDefault();
      // return false;
      let url = this.href; // 속성값 변수에 담기
      console.log(url);

      $('.t_con a.t_mnu').removeClass('on2');
      $(this).addClass('on2');

      $('#page2').remove();
      //#content 영역에 해당 주소를 불러와서 삽입하여 화면에 출력한다.
      $('#page').load(url + ' #page2');
    })
  </script>

</body>
</html>

