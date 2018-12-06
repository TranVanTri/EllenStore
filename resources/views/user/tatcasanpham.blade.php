<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ellen</title>
	<!-- chứa các thư viện css của trang -->
	@include('user.libraries.cssCode')
</head>
<body>
<!-- Menutop -->
	@include('user.core.menutop')

	<div class="nen-xam"></div>

	<!-- 2 nút sign in và sign up -->
	@include('user.core.loginUser')
	
	<!-- model hiển thị danh sách các sản phẩm trong giỏ hàng -->
	@include('user.core.modelCart')
	
<!-- endMenutop -->
<div class="clearfix"></div>



<section class="content">
	<div class="container">
		<div class="image-title row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<img class="card-img-top img-thumbnail" src="asset/images/anhquangcao/anhdepthoitrang.jpg" alt="Card image cap">
					<div class="card-body">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								@foreach($dirName as $ch)
									<li class="breadcrumb-item active" aria-current="page">{{$ch->name}}</li>

								@endforeach
								
							</ol>
						</nav>						
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						@include('user.core.menuleft')
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="all-pro">
									<div class="mot-danhmuc row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class= row">
												<div class="tieu-de-danhmuc col-lg-12 col-md-12 col-sm-12">
													<h1 class="text-left">
														<a href="" class="text-uppercase title-3">@foreach($dirName as $ch)
															{{$ch->name}}
														@endforeach</a>
													</h1>
												</div>	
											</div>

											
											<div class="row">
												@foreach($products as $child)
												<div class="motkhoi my-col-6-product col-lg-4 col-md-6 col-sm-6">
													<div class="card">
														<div class="zoom-img">
															<a href="{{route('chitietsanpham', ['id' => $child->id])}}"><img class="card-img-top" src="{{$child->avatar}}" alt="Card image cap"></a>
														</div>
														<div class="card-body">
															<h5 class="card-title">{{$child->name}}</h5>	
															<strike class="giam-gia card-link">{{$child->price}}<span class="don-vi-tien">đ</span></strike>
															<span href="#" class="gia card-link">{{$child->price}}<span class="don-vi-tien">đ</span></span>
														</div>
																				
													</div>
												</div>
												@endforeach
											</div>
											
											<div class="row justify-content-center text-center">
												<div class="btn-xem-them col-lg-2 col-md-2 col-sm-2">
													<a href="#" class="btn btn-primary">Xem thêm</a>	
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section><!-- END CONTENT -->
	<div class="clearfix"></div>
	@include('user.core.footer')
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

	@include('user/libraries/jsCode')

</body>
</html>