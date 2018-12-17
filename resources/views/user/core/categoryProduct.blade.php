<ul>
	@foreach($cateGroup as $groupChild)
	<li>
		<div class="dropdown-cate-pro">
			<i class="fa fa-minus-square-o" aria-hidden="true">
			<a href="#"></i>{{$groupChild->name}}</a>
		</div>
		
		<ul>
			@foreach($cateProduct as $cateProductChild)
				@if($groupChild->id == $cateProductChild->idCategoryGroup)
					<li><a href="{{route('tatcasanpham', ['id' => $cateProductChild->id])}}"><span>-&nbsp;</span>{{$cateProductChild->name}}</a></li>
				@endif
			@endforeach
		</ul>
	</li>
	@endforeach					
</ul>