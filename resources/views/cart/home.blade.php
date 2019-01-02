@extends('user.layout.index')
@section('content')

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
														{{-- <data id="orderlist" orderlist="{{Cart::content()}}"></data> --}}
														
														@foreach($content as $child)
														<tr>
															<th scope="row">{{$child->name}}</th>
															<td><img class="hinhAnhSanPham hinhanhxXx" src="{{$child->options->has('avatar')? 
																$child->options->avatar : ''}}" alt="Hình ảnh sản phẩm"  ></td>
																<td>{{ number_format($child->price, 0) }}</td>
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
																<td >{{Cart::count()}}</td>
																<td>Tổng tiền:</td>
																<td>{{ Cart::total() }}VND</td>	
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
										<div class="col-lg-12">
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
										</div>
										<div class="contact-form">
											<form action="{{ route('cart.store') }}" id="formOrder">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<div class="form-group">
													<input type="text" name="name" id="name" class="form-control" placeholder="Tên người nhận"
													value="{{ ($user->name ?? '') }}" required/>		
												</div>
												<div class="form-group">
													<input type="text" name="email" id="email" class="form-control" placeholder="email"
													value="{{ ($user->email ?? '') }}" required/>		
												</div>
												<div class="form-group">		
													<input type="text" class="form-control" placeholder="Số điện thoại"  id="phone" name="phone" 
													value="{{ ($user->phone ?? '') }}" required />							
												</div>
												<div class="form-group">		
													<input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" id="address" name="address" value="{{ ($user->address ?? '') }}" required />
												</div>
												<div class="form-group">		
													<textarea class="form-control" id="note" placeholder="Ghi chú" name="note"></textarea>
												</div>
												<div class="hinh-thuc-thanh-toan">		
													<label><span>(*)</span>Hình thức thanh toán:&nbsp;</label>
													<span>Thanh toán sau khi nhận hàng.</span>
												</div>

												<!-- <a href="{{ route('cart.store') }}" > -->
													<button type="submit" class="btn btn-block" 
													{{ Cart::count()>0 ? '' : 'disabled' }}>Mua ngay</button>
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
		</div>
	</section><!-- END CONTENT -->

	@endsection
