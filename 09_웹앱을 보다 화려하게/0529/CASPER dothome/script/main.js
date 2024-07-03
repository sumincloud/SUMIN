//main.js
$(document).ready(function(){

  //-----------------------모달창 띄우기-------------------------
  //변수선언
  let modal = 
  `
  <div class="modal">
    <div class="modal_box">
      <img src="./images/main_Popup_PC_450x600.jpg" alt="모달창">
      <div>
        <form action="#">
          <input type="checkbox" name="modal_check" id="modal_check">
          <label for="modal_check">일주일간 열지 않음</label>
        </form>
        <div class="modal_close">닫기</div>
      </div>
    </div>
  </div>
  `
  //body태그의 안쪽 맨뒤에 modal내용을 출력한다.
  $('body').append(modal);

  let check = $('#modal_check'); //체크박스 변수

  //현재 사용자가 브라우저에서 쿠키정보가 있다면 모달창이 안나오게 해야함.
  if($.cookie('popup')=='none'){
    $('.modal').hide();
  }

  //체크박스를 체크하고 닫기버튼 누르면 모달창이 닫힘
  function close_popup(){
    if(check.is(':checked')){ //체크가 된 경우라면
      //쿠키정보가 저장되어야 함
      $.cookie('popup','none',{expires:7, path:'/'}) //쿠키정보를 popup, none값으로 생성
      $('.modal').hide()
    }else{ //체크박스에 체크하지 않았다면
      //쿠키정보를 생성하지 않고 그냥 닫기
      $('.modal').hide()
    }
  }

  //닫기버튼 클릭시 close_popup함수를 호출하여 실행
  $('.modal_close').click(function(){
    close_popup();
  })



  //----------------마우스 오버시 헤더색 변경----------------
  
  $('header').mouseenter(function(){
    $('header').addClass('h_act');
    $('header h1 img').attr('src','./images/logo-casper_black.png')
  })
  $('header').mouseleave(function(){
    if($(window).scrollTop()<1){
      $('header').removeClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper-white.png')
    }
  })

  //---------헤더가 올라가면 헤더 고정----------------
  $(window).scroll(function(){
    let sPos = $(this).scrollTop(); //세로스크롤값;

    if(sPos > 0){
      $('header').addClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper_black.png')
    }else{
      $('header').removeClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper-white.png')
    }

    //영상이 나오고 텍스트 나오도록 시간을 늦춤
    if(sPos>=1650){
      $('.intro_title_left').addClass('act1');
      $('.intro_title_right').addClass('act2');
    }
  })

  //---------------페이지 퀵버튼 화면이동-----------------
  $('#m_navi > ul > li').click(function(){
    let quick_id = $(this).find('a').attr('href');

    $('html, body').stop().animate({
      scrollTop:$(quick_id).offset().top} //quick_id 요소의 상단위치로 페이지 스크롤
      , 500)
  })

  // ------------------이벤트 랜덤배너----------------
  let r_num = Math.floor(Math.random()*3)+1;
  console.log(r_num);
  const r_banner = document.getElementById('ran_img');
  r_banner.src='./images/ran_banner0'+r_num+'.jpg';
















});