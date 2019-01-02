<div class="menu-top">		
		<nav class="navbar-top">
			<div class="container">
				<button class="user-icon"><i class="fa fa-user" aria-hidden="true"></i></button>
				<a href="" class="logo"><img src="asset/images/logo.png" alt=""></a>
				<div class="content-navbar">
					<ul class="menu-group-category">
						@foreach($cateGroup as $groupChild)
							@if(count($groupChild->category_product) && count($groupChild->product))
								<li>
									<a href="">{{$groupChild->name}}</a>
									<ul class="sub-menu">
										@foreach($groupChild->category_product as $cateProductChild)
											@if(count($cateProductChild->product))	
											<li><a href="{{route('tatcasanpham', ['id' => $cateProductChild->id, 'name' => str_slug($cateProductChild->name)])}}">{{$cateProductChild->name}}</a></li>
											@endif
										@endforeach
										
									</ul>
								</li>
							@endif
						@endforeach

					</ul>
					<button class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
					<ul class="login">
						
						@if(Auth::id())
							<li><a>{{Auth::user()->name}}</a></li>
							<li><a href="{{route('getUserLogout')}}">Đăng xuất</a></li>
						@else
							<li><a href="{{Route('loginUser')}}">Đăng nhập</a></li>
							<li><a href="{{route('userregister')}}">Tạo tài khoản</a></li>
						@endif
					</ul>
				</div>
			</div>					
		</nav>
		<nav class="navbar-top-mobile">	
			<div class="container">				
				<div class="content-navbar">
					<ul class="menu-group-category text-center">
						@foreach($cateProduct as $child)
							@if(count($child->product))
							<li><a href="{{route('tatcasanpham',['name' => str_slug($child->name) ,'id' => $child->id])}}">{{$child->name}}</a></li>
							@endif
						@endforeach
					</ul>	 					
				</div>	
			</div>				
		</nav>			
	</div>