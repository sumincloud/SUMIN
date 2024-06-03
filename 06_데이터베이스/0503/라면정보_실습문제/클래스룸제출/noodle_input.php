<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>라면정보 입력창</title>

  <!-- 제이쿼리 라이브러리 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    #warning{
    color:red;
    font-size:0.8rem;
    visibility:hidden;
    }
    .on{visibility:visible !important;}
    </style>

</head>
<body>
  <h2>라면정보 자료입력하기</h2>
  <form action="db_input.php" name="noodle" method="post" onsubmit="return form_check();">
    <fieldset>
      <legend>라면정보 입력</legend>
      <p>
        <label for="n_name">라면이름 : </label>
        <input type="text" name="n_name" maxlength="50" id="n_name">
      </p>
      <p>
        <label for="n_company">회사명 : </label>
        <input type="text" name="n_company" maxlength="10" id="n_company">
      </p>
      <p>
        <label for="n_kind">라면종류구분 : </label>
        <select name="n_kind" id="n_kind">
          <option value="M(일반라면)">M(일반라면)</option> 
          <option value="C(용기라면)">C(용기라면)</option> 
        </select>
      </p>
      <p>
        <label for="n_price">제품가격 : </label>
        <input type="text" name="n_price" maxlength="5" id="n_price">
      </p>
      <p>
        <label for="n_date">유통기한 날짜 : </label>
        <input type="text" name="n_date" maxlength="8" id="n_date" placeholder="YYYYMMDD" oninput="num_check();">
        <!-- placeholder="YYYY-MM-DD" oninput="onInputHandler()" -->
      </p>
      <!-- <span id="warning" class="on">유효하지 않은 날짜입니다.</span> -->
      <p>
        <input type="submit" value="데이터입력">
        <input type="reset" value="다시쓰기 또는 취소">
        <a href="noodle_list.php" title="noodle 데이터 정보조회결과">noodle 데이터 정보조회결과</a>
      </p>
    </fieldset>
  </form>

  <script>
    //제이쿼리로 하는 방법
    function form_check(){
      if($.trim($("#n_name").val())==''){   //trim 은 문자의 공백을 제외해주는 것
        alert("라면이름을 입력해주세요.");
        return false;
      } 
      if($.trim($("#n_company").val())==''){
        alert("회사명을 입력해주세요.");
        return false;
      } 
      if($.trim($("#n_price").val())==''){
        alert("제품가격을 입력해주세요.");
        return false;
      } 
      if($.trim($("#n_date").val())==''){
        alert("유통기한 날짜를 입력해주세요.");
        return false;
      }

      submit();
    }
  </script>

  <script> //작동 안됨 (확인 필요)
    let date = $('#n_date');
    let warning = $('.warning');


    function num_check(){
      if(!is_valid_date(result)){
              warning.classList.add("on");
          } else{
              warning.classList.remove("on");
          }
    }

    function is_valid_date(date)
    {
      var yyyyMMdd = String(date);
      var year = yyyyMMdd.substring(0,4);
      var month = yyyyMMdd.substring(4,6);
      var day = yyyyMMdd.substring(6,8);
  
      if (!is_number(date) || date.length!=8)
          return false;
  
      if (Number(month)>12 || Number(month)<1)
          return false;
  
      if (Number(last_day(date))<day)
          return false;

      return true;
    }



  </script>



  <!-- 자바스크립트 yyyy-mm-dd표시 -->
<!--   <script>
    let date = document.querySelector("#n_date");
    let warning = document.querySelector("#warning");

    const onInputHandler = () => {
        let val = date.value.replace(/\D/g, "");
        let leng = val.length;
        let result = '';

        if(leng < 6) result = val;
        else if(leng < 8){
            result += val.substring(0,4);
            result += "-";
            result += val.substring(4);
        } else{
            result += val.substring(0,4);
            result += "-";
            result += val.substring(4,6);
            result += "-";
            result += val.substring(6);

            if(!checkValidDate(result)){
                warning.classList.add("on");
            } else{
                warning.classList.remove("on");
            }
        }
        date.value = result;
    }

    const checkValidDate = (value) => {
        let result = true;
        try {
            let date = value.split("-");
            let y = parseInt(date[0], 10),
                m = parseInt(date[1], 10),
                d = parseInt(date[2], 10);

            let dateRegex = /^(?=\d)(?:(?:31(?!.(?:0?[2469]|11))|(?:30|29)(?!.0?2)|29(?=.0?2.(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(?:\x20|$))|(?:2[0-8]|1\d|0?[1-9]))([-.\/])(?:1[012]|0?[1-9])\1(?:1[6-9]|[2-9]\d)?\d\d(?:(?=\x20\d)\x20|$))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/;
            result = dateRegex.test(d+'-'+m+'-'+y);
        } catch (err) {
            result = false;
        }
        return result;
    }
  </script> -->

</body>
</html>