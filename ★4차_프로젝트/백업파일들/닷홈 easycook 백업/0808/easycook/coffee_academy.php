<?php
  include('./php/include/dbconn.php');
  $catagory2 = trim($_GET['catagory2']);

  // $sql = "select * from easycook where catagory2 = '$catagory2'";
  // $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 소개</title>
    <!-- 공통 헤드정보 삽입 -->
    <?php include('./php/include/head.php'); ?>
    <!--sub 페이지 css 하나에 우겨넣기-->
    <link rel="stylesheet" href="./css/sub.css" type="text/css">
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header.php');?>

  <main>
    <!--이거 클래스명이 이렇게 되면 안될것같은데-->
  <section class="sub_header">
    <select name="" onchange="if(this.value) location.href=(this.value);">
      <option value="./coffee_academy.php?catagory2=국비">바리스타</option>
      <option value="./intro.php?cata=소개">소개</option>
      <option value="./cook_academy.php?catagory2=국비">요리</option>
      <option value="./bread_academy.php?catagory2=국비">제과제빵</option>
      <option value="./community.php?comu=후기">커뮤니티</option>
    </select>
      <h2 class="hide">카테고리 소개페이지</h2>
      <!--공통 탭컨텐츠 클래스 tab_con   카테고리별 글래스 지정해서 스타일적용하기-->
      <article class="tab_con cook">
        <h2 class="hide">카테고리 소개페이지</h2>
        <?php
            if($catagory2 == '자격증' ){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class=' tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class='on tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($catagory2 == '국비'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='on tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($catagory2 == '일반'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='on tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($catagory2 == '창업'){
              echo "  
              <ul>
                <li><a href='coffee_academy.php?catagory2=국비' title='국비' class='tab_mnu'>국비</a></li>
                <li><a href='coffee_academy.php?catagory2=일반' title='일반' class='tab_mnu' >일반</a></li>
                <li><a href='coffee_academy.php?catagory2=창업' title='창업' class='on tab_mnu' >창업</a></li>
                <li><a href='coffee_academy.php?catagory2=취미' title='취미' class='tab_mnu' >취미</a></li>
                <li><a href='coffee_academy.php?catagory2=자격증' title='자격증' class=' tab_mnu' >자격증</a></li>
              </ul>
              ";
            }elseif($catagory2 == '취미'){
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
      <article class="cook_con">
        
        <?php 
          // echo $catagory2;
          $sql = "select * from academy_list where category1 like '%바리스타%' AND category2= '$catagory2' ";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result)){
        ?>

          <ul class="card-list">
          <!-- 태그에 맞는 강의 가져와서 리스트로 넣기 -->
            <li>
              <div>
                <!-- 강의 썸네일 이미지 -->
                <a href="./coffee_academy_detail.php?class_no=<?= $row['class_no']; ?>" title="상세페이지로 이동">
                  <img src="./uploads/class_main/<?php echo $row['thumnail_img']; ?>" alt="강의 썸네일 사진">
                </a>
                <!-- 강의 이름 -->
                <div>
                  <h2>
                    <a href="./coffee_academy_detail.php?class_no=<?= $row['class_no']; ?>" title="상세페이지로 이동">
                      <?php echo $row['name']; ?>
                    </a>
                  </h2>

                  <!-- 강의 # 태그 -->
                  <p>
                    <span>#<?php echo $row['category2']; ?></span>
                    <span>#<?php echo $row['category1']; ?></span>
                    <span>#<?php echo $row['category3']; ?></span>
                  </p>

                  <!-- 기간 / 강사이름 -->
                  <div>
                    <span><?php echo $row['start_date']; ?> ~ <?php echo $row['end_date']; ?></span>
                    <!-- <span><?php echo $row['teacher']; ?></span> -->
                  </div>
                </div>
                <!-- 찜버튼 -->
                <div class="cart">
                  <img src="./images/common/heart_w.png" alt="찜버튼">
                </div>
              </div>

            </li>
          </ul>

        <?php } ?>

      </article>
    </section>
  </main>

    <!-- 공통푸터삽입 -->
    <?php include('./php/include/footer.php');?>

  <!-- 공통바텀바삽입 -->
  <?php include('./php/include/bottom.php');?>

  <script>  
    let tab_mnu = $('.tab_mnu')
    tab_mnu.click(function(){
    
    $(this).addClass('on').parent().siblings().find('a').removeClass('on')
    })
  </script>
</body>
</html>