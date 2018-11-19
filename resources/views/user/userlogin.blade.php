<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ellen</title>
	<base href="{{asset('')}}" >
	<link rel="stylesheet" href="asset/css/reset.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="asset/css/animate.css">
	<link rel="stylesheet" href="asset/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="asset/fancybox-2.1.7/source/jquery.fancybox.css">
	<link rel="stylesheet" href="asset/css/myCss.css">
	<link rel="stylesheet" href="asset/css/media.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<!-- Menutop -->
	<div class="menu-top">		
		<nav class="navbar-top">
			<div class="container">
				<button class="user-icon"><i class="fa fa-user" aria-hidden="true"></i></button>
				<a href="" class="logo"><img src="asset/images/logo.png" alt=""></a>
				<div class="content-navbar">
					<ul class="menu-group-category">
						<li>
							<a href="">Áo</a>
							<ul class="sub-menu">
								<li><a href="">Áo thun</a></li>
								<li><a href="">Áo khoác</a></li>
							</ul>
						</li>
						<li>
							<a href="">Quần</a>
							<ul class="sub-menu">
								<li><a href="">Quần short</a></li>
								<li><a href="">Quần què</a></li>
							</ul>
						</li>
						<li>
							<a href="">Váy</a>
							<ul class="sub-menu">
								<li><a href="">Váy Xòe</a></li>
								<li><a href="">Váy suông</a></li>
							</ul>
						</li>
						<li><a href="">Phụ kiện</a></li>
					</ul>
					<button class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
					<ul class="login">
						<li><a href="">Đăng nhập</a></li>
						<li><a href="">Tạo tài khoản</a></li>
					</ul>
				</div>
			</div>					
		</nav>
		<nav class="navbar-top-mobile">	
			<div class="container">				
				<div class="content-navbar">
					<ul class="menu-group-category text-center">
						<li><a href="">Áo thun</a></li>
						<li><a href="">Áo khoác</a></li>
						<li><a href="">Áo sơ mi</a></li>
						<li><a href="">Quần short</a></li>
						<li><a href="">Quần què</a></li>
						<li><a href="">Quần jean</a></li>
						<li><a href="">Váy Xòe</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Váy suông</a></li>
						<li><a href="">Phụ kiện</a></li>
					</ul>	 					
				</div>	
			</div>				
		</nav>			
	</div>
	<!-- 			End menutop -->

	<div class="nen-xam"></div>

	<div class="toggle-login">
		<ul>
			<li class="active"><a href="" class="logo"><img src="asset/images/logo.png" alt=""></a></li>
			<li><a href="" class="btn btn-primary btn-login">Đăng nhập</a></li>
			<li><a href="" class="btn btn-info btn-register">Tạo tài khoản</a></li>
		</ul>	
	</div>
	<div class="cart">
		<div class="cart-heading">
			<div class="cart-close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<h4 class="cart-title">Giỏ hàng<span>(0 sản phẩm)</span></h4>
		</div>
		<div class="cart-body">
			<div>
				<div class="cart-product">
					<div class="cart-product-img">
						<a href=""><img src="asset/images/anh_sp/aosomi/100665_body_06.jpg" alt=""></a>
					</div>
					<div class="cart-info">
						<div class="row">
							<div class="cart-name col-lg-12 col-md-12 col-sm-12">
								<a href="">Áo Thun Cổ Tròn Tay Lỡ Hai Cô Gái</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<label class="cart-quantity">Số lượng:</label>
								<select class="cart-select form-control">
									<option>1</option>
								</select>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 text-right">
								<div class="cart-price">
									<span class="cart-retail-price">422.000₫</span>
									<span class="cart-sale-price">222.000₫</span>
								</div>
								<a href="" class="remove-product">Bỏ sản phẩm</a>
							</div>
						</div>
					</div>
				</div>
				<div class="cart-product">
					<div class="cart-product-img">
						<a href=""><img src="asset/images/anh_sp/aosomi/100665_body_06.jpg" alt=""></a>
					</div>
					<div class="cart-info">
						<div class="row">
							<div class="cart-name col-lg-12 col-md-12 col-sm-12">
								<a href="">Áo Thun Cổ Tròn Tay Lỡ Hai Cô Gái</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<label class="cart-quantity">Số lượng:</label>
								<select class="cart-select form-control">
									<option>1</option>
								</select>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 text-right">
								<div class="cart-price">
									<span class="cart-retail-price">422.000₫</span>
									<span class="cart-sale-price">222.000₫</span>
								</div>
								<a href="" class="remove-product">Bỏ sản phẩm</a>
							</div>
						</div>
					</div>
				</div>
				<div class="cart-product">
					<div class="cart-product-img">
						<a href=""><img src="asset/images/anh_sp/aosomi/100665_body_06.jpg" alt=""></a>
					</div>
					<div class="cart-info">
						<div class="row">
							<div class="cart-name col-lg-12 col-md-12 col-sm-12">
								<a href="">Áo Thun Cổ Tròn Tay Lỡ Hai Cô Gái</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<label class="cart-quantity">Số lượng:</label>
								<select class="cart-select form-control">
									<option>1</option>
								</select>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 text-right">
								<div class="cart-price">
									<span class="cart-retail-price">422.000₫</span>
									<span class="cart-sale-price">222.000₫</span>
								</div>
								<a href="" class="remove-product">Bỏ sản phẩm</a>
							</div>
						</div>
					</div>
				</div>
				<div class="cart-product">
					<div class="cart-product-img">
						<a href=""><img src="asset/images/anh_sp/aosomi/100665_body_06.jpg" alt=""></a>
					</div>
					<div class="cart-info">
						<div class="row">
							<div class="cart-name col-lg-12 col-md-12 col-sm-12">
								<a href="">Áo Thun Cổ Tròn Tay Lỡ Hai Cô Gái</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<label class="cart-quantity">Số lượng:</label>
								<select class="cart-select form-control">
									<option>1</option>
								</select>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 text-right">
								<div class="cart-price">
									<span class="cart-retail-price">422.000₫</span>
									<span class="cart-sale-price">222.000₫</span>
								</div>
								<a href="" class="remove-product">Bỏ sản phẩm</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div>
				<div class="row cart-sub-total">
					<div class="my-col-6">Thành tiền:</div>
					<div class="my-col-6 text-right">10.307.000₫</div>
				</div>
				<div class="row">
					<div class="my-col-6">Bạn đã được giảm:</div>
					<div class="my-col-6 text-right">1.307.000₫</div>
				</div>
			</div>
			<button class="cart-btn">Tiến hành đặt hàng</button>

			<!-- <div class="cart-empty">
				<div class="cart-empty-icon">
					<img src="asset/images/empty-bag.jpg" alt="">
				</div>
				<div>Giỏ hàng của bạn trống</div>
				<div>
					<button class="cart-shopping">Tiếp tục mua sắm</button>
				</div>
			</div> -->
			
		</div>		
	</div>
