<div class="col-lg-12 col-md-12 col-sm-12">
	<div class="row">
		<div class="tieu-de-danhmuc col-lg-12 col-md-12 col-sm-12">
			<h1 class="text-center">
				<a  class="text-uppercase title-1 wow fadeInUp">sản phẩm cửa hàng khuyến nghị</a>
			</h1>
		</div>	
	</div>
	@if(isset($randomProducts))
	
	<div class="sp-lien-quan row owl-carousel">	

		@foreach($randomProducts as $child)				
			<div class="motkhoi col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						
						<div class="zoom-img">
							<a href="{{route('chitietsanpham',['name' => str_slug($child->name) ,'id' => $child->id])}}">
								<img class="card-img-top" src="{{$child->avatar}}" alt="{{$child->name}}">
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">{{$child->name}}</h5>
							@if($child->promotion->per_decr != 0)
							<strike class="giam-gia card-link">
								{{ number_format($child->price, 0) }}
								<span class="don-vi-tien">đ</span>
							</strike>

							<span href="#" class="gia card-link">{{number_format($child->price - ceil(($child->price*$child->promotion->per_decr)/100), 0)}}
							<span class="don-vi-tien">đ</span></span>

							@else
								<span href="#" class="gia card-link">{{$child->price}}
								<span class="don-vi-tien">đ</span></span>
							@endif
							
						</div>	
																	
					</div>
			</div>	
		@endforeach	
	</div>	
	
	@else
		<!-- Hiện chưa có sản phẩm gần đây -->
	@endif		
</div>