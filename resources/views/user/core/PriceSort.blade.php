<ul>
	<li>
		<label>
			<a href="{{Route('allproduct')}}">
				{{-- <input type="radio" name="gia"> --}}
				<span>Tất cả</span>
			</a>			
		</label>
	</li>
	<li>
		<label>
			<a href="{{Route('allkhuyenmai')}}">
				{{-- <input type="radio" name="gia"> --}}
				<span>Khuyến mãi</span>
			</a>			
		</label>
	</li>
	<li>
		<label>
			<a href="{{route('pricesort',['name' => 'smaller'])}}">
				{{-- <input type="radio" name="gia"> --}}
				<span>Nhỏ hơn 200,000<span class="don-vi-tien">đ</span></span>
			</a>			
		</label>
	</li>	
	<li>
		<label>
			<a href="{{route('pricesort',['name' => 'both'])}}">
				{{-- <input type="radio" name="gia"> --}}
				<span>Từ 200,000<span class="don-vi-tien">đ</span> -> 300,000<span class="don-vi-tien">đ</span></span>
			</a>			
		</label>
	</li>
	<li>
		<label>
			<a href="{{route('pricesort',['name' => 'bigger'])}}">
				{{-- <input type="radio" name="gia"> --}}
				<span>Lớn hơn 300,000<span class="don-vi-tien">đ</span></span>
			</a>			
		</label>
	</li>				
</ul>