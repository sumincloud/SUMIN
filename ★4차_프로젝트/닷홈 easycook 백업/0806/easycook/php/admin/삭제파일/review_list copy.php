<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>수강생 후기 | 이지쿡</title>
  <?php
    include('header.php');      
  ?>
<main>
  <section class="m-center m-auto mb-5 class_size">
    <!-- 부스러기 -->
    <p class="bread"><a href="index.php">홈</a> &#x003E; 학생 관리 &#x003E; <span style="font-weight:bold">수강생 후기</span></p>

    <!-- 제목 -->
    <h2 class="text-center mt-4 mb-4">수강생 후기</h2>

    <!-- 굵은 선 -->
    <div class="text-center" style="width: 100%; height: 3px; background-color: var(--admin);"></div>

    <!-- 후기 데이터 부르기 -->
    <?php
    //아이디를 찾아라
    $s_id = $_SESSION['id'];   

    //나의 강사코드를 찾아라
    $query = "select * from register where id='$s_id'";
    $result = mysqli_query($conn, $query);
    $class = mysqli_fetch_array($result);
    // echo '강사코드'.$class[7];
    ?>

    <table class="table table-hover table-responsive">
      <caption>나의 수강생 후기</caption>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">상세 내용</th>
      </tr>
        <?php    
        // 리뷰 데이터 가져오기
        $sql = "SELECT * FROM review";
        $result = mysqli_query($conn, $sql);   

        // 데이터 출력
        $row_count = 1; // 번호를 매기기 위한 변수 초기화
        while ($r = mysqli_fetch_array($result)) {
            //academy_list에서 데이터 받아오기
            $sql2 = "select * from academy_list where class_no='$r[1]' and teacher_code='$class[7]';";
            $result2 = mysqli_query($conn, $sql2);
            $db = mysqli_fetch_array($result2);

            if(isset($db[2])){
                // 나의 강사코드와, class_no가 있는 것은 데이터로 표현해주자
        ?>
        <tr style="border-bottom: 1px solid var(--gray);">
            <td><?php echo $row_count; ?></td> <!-- 번호 출력 -->
            <td>
                <!-- 강의명 -->
                <b>[<?php echo $db['2'];?>][<?php echo  $db['3'];?>][<?php echo  $db['4'];?>]<?php echo $db['1'];?></b><br>

                <!-- 별점 -->
                <?php
                $stars = $r['star']; // 별점 데이터 필드

                // 별 아이콘 준비
                $starIcons = '';
                for ($i = 0; $i < $stars; $i++) {
                    $starIcons .= '<i class="bi bi-star-fill"></i>';
                }
                for ($i = $stars; $i < 5; $i++) {
                    $starIcons .= '<i class="bi bi-star"></i>';
                }
                ?>
                <div class="review-item">
                    <span><?= $starIcons ?></span>
                    <span><!-- 작성자 --><?php echo $r[5];?></span>
                    <span><!-- 작성일 --><?php echo date("Y.m.d",strtotime($r[7]));?></span>
                </div>

                <!-- 리뷰내용 -->
                <?php echo nl2br($r[4]);?>
            </td>
        </tr>
        <?php  
                $row_count++; // 다음 번호로 증가
            } else { 
                // 나의 강사코드와, class_no가 없다면 아무것도 출력하지 않음
            } 
        } 
        ?>
      </tbody>
    </table>

  </section>
</main>
<?php
include('footer.php');
?>
</body>
</html>
