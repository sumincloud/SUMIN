<?php
include('../include/dbconn.php');
$select_time = $_POST['select_time'];

// echo "선택한 날짜는 ".$select_time;
?>


<div class="admin_reserve">
  <!-- 실습실1 -->
  <div class="mb-3 admin_reserve_con">
    <?php
    // 101호
    $sql = "SELECT start, COUNT(*) FROM room  WHERE room_date = '$select_time' AND room = '101' GROUP BY start order by start";
    $result = mysqli_query($conn, $sql);

    // 102호
    $sql2 = "SELECT start, COUNT(*) FROM room  WHERE room_date = '$select_time' AND room = '102' GROUP BY start";
    $result2 = mysqli_query($conn, $sql2);
    $db2 = mysqli_fetch_array($result2);

    echo "
    <p>실습실 101호</p>
    <div>
      <p>사용시간</p>
      <p>예약현황</p>
    </div>";

    while($db = mysqli_fetch_array($result)){
    ?>
    <div class="reserve_time" >
      <input type="checkbox" id="time<?php echo $db[0]*1?>">
      <label for="time<?php echo $db[0]*1?>" class="p-1">
        <ul>
          <li><?php echo $db[0]*1?>:00 ~ <?php echo $db[0]+1;?>:00</li>
          <li><span style="color:var(--red); font-weight:bold;"><?php echo $db[1]?></span> / 8</li>
        </ul>
      </label>
      <div class="reserve_p">
        <ul>
          <li>1이초보</li>                
          <li>2이초보</li>                
          <li>3이초보</li>                
          <li>4이초보</li>                
          <li>5이초보</li>                
          <li>6이초보</li>                
          <li>7이초보</li>                
          <li>8이초보</li>             
        </ul>
      </div>
    </div>
    <?php } ?>  
  </div>
  <!-- 실습실2 -->
  <div class="mb-3 admin_reserve_con">
    <p>실습실 102호</p>
    <div>
      <p>사용시간</p>
      <p>예약현황</p>
    </div>

    <?php
    if($db2>0){
    while($db2 = mysqli_fetch_array($result2)){
        ?>
    <div class="reserve_time" >
      <input type="checkbox" id="time1">
      <label for="time1">
        <ul>
          <li>08:00 ~ 09:00</li>
          <li>2/8</li>
        </ul>
      </label>
      <div class="reserve_p">
        <ul>
          <li>1이초보</li>                
          <li>2이초보</li>                
          <li>3이초보</li>                
          <li>4이초보</li>                
          <li>5이초보</li>                
          <li>6이초보</li>                
          <li>7이초보</li>                
          <li>8이초보</li>             
        </ul>
      </div>
    </div>
    <?php
    }}else{
      echo "<div class='text-center mt-1 mb-5 border rounded-1 p-3'> 예약내역이 없습니다 </div>";
    } ?>
  </div>
</div>