@extends('user.layout.index')
@section('content')

	<div class="banner owl-carousel">
		<a href=""><img class="img-fluid" src="asset/images/thoi-trang-chic-land-khuyen-mai-giam-gia-30-tbsp.jpg" alt=""></a>
		<a href=""><img class="img-fluid" src="asset/images/thoi-trang-chic-land-khuyen-mai-giam-gia-30-tbsp.jpg" alt=""></a>
		
	</div>

	<div class="clearfix"></div>

	<section class="content">
		<div class="container">
			<div class="top-shadow"></div>
			@if(count($promotion))
			<div class="section-title-wrap">
				<h2 class="section-title">Ưu đãi dành cho bạn</h2>
			</div>
			<div class="row">
				@foreach($promotion as $prom)
				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="{{$prom->image}}" alt="" class="sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">{{$prom->name}} - Giảm Đến {{$prom->per_decr}}%</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i style="margin-right:unset;" class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<?php
									$date1 = date("Y-m-d H:i:s",strtotime($prom->end_date_sale));
									$date2 = date("Y-m-d H:i:s");
									$ngay = tru2Ngay($date1,$date2, 'd');
									$gio = tru2Ngay($date1,$date2, 'H');
									$phut = tru2Ngay($date1,$date2, 'i');
									?>
									<span class="end-time-timer">{{$ngay}} ngày {{$gio}} giờ {{$phut}} phút</span>
								</span>
							</div>
						</div>
					</div>
				</a>
				@endforeach				
			</div>
			@endif

			<div class="section-title-wrap display">
				<h2 class="section-title">Bán chạy nhất trong ngày</h2>
			</div>

			<div class="sp-lien-quan row owl-carousel">					
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>	
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>		
			</div>	
			<div class="section-title-wrap display">
				<h2 class="section-title">nổi bật trong tuần</h2>
			</div>

			<div class="sp-lien-quan row owl-carousel">					
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>	
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="#"><img class="card-img-top" src="asset/images/anhsp.jpg" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Áo trắng thanh lịch</h5>	
							<strike class="giam-gia card-link">399.000<span class="don-vi-tien">đ</span></strike>
							<span href="#" class="gia card-link">299.000<span class="don-vi-tien">đ</span></span>
						</div>													
					</div>
				</div>		
			</div>	
			
			<div class="section-title-wrap display">
				<h2 class="section-title">Vẫn đang diễn ra</h2>
			</div>
			
			<div class="row">
				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="asset/images/5bd2c3e6dc46179e78dccdf3.jpg" alt="" class="sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">Giảm Đến 64% - Mande Thời Trang Nữ</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<span class="end-time-timer">7 ngày</span>
								</span>
							</div>
						</div>
					</div>
				</a>

				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="asset/images/5bcff930b510720001868042.jpg" alt="" class="sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">Giảm Đến 64% - Mande Thời Trang Nữ</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<span class="end-time-timer">7 ngày</span>
								</span>
							</div>
						</div>
					</div>
				</a>
				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="asset/images/5bcea2de7176290001132489.png" alt="" class="sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">Giảm Đến 56% - Aigle Áo Khoác Nữ</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<span class="end-time-timer">7 ngày</span>
								</span>
							</div>
						</div>
					</div>
				</a>
				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="asset/images/5bcdc0839eaacb000149929d.jpg" alt="" class="img-fluid sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">Giảm Đến 64% - Mande Thời Trang Nữ</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<span class="end-time-timer">7 ngày</span>
								</span>
							</div>
						</div>
					</div>
				</a>
				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="asset/images/5bc7082fcf27440001f70b5e.jpg" alt="" class="img-fluid sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">Giảm Đến 60% - Hity Thời Trang Nữ</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<span class="end-time-timer">7 ngày</span>
								</span>
							</div>
						</div>
					</div>
				</a>
				<a href="" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="asset/images/5bc94d41dc04600001c4c0f6.jpg" alt="" class="img-fluid sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">Candie's, La Chapelle, Ulife Style</div>
							<div class="sale-card-endTimeWrap">
								<span class="sale-card-endTimeContent">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span class="end-time-text">Còn</span>
									<span class="end-time-timer">7 ngày</span>
								</span>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section><!-- END CONTENT -->

@endsection