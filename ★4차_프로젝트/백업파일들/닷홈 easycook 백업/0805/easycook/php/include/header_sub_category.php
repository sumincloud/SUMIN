
<style>

	/* ----------------상단 헤더------------ */
	header{
    position: fixed;
		width: 100%; height: 70px;
		background: var(--white);
		border-bottom: 1px solid var(--gray);
		top:0;
		z-index: 1000;
	}
	header > div{
    position: absolute;
		width: 100%; height: 40px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		top: 50%;
		transform: translateY(-50%);
    padding: 0 var(--p_20);
	}
  /* 1400px 이상일때 헤더크기 */
  @media (min-width: 1400px) {
    header > div{
      width: 1400px;
      left:50%;
      transform: translate(-50%, -50%);
    }
  }

  header > div h1{
    height: 100%;
  }
  header > div h1 > a{
    display: block;
  }
  header > div h1 > a img{
    width: 115px;
    height: 40px;
  }
  header > div div{
    width: 40px;
    text-align: center;
    cursor: pointer;
  }
  header > div div a{
    display: block;
  }
	header > div div i{
    line-height: 40px;
    font-size: 30px;
	}
  header > div div .bi-bell::before{
    transform: scale(0.8);
  }

  /* 선택박스 서식 */
  #select{
    width: 150px;
  }
  #category-select{
    border: none;
    width: 100%;
    font-size: var(--fs-large);
    font-weight: var(--fw-semi-bold);
    text-align: center;
    padding: 0;
    cursor: pointer;
  }
  #category-select option{
    font-size: var(--fs-medium-large);
  }
</style>
<header>
  <div>
    <div id="left">
      <i class="bi bi-chevron-left"></i>
    </div>

    <div id="select">
      <select id="category-select" class="form-select" onchange="if(this.value) location.href=(this.value);">
        <option value="./academy.php?category1=기능사">요리</option>
        <option value="./academy.php?category1=바리스타">바리스타</option>
        <option value="./academy.php?category1=베이커리">베이커리</option>
        <option value="./intro.php?cata=소개&tab=소개">소개</option>
        <option value="./community.php?comu=커뮤니티&tab=후기">커뮤니티</option>
      </select>
    </div>

    <div>
      <a href="#" title="알림">
        <i class="bi bi-bell"></i>
      </a>
    </div>
  </div>

</header>




<script>
  $(document).ready(function(){
    //이전 페이지로
    $('#left').click(function(){
      history.back();
    });

    // 페이지가 로드될 때 URL의 쿼리 파라미터를 분석하고 select 박스를 업데이트합니다.
    function updateSelectBox() {
      // 현재 URL에서 쿼리 파라미터를 가져옵니다.
      var urlParams = new URLSearchParams(window.location.search);
      var category = urlParams.get('category1') || urlParams.get('cata') || urlParams.get('comu');
      
      if (category) {
        // `category-select` 요소를 선택합니다.
        var $selectElement = $('#category-select');

        // 모든 옵션을 순회하여, 쿼리 파라미터와 일치하는 값을 가진 옵션을 선택합니다.
        $selectElement.find('option').each(function() {
          if ($(this).val().includes(category)) {
            $selectElement.val($(this).val());
            return false; // 일치하는 옵션을 찾으면 루프 종료
          }
        });
      }
    }

    // 페이지 로드 시 select 박스를 업데이트합니다.
    updateSelectBox();



    // ----------모든 <style> 태그를 찾아서 <head>로 이동---------
    $('style').each(function() {
      // <head>가 존재하는지 확인
      if ($('head').length) {
        // <style> 태그를 <head>로 이동
        $('head').append($(this));
      }
    });

    
    
  })
</script>
