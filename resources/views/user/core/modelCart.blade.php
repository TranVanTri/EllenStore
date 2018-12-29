<div class="cart">
	<div class="cart-heading">
		<div class="cart-close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<h4 class="cart-title">Giỏ hàng<span>(0 sản phẩm)</span></h4>
	</div>
	<div class="cart-body">
		<div>
			@if(isset($content))

			@foreach($content as $child)			
			<div class="cart-product">
				<div class="cart-product-img">
					<a href=""><img src="{{$child->options->has('avatar')?$child->options->avatar:''}}" alt=""></a>
				</div>
				<div class="cart-info">
					<div class="row">
						<div class="cart-name col-lg-12 col-md-12 col-sm-12">
							<a href="">{{$child->name}}</a>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<label class="cart-quantity">Số lượng:</label>
							<input type="number" name="" value="{{$child->qty}}" class="form-control">
							<label class=""><strong>Size:</strong> {{$child->options->has('size')? $child->options->size : ''}}</label>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 text-right">
							<div class="cart-price">
								<span class="cart-retail-price">422.000₫</span>
								<span class="cart-sale-price">{{$child->price}}</span>
							</div>
							<a href="" class="remove-product">Bỏ sản phẩm</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@endif
		</div>
		<hr>
		<div>
			@if(isset($content))
			<div class="row cart-sub-total">
				<div class="my-col-6">Thành tiền:</div>
				<div class="my-col-6 text-right">
					
					{{Cart::total()}}
					
				</div>
			</div>
			@endif
			<div class="row">
				@if(isset($content))
				<div class="my-col-6">Bạn đã được giảm:</div>
				<div class="my-col-6 text-right">1.307.000₫</div>
				@else

				@endif
			</div>
		</div>
		@if(isset($content))
		<button class="cart-btn">Tiến hành đặt hàng</button>
		@endif
		@if(!isset($content))
		<div class="cart-empty">
			<div class="cart-empty-icon">
				<img src="asset/images/empty-bag.jpg" alt="">
			</div>
			<div>Giỏ hàng của bạn trống</div>
			<div>
				<a class="cart-shopping" href="">Tiếp tục mua sắm</a>

			</div>
		</div>
		@endif


	</div>		
</div>