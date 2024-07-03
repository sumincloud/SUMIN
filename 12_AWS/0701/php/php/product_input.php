<?php
  include('../db/db_conn.php');

  $no = $_GET['no'];
  echo $no . "<br>";

  $p_name = trim($_POST['p_name']);//상품명
  $p_cate = $_POST['p_cate']; //카테고리
  $p_price = trim($_POST['p_price']);//상품가격
  $p_file = $_FILES['p_myfile']['name'];//상품사진
  $p_parent = trim($_POST['p_parent']);//요약설명
  $p_comment = trim($_POST['p_comment']);//설명
  $p_memo = trim($_POST['p_memo']);//메모

  // echo $p_name . "<br>";
  // echo $p_cate . "<br>";
  // echo $p_price . "<br>";
  // echo $p_file . "<br>";
  // echo $p_parent . "<br>";
  // echo $p_comment . "<br>";
  // echo $p_memo . "<br>";

  date_default_timezone_set('Asia/Seoul');
  $datetime = date('Y-m-d H:i:s', time());

  if ($_POST['action'] == "upload" ) {
    // print_r( $_FILES[ 'myfile' ] );
    // echo "<br><br>";
    // echo $_FILES[ 'myfile' ][ 'name' ];
    // echo "<br><br>";
    // echo $_FILES[ 'myfile' ][ 'type' ];
    // echo "<br><br>";
    // echo $_FILES[ 'myfile' ][ 'size' ];
    // echo "<br><br>";
    // echo $_FILES[ 'myfile' ][ 'tmp_name' ];
    // echo "<br><br>";
    // echo $_FILES[ 'myfile' ][ 'error' ];

    $uploaded_file_name_tmp = $_FILES[ 'p_myfile' ][ 'tmp_name' ];
    $uploaded_file_name = $_FILES[ 'p_myfile' ][ 'name' ];
    $upload_folder = "../images/shop/";
    move_uploaded_file($uploaded_file_name_tmp, $upload_folder . $uploaded_file_name);

    $img = $_FILES[ 'p_myfile' ][ 'name' ]; 
    echo $img . "<br>";
    echo "<img src='../images/shop/".htmlspecialchars($img)."'>";

    echo "<p>" . $uploaded_file_name . "을(를) 업로드하였습니다.</p>";
  }


  //sql쿼리문을 사용하여 데이터베이스에 자료 입력하기
  $sql = "insert into shop_data SET
          cate = '$p_cate',
          img = '$p_file',
          name = '$p_name',
          parent = '$p_parent',
          price = '$p_price',
          comment = '$p_comment',
          memo = '$p_memo',
          datetime = '$datetime';
        ";

  $result = mysqli_query($conn,$sql);//데이터베이스 쿼리문 실행

  if($result){
    echo "<script>alert('상품등록이 완료되었습니다. 이전 화면으로 이동합니다. ')</script>";
    echo "<script>location.replace('../product_mg.php');</script>";
    exit;
  }else{
    echo "상품등록 실패 : " . mysqli_error($conn);
    mysqli_close($conn); //데이터베이스 접속종료
  }

?>