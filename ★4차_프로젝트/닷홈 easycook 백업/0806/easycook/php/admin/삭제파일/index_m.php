<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>강사 | 이지쿡</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="요리 자격증, 요리 강의, 커피 자격증, 커피 강의, 베이커리 자격증, 베이커리 강의, 온라인 요리 수업, 요리 학원, 커피 학원, 베이커리 학원, 이지쿡, easycook, 요리 수강, 커피 수강, 베이킹 수강, 요리 온라인 강의, 커피 온라인 강의, 베이킹 온라인 강의, 요리 레시피, 베이킹 레시피">
  <meta name="description" content="이지쿡에서 요리, 커피, 베이커리 자격증과 수강, 온라인 강의를 배워보세요. 전문 강사진의 체계적인 교육으로 전문가가 되는 길을 안내합니다.">
  <meta name="Robots" content="Index, Follow">
  <meta http-equiv="Subject" content="이지하게 배우자, 이지쿡">
  <meta http-equiv="Title" content="이지쿡">
  <title>이지쿡</title>
  <!-- 부트스트랩 css연결하기 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- 부트스트랩 js연결하기 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 부트스트랩 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" type="text/css">
  <!-- 스와이퍼 css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" type="text/css">
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" type="text/css" >
  <!-- 초기화서식 연결 -->
  <link rel="stylesheet" href="../../css/admin/reset.css" style="text/css">
  <!-- 베이스서식 연결 -->
  <link rel="stylesheet" href="../../css/admin/base.css" style="text/css">
  <!-- 공통서식 연결 -->
  <link rel="stylesheet" href="../../css/admin/common.css" style="text/css">
  <!-- 메인서식 연결 -->
  <link rel="stylesheet" href="../../css/admin/main.css" style="text/css">
  <!-- style.scss 연결 -->
  <link rel="stylesheet" href="../../css/admin/style.css">
  <!-- admin 스크립트 연결 -->
  <script src="../../script/admin/admin.js" defer></script>
  <!-- 미디어 쿼리 서식연결 -->
  <link rel="stylesheet" href="../../css/admin/media.css" type="text/css">

  
  <!-- 파비콘 -->
  <!-- <link rel="manifest" href="../images/favicon/webmanifest.json"> -->
  <link rel="apple-touch-icon" href="../../images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../favicon/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="48x48" href="../../favicon/favicon-48x48.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../../favicon/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="512x512" href="../../favicon/android-chrome-512x512.png">
  <link rel="shortcut icon" href="../images/favicon/favicon.ico">
