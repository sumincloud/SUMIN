
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
    width: 120px;
  }
  header > div h1 > a{
    display: block;
    height: 100%;
  }
  header > div h1 > a img{
    width: 100%;
    height: 100%;
    object-fit: cover;
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


</style>
<header>
  <div>
    <div id="left">
      <i class="bi bi-chevron-left"></i>
    </div>
    <h1>
      <a href="./index.php" title="메인페이지로 이동">
        <img src="./images/common/logo.png" alt="로고">
      </a>
    </h1>
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
