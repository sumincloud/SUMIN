//메뉴
$(document).ready(function(){
	//하위메뉴 안보이게 처리
	$('.sub').slideUp(0);

	$('.mNav > ul > li').hover(function(){
		//마우스 올렸을 때
		//서브메뉴가 아래로 나타나라
		$(this).find('.sub').slideDown('fast');
	},function(){
		//마우스 내렸을 때
		//서브메뉴가 위로 사라져라
		$(this).find('.sub').slideUp('fast');
	});
});


//메인이미지
$(document).ready(function(){
	//첫번째 이미지 보이게 처리
	var num = 0; /* 첫번째 li의 인덱스 번호 */
	$('#main li').eq(num).fadeIn();

	//2초마다 한개씩 이미지 이동
	setInterval(function(){
		//현재 보이는 이미지가 안보인 후 그 다음 이미지 보이게 처리
		$('#main li').eq(num).fadeOut();
		
		//마지막이미지가 보인 후 
		//첫번째 이미지가 보이게 처리하는 조건문
		if(num==2){
			num = 0;
			$('#main li').eq(num).fadeIn();
		}else{
			num++; //1씩 증가
			$('#main li').eq(num).fadeIn();
		}
	},3000);
});













