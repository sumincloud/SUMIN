$(document).ready(function(){

  /* --------내비게이션 슬라이드------- */
  $('.menu > li, .sub_back').mouseenter(function(){
    $('.sub, .sub_back').stop().slideDown();
  });
  $('.menu > li, .sub_back').mouseleave(function(){
    $('.sub, .sub_back').stop().slideUp();
  });

  /* -------이미지 슬라이드(가로 버전)------ */
  //사진 순서를 3-1-2 로 배치
  $('.slide-wrapper > li:last-child').insertBefore('.slide-wrapper > li:first-child');
  //1번 사진을 가운데로 배치함
  $('.slide-wrapper').css('left','-100%');

  function moveLeft(){
    $('.slide-wrapper').animate({'left':'-200%'}, 300, function(){
      //첫번째 위치의 슬라이드를 맨뒤로 보냄
      $('.slide-wrapper > li:first-child').insertAfter('.slide-wrapper > li:last-child');

      //다시 가운데로 배치
      $('.slide-wrapper').css('left','-100%');
    });
  }
  //함수 실행
  let Timer = setInterval(moveLeft, 3000);


  // /* ----------이미지 슬라이드(세로 버전)--------- */
  // //사진 순서를 3-1-2 로 배치
  // $('.slide-wrapper > li:last-child').insertBefore('.slide-wrapper > li:first-child');
  // //1번 사진을 가운데로 배치함
  // $('.slide-wrapper').css('top','-300px');

  // function moveTop(){
  //   $('.slide-wrapper').animate({'top':'-600px'}, 300, function(){
  //     //첫번째 위치의 슬라이드를 맨뒤로 보냄
  //     $('.slide-wrapper > li:first-child').insertAfter('.slide-wrapper > li:last-child');

  //     //다시 가운데로 배치
  //     $('.slide-wrapper').css('top','-300px');
  //   });
  // }

  // //함수 실행
  // let Timer = setInterval(moveTop, 3000);



  /* --------공지사항 모달창---------- */
  const modal = 
  `
  <div class="modal-overlay">
    <div class="modal">
      <div class="m_inner">
        <h3>제목 : 2020학년도 전기 대학원 신입생 모집요강</h3>
        <p style="margin-bottom:10px;">내용 : 2020학년도 전기 대학원 신입생 모집요강 및 제출서식을 붙임과 같이 첨부하오니, 확인하시기 바랍니다.</p>

        <p>붙임  1. 모집요강(HWP) 1부.</p>
        <p>      2. 모집요강(PDF) 1부.</p>
        <p>      3. 제출서식 각 1부.  끝.</p>

        <p>2019. 10. 11.</p>
        <p>산업대학교 입학관리본부</p>
        <button class="c_btn">닫기</button>
      </div>
    </div>
  </div>
  `;

  //공지사항 첫번째 클릭시 모달창 뜨게
  $('.notice ul li:first-child').click(function(){
    $('body').append(modal);
  });

  // 닫기 버튼 클릭 시 모달 창 닫기
  $(document).on('click', '.c_btn', function(){
    $('.modal-overlay').remove();
  });









  
  
});