<!-- endMenutop -->
<div class="clearfix"></div>

<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8 auth-signin">
				<h3 class="signin-title text-center">Đăng nhập</h3>
				<div class="container">
					<div class="signin-content">
						<div>
							<a href="" class="btn-fb-signin"><i class="fa fa-facebook" aria-hidden="true"></i> Đăng nhập bằng facebook</a>
						</div>
						<div class="phan-cach">
							<hr>
							<span class="phan-cach-text">Hoặc</span>
						</div>

						@if(count($errors) > 0)
		                <div class="alert alert-danger">
		                    @foreach($errors->all() as $err)
		                        {{$err}}<br>
		                    @endforeach
		                </div>
		                @endif
		                @if(session('thongbao'))
		                <div class="alert alert-success">{{session('thongbao')}}</div>
		                @endif
						<form role="form" action="login" method="POST">
							 {!! csrf_field() !!}
							<div class="form-group">
							    <label for="email">Địa chỉ email</label>
							    <input type="email" class="form-control" id="email" name="email" autofocus> 				
							 </div>
							 <div class="form-group">
							    <label for="password">Mật khẩu</label>
							    <input type="password" class="form-control" id="password" name="password"> 				
							 </div>
							 <div class="forgot-password">
							 	<a href="">Bạn quên mật khẩu?</a>
							 </div>
							 <button type="submit" class="signin-form-btn">Đăng nhập</button>
						</form>
						<div class="signin-create-account">
							Bạn chưa có tài khoản
							<a href="">Tạo tài khoản mới</a>
						</div>
					</div>
				</div>
				
			</div>
		</div> 		
	</div>
