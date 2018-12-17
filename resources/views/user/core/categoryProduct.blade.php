<ul>
	@foreach($cateGroup as $groupChild)
	<li>
		<i class="fa fa-minus-square-o" aria-hidden="true">
		<a class="dropdown-cate-pro" href="#"></i>{{$groupChild->name}}</a>
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