<div class="search">
	<div class="icon-search-toggle icon-search-animate"><i class="fa fa-search" aria-hidden="true"></i></div>	

	<form action="{{ route('timsanpham')  }}">
		<div class="search-box">
			<input type="text" name="timsanpham" placeholder="Nhập tên sản phẩm">
		</div>

		<div class="icon-search">
			<button type="submit" style="background: #f37db8;
			    border: none;
			    color: #fff;"><i class="fa fa-search"  aria-hidden="true"></i>
			</button>

		</div>
	</form>
</div>