@extends('user.layout.index')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')

	<div class="banner owl-carousel">
		@foreach($slide as $child)
		<a href=""><img class="img-fluid" src="{{$child->image}}" alt=""></a>
		@endforeach
	</div>

	<div class="clearfix"></div>

	<section class="content">
		<div class="container">
			<div class="top-shadow"></div>
			@if(count($promotion))
			<div class="section-title-wrap">
				<h2 class="section-title">Ưu đãi dành cho bạn</h2>
			</div>
			<div class="promotion row owl-carousel">
				@foreach($promotion as $prom)
				<div class="col-lg-6 col-md-6 col-sm-6 mot-khuyen-mai">
					<a href="{{route('khuyenmai', ['id' => $prom->id, 'name' => str_slug($prom->name)])}}" >
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
										<span class="end-time-timer">{{$ngay}} ngày {{$gio}}h:{{$phut}}m</span>
									</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach				
			</div>
			@endif

			@if(count($productBuyMany))
			<div class="section-title-wrap display">
				<h2 class="section-title">Sản phẩm bán chạy nhất</h2>
			</div>

			<div class="sp-lien-quan row owl-carousel">	
				@foreach($productBuyMany as $pro)				
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="{{route('chitietsanpham',['name' => str_slug($pro->name) ,'id' => $pro->id])}}"><img class="card-img-top" src="{{$pro->avatar}}" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">{{$pro->name}}</h5>	
							@if($pro->promotion->per_decr != 0)
							<strike class="giam-gia card-link">
								{{number_format($pro->price, 0)}}								
								<span class="don-vi-tien">đ</span></strike>							
							<span href="#" class="gia card-link">{{number_format($pro->price - ceil(($pro->price*$pro->promotion->per_decr)/100), 0)}}<span class="don-vi-tien">đ</span></span>
							@else
								<span href="#" class="gia card-link">{{number_format($pro->price , 0)}}<span class="don-vi-tien">đ</span></span>
							@endif
						</div>													
					</div>
				</div>	
				@endforeach		
				
			</div>	
			@endif

			@if(count($prohighLight))
			<div class="section-title-wrap display">
				<h2 class="section-title">Sản phẩm nổi bật</h2>
			</div>

			<div class="sp-lien-quan row owl-carousel">	
				@foreach($prohighLight as $pro)				
				<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<div class="zoom-img">
							<a href="{{route('chitietsanpham',['name' => str_slug($pro->name) ,'id' => $pro->id])}}"><img class="card-img-top" src="{{$pro->avatar}}" alt="Card image cap"></a>
						</div>
						<div class="card-body">
							<h5 class="card-title">{{$pro->name}}</h5>	
							@if($pro->promotion->per_decr != 0)
							<strike class="giam-gia card-link">
								{{number_format($pro->price, 0)}}								
								<span class="don-vi-tien">đ</span></strike>							
							<span href="#" class="gia card-link">{{number_format($pro->price - ceil(($pro->price*$pro->promotion->per_decr)/100), 0)}}<span class="don-vi-tien">đ</span></span>
							@else
								<span href="#" class="gia card-link">{{number_format($pro->price , 0)}}<span class="don-vi-tien">đ</span></span>
							@endif
						</div>													
					</div>
				</div>	
				@endforeach		
				
			</div>	
			@endif
			
			@if(count($cateProduct))
			<div class="section-title-wrap display">
				<h2 class="section-title">Các danh mục sản phẩm</h2>
			</div>
			
			<div class="row">
				@foreach($cateProduct as $child)
				@if(count($child->product))
				<a href="{{route('tatcasanpham', ['id' => $child->id, 'name' => str_slug($child->name)])}}" class="col-lg-6 col-md-6 col-sm-6">
					<div class="sale-cart-currentSale">
						<div class="sale-cart-img-wrap">
							<img src="{{$child->image}}" alt="" class="sale-cart-img">
						</div>
						<div class="sale-cart-currentSaleInfo">
							<div class="sale-cart-currentSaleTitle">{{$child->name}}</div>							
						</div>
					</div>
				</a>
				@endif
				@endforeach
			</div>
			@endif
		</div>
	</section><!-- END CONTENT -->
	<style type="text/css">
		

		
	</style>
	<div class="icon-chatbox icon-chatbox-animate">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
	</div>
	<div class="chatbox">
		
		<div class="khung-chatbox">
			<div class="header-chatbox">
				<div class="ten-shop"><h6>Ellen Store</h6></div>
				<div class="close-chatbox">
					<i class="fa fa-times" aria-hidden="true"></i>
				</div>
			</div>
			<div class="box-chat-chatbox scroll">
				<div class="text-left-tr">Nhà tao có chó</div>
				<div class="text-right-tr">Nhà m nuôi mèo mà?</div>
				<div class="text-left-tr">Nhà tao có chó</div>
				<div class="text-right-tr">Nhà m nuôi mèo mà?</div>
				<div class="text-left-tr">Nhà tao có chó</div>
				<div class="text-left-tr">Nhà tao có chó? làm đéo j có mèo</div>
				<div class="text-right-tr">Nhà m nuôi mèo mà? Nhà m nuôi mèo mà?
				Nhà m nuôi mèo mà?Nhà m nuôi mèo mà?Nhà m nuôi mèo mà?</div>
				<div class="text-left-tr">Nhà tao có chó</div>
				<div class="text-right-tr">Nhà m nuôi mèo mà?</div>
				<div class="text-left-tr">Nhà tao có chó</div>
				<div class="text-right-tr">Nhà m nuôi mèo mà?</div>
			</div>
			<div class="input-send">
				<input type="text" placeholder="Nhập tin nhắn" name="" class="input-text">			
			</div>
		</div>
	</div>
	
@endsection