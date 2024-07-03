<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="반려동물용품 쇼핑몰">
		<meta name="author" content="STORE BOM 쇼핑몰">
		<title>STORE BOM</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<style>
			label{font-weight:normal;}
		</style>

		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	</head><!--/head-->
	<body>
		<header id="header"><!--header-->
			<div class="header_top"><!--header_top-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="contactinfo">
								상단메뉴
							</div>
						</div>
					</div>
				</div>
			</div><!--/header_top-->

			<div class="header-middle"><!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-md-4 clearfix">
							<h1 class="logo pull-left">
									<a href="index.php"><img src="./images/logo.png" alt="상단로고" /></a>
							</h1>
						</div>
						<div class="col-md-8 clearfix">
							<div class="shop-menu clearfix pull-right">
								<ul class="nav navbar-nav">
									<li><a href="order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
									<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> 장바구니</a></li>
									<li><a href="login.php"><i class="fa fa-lock"></i> 로그인</a></li>
									<li><a href="sign.php"><i class="fa fa-lock"></i> 회원가입</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header-middle-->

			<div class="header-bottom"><!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="index.php">HOME</a></li>
									<li><a href="index.php">베스트상품</a></li>
									<li><a href="index.php">MD추천상품</a></li>
									<li><a href="index.php">10%할인쿠폰</a></li>
									<li><a href="index.php">구매후기</a></li>
									<li><a href="index.php">상품Q&A</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header-bottom-->
		</header><!--/header-->

		<main>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">
							<h2>Category</h2>
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
								<div class="panel panel-default">

								<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#cate01">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												함께하는 공간
											</a>
										</h4>
									</div>
									<div id="cate01" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li><a href="#">미끄럼방지매트</a></li>
												<li><a href="#">계단</a></li>
												<li><a href="#">하우스/침대</a></li>
												<li><a href="#">식기테이블</a></li>
												<li><a href="#">배변매트</a></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#cate02">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												함께하는 외출
											</a>
										</h4>
									</div>
									<div id="cate02" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li><a href="#">펫라이트</a></li>
												<li><a href="#">카시트</a></li>
												<li><a href="#">이동가방</a></li>
												<li><a href="#">하네스, 리드줄</a></li>
											</ul>
										</div>
									</div>
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#">함께하는 목욕</a></h4>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#">건강한 간식</a></h4>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#">Story</a></h4>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#">Community</a></h4>
									</div>
								</div>

							</div><!--/category-products-->

						
						</div>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--login form-->

					<form  name="member_form" id="member_form" method="post" action="./php/member_input.php" onsubmit="return form_check();">
						<h2>회원 가입</h2>
						<div class="form_id">
							<p>
								<label for="id">*아이디</label>
								<input type="text" name="id" id="id" style="width: 150px;" required>
								<span id="id_check_btn" data-check="0" class="btn btn-default" style="display: inline;">중복확인</span>
							</p>
							<p id="id_check"></p>
						</div>

						<div class="form">
							<label for="name">*이름</label>
								<input type="text" name="name" id="name" required>
						</div>

						<div class="form">
							<label for="pass">*비밀번호</label>
								<input type="password" name="pass" id="pass" required>                
						</div>

						<div class="form">
							<label for="pass2">*비밀번호 확인</label>
								<input type="password" name="pass2" id="pass2" required>	                 
						</div>

						<div class="form">
							<label for="email">*이메일</label>
								<input type="email" name="email" id="email" required>   
						</div>

						<div class="form">
							<label for="address">*주소</label>
								<input type="text" name="address" id="address" required>
						</div>

						<div class="form">
							<label id="phone">*전화번호</label>
							<input type="text" name="phone" id="phone">
						</div> 

						<button type="submit" class="btn btn-default" style="display: inline;" id="save_frm">가입하기</button>
					</form>
						</div>
					</div>						
				</div>
			</div>
		</main>
		
		<footer>
			<address>
				copyright&copy;2023 STORE BOM allright reserved.
			</address>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<script>
			let id_check_done = false;
		
			function form_check(){
				let pass = document.getElementById('pass');
				let pass2 = document.getElementById('pass2');
				let idCheck = document.getElementById('id_check');

				if(pass.value !== pass2.value){
					alert('비밀번호가 일치하지 않습니다.');
					return false;
				}
				if(id_check_done == false){
					alert('아이디 중복 체크는 필수입니다.');
					return false;
				}
				if(idCheck.innerHTML == '중복되는 아이디입니다.'){
					alert('아이디가 중복됩니다.');
					return false;
				}
				
			}

			$(document).ready(function(){
				$('#id_check_btn').on('click', function(){
					let self = $('#id');
					let shop_id;

					// id가 일치하면 (아이디 임력폼의 id값이 일치하면)
					if(self.attr("id") === "id"){
						shop_id = self.val();
					}
					$.post(
						"./php/id_check.php",
						{shop_id:shop_id},
						function(data){
							if(data){
								self.parent().parent().children('#id_check').html(data);
								self.parent().parent().find('#id_check').addClass('id_check');
							}
						}
					);
					return id_check_done = true;
				})
			})
		</script>
	</body>
</html>