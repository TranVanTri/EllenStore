<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}">
	@yield('title')

	@include('user.libraries.cssCode')
</head>
<body>

<!-- Menutop -->
	@include('user.core.menutop')
	<div class="nen-xam"></div>

	<!-- 2 nút sign in và sign up -->
	@include('user.core.loginUser')

	<!-- model hiển thị danh sách các sản phẩm trong giỏ hàng -->
	@include('user.core.modelCart')
	<!-- endMenutop -->
	<div class="clearfix"></div>

	@yield('content')

	<div class="clearfix"></div>
	@include('user.core.footer')
	
	@include('user.core.backToTop')

	@include('user.core.inputSearch')

	@include('user.libraries.jsCode')


</body>
</html>