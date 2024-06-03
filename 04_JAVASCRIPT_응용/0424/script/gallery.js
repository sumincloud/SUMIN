/* gallery.js */

$(document).ready(function(){
  //1. 변수선언
  let g_img = $('.g_list li a')
  const g_nav = $('.g_nav ul li a')

  //좌우버튼, 페이지넘버 변수
  let n = 1;
  const total_n = $('.g_list li').length; //12
  console.log(total_n)

  //2. g_nav클릭시 act서식 적용하고 부모의 다른 형제요소의 자식요소 a에는 act서식을 제거한다.

  g_nav.click(function(e){
    e.preventDefault();
    $(this).addClass('act').parent().siblings().find('a').removeClass('act');

    //기존 li목록은 무조건 숨기고, 해당하는 목록만 보여지게 한다.
    $('.g_list li').hide();

    if($(this).parent().index()==0){
      //1. 전체메뉴 클릭시 12장의 목록이 전체 보여진다.
      $('.g_list li').fadeIn();
    }
    if($(this).parent().index()==1){
      //2. 기획버튼 클릭시 .plan클래스가 보여진다.
      $('.plan').fadeIn();
    }
    if($(this).parent().index()==2){
      //3. 설계버튼 클릭시 .design클래스가 보여진다.
      $('.design').fadeIn();
    }
    if($(this).parent().index()==3){
      //4. 디자인버튼 클릭시 .ui클래스가 보여진다.
      $('.ui').fadeIn();
    }
    if($(this).parent().index()==4){
      //5. 개발버튼 클릭시 .coding클래스가 보여진다.
      $('.coding').fadeIn();
    }
  })

  



  //3. 이벤트
  g_img.hover(function(){ //mouseenter
    $(this).find('.caption').stop().animate({'bottom':'0px'},200)

  },function(){ //mouseleave
    $('.caption').stop().animate({'bottom':'-40px'},100)
  })

  //3. 이미지 클릭시 모달 윈도 띄우기
  g_img.click(function(){
    //선택한 a요소의 href값을 변수에 저장한다.
    let img_url = $(this).attr('href');

    //선택한 a요소의 title값을 변수에 저장한다.
    let title = $(this).attr('title');

    //저장된 img_url값을 출력해본다.
    console.log(img_url);

    let modal = `
      <div class="modal">
        <div class="m_inner">
        <h3>${title}</h3>
            <img src="${img_url}" alt="">
            <span class="page_num">${n+'/'+total_n}</span>
            <i class="fas fa-times c_btn"></i>
            <i class="fas fa-angle-left l_btn"></i>
            <i class="fas fa-angle-right r_btn"></i>
          <div>
        </div>
    `;

    //body뒤에 모달 내용을 출력한다.
    $('body').append(modal)

    //좌버튼 클릭시
    $('.l_btn').click(function(){
      //1. 페이지 넘버 변경
      if(n==1){
        n=total_n;
      }else{
        n--;
      }
      //console.log(n+'/'+total_n)
      $(".page_num").text(n+'/'+total_n)

      //2. 이미지 변경
      img_url = $('.g_list li').eq(n-1).find('img').attr('src')
      console.log(img_url)
      $('.modal img').attr('src', img_url)

      //3. 타이틀 변경
      title = $('.g_list li').eq(n-1).find('span').text()
      $('.modal h3').text(title)
    })

    //우버튼 클릭시
    $('.r_btn').click(function(){
      //1. 페이지 넘버 변경
      if(n==total_n){
        n=1
      }else{
        n++;
      }
      //console.log(n+'/'+total_n)
      $(".page_num").text(n+'/'+total_n)

      //2. 이미지 변경
      img_url = $('.g_list li').eq(n-1).find('img').attr('src')
      //console.log(img_url_c)
      $('.modal img').attr('src', img_url)

      //3. 타이틀 변경
      title = $('.g_list li').eq(n-1).find('span').text()
      $('.modal h3').text(title)
    })

    //모달창 닫기
    $('.modal .c_btn').click(function(){
      $('.modal').fadeOut()
    })

    return false
  })


})