<?php

include('../include/dbconn.php');

$no = $_GET['no'];
$class_status = $_GET['class_status'];
echo $no.$class_status;

$sql = "update academy_list set class_status ='$class_status' where class_no = '$no'";
$result = mysqli_query($conn, $sql);

if($result){
  echo "<script>alert('강의 상태 수정이 완료 되었습니다.');</script>";
  echo "<script>location.replace('class_1.php');</script>";
}else{
  echo "글 입력 실패 : ". mysqli_error($conn);
};
?>