</section><!-- END CONTENT -->
	<div class="clearfix"></div>
	<footer class="footer">
		<div class="container-fluid">
			<div class="container">
				<div class="content-footer row">
					<div class="thong-tin-footer col-lg-5 col-md-5 col-sm-5">
						<div class="row">
							<div class="logo-footer"><img src="asset/images/logo.png" alt=""></div>
						</div>
						<div class="row">
							<ul>
								<li><i class="fa fa-home" aria-hidden="true"></i>Địa chỉ:<a href="#">&nbsp;135/13A, đường số 14, Tăng Nhơn Phú b, Q.9</a></li>
								<li><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;Số điện thoại:<a href="#">&nbsp;(+84)1659548682</a></li>
								<li><i class="fa fa-envelope-o" aria-hidden="true"></i>Email:<a href="#">&nbsp;suport.email</a></li>
							</ul>
						</div>
						<div class="row">
							<div class="social">
								<ul>
									<li>
										<a href="">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											<i class="fa fa-facebook" aria-hidden="true"></i>				
										</a>
									</li>
									<li>
										<a href="">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											<i class="fa fa-instagram" aria-hidden="true"></i>	
										</a>
									</li>
									<li>
										<a href="">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											<i class="fa fa-google-plus" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>

					</div>
					<div class="lien-ket-nhanh col-lg-3 col-md-3 col-sm-3">
						<div class="row">
							<h3 class="title-footer">liên kết nhanh</h3>
						</div>
						<div class="row">
							<ul>
								<li><a href="">Liên hệ</a></li>
								<li><a href="">Chính sách bảo mật</a></li>
								<li><a href="">Thanh toán giao nhận</a></li>
							</ul>
						</div>

					</div>
					<div class="dk-nhan-tin col-lg-4 col-md-4 col-sm-4">
						<div class="row">
							<h3 class="title-footer">đăng kí nhận tin</h3>
						</div>
						<div class="row">
							<div class="dk-nhan-tin-text">Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận được tất cả các tin tức mới nhất của Suplo về các sản phẩm mới, các chương trình khuyến mãi mới. Suplo xin đảm bảo sẽ không gửi mail rác, mail spam tới bạn.</div>
						</div>
						<div class="row">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Nhập email của bạn...">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>					
					</div>

				</div>
				<div class="copy-right row">
					<div class="copy-right-text col-lg-6 col-md-6 col-sm-6">Copyrights © 2018 by <a href="#">TvT</a></div>
					<div class="ho-tro col-lg-6 col-md-6 col-sm-6">
						<ul>
							<li><a href="#">Giới thiệu</a></li>
							<li><a href="#">Hỗ trợ</a></li>
						</ul>
					</div>						
				</div>		
			</div>
		</div>
	</footer>
	<div class="back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</div>
	<div class="search">
		<div class="icon-search-toggle icon-search-animate"><i class="fa fa-search" aria-hidden="true"></i></div>	
		<div class="search-box">
			<input type="text" placeholder="Nhập tên sản phẩm">
		</div>
		<div class="icon-search"><i class="fa fa-search" aria-hidden="true"></i></div>
	</div>

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>	
	<script type="text/javascript" src="asset/js/popper.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="asset/js/myJs.js"></script>
	<script type="text/javascript" src="asset/fancybox-2.1.7/lib/jquery.mousewheel.pack.js"></script>
	<script type="text/javascript" src="asset/fancybox-2.1.7/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="asset/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<!-- FB -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>