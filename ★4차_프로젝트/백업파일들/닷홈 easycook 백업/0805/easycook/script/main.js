//-----------------메인배너 슬라이드----------------
var swiper1 = new Swiper(".mySwiper1", {
  spaceBetween: 0,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "fraction", // 페이지네이션을 번호로 표시
    clickable: true,
  },
});

var pauseBtn = document.querySelector("#sec01 .swiper-button-play-pause");

pauseBtn.addEventListener("click", function() {
  if (swiper1.autoplay.running) {
    swiper1.autoplay.stop();
    pauseBtn.classList.remove("bi-pause");
    pauseBtn.classList.add("bi-play-fill");
  } else {
    swiper1.autoplay.start();
    pauseBtn.classList.remove("bi-play-fill");
    pauseBtn.classList.add("bi-pause");
  }
});



//-------------실시간 인기수강 슬라이드---------------
var swiper2 = new Swiper(".mySwiper2", {
  //0 ~ 375일때 (작은 모바일일때 설정)
  slidesPerView: 1.5,
  spaceBetween: 12,
  touchRatio: 1,
  simulateTouch: true,
  breakpoints : { //반응형 설정
    376 : { //376~767일때 (큰 모바일일때 설정)
      slidesPerView : 1.5,
      spaceBetween: 12,
    },
    768 : { //768~1023일때 (태블릿일때 설정)
      slidesPerView : 3.2,
      spaceBetween: 12,
    },
    1024 : {  //1024 이상 일때 (pc일때 설정)
      slidesPerView : 4.2,
      spaceBetween: 12,
    },
    1400 : {  //1400 이상 일때 (큰 pc일때 설정)
      slidesPerView : 4,
      spaceBetween: 12,
    }
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


//-------------마감임박, 요리, 커피, 베이커리 인기 수강 슬라이드---------------
var swiper3 = new Swiper(".mySwiper3", {
  //0 ~ 375일때 (작은 모바일일때 설정)
  slidesPerView: 1.5,
  spaceBetween: 12,
  touchRatio: 1,
  simulateTouch: true,
  breakpoints : { //반응형 설정
    376 : { //376~767일때 (큰 모바일일때 설정)
      slidesPerView : 2.2,
      spaceBetween: 12,
    },
    768 : { //768~1023일때 (태블릿일때 설정)
      slidesPerView : 3.2,
      spaceBetween: 12,
    },
    1024 : {  //1024 이상 일때 (pc일때 설정)
      slidesPerView : 4.2,
      spaceBetween: 12,
    },
    1400 : {  //1400 이상 일때 (큰 pc일때 설정)
      slidesPerView : 5,
      spaceBetween: 12,
    }
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


//-----------------광고배너 슬라이드----------------
var swiper4 = new Swiper(".mySwiper4", {
  spaceBetween: 0,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "fraction", // 페이지네이션을 번호로 표시
    clickable: true,
  },
});


//-------------수강생 후기 슬라이드---------------
var swiper5 = new Swiper(".mySwiper5", {
  //0 ~ 375일때 (작은 모바일일때 설정)
  slidesPerView: 1.5,
  spaceBetween: 12,
  touchRatio: 1,
  simulateTouch: true,
  breakpoints : { //반응형 설정
    376 : { //376~767일때 (큰 모바일일때 설정)
      slidesPerView : 1.5,
      spaceBetween: 12,
    },
    768 : { //768~1023일때 (태블릿일때 설정)
      slidesPerView : 3.2,
      spaceBetween: 12,
    },
    1024 : {  //1024 이상 일때 (pc일때 설정)
      slidesPerView : 4.2,
      spaceBetween: 12,
    },
    1400 : {  //1400 이상 일때 (큰 pc일때 설정)
      slidesPerView : 4,
      spaceBetween: 12,
    }
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
