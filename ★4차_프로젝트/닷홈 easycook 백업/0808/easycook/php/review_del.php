<?php

include('./include/dbconn.php');

$no = $_GET['no'];
echo $no;


$sql = "delete from review where no='$no'";
$result = mysqli_query($conn, $sql);


if ($result) {
  echo "<script>alert('삭제완료');location.replace('../review_list.php') </script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>