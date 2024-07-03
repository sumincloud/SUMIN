//gallery.js

//변수 페이지번호, 좌우버튼
let n = 1;
let img_n = document.querySelectorAll('.list_photo > li');
let l_btn = document.querySelectorAll('.fa-angle-left');
let r_btn = document.querySelectorAll('.fa-angle-right');


document.getElementById('img_num').innerHTML=n+'/17';

//썸네일 이미지 목록 태그 클릭시 해당 인덱스 번호를 구하여
for(let i=0;i<img_n.length;i++){
  img_n[i].addEventListener('click', function(){
    /* console.log(i+1); */ //선택한 목록의 i값 출력 1~17
    n = i+1;

    imgChange(n); //함수한테 토스
  })
}

//이미지 변경하기 위한 함수로 넘기기

/* 사용자 정의함수 imgChange()
  1. 숫자변경
  2. 이미지 변경
*/

function imgChange(){
  console.log(n);

  for(let j=0;j<img_n.length;j++){
    img_n[j].style.border='none';
    img_n[j].style.box_sizing='border-box';
  }
  img_n[n-1].style.border='3px solid red';

  document.getElementById('img_num').innerHTML=n+'/17';
  document.getElementById('main').src='./images01/movie_image'+n+'.jpg';
}

//forEach함수는 배열에서만 사용가능한 메서드이다.
/* 
  문법
  객체.forEach((매개변수,index)){
    각각 실행할 함수 내용을 적는다.
  }
*/
//좌우버튼 클릭시 n값을 imgChange함수에 넘기기
l_btn.forEach((el)=>{
  el.addEventListener('click', function(){
    /* alert('왼쪽버튼클릭'); */
    if(n==1){
      n=17;
    }else{
      n--;
    }
    imgChange(n); //숫자를 함수에게 넘겨준다.
  })
})



r_btn.forEach((el)=>{
  el.addEventListener('click', function(){
    /* alert('오른쪽버튼클릭'); */
    if(n==17){
      n=1;
    }else{
      n++;
    }
    imgChange(n);
  })
})

