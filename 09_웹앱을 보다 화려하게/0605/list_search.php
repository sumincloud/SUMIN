<?php

include('./db_conn.php');
$search = $_POST['search'];

// echo $search;


$query = "select datetime , subject from free_board like %$search %";
$result = mysqli_query($conn,$query);

print "<table><caption>공지사항 검색 결과</caption>" . 
"<tr>".
"<th>성명</th>" .  
"<th>예약 날짜</th>" . 
"</tr>";

while($row = mysqli_fetch_row($result)){
  print "<tr><td>" . $row[0] . "</td>" .
  "<td>" .$row[3]. "</td></tr>" ;
}

print "</table>";
mysqli_free_result($result);
mysqli_close($conn);
?>