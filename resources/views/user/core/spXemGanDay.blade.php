<div class="col-lg-12 col-md-12 col-sm-12">
	<div class="row">
		<div class="tieu-de-danhmuc col-lg-12 col-md-12 col-sm-12">
			<h1 class="text-center">
				<a  class="text-uppercase title-1 wow fadeInUp">sản phẩm đã xem gần đây</a>
			</h1>
		</div>	
	</div>
	@if(isset($watchList))
	
	<div class="sp-lien-quan row owl-carousel">	

		@foreach($watchList as $child)				
			<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						
						<div class="zoom-img">
							<a href="{{route('chitietsanpham',['name' => str_slug($child->product->name) ,'id' => $child->product->id])}}">
								<img class="card-img-top" src="{{$child->product->avatar}}" alt="{{$child->product->name}}">
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">{{$child->product->name}}</h5>
							@if($child->product->promotion->per_decr != 0)
							<strike class="giam-gia card-link">
								{{ number_format($child->product->price, 0) }}
								<span class="don-vi-tien">đ</span>
							</strike>

							<span href="#" class="gia card-link">{{number_format($child->product->price - ceil(($child->product->price*$child->product->promotion->per_decr)/100), 0)}}
							<span class="don-vi-tien">đ</span></span>

							@else
								<span href="#" class="gia card-link">{{$child->product->price}}
								<span class="don-vi-tien">đ</span></span>
							@endif
							
						</div>	
																	
					</div>
			</div>	
		@endforeach	
	</div>	
	
	@else
		Hiện chưa có sản phẩm gần đây
	@endif		
</div>