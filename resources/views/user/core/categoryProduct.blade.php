<ul>
	@foreach($cateGroup as $groupChild)
		@if(count($groupChild->category_product) && count($groupChild->product))
			<li>
				<div class="dropdown-cate-pro">
					<i class="fa fa-minus-square-o" aria-hidden="true">
					<a href="#"></i>{{$groupChild->name}}</a>
				</div>
				
				<ul>
					@foreach($groupChild->category_product as $cateProductChild)
						@if(count($cateProductChild->product))		
							<li><a href="{{route('tatcasanpham', ['id' => $cateProductChild->id, 'name' => str_slug($cateProductChild->name)])}}"><span>-&nbsp;</span>{{$cateProductChild->name}}</a></li>
						@endif
					@endforeach
				</ul>
			</li>
		@endif
	@endforeach					
</ul>