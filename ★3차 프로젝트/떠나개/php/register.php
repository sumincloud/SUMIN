<!-- 회원가입폼 -->
<?php
  //db연결
  include('./dbconn.php');

  //세션정보가 있다면
  if(isset($_SESSION['ss_mb_id'])){
    $mb_id = $_SESSION['ss_mb_id'];
    //회원정보를 조회하는 sql쿼리문
    $sql = "select * from member where mb_id = '$mb_id'"; //id가 일치하는 자료 조회
    $result = mysql_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    //회원수정
    $mode = 'modify';
    $title = '내 정보 수정';
    $sub_title = '';
    $modify_mb_info = 'readonly';
    $href = './index.php'; //회원수정 완료시 처음화면으로

  }else{ //세션정보가 없다면
    //신규가입
    $mode = 'insert';
    $title = '회원가입';
    $sub_title = '회원이 되어 맞춤 여행지를 찾아보세요.';
    $modify_mb_info = '';
    $href = './login.php'; //신규가입일경우 로그인화면 나오게
  };
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>떠나개 <?php echo $title ?></title>
  <!-- 1. 부트스트랩 css연결하기 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 2. 부트스트랩 js연결하기 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 3. 부트스트랩 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- 스와이퍼 css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <!-- 스와이퍼 js -->
  <script src="../script/swiper.js"></script>
  <!-- 공통서식 연결 -->
  <link rel="stylesheet" href="../css/common.css">
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <style>
    /* 로그인페이지 서식 */
    #login_box{
      padding: 50px 6%;
    }

    .logo img{
      width: 160px;
    }
    .login_large_txt{
      font-size: 20px;
      font-weight: bold;
    }
    input{
      height: 50px;
    }
    .invalid-feedback{
      font-size: 0.9rem;
    }

    #login{
      background: #F2055C;
      height: 50px;
      color: white;
    }
    #easy_login{
      margin-bottom: 100px;
    }

    /* 회원가입 페이지 서식 */
    #box{
      padding: 0 6%;
    }
    .btn{
      border: 1px solid #F2055C;
      color: #F2055C;
    }
    .btn:hover{
      border: 1px solid #F2055C;
      color: #F2055C;
    }
    #cancelButton, #join{
      border: none;
      color: #fff;
    }
    #join{
      background: #F2055C;
    }
    #btn_bottom{
      position: fixed;
      bottom:0;
      width: 100%;
      background: #fff;
      padding: 10px 6%;
      border-top:1px solid #eee;
    }
    #agree{
      height: 100px;
      resize:none;
    }






  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./header.php')?>

  <!-- 메인영역 -->
  <main>
    <section id="box">
      <div class="text-center">
        <h2 class="fs-2 fw-bold pt-5"><?php echo $title ?></h2>
        <p><?php echo $sub_title ?></p>
      </div>

      <form name="회원가입" id="join_form" method="post" action="./register_input.php" class="needs-validation" novalidate>
        <!-- 아이디 -->
        <div class="fs-4 mb-2 mt-5">
          <label for="mb_id" class="form-label fw-bold fs-6">아이디</label>
          <div class="input-group">
            <input type="text" class="form-control" name="mb_id" id="mb_id" placeholder="아이디를 입력해주세요 (6 - 20자)" maxlength="20" required>
            <button class="btn" type="button" id="id_check">중복확인</button>
            <div class="invalid-feedback fs-6">
              아이디를 입력해주세요.
            </div>
            <div class="valid-feedback fs-6">
              사용가능한 아이디입니다.
            </div>
          </div>
        </div>
        <!-- 비밀번호 -->
        <div class="fs-4 mb-4 mt-4">
          <label for="mb_password" class="form-label fw-bold fs-6">비밀번호</label>
          <small class="d-block text-secondary" style="font-size: 14px;">8자 이상 20자 이내의 영문,숫자,특수문자(!@#$%&amp;)사용</small>
          <div style="position: relative;">
            <input type="password" class="form-control" name="mb_password" id="mb_password" placeholder="비밀번호를 입력해주세요" maxlength="20" required>
            <div class="invalid-feedback fs-6">
              비밀번호를 입력해주세요.
            </div>
            <div class="valid-feedback fs-6">
              사용가능한 비밀번호입니다.
            </div>
          </div>
        </div>
        <!-- 비밀번호 확인 -->
        <div class="fs-4 mb-4 mt-4">
          <label for="mb_password2" class="form-label fw-bold fs-6">비밀번호 확인</label>
          <div style="position: relative;">
            <input type="password" class="form-control" name="mb_password2" id="mb_password2" placeholder="비밀번호를 다시 입력해주세요" maxlength="20" required>
            <div class="invalid-feedback fs-6">
              비밀번호가 일치하지 않습니다.
            </div>
            <div class="valid-feedback fs-6">
              비밀번호가 일치합니다.
            </div>
          </div>
        </div>
        <!-- 반려견 이름 -->
        <div class="fs-4 mb-2 mt-4">
          <label for="mb_name" class="form-label fw-bold fs-6">반려견 이름</label>
          <input type="text" class="form-control" name="mb_name" id="mb_name" placeholder="반려견 이름을 입력하세요" maxlength="8" required>
          <div class="invalid-feedback fs-6">
            반려견 이름을 입력해주세요.
          </div>
          <div class="valid-feedback fs-6">
            사용가능한 반려견 이름입니다.
          </div>
        </div>
        <!-- 휴대폰 번호 -->
        <div class="fs-4 mb-2 mt-4">
          <label for="mb_tel" class="form-label fw-bold fs-6">휴대폰 번호</label>
          <input type="text" class="form-control" name="mb_tel" id="mb_tel" placeholder="'-' 구분없이 입력해주세요" maxlength="11" required>
          <div class="invalid-feedback fs-6">
            휴대폰 번호를 올바르게 입력해주세요.
          </div>
          <div class="valid-feedback fs-6">
            휴대폰 번호가 올바릅니다.
          </div>
        </div>
        <!-- 이메일 -->
        <div class="fs-4 mb-2 mt-4">
          <label for="mb_email" class="form-label fw-bold fs-6">이메일</label>
          <input type="email" class="form-control" name="mb_email" id="mb_email" placeholder="이메일 주소를 입력하세요" maxlength="255" required>
          <div class="invalid-feedback fs-6">
            이메일 주소를 올바르게 입력해주세요.
          </div>
          <div class="valid-feedback fs-6">
            이메일 주소가 올바릅니다.
          </div>
        </div>
        <!-- 관심 여행지역 -->
        <div class="mb-2 mt-4">
          <p class="form-label fw-bold fs-6">관심 여행지역</p>
          <div class="d-flex justify-content-around">
            <div>
              <input type="checkbox" id="seoul_checkbox" name="mb_hobby[]" value="서울" class="form-check-input">
              <label for="seoul_checkbox" class="form-check-label">서울</label>
            </div>
            <div>
              <input type="checkbox" id="jeju_checkbox" name="mb_hobby[]" value="제주" class="form-check-input">
              <label for="jeju_checkbox" class="form-check-label">제주</label>
            </div>
            <div>
              <input type="checkbox" id="busan_checkbox" name="mb_hobby[]" value="부산" class="form-check-input">
              <label for="busan_checkbox" class="form-check-label">부산</label>
            </div>
            <div>
              <input type="checkbox" id="gangwon_checkbox" name="mb_hobby[]" value="강원" class="form-check-input">
              <label for="gangwon_checkbox" class="form-check-label">강원</label>
            </div>
            <div>
              <input type="checkbox" id="incheon_checkbox" name="mb_hobby[]" value="인천" class="form-check-input">
              <label for="incheon_checkbox" class="form-check-label">인천</label>
            </div>
            <div>
              <input type="checkbox" id="etc_checkbox" name="mb_hobby[]" value="기타" class="form-check-input">
              <label for="etc_checkbox" class="form-check-label">기타</label>
            </div>
          </div>
        </div>
        <!-- 직업 -->
        <div class="mb-2 mt-4">
          <label class="form-label fw-bold fs-6">직업</label>
          <select id="mb_job" name="mb_job" class="form-select" required>
            <option value="">직업을 선택하세요</option>
            <option value="학생">학생</option>
            <option value="회사원">회사원</option>
            <option value="공무원">공무원</option>
            <option value="주부">주부</option>
            <option value="기타">기타</option>
          </select>
          <div class="invalid-feedback fs-6">
            직업을 선택해주세요.
          </div>
          <div class="valid-feedback fs-6">
            직업이 선택되었습니다.
          </div>
        </div>
        <!-- 이용약관 -->
        <div class="mb-2 mt-4">
          <label class="form-label fw-bold fs-6">이용약관 동의</label>
          <textarea name="agree" id="agree" cols="30" rows="10" class="d-block form-control" readonly>약관은 이러이러합니다. 약관에 동의하십니까. 약관은 이러이러합니다. 약관에 동의하십니까.약관은 이러이러합니다. 약관에 동의하십니까.약관은 이러이러합니다. 약관에 동의하십니까.약관은 이러이러합니다. 약관에 동의하십니까.약관은 이러이러합니다. 약관에 동의하십니까.</textarea>
          <div class="mt-3">
            <input type="checkbox" id="ch_btn"  name="ch_btn" class="form-check-input">
            <label for="ch_btn" class="form-check-label">위 사항에 동의합니다.</label>
          </div>
        </div>
      </section>
    </main>
    
    <!-- 푸터영역 -->
    <footer>
      <div class="d-flex gap-2" id="btn_bottom">
        <button class="w-50 btn btn-secondary btn-lg" type="button"  id="cancelButton">취소하기</button>
        <button class="w-50 btn btn-primary btn-lg" type="submit" id="join">가입하기</button>
      </div>
    </footer>
    
  </form>


  
  <script>
    $(document).ready(function() {
      // 필드 유효성 검사 함수
      function validateField(field, regex) {
        const feedback = field.nextAll('.invalid-feedback, .valid-feedback');
        if (regex.test(field.val())) {
          field.removeClass('is-invalid').addClass('is-valid');
          feedback.filter('.invalid-feedback').hide();
          feedback.filter('.valid-feedback').show();
        } else {
          field.removeClass('is-valid').addClass('is-invalid');
          feedback.filter('.valid-feedback').hide();
          feedback.filter('.invalid-feedback').show();
        }
      }

      // 아이디 유효성 검사 (6-20자 영문, 숫자)
      $('#mb_id').on('input', function() {
        const idRegex = /^[a-zA-Z0-9]{6,20}$/;
        validateField($(this), idRegex);
      });

      // 비밀번호 유효성 검사 (8-20자 영문, 숫자, 특수문자)
      $('#mb_password').on('input', function() {
          const passwordRegex = /^[a-zA-Z0-9!@#$%&]{8,20}$/;
          validateField($(this), passwordRegex, $(this).siblings('.invalid-feedback, .valid-feedback'));

          //비밀번호 확인 체크
          const inputVal = $('#mb_password2').val(); // 비밀번호 확인 값
          const passwordVal = $('#mb_password').val(); //비밀번호 값
          if (inputVal === '' || inputVal !== passwordVal) {
            // 입력값이 비어있거나 비밀번호가 일치하지 않는 경우
            $('#mb_password2').removeClass('is-valid').siblings('.invalid-feedback').show();
            $('#mb_password2').addClass('is-invalid').siblings('.valid-feedback').hide();
          } else {
            // 입력값이 있고 비밀번호가 일치하는 경우
            $('#mb_password2').removeClass('is-invalid').siblings('.valid-feedback').show();
            $('#mb_password2').addClass('is-valid').siblings('.invalid-feedback').hide();
          }
      });

      // 비밀번호 확인 (비밀번호 일치 여부)
      $('#mb_password2').on('input', function() {
        const inputVal = $('#mb_password2').val(); // 비밀번호 확인 값
        const passwordVal = $('#mb_password').val(); //비밀번호 값

        if (inputVal === '' || inputVal !== passwordVal) {
          // 입력값이 비어있거나 비밀번호가 일치하지 않는 경우
          $(this).removeClass('is-valid').siblings('.invalid-feedback').show();
          $(this).addClass('is-invalid').siblings('.valid-feedback').hide();
        } else {
          // 입력값이 있고 비밀번호가 일치하는 경우
          $(this).removeClass('is-invalid').siblings('.valid-feedback').show();
          $(this).addClass('is-valid').siblings('.invalid-feedback').hide();
        }
      });

      // 반려견 이름 유효성 검사 (빈 값 여부)
      $('#mb_name').on('input change', function() {
        const field = $(this);
        const validFeedback = field.siblings('.valid-feedback');
        const invalidFeedback = field.siblings('.invalid-feedback');

        if (field.val().trim() !== '') {
          field.removeClass('is-invalid').addClass('is-valid');
          invalidFeedback.hide();
          validFeedback.show();
        } else {
          field.removeClass('is-valid').addClass('is-invalid');
          validFeedback.hide();
          invalidFeedback.show();
        }
      });

      // 휴대폰번호 입력칸 문자 제거
      $('#mb_tel').on('input', function() {
        var phoneNumber = $(this).val().replace(/\D/g, ''); // 숫자 이외의 문자 제거

        // '010'으로 시작하지 않는 경우
        if (!phoneNumber.startsWith('010')) {
          // 010으로 시작안할때
          $(this).removeClass('is-valid').siblings('.invalid-feedback').show();
          $(this).addClass('is-invalid').siblings('.valid-feedback').hide();
        } else {
          // 010으로 시작할 때
          if (phoneNumber.length === 11) { // 번호가 11자리인 경우
            $(this).addClass('is-valid').removeClass('is-invalid').siblings('.valid-feedback').show();
            $(this).removeClass('is-invalid').siblings('.invalid-feedback').hide();
          } else { // 번호가 10자리 이하인 경우
            $(this).removeClass('is-valid').siblings('.invalid-feedback').show();
            $(this).addClass('is-invalid').siblings('.valid-feedback').hide();
          }
        }
        // 입력 필드에 반영
        $(this).val(phoneNumber);
      });

      // 이메일 유효성 검사
      $('#mb_email').on('input', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        //유효하지 않은 문자 입력시 입력안되게
        if (!emailRegex.test(email)) {
          $(this).val(email.replace(/[^a-zA-Z0-9@._-]/g, ''));
        }

        if (emailRegex.test(email)) {
          $(this).removeClass('is-invalid').addClass('is-valid');
          $(this).siblings('.invalid-feedback').hide();
          $(this).siblings('.valid-feedback').show();
        } else {
          $(this).removeClass('is-valid').addClass('is-invalid');
          $(this).siblings('.valid-feedback').hide();
          $(this).siblings('.invalid-feedback').show();
        }
      });

    // 폼 제출 시 전체 필드 유효성 검사
    $('#join_form').on('submit', function(event) {
      let isValid = true;

      // 각 입력 필드 유효성 검사
      $(this).find('input[required], textarea[required], select[required]').each(function() {
        if ($(this).hasClass('is-invalid') || $(this).val().trim() === '') {
          $(this).addClass('is-invalid'); // 유효하지 않은 입력 필드에 클래스 추가
          $(this).siblings('.invalid-feedback').show(); // 오류 메시지 표시
          isValid = false; // 유효성 검사 실패
        }
      });

      // 관심 여행지역 체크박스 유효성 검사
      const checkboxes = $('input[name="mb_hobby[]"]');
      if (checkboxes.filter(':checked').length === 0) {
        alert('하나 이상의 관심 여행지역을 선택해주세요.');
        isValid = false; // 유효성 검사 실패
        return false;
      }
      // 이용약관 체크박스 유효성 검사
      const agreeBtn = $('#ch_btn');
      if (!agreeBtn.prop('checked')) {
        alert('이용약관에 동의하셔야 합니다.');
        isValid = false; // 유효성 검사 실패
        return false;
      }


      if (!isValid) {
        event.preventDefault(); // 폼 제출 방지
      } else {
        //alert('제출 완료!'); // 유효성 검사 통과
      }
    });


  });
</script>

</body>
</html>