<?php
  include('./db_conn.php'); //db연결을 위한 데이터베이스 연결문서

  $mode = $_POST['mode']; //register.php에서 넘겨받은 mode 변수값

  switch($mode){ //mode변수값에 따라 회원가입인지 회원수정인지 제목설정
    case 'insert':
      $mb_id=trim($_POST['mb_id']);
      $title = '회원가입';
    break;
    
    case 'modify':
      $mb_id=trim($_SESSION['ss_mb_id']);
      $title = '회원수정';
    break;

    default:
      echo "<script>alert('mode값이 제대로 넘어오지 않았습니다.');</script>";
      echo "<script>location.replace('./register.php');</script>";
    break;
  }
  //register에서 넘겨받은 데이터 존재유무 검사 = 유효성 검사
  if(!$_POST['mb_id']){ //아이디 값이 있는지?
    echo "<script>alert('아이디값이 제대로 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";

  }
  if(!$_POST['mb_password']){ //비밀번호 값이 있는지?
    echo "<script>alert('비밀번호값이 제대로 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
  }
  if($_POST['mb_password'] != $_POST['mb_password_re']){ //비밀번호와 비밀번호확인이 일치하지 않는가?
    echo "<script>alert('비밀번호 확인이 일치하지 않습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
  }
  if(!$_POST['mb_name']){ //이름 값이 있는지?
    echo "<script>alert('이름값이 제대로 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
  }
  if(!$_POST['mb_email']){ //이메일 값이 있는지?
    echo "<script>alert('이메일값이 제대로 넘어오지 않았습니다.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
  }

  $mb_password = trim($_POST['mb_password']);
  $mb_password_re = trim($_POST['mb_password_re']);
  $mb_name = trim($_POST['mb_name']);
  $mb_email = trim($_POST['mb_email']);
  $mb_job = $_POST['mb_job'];
  $mb_gender = $_POST['mb_gender'];
  $mb_language = $_POST['mb_language'] ? implode(",", $_POST['mb_language']) : "";
  $mb_datetime = date('Y-m-d H:i:s', time()); //가입날짜

  //입력한 비밀번호를 password() 함수를 사용해서 암호화하여 가져옴.
  $sql = " SELECT PASSWORD('$mb_password') AS pass ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $mb_password = $row['pass'];



  //사용자가 회원가입 안된 경우 sql table에 데이터 입력 insert into
  if(($mode) == 'insert'){
    //회원가입을 시도하는 아이디가 사용중인 아이디인지 확인하는 sql문
    $sql = "select * from member where mb_id='$mb_id'";
    $result = mysqli_query($conn, $sql);

    //만약 사용중인 아이디가 있다면 알림을 띄우고 회원가입 페이지로 이동
    if(mysqli_num_rows($result)>0){ //아이디값이 있다면
      echo "<script>alert('이미 사용중인 아이디입니다.');</script>";
      echo "<script>location.replace('./register.php');</script>";
    };

    $sql = "insert into member
      set mb_id = '$mb_id',
          mb_password = '$mb_password',
          mb_name = '$mb_name',
          mb_email = '$mb_email',
          mb_job = '$mb_job',
          mb_gender = '$mb_gender',
          mb_language = '$mb_language',
          mb_datetime = '$mb_datetime'
          ";
    $result = mysqli_query($conn, $sql);

    //사용자가 회원가입 되어있는 경우 sql table 데이터 수정 update
  }else if(($mode) == 'modify'){
    $sql = "UPDATE member
    SET mb_password = '$mb_password',
        mb_email = '$mb_email',
        mb_job = '$mb_job',
        mb_gender = '$mb_gender',
        mb_language = '$mb_language',
        mb_datetime = '$mb_datetime'
      WHERE mb_id = '$mb_id'";
    $result = mysqli_query($conn, $sql);
  }//수정**위에 'md_datetime'뒤에 있던 콤마 지움
  

  //위 과정(insert 또는 update)이 정상적으로 진행되었다면
  if($result){
    echo "<script>alert('".$title."이 완료되었습니다.');</script>";
    echo "<script>location.replace('./member_list.php');</script>";
    exit;
  }else{
    echo "생성실패 : ". mysqli_error($conn);
    mysqli_close($conn);//연결종료
  }




?>