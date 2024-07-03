<?php
	include('./db/db_conn.php');
	if(isset($_SESSION['mb_id'])){
		$userid = $_SESSION['mb_id'];
		$username = $_SESSION['mb_name'];
	}else{
		$userid = '';
		$username = '';
	}
?>
<!DOCTYPE html>
<html lang="ko">
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
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/swiper.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
		<script src="./js/jquery.js"></script>
		<script src="./js/price-range.js"></script>
		<script src="./js/jquery.scrollUp.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/jquery.prettyPhoto.js"></script>
		<script src="./js/main.js"></script>
	</head><!--/head-->
	<body>
		<header id="header"><!--header-->
			<div class="header-middle"><!--header-middle-->
				<div class="container">
					<div class="row">
						<div class="col-md-4 clearfix">
							<h1 class="logo pull-left">
								<a href="index.php"><img src="./images/logo.png" alt="상단로고" width="220" /></a>
							</h1>
						</div>
						<div class="col-md-8 clearfix">
							<div class="shop-menu clearfix pull-right">
								<ul class="nav navbar-nav">
									<?php
									if(!$userid) {
									?>
										<li><a href="order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
										<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
										<li><a href="login.php"><i class="fa fa-user"></i>로그인</a></li>
										<li><a href="sign.php"><i class="fa fa-lock"></i>회원가입</a></li>
									<?php
									} else {
									?>
										<li><a href="#"><i class="fa fa-lock"></i>
										<?php echo $username; echo '('. $userid; echo ')'; ?>님 환영합니다.</a></li>
										<li><a href="order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
										<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
										<li><a href="./php/logout.php"><i class="fa fa-user"></i>로그아웃</a></li>
									<?php } ?>
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

		<!-- https://petto.kr/ -->
		<article class="col-xl-12">
			메인슬라이드
		</article>
		
		<section>
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

					<div class="col-sm-9 padding-right">
						<div class="features_items"> <!-- 제품 목록-->
							<h2 class="title text-center">Features Items</h2>

							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										상품1
									</div>
								</div>
							</div>
						</div><!--features_items-->
					</div>
				</div>
			</div>
		</section>
		
		<footer class="text-center">
			<address>copyright&copy;2023 shoppingmall allrightes resverved.</address>
		</footer>
	</body>
</html>