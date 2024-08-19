<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 | 회원가입</title>
  <!-- 공통 헤드정보 삽입 -->
  <?php include('./php/include/head.php'); ?>
  <style>
    section{
      max-width: 600px;
      margin: 0 auto;
      padding: 0 20px;
    }
    section > h2{
      text-align: center;
      font-size: var(--fs-large);
      font-weight: var(--fw-bold);
      padding: 50px 0 10px 0;
    }
    form label{
      font-size: var(--fs-medium);
      font-weight: 600;
    }

    /* 프로필 서식 */
    #profile{
      display:none;
    }
    .input-group-text {
      background-color: #fff !important;
      font-size: 1.5rem;
      color: #ccc;
      border-radius: 50% !important;
      width: 60px; height: 60px;
      justify-content: center;
      overflow: hidden;
      cursor: pointer;
      position: relative;
    }
    #preview {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit:cover;
    }



    /* 이메일 서식 */
    #email::placeholder {
      font-size: var(--fs-small);
      font-weight: var(--fs-light);;
    }

    /* 이용약관 서식 */
    .accordion{
      font-size: var(--fs-small);
    }
    .accordion-button{
      padding: 10px;
      font-size: var(--fs-small);
    }
    .accordion-button::after{
      transform:scale(0.8);
    }
    .accordion-button:not(.collapsed)::after{
      transform: rotate(-180deg) scale(0.8);
    }
    .accordion-body{
      line-height: 160%;
    }

  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header_sub.php');?>

  <main>
    <section>
      <h2>회원가입</h2>
      <form id="register_form" action="./php/register_input.php" method="post" enctype="multipart/form-data">
        <!-- 프로필 사진 -->
        <div class="mt-4 mb-2">
          <label for="profile" class="form-label">프로필 사진</label>
          <div class="input-group">
            <input type="file" class="form-control" id="profile" name="profile">
            <label class="input-group-text" for="profile">
              <i class="bi bi-camera"></i>
              <img id="preview" src="#" alt="프로필 미리보기" style="max-width: 80px; display: none;">
            </label>
          </div>
        </div>
        <!-- 이름 -->
        <div class="mt-4 mb-2">
          <label for="name" class="form-label">이름<span style="color:var(--red);">*</span></label>
          <input type="text" class="form-control" id="name" name="name">
          <div class="invalid-feedback">
            이름을 입력해주세요.
          </div>
        </div>
        <!-- 아이디 -->
        <div class="mt-4 mb-2">
          <label for="id" class="form-label">아이디<span style="color:var(--red);">*</span></label>
          <small class="d-block text-secondary mb-2" style="font-size: 14px;">4자 이상 20자 이내의 영문,숫자 사용</small>
          <input type="text" class="form-control" id="id" name="id">
          <div class="invalid-feedback">
            영문, 숫자를 조합하여 4~20자로 작성해주세요.
          </div>
        </div>
        <!-- 비밀번호 -->
        <div class="mt-4 mb-2">
          <label for="password" class="form-label">비밀번호<span style="color:var(--red);">*</span></label>
          <small class="d-block text-secondary mb-2" style="font-size: 14px;">8자 이상 20자 이내의 영문,숫자,특수문자(!@#$%&amp;)사용</small>
          <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
          <div class="invalid-feedback">
            영문, 숫자, 특수문자를 조합하여 8~20자로 작성해주세요.
          </div>
        </div>
        <!-- 비밀번호 확인 -->
        <div class="mt-4 mb-2">
          <label for="password2" class="form-label">비밀번호 확인<span style="color:var(--red);">*</span></label>
          <input type="password" class="form-control" id="password2" name="password2" autocomplete="new-password">
          <div class="invalid-feedback">
            패스워드가 일치하지 않습니다.
          </div>
        </div>
        <!-- 전화번호 -->
        <div class="mt-4 mb-2">
          <label for="phone" class="form-label">전화번호<span style="color:var(--red);">*</span></label>
          <input type="text" class="form-control" id="phone" name="phone">
          <div class="invalid-feedback">
            전화번호를 올바르게 입력해주세요.
          </div>
        </div>
        <!-- 이메일 -->
        <div class="mt-4 mb-2">
          <label for="email" class="form-label">이메일 (선택입력)</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
        </div>
        <!-- 이용약관 -->
        <div class="mt-4 mb-2">
          <div class="form-check mt-3">
            <input type="checkbox" id="ch_btn" name="ch_btn" class="form-check-input"  style="cursor:pointer;">
            <label for="ch_btn" class="form-check-label" style="cursor:pointer;">회원가입 약관에 동의합니다.</label>
          </div>
          <div class="accordion mt-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agree_1">
                  이용약관
                </button>
              </h2>
              <div id="agree_1" class="accordion-collapse collapse">
                <div class="accordion-body">
                제1장 총칙<br>
                제1조 [목적]<br>
                본 약관은 (주)EasyCook(이하 "회사"라 합니다)이 http://www.easycook.ac, http://easycook.co.kr (이하 "웹사이트"라 합니다)를 통해 제공하는 교육 정보 서비스 (이하 "서비스"라 합니다)의 이용에 관한 제반 사항을 규정하는 것을 목적으로 합니다.<br><br>

                제2조 [정의]<br>
                (1) "이용자"라 함은 "웹사이트"에 접속하여 본 약관에 따라 "회사"가 제공하는 "서비스"를 이용하는 "회원" 및 "비회원"을 말합니다.<br>
                (2) "회원"이라 함은 "웹사이트"에 접속하여 본 약관에 동의함으로써 "아이디"를 부여받은 자로서 "회사"가 제공하는 "서비스"를 지속해서 이용할 수 있는 자를 말합니다.<br>
                (3) "비회원"이라 함은 "웹사이트"에 접속하였으나 본 약관에 동의하지 않음으로써 "아이디"를 부여받지 못한 자를 말합니다.<br>
                (4) "아이디"라 함은 "회원"의 식별 및 "서비스" 이용을 위하여 "회원"이 정하고 "회사"가 승인하는 문자<br>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion mt-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agree_2">
                  개인정보 수집 이용 동의
                </button>
              </h2>
              <div id="agree_2" class="accordion-collapse collapse">
                <div class="accordion-body">
                개인정보 수집 및 이용에 관한 동의 약관<br>
                (주)EasyCook (이하 '회사'라 합니다)는 여러분의 개인정보를 중요하게 생각하며, 아래의 내용과 같이 개인정보를 수집하고 이용합니다. 이 약관을 충분히 읽고 이해한 후 동의해 주시기 바랍니다.<br><br>

                1. 개인정보의 수집 및 이용 목적<br>
                회사는 다음의 목적을 위해 개인정보를 수집하고 이용합니다:<br><br>

                회원가입 및 관리: 회원 가입, 관리, 서비스 제공, 회원 식별, 인증, 회원제 서비스 운영<br>
                강의 수강 및 관리: 수강 신청, 강의 이력 관리, 강의 관련 공지 및 알림<br>
                서비스 제공 및 개선: 서비스 제공, 질의응답, 고객 요청 및 불만 처리, 서비스 개선을 위한 분석<br>
                마케팅 및 광고: 신규 서비스 안내, 맞춤형 광고 및 이벤트 정보 제공, 서비스 관련 통계 분석<br>
                2. 수집하는 개인정보 항목<br>
                회사는 다음과 같은 개인정보를 수집합니다:<br><br>

                필수항목:<br><br>

                이름<br>
                연락처 (휴대전화 번호, 이메일 주소)<br>
                생년월일<br>
                주소<br>
                결제 정보 (신용카드 정보, 계좌 정보 등)<br>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>





        <!-- 버튼 형식 -->
        <div class="btn-box-l" style="margin-top: 50px;">
          <button type="submit" class="btn-l">가입완료</button>
          <button type="button" class="btn-l" onclick="location.href='./index.php'">가입취소</button>
        </div>


        
      </form>



    </section>
    



  </main>
  <script>
    $(document).ready(function() {
      // -----------프로필 사진 미리보기 기능-----------
      $('#profile').change(function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        if (FileReader && files && files.length) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#preview').attr('src', e.target.result).show();
          };
          reader.readAsDataURL(files[0]);
        }
      });

      // Ajax를 이용한 프로필 사진 업로드
      // $('#profile').on('change', function() {
      //   var formData = new FormData();
      //   formData.append('profile', $('#profile')[0].files[0]);
      //   formData.append('name', $('#name').val());

      //   $.ajax({
      //     url: './php/register_input.php',
      //     type: 'POST',
      //     data: formData,
      //     processData: false,
      //     contentType: false,
      //     success: function(response) {
      //       $('#profile').append(response);
      //     }
      //   });
      // });

      // -----------회원가입 입력 폼 실시간 검사--------------
      var isValid = true;

      // 이름 필드 실시간 검사
      $('#name').on('input', function() {
        var name = $(this).val().trim();
        if (name === '') {
          $(this).addClass('is-invalid');
          isValid = false; 
        } else {
          $(this).removeClass('is-invalid');
          isValid = true; 
        }
      });

      // 아이디 필드 실시간 검사
      $('#id').on('input', function() {
        var id = $(this).val().trim();
        var idRegex = /^[a-zA-Z0-9]{4,20}$/;
        if (id === '' || !idRegex.test(id)) {
          $(this).addClass('is-invalid');
          isValid = false; 
        } else {
          $(this).removeClass('is-invalid');
          isValid = true; 
        }

        // AJAX를 이용한 아이디 중복 확인
        $.ajax({
          url: './php/register_id_check.php',
          type: 'POST',
          data: { id: id },
          success: function(response) {
            if (response === '사용중') {
              $('#id').addClass('is-invalid');
              $('#id').next('.invalid-feedback').text('이미 사용중인 아이디입니다.');
              isValid = false;
            } else {
              isValid = true;
            }
          }
        });
      });

      // 패스워드 필드 실시간 검사
      $('#password').on('input', function() {
        var password = $(this).val().trim();
        var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
        if (password === '' || !passwordRegex.test(password)) {
          $(this).addClass('is-invalid');
          isValid = false; 
        } else {
          $(this).removeClass('is-invalid');
          isValid = true; 
        }
      });

      // 패스워드 확인 필드 일치 여부 실시간 검사
      $('#password2').on('input', function() {
        var password = $('#password').val().trim();
        var password2 = $(this).val().trim();
        if (password !== password2) {
          $(this).addClass('is-invalid');
          isValid = false; 
        } else {
          $(this).removeClass('is-invalid');
          isValid = true;
        }
      });

      // 전화번호 필드 실시간 검사
      $('#phone').on('input', function() {
        var phone = $(this).val().trim().replace(/-/g, ''); // '-' 제거
        var phoneRegex = /^010\d{8}$/; // 010으로 시작하고, 8자리 숫자
        if (phone === '' || !phoneRegex.test(phone)) {
          $(this).addClass('is-invalid');
          isValid = false; 
        } else {
          $(this).removeClass('is-invalid');
          isValid = true; 
        }
      });

      // -----------------폼 제출 시 빈값 검사--------------------
      $('#register_form').submit(function(event) {
        event.preventDefault(); // 기본 제출 동작 막기

        var isFormValid = true;

        // 각 필드를 검사하여 빈값이면 is-invalid 클래스 추가
        $('#name, #id, #password, #password2, #phone').each(function() {
          var $this = $(this);
          if ($this.val().trim() === '') {
            $this.addClass('is-invalid');
            isFormValid = false;
          } else {
            $this.removeClass('is-invalid');
          }
        });

        // 이용약관 체크 여부 확인
        if (!$('#ch_btn').is(':checked')) {
          alert('이용약관에 동의해야 합니다.');
          isFormValid = false;
        }

        if (isFormValid) {
          this.submit(); // 유효성 검사 통과 시 폼 제출
        }
      });














  });

</script>

</body>
</html>