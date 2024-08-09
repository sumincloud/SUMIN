$(document).ready(function(){

  /* ------------메인배너 슬라이드------------- */
  var swiper = new Swiper(".mySwiper1", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  //-------------추천 여행지 슬라이드---------------
  var swiper = new Swiper(".mySwiper2", {
    //0 ~ 375일때 (작은 모바일일때 설정)
    slidesPerView: 1.5,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    touchRatio: 1,
    simulateTouch: true,
    breakpoints : { //반응형 설정
      376 : { //376~767일때 (큰 모바일일때 설정)
        slidesPerView : 2.2,
        spaceBetween: 30,
      },
      768 : { //768~1023일때 (태블릿일때 설정)
        slidesPerView : 3.2,
        spaceBetween: 30,
      },
      1024 : {  //1024 이상 일때 (pc일때 설정)
        slidesPerView : 4.2,
        spaceBetween: 50,
      }
    },
  });

  /* ------------제휴광고 슬라이드------------- */
  var swiper = new Swiper(".mySwiper3", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });






  //-------------이달의 여행테마 슬라이드---------------



  // 슬라이더 요소 선택 및 변수 초기화
  const $slider = $('.slider');
  let swiper4 = undefined;
  let slideNum = $slider.find('.swiper-slide').length; // 슬라이드 총 개수
  let slideInx = 0; // 현재 슬라이드 인덱스
  
  // 디바이스 크기에 따라 화면 유형 설정 ('pc' 또는 'mo')
  let oldWChk = window.innerWidth > 767 ? 'pc' : 'mo';
  sliderAct(); // 슬라이더 활성화
  
  let resizeTimer;
  // 창 크기 변경 시 디바이스 크기 체크 및 슬라이더 재설정
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      let newWChk = window.innerWidth > 767 ? 'pc' : 'mo';
      if (newWChk != oldWChk) {
        oldWChk = newWChk;
        sliderAct();
      }
    }, 300);
  });
  
  // 슬라이더 실행 및 설정 함수
  function sliderAct() {
    // 슬라이더 초기화 (이미 존재하는 경우)
    if (swiper4 != undefined) {
      swiper4.destroy();
      swiper4 = undefined;
    }
    // 슬라이드 보기 옵션 설정 (디바이스에 따라 변경)
    let viewNum = oldWChk == 'pc' ? 2 : 1;
    // 슬라이드 수에 따라 무한반복 옵션 설정
    let loopChk = slideNum > viewNum;
    // 슬라이더 구성 및 옵션 설정
    swiper4 = new Swiper($slider.find('.inner'), {
      slidesPerView: "auto",
      initialSlide: slideInx,
      loop: loopChk,
      centeredSlides: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      on: {
        slideChangeTransitionStart: function() {
          slideInx = this.realIndex; // 현재 슬라이드 인덱스 갱신
          updateBackground(); // 슬라이드가 바뀔 때 배경 업데이트 함수 호출
          updateClass(); // 슬라이드 클래스 업데이트 함수 호출
        },
        init: function() {
          updateBackground(); // 초기 배경 업데이트
          updateClass();// 초기 클래스 업데이트
        },
      },
    });
  
    // 슬라이더 클래스 업데이트 함수
    function updateClass() {
      // 화면상 첫 번째 및 마지막 슬라이드에 클래스 추가 및 제거
      $slider.find('.swiper-slide-prev').prev().addClass('first').siblings().removeClass('first');
      $slider.find('.swiper-slide-next').next().addClass('last').siblings().removeClass('last');
    }

  // 슬라이드 할때 배경이미지 바뀌는 함수
  function updateBackground() {
    const activeSlide = $slider.find('.swiper-slide-active .img img').attr('src');
    $('#sec06').css('--bg-image', `url(${activeSlide})`);
  }
  // 초기 배경 업데이트
  updateBackground();
  }

  //--------핫 플레이스 탭 컨텐츠---------
  // 초기 상태: 모든 탭 숨기기
  $('.col-12').hide();

  // 첫 번째 탭(애견카페) 보이기
  $('.col-12[alt="애견카페"]').show();

  // 탭 버튼 클릭 이벤트 처리
  $('.tab-btn').click(function() {
    var tabName = $(this).data('tab');
    
    // 모든 탭 버튼의 active 클래스 제거
    $('.tab-btn').removeClass('active-tab');
    // 클릭된 버튼에 active 클래스 추가
    $(this).addClass('active-tab');

    // 모든 탭 숨기기
    $('.col-12').hide();

    // 선택한 탭 보이기
    $('.col-12[alt="' + tabName + '"]').show();
  });
  
















})