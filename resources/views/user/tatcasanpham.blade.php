@extends('user.layout.index')
@section('title')
<title>Tất cả sản phẩm</title>
@endsection
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
								<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
								@if(isset($dirName) && is_object($dirName))
									@foreach($dirName as $ch)
									<li class="breadcrumb-item active" aria-current="page">{{$ch->name}}</li>
									@endforeach
								@else
									<li class="breadcrumb-item active" aria-current="page">{{$dirName}}</li>
								@endif
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
												<div class="tieu-de-danhmuc">
													<h1 class="text-left">
														<a class="text-uppercase title-3">
															@if(isset($dirName) && is_object($dirName))
															@foreach($dirName as $ch)
															{{$ch->name}}
															@endforeach</a>
															@else
															{{$dirName}}
															@endif
													</h1>
												</div>	
											</div>


											<div class="row">
												@if(isset($products))
												@foreach($products as $child)
												<div class="motkhoi my-col-6-product col-lg-4 col-md-6 col-sm-6">
													<div class="card">
														<div class="zoom-img">
															<a 
															href="{{route('chitietsanpham',['name' => str_slug($child->name) ,'id' => $child->id])}}"><img class="card-img-top" src="{{$child->avatar}}" alt="Card image cap"></a>
														</div>
														<div class="card-body">
															<h5 class="card-title">{{$child->name}}</h5>	
															@if($child->promotion->per_decr != 0)
															<strike class="giam-gia card-link">
																{{number_format($child->price, 0)}}					
																<span class="don-vi-tien">đ</span></strike>							
															<span href="#" class="gia card-link">{{number_format($child->price - ceil(($child->price*$child->promotion->per_decr)/100), 0)}}<span class="don-vi-tien">đ</span></span>
															@else
																<span href="#" class="gia card-link">{{number_format($child->price , 0)}}<span class="don-vi-tien">đ</span></span>
															@endif
														</div>

													</div>
												</div>
												@endforeach
												@else
												<div class="col-lg-6 col-md-6 col-sm-6">
													<span style="font-size: 18px; color: red;">Không có sản phẩm nào!</span>
												</div>
												
												@endif
											</div>


											<div class="row justify-content-center text-center">
												<div class="btn-xem-them col-lg-2 col-md-2 col-sm-2">
													{{ $products->links('vendor.pagination.bootstrap-4') }}
													{{-- <a href="#" class="btn btn-primary">Xem thêm</a>	 --}}
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

@endsection