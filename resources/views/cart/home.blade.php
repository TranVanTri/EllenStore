<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Giỏ hàng của bạn</title>
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
									<li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
								</ol>
							</nav>						
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="gio-hang">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h3 class="gio-hang-title">Giỏ hàng</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
			<!-- <div class="empty">
				<div class="empty-content">Bạn chưa mua sản phẩm nào</br>Tiếp tục mua hàng <a href="">tại đây</a>
				</div>
			</div> -->	
			<div class="gio-hang-content">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
					<!-- <div class="col-lg-12 col-md-12 col-sm-6"> -->	
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<!-- bắt đầu phần giỏ hàng -->
								<div class="gio-hang-info">
									<div class="table-responsive">
										<table class="table table-bordered">
											<!-- bảng hiển thị danh sách các sản phẩm mà người dùng mua nè -->
											<thead>
												<tr>
													<th scope="col">Tên sản phẩm</th>
													<th scope="col">Hình ảnh</th>
													<th scope="col">Đơn giá</th>
													<th scope="col">Số lượng</th>
													<th scope="col">Size</th>
													<th scope="col">Thành tiền</th>
													<th scope="col">Xóa</th>
												</tr>
											</thead>
											<tbody>
												
											
													<!-- <input name="_token" type="hidden" 
													value="{!! csrf_token() !!}" > -->
													@if(isset($content))
														@foreach($content as $child)
														<tr>
															<th scope="row">{{$child->name}}</th>
															<td><img class="hinhAnhSanPham" src="{{$child->options->has('avatar')? 
																$child->options->avatar : ''}}" alt="" ></td>
															<td>{{$child->price}}</td>
															<td >
																<input type="text" style=" text-align: right;" name="qty"  value="{{$child->qty}}" class="form-control qty"
																disabled />
																
															</td>


															<td>{{$child->options->has('size')? $child->options->size : 'U'}}</td>
															<th>{{$child->price * $child->qty}}</th>
															<th>
																<a href="{!! url('xoa-san-pham',['id'=>$child->rowId]) !!}">Xóa</a>
															</th>
														</tr>
														@endforeach
													@endif
												
												<tr>
													<td>Tổng số lượng:</td>
													<td>{{Cart::count()}}</td>
													<td>Tổng tiền:</td>
													<td>{!! Cart::total() !!}VND</td>	
												</tr>

												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
					<!-- <div class="col-lg-12 col-md-12 col-sm-6"> -->
						<h3 class="order-title">Thông tin người mua/nhận hàng</h3>
						<div class="contact-form">
							<form action="{{ route('cart.store') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Tên người nhận"
										value="{{ ($user->name ?? '') }}" required/>		
									</div>
									<div class="form-group">		
										<input type="text" class="form-control" placeholder="Số điện thoại"  name="phone" 
										value="{{ ($user->phone ?? '') }}" required />							
									</div>
									<div class="form-group">		
										<input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" name="address" value="{{ ($user->address ?? '') }}" required />
									</div>
									<div class="form-group">		
										<textarea class="form-control" placeholder="Ghi chú" name="note"></textarea>
									</div>
									<div class="hinh-thuc-thanh-toan">		
										<label><span>(*)</span>Hình thức thanh toán:&nbsp;</label>
										<span>Thanh toán sau khi nhận hàng.</span>
									</div>

									<!-- <a href="{{ route('cart.store') }}" > -->
										<button type="submit" class="btn btn-block" 
										{{ Cart::count()>0 ? '' : 'disabled="disabled"' }}>Mua ngay</button>
									<!-- </a> -->
								
							</form>
						</div>
					</div> <!-- end div thông tin liên hệ -->
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
	
	@include('user.core.backToTop')

	@include('user.core.inputSearch')

	@include('user.libraries.jsCode')

</body>
</html>