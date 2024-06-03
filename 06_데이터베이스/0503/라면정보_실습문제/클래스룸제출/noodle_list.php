<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>noodle 리스트 내용 출력하기</title>
  <style>
    body{font-family: "맑은 고딕"; font-size: 12px; color: #333;}
    caption{font-size: 16px; font-weight: bold; padding: 10px;}
    table{width: 600px; border-collapse:collapse; border:2px solid #ccc;}
    table th{}
    table th, table td{
      line-height: 30px; border:2px solid #ccc;
    }
    table tr:nth-of-type(odd) td{background: rgba(255,255,50,0.5);}
    table tr:nth-of-type(even) td{background: rgba(255,255,150,0.5);}
  </style>

</head>
<body>
  <?php
    //1. db연결을 위한 변수선언과 값 설정
    $mysql_host='localhost';
    $mysql_user='root';
    $mysql_password='1234';
    $mysql_db='product';

    //<!-- 2. db연결 - 절차지향방식 -->
    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    //<!-- 연결성공 또는 실패 -->
    if(!$conn){ //연결실패라면
      die('연결실패 : '.mysqli_connect_error());
    }
    echo '연결성공';
    //<!-- db연결이 성공인 경우 아래 실행 -->

    //쿼리에 표 데이터값을 담음
    $query = 'select * from noodle';

    //변수에 결과값을 저장
    $result = mysqli_query($conn, $query);

    // -----------noodle 테이블 출력하기-----------
    print "<table><caption>noodle 데이터베이스 출력결과</caption><tr>" .
          "<th>num</th>" .
          "<th>name</th>" .
          "<th>company</th>" .
          "<th>kind</th>" .
          "<th>price</th>" .
          "<th>e_date</th></tr>";

    //조회된 데이터 개수만큼 반복실행
    while($row = mysqli_fetch_row($result)){
      print
      "<tr><td>" . $row[0] . "</td>" . 
      "<td>" . $row[1] . "</td>" . 
      "<td>" . $row[2] . "</td>" . 
      "<td>" . $row[3] . "</td>" . 
      "<td>" . $row[4] . "</td>" . 
      "<td>" . $row[5] . "</td></tr>";
    }

    print "</table>";

    //mysqli_free_result($result);
    //mysqli_close($conn);





    
  ?>
</body>
</html>