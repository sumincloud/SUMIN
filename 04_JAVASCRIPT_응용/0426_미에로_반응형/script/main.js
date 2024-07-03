$(document).ready(function(){

  //1. 변수선언
  let gnb = $('.gnb > ul > li > a');//메인메뉴
  let i = 0; //인덱스값
  let slide = $('.slide_wrapper div');
  let c_btn = $('.lnb li');
  const l_btn = $('.slide .s_btn li:first-child img');
  const r_btn = $('.slide .s_btn li:last-child img');
  let t_mnu = $('.tab_con li a');
  const toggle = $('#toggle');
  const t_btn = $('.t_btn');

  //탑버튼 숨겨놓고 스크롤시 나오게하기
  t_btn.hide();
  $(window).scroll(function(){
    let spos = $(this).scrollTop();
    if(spos>=600){
      t_btn.fadeIn(200)
    }else{
      t_btn.fadeOut(200)
    }
  })

  
  
  //탭메뉴 클릭시 a서식 지우고 내가 클릭한 메뉴만 t_act 적용하기
  t_mnu.click(function(){
    
    let w_size = $(window).width();

    if(w_size >= 1024){ //pc 해상도일 경우 서식
      $(this).addClass('t_act').parent().siblings().find('a').removeClass('t_act');

      $('.cont').hide(); //보이는 컨텐츠 모두 숨기고
      $(this).next().show(); //해당 컨텐츠 나오게 한다.

      let t_index = $(this).parent().index(); // 0,1,2
      console.log(t_index)

      if(t_index==2){
        $('.tab_con_wrap article').height(1000).css({"background":"url(images/mcon2_7.png) no-repeat right","background-size":"560px"});
      }else{
        $('.tab_con_wrap article').height(500).css({"background":"url(images/mcon2_7.png) no-repeat right","background-size":"560px"});
      }
    }else{ //모바일,태블릿 버전일경우 서식
      $(this).addClass('t_act').parent().siblings().find('a').removeClass('t_act');

      let t_index = $(this).parent().index(); // 0,1,2
      console.log(t_index)

      if(t_index==2){
        $('.tab_con_wrap article').height(1000).css('background','none');
        
      }else{
        $('.tab_con_wrap article').height(700).css({"background":"url(images/mcon2_7.png) no-repeat bottom","background-size":"360px"});
      }

      //탭메뉴 아이콘폰트 방향변경
      $(this).find('i.fas').attr('class','fas fa-angle-up').parent().parent().siblings().find('i.fas').attr('class','fas fa-angle-down')
      
      $(this).parent().siblings().find('.cont').slideUp(); //보이는 컨텐츠 모두 숨기고
      $(this).next().slideToggle(); //해당 컨텐츠 나오게 한다.

    }
    return false
  })

  


  //모바일버전에서 토글버튼 클릭시 메뉴나오기
  toggle.click(function(){
    $('.gnb').stop().slideToggle()
  })




  // 메인메뉴 클릭시 해당 서브만 나오게하기
  gnb.click(function(){
    //내가 선택한 a요소의 sub메뉴 나오게 하고 부모의 형제요소들의 자손인 .sub는 숨긴다.
    $(this).next().toggle().parent().siblings().find('.sub').hide();
    return false;
  });

  // header영역 밖에 클릭시 서브메뉴 숨기기
  $('body').click(function(){
    $('.sub').hide();
  });
  
  //2. 이미지가 변하는 함수
  //우측 버튼
  function fadeInOut(){
    c_btn.removeClass('act'); //콘트롤 버튼에 서식 모두제거하고
    slide.eq(i).fadeOut(); //보이는 이미지전부 숨기고

    if(i==2){ //만약에 인덱스 값이 2라면 = 마지막 이미지라면
      i=0; //인덱스값을 1로 대입하고
    }else{ //그렇지 않으면
      i++; //1씩 더하여 다음 이미지가 나오게한다.
    }
    slide.eq(i).fadeIn(); //인덱스 번호에 해당하는 n번째 이미지가 나옴
    c_btn.eq(i).addClass('act'); //인덱스 번호에 해당하는 콘트롤버튼에 서식 적용
  }

  //좌측버튼
  function fadeInOut2(){
    c_btn.removeClass('act'); //콘트롤 버튼에 서식 모두제거하고
    slide.eq(i).fadeOut(); //보이는 이미지전부 숨기고

    if(i==0){ //만약에 인덱스 값이 0이라면 = 처음 이미지라면
      i=2; //인덱스값을 2로 대입하고
    }else{ //그렇지 않으면
      i--; //1씩 빼서 이전 이미지가 나오게한다.
    }
    slide.eq(i).fadeIn(); //인덱스 번호에 해당하는 n번째 이미지가 나옴
    c_btn.eq(i).addClass('act'); //인덱스 번호에 해당하는 콘트롤버튼에 서식 적용
  }

  //좌우버튼 클릭시 각각 해당함수 호출하여 이미지 변경
  l_btn.click(function(){
    clearInterval(Timer) //기존 시간을 제거
    fadeInOut2()
  })
  r_btn.click(function(){
    clearInterval(Timer) //기존 시간을 제거
    fadeInOut()
  })

  //3. 매 3초마다 반복실행 => Timer
  let Timer = setInterval(fadeInOut, 3000);

  
  //4. 컨트롤버튼 클릭시 해당 이미지 나오게 하기
  $('.slide .lnb li').click(function(){
    clearInterval(Timer); //시간 삭제
    
    let a = $(this).index();
    console.log(a);
    
    c_btn.removeClass('act'); //콘트롤 버튼에 서식 모두제거하고
    c_btn.eq(a).addClass('act'); //해당 버튼에 서식적용
    
    slide.eq(a-1).fadeOut(); //현재 이미지 숨기고
    slide.eq(a).fadeIn(); //해당하는 이미지 나오게
    
  })
  
  
  // 5. 정지버튼 클릭시 시간을 제거
  $('i.fa-pause').click(function(){ 
    clearInterval(Timer);
    
    if($(this).hasClass('fas fa-pause')==true){ //일시정지 모양일때
      clearInterval(Timer); //애니메이션 멈추고
      $(this).attr('class','fas fa-play'); //버튼모양이 변경되도록한다.
    }else{
      $(this).attr('class','fas fa-pause');
      Timer = setInterval(fadeInOut, 3000); //플레이 버튼 클릭시 시간 다시 재생
    }
  })


  //좌우, 컨트롤버튼에 마우스 아웃시 자동으로 플레이
  $('.slide .s_btn li').mouseleave(function(){
    clearInterval(Timer);
    Timer = setInterval(fadeInOut,3000)
  })
  $('.slide .lnb li').mouseleave(function(){
    clearInterval(Timer);
    Timer = setInterval(fadeInOut,3000)
  })

  //이벤트 슬라이드
  let e_left_btn = $('.event i.fa-angle-left')
  let e_right_btn = $('.event i.fa-angle-right')
  const eslide = $('.es_wrap')

  //1번의 앞에 3번이 오도록 위치를 잡는다.
  $('.es_wrap > div:last-child').insertAfter('.es_wrap > div:first-child')
  eslide.css('margin-left','-100%')

  //움직이는 함수
  function e_move_left(){
    eslide.animate({'margin-left':'0%'},500,function(){
      $('.es_wrap > div:last-child').insertBefore('.es_wrap > div:first-child')
      eslide.css('margin-left','-100%')
    })
  }
  function e_move_right(){
    eslide.animate({'margin-left':'-200%'},500,function(){
      $('.es_wrap > div:first-child').insertAfter('.es_wrap > div:last-child')
      eslide.css('margin-left','-100%')
    })

  }

  //시간객체 - 3초마다 함수를 호출
  let eTimer = setInterval(e_move_right,3000)

  //버튼 클릭시 각각 해당함수를 호출
  e_left_btn.click(function(){
    clearInterval(eTimer);
    e_move_left();
  })
  e_right_btn.click(function(){
    clearInterval(eTimer);
    e_move_right();
  })

  /* $('.event i.fas').mouseleave(){
    eTimer = setInterval(e_move_left,3000);
  } */


  //갤러리에 더보기 버튼 클릭시  ajax비동기 방식을 통해 json데이터를 불러와 목록을 추가한다.

  $('.more_box').click(function(){
    $.ajax({
      url:'json/product.json',
      type:'post',
      dataType:'json',
      success:function(result){
        var t = "<ul>";
        $.each(result.product, function(i,e){
          t+="<li><img src='./add_img/"+e.path+"' alt='"+e.title+"'></li>"
        });
        t+="</ul>";

        $('#list').html(t);
      }
    })
    $('.more_box').hide();
    return false
  })






});