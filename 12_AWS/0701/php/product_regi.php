<?php 
	include('./php/db_conn.php');

	$userID = $_SESSION['userID'];
	$userName = $_SESSION['userName'];
	$userLevel = $_SESSION['userLevel'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="악기, 기타, 어쿠스틱, 일렉, 베이스">
<meta name="author" content="기타 악기">
<title>기타네트 - 상품 등록 페이지</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/sub.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
									if($userLevel != '10'){
										echo "<script>alert('잘못된 접근입니다.');</script>";
										echo "<script>location.replace('index.php');</script>;";
								} else{ ?>
								<li><a href="./php/order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
								<li><a href="./php/cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
								<li><a href="./php/logout.php"><i class="fa fa-user"></i>로그아웃</a></li>
								<li><a href="mypage.php"><i class="fa fa-lock"></i><?php echo $userName; ?>님의 페이지</a></li>
								<?php if($userLevel=='10'){?>
									<li><a href="./php/product_regi"><i class="fa fa-user"></i>상품등록</a></li>
								<?php }}?>
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
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<main>
		<section class="product_input">
			<h2>상품 등록</h2>
			<form name="product_data" method="post" action="./php/product_input.php">
				<p>
					<label for="s_category">대분류</label>
					<select id="s_category" name="s_category">
						<option value="">선택하세요.</option>
						<option value="일렉기타">일렉기타</option>
						<option value="베이스">베이스</option>
						<option value="어쿠스틱">어쿠스틱</option>
						<option value="앰프">앰프</option>
						<option value="이펙터">이펙터</option>
						<option value="액세서리">액세서리</option>
						<option value="드럼">드럼</option>
						<option value="개인결제">개인결제</option>
					</select>
				</p>
				<p>
					<label for="s_subCategory">중분류</label>
					<select id="elec_guitar" name="s_subCategory">
						<option value="">선택하세요.</option>
						<option value="70TH ANNIVERSARY">70TH ANNIVERSARY</option>
						<option value="Fender Custom Shop">Fender Custom Shop</option>
						<option value="Fender USA">Fender USA</option>
						<option value="Fender Mexico">Fender Mexico</option>
						<option value="Fender Japan">Fender Japan</option>
						<option value="Squire">Squire</option>
						<option value="Ibanez">Ibanez</option>
						<option value="Music Man">Music Man</option>
						<option value="Sterling by Music Man">Sterling by Music Man</option>
						<option value="Harmony">Harmony</option>
						<option value="Heritage">Heritage</option>
					</select>
				</p>
				<p>
					<label for="s_img">사진 등록</label>
					<input type="file" name="s_img" id="s_img">
				</p>
				<p>
					<label for="s_name">상품명</label>
					<input type="text" name="s_name" id="s_name">
				</p>
				<p>
					<label for="s_parent">간략한 설명</label>
					<input type="text" name="s_parent" id="s_parent">
				</p>
				<p>
					<label for="s_price">가격</label>
					<input type="number" name="s_price" id="s_price">
				</p>
				<p>
					<label for="s_comment">상세 설명</label>
					<input type="text" name="s_comment" id="s_comment">
				</p>
				<p>
					<label for="s_memo">메모</label>
					<input type="text" name="s_memo" id="s_memo">
				</p>
				<p>
					<input type="submit" value="상품 등록" class="active_btn">
				</p>
			</form>
		</section>
	</main>


	<footer class="text-center">
		<address >copyright&copy;2023 shoppingmall allrightes resverved.</address>
	</footer>

</body>
</html>