</head>
<body>
  <?php
  include('../include/dbconn.php');
  $s_id = $_SESSION['id'];   
  $s_name = $_SESSION['name'];
  
  // 로그인 없이 강사페이지로 가지 못하게 하기
  if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    // 강사코드가 있다면 강사페이지로 이동한다.
    if (!empty($_SESSION['teacher_code'])) {

        } else { // 강사코드가 없다면 메인페이지로 이동한다.
        echo "<script>alert('로그인 성공');</script>";
        echo "<script>location.replace('../../index.php');</script>";
    }
  } else {
    // 로그인 오류
    echo "<script>alert('로그인이 필요한 페이지 입니다.');</script>";
    echo "<script>location.replace('../../login.php');</script>";
  }

  // echo $s_id;
  ?>
  <!-- 헤더영역 :  로고, 로그아웃 -->
  <!-- 로그인, 회원가입 끝나면 데이터 연결하기 -->
  <header>
    <!-- width: 427px모바일 이하에서의 토글메뉴 -->
    <h1>
      <a href="index.php" title="관리자 홈">
        <img src="../../images/common/logo.png" alt="로고">
      </a>
      <div>
        <i class="bi bi-list" id="m_list"></i>
      </div>
    </h1>

    <a href="../logout.php" title="로그아웃" class="admin_logout">
      <img src="../../images/admin/logout.png" alt="로그아웃 그림"><br>
      로그아웃
    </a>
    <!-- 네비게이션 : 메뉴 -->
    <nav class="left_nav" id="left_nav">
      <div>
        <i class="bi bi-x-lg" id="close_m_list"></i>
        <?php echo $s_name;?>님 안녕하세요.
      </div>
      <ul class="nav_inner" >
        <li>         
          <img src="../../images/admin/nav01.png" alt="마이페이지 그림">
          <span>마이페이지</span>
          <ul>
            <li><a href="register.php" title="정보수정">정보수정</a></li>
            <li><a href="vacation.php" title="휴가신청">휴가신청</a></li>
          </ul>
        </li>
        <li>
          <img src="../../images/admin/nav02.png" alt="학원 그림">
          <span>학원</span>
          <ul>
            <li><a href="EC_notice.php" title="학원소식">학원소식</a></li>
            <li><a href="admin_reserve.php" title="실습실">실습실</a></li>
          </ul>
        </li>
        <li>
          <img src="../../images/admin/nav03.png" alt="강의관리 그림">
          <span>강의관리</span>
          <ul>
            <li><a href="class_1.php" title="나의 강의실">나의 강의실</a></li>
            <li><a href="class_create.php" title="강의 개설">강의 개설</a></li>
          </ul>
        </li>
        <li>
          <img src="../../images/admin/nav04.png" alt="학생관리 그림">
          <span>학생관리</span>
          <ul>
            <li><a href="class_1.php" title="학생관리">학생 관리</a></li>
            <li><a href="review_list.php" title="수강후기">수강 후기</a></li>
          </ul>
        </li>
        <li>
          <img src="../../images/admin/nav05.png" alt="게시판관리 그림">
          <span>게시판관리</span>
          <ul>
            <li><a href="question_1.php" title="문의관리">문의관리</a></li>
            <li><a href="notice_total.php" title="공지사항">공지사항</a></li>
          </ul>
        </li>
      </ul>
    </nav>

    <!-- width: 1025이하에서의 네비게이션 : 메뉴 -->
    <nav class="lnb left_nav2">
      <ul class="nav_inner2">
        <li>        
          <a href="" title=""><img src="../../images/admin/nav01.png" alt="마이페이지 그림"></a>
            <ul class="subMenu">
              <li><span class="subMenu_title">마이페이지</span></li>
              <li><a href="register.php" title="정보수정">정보수정</a></li>
              <li><a href="vacation.php" title="휴가신청">휴가신청</a></li>
            </ul>
        </li>
        <li>
          <a href="#"><img src="../../images/admin/nav02.png" alt="학원 그림"></a>
          <ul class="subMenu">
            <li><span class="subMenu_title">학원</span></li>
            <li><a href="EC_notice.php" title="학원소식">학원소식</a></li>
            <li><a href="admin_reserve.php" title="실습실">실습실</a></li>
          </ul>
        </li>
        <li>
          <a href="#"><img src="../../images/admin/nav03.png" alt="강의관리 그림"></a>
          <ul class="subMenu">
            <li><span class="subMenu_title">강의관리</span></li>
            <li><a href="class_1.php" title="나의 강의실">나의 강의실</a></li>
            <li><a href="class_create.php" title="강의 개설">강의 개설</a></li>
          </ul>
        </li>
        <li>
          <a href="#"><img src="../../images/admin/nav04.png" alt="학생관리 그림"></a>
          <ul class="subMenu">
            <li><span class="subMenu_title">학생관리</span></li>
            <li><a href="class_1.php" title="학생관리">학생 관리</a></li>
            <li><a href="review_list.php" title="수강 후기">수강 후기</a></li>
          </ul>
        </li>
        <li>
          <a href="#"><img src="../../images/admin/nav05.png" alt="게시판관리 그림"></a>
          <ul class="subMenu">
            <li><span class="subMenu_title">게시판 관리</span></li>
            <li><a href="question_1.php" title="문의관리">문의관리</a></li>
            <li><a href="notice_total.php" title="공지사항">공지사항</a></li>
        </ul>
        </li>
      </ul>
    </nav>
  </header>
  <main>     
    <?php  
      // echo "아이디는 ".$id;
    ?> 
      <h3>1</h3>
      <div class="board">
        <div class="board_con">
          <div class="board_title">
            <h4>학원소식</h4>
            <span><a href="EC_notice.php" title="학원소식">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>나의 강의실</h4>
            <span><a href="" title="">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>퀵메뉴</h4>
            <span><a href="" title="">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div class="board_q_menu">
            <p><a href="class_create.php" title="강의등록하기"><img src="../../images/admin/board1.png" alt="강의등록"><span>강의등록</span></a></p>
            <p><a href="notice_select.php" title="공지등록하기"><img src="../../images/admin/board2.png" alt="공지등록"><span>공지등록</span></a></p>
            <p><a href="question_1.php" title="문의게시판가기"><img src="../../images/admin/board3.png" alt="문의답변"><span>문의답변</span></a></p>
            <p><a href="EC_notice.php" title="학원소식가기"><img src="../../images/admin/board4.png" alt="학원소식"><span>학원소식</span></a></p>
            <p><a href="#" title="실습실바로가기"><img src="../../images/admin/board5.png" alt="실습실"><span>실습실</span></a></p>
            <p><a href="review_list.php" title="수강후기 보기"><img src="../../images/admin/board6.png" alt="SMS"><span>수강후기</span></a></p>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>나의 공지사항</h4>
            <span><a href="notice_list.php" title="공지사항으로">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>문의 관리</h4>
            <span><a href="" title="">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li class="board_sub">[휴가신청] 여름 휴가 신청 서식
                    <span>[여름 학기] 한식조리 기능사...</span>
                    </li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="board_con">
          <div class="board_title">
            <h4>나의 일정</h4>
            <span><a href="" title="">더보기 <i class="bi bi-chevron-right"></i></a></span>
          </div>
          <div>
            <ul>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
              <li>
                <a href=""  title="">
                  <ul>
                    <li>[휴가신청] 여름 휴가 신청 서식</li>
                    <li><span>2024-06-08</span></li>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- 푸터영역 -->
    <footer class="m_footer">
      <div class="admin_f_box">
        <div>
          <div class="admin_footer admin_position">
            <div>
              <a href="#" title="회사소개">회사소개</a>
              <a href="#" title="회원약관">회원약관</a>
              <a href="#" title="개인정보처리방침">개인정보처리방침</a>
              <a href="#" title="이용 안내">이용 안내</a>
            </div>
            <div>
              Company.Easy Cook(이지쿡) &nbsp;
              Address. 0000 0000 00-0 0층 &nbsp;
              Owner. 000 &nbsp;
              Business License. 2024 0000 0000 0000000 &nbsp;
              Personal Information Manager. 000 &nbsp;
              Email.00000@0000.000 &nbsp;
              Phone Number. 000-0000-0000 &nbsp;
            </div>
            <div>
              Copyright ⓒ Easy Cook, All Rights Reserved.
            </div>
            <div>
              <a href="#" title=""><i class="bi bi-chat-dots"></i></a>
              <a href="#" title=""><i class="bi bi-twitter"></i></a>
              <a href="#" title=""><i class="bi bi-youtube"></i></a>
              <a href="#" title=""><i class="bi bi-facebook"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
  <!-- 푸터영역 -->
  <footer class="footer">
  <div class="admin_f_box">
    <div>
      <div class="admin_footer admin_position">
        <div>
          <a href="#" title="회사소개">회사소개</a>
          <a href="#" title="회원약관">회원약관</a>
          <a href="#" title="개인정보처리방침">개인정보처리방침</a>
          <a href="#" title="이용 안내">이용 안내</a>
        </div>
        <div>
          Company.Easy Cook(이지쿡) &nbsp;
          Address. 0000 0000 00-0 0층 &nbsp;
          Owner. 000 &nbsp;
          Business License. 2024 0000 0000 0000000 &nbsp;
          Personal Information Manager. 000 &nbsp;
          Email.00000@0000.000 &nbsp;
          Phone Number. 000-0000-0000 &nbsp;
        </div>
        <div>
          Copyright ⓒ Easy Cook, All Rights Reserved.
        </div>
        <div>
          <a href="#" title=""><i class="bi bi-chat-dots"></i></a>
          <a href="#" title=""><i class="bi bi-twitter"></i></a>
          <a href="#" title=""><i class="bi bi-youtube"></i></a>
          <a href="#" title=""><i class="bi bi-facebook"></i></a>
        </div>
      </div>
    </div>
  </div>
  </footer>
</body>
</html>