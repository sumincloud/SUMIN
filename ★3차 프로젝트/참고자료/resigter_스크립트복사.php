
<script>
    //유효성 검사 방법 3가지 패턴
    //1. html5에서 사용하는 required 속성을 사용하는 방법
    //2. 자바스크릡트를 활용하여 값을 체크하는 방법
    //3. php문법을 활용하여 php문서 안에서 체크하는 방법
    $(document).ready(function(){

      $('#join').click(function(e) {
        // 폼의 기본 동작인 submit을 막음
        e.preventDefault();
        validateCheck();
        // 유효성 검사를 수행하고 결과를 변수에 저장
        var isFormValid = validateCheck();
        var isPasswordValid = passwordCheck();
        var isAgreeChecked = agreeCheck();

        // 세 가지 유효성 검사가 모두 통과되면 폼 제출
        if (isFormValid && isPasswordValid && isAgreeChecked) {
          $('#join_form').submit();
          // 모든 조건을 만족하면 제출 가능
          //alert('회원가입 성공!');
        }
      });

      $('input').keyup(function() {
        // input에 입력할때마다 함수체크
        validateCheck();
      });


      //빈칸 유효성 검사
      function validateCheck() {

        const id = $('#mb_id').val();
        const password = $('#mb_password').val();
        const password2 = $('#mb_password2').val();
        const name = $('#mb_name').val();
        const tel = $('#mb_tel').val();
        const email = $('#mb_email').val();
        const job = $('#mb_job').val();

        // 아이디 길이 확인
        if (id.length < 6) {
          $('#mb_id').addClass('is-invalid');
          return false;
        } else {
          $('#mb_id').removeClass('is-invalid');
        }

        // 비밀번호 입력 확인
        if (password.length < 8) {
          $('#mb_password').addClass('is-invalid');
          return false;
        } else {
          $('#mb_password').removeClass('is-invalid');
        }
        // 비밀번호 재입력 확인
        if (password.length < 8) {
          $('#mb_password2').addClass('is-invalid');
          return false;
        } else {
          $('#mb_password2').removeClass('is-invalid');
        }
        // 반려견 이름 입력 확인
        if (name.length < 1) {
          $('#mb_name').addClass('is-invalid');
          return false;
        } else {
          $('#mb_name').removeClass('is-invalid');
        }
        // 휴대폰 번호 입력 확인
        if (tel.length < 1) {
          $('#mb_tel').addClass('is-invalid');
          return false;
        } else {
          $('#mb_tel').removeClass('is-invalid');
        }
        // 이메일 입력 확인
        if (email.length < 1) {
          $('#mb_email').addClass('is-invalid');
          return false;
        } else {
          $('#mb_email').removeClass('is-invalid');
        }
        // 직업선택 확인
        if (job.length < 1) {
          $('#mb_job').addClass('is-invalid');
          return false;
        } else {
          $('#mb_job').removeClass('is-invalid');
        }
        return true;
      };

      // 이용약관 동의 체크 확인
      function agreeCheck() {
        if (!$('#ch_btn').is(':checked')) {
          alert('이용약관에 동의하셔야 합니다.');
          return false;
        }
        return true;
      }


      //비밀번호 유효성 검사
      function passwordCheck(){
        const password = $('#mb_password').val();
        const password2 = $('#mb_password2').val();

        // 비밀번호 형식 확인 (영문, 숫자, 특수문자 포함 8자 이상 20자 이내)
        var reg = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,20}$/;
        if (!reg.test(password)) {
          alert('비밀번호는 8 ~ 20자 이내로 영문, 숫자, 특수문자를 포함해야 합니다.');
          return false;
        }

        // 비밀번호 확인 일치 여부 확인
        if (password !== password2) {
          alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
          return false;
        }
        return true;
      }

      // 휴대폰번호 입력칸 문자 제거
      $('#mb_tel').on('input', function() {
        var phoneNumber = $(this).val().replace(/\D/g, ''); // 숫자 이외의 문자 제거

        // '010'으로 시작하지 않는 경우
        if (!phoneNumber.startsWith('010')) {
          $(this).addClass('is-invalid');
        } else {
          $(this).removeClass('is-invalid'); 
        }
        // 입력 필드에 반영
        $(this).val(phoneNumber);
      });


      // 취소 버튼 클릭 시 로그인페이지로 이동
      $('#cancelButton').click(function() {
        window.location.href = '<?php echo $href; ?>';
      });









    });












/*     function formCheck(){
      //변수선언
      // let ch_btn = document.getElementById('ch_btn'); 
      // let id = document.getElementById('mb_id'); 
      // let password = document.getElementById('mb_password'); 
      // let password2 = document.getElementById('mb_password2'); 
      // let name = document.getElementById('mb_name'); 
      // let tel = document.getElementById('mb_tel'); 
      // let email = document.getElementById('mb_email'); 

      // if(ch_btn.checked==false){
      //   alert('약관에 동의하셔야 합니다.');
      //   return false;
      // }
      // if(id.value.length<1){
      //   alert('아이디를 입력하지 않았습니다.');
      //   id.focus();
      //   return false;
      // }
      // if(id.value.length<6||id.value.length>20){
      //   alert('아이디는 6~20자 이내로 입력하세요.');
      //   id.focus();
      //   return false;
      // }
      // if(password.value.length<1){
      //   alert('비밀번호를 입력하지 않았습니다.');
      //   password.focus();
      //   return false;
      // }
      //영문 숫자 특수기호 조합 8자리 이상 20이하
      // let reg = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,20}$/
      // if(!reg.test(password.value)){
      //   alert('비밀번호는 8 ~ 20자 이내로 영문, 숫자, 특수문자를 포함해야 합니다.')
      //   return false;
      // }
      //비밀번호 확인 일치여부
      // if(password.value != password2.value){
      //   alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.')
      //   return false;
      // }
      // if(name.value.length<1){
      //   alert('이름을 입력하지 않았습니다.');
      //   name.focus();
      //   return false;
      // }
      // if(tel.value.length<1){
      //   alert('휴대폰 번호를 입력하지 않았습니다.');
      //   tel.focus();
      //   return false;
      // }
      // if(tel.value.length<11){
      //   alert('휴대폰 번호는 11자리로 입력해주세요.');
      //   tel.focus();
      //   return false;
      // }
      // if(email.value.length<1){
      //   alert('이메일주소를 입력하지 않았습니다.');
      //   email.focus();
      //   return false;
      // }
    } */





  </script>