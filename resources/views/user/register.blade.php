@extends('user.layout.index')
@section('title')
<title>Đăng ký</title>
@endsection
@section('content')
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8 auth-signin">
				<h3 class="signin-title text-center">Đăng ký</h3>
				<div class="container">
					<div class="signin-content">
						<!-- <div>
							<a href="{{ url('auth/google') }}" class="btn-fb-signin">
							<img src="https://accounts.google.com/favicon.ico" alt=""> Đăng nhập bằng Google</a>
						</div> -->
						<!-- <div class="phan-cach">
							<hr>
							<span class="phan-cach-text">Hoặc</span>
						</div> -->

						@if(count($errors) > 0)
		                <div class="alert alert-danger">
		                    @foreach($errors->all() as $err)
		                        {{$err}}<br>
		                    @endforeach
		                </div>
		                @endif
		                @if(session('loi'))
		                <div class="alert alert-danger">{{session('loi')}}</div>
		                @endif


						<form role="form" action="register" method="POST" id="formRegister">
							 {!! csrf_field() !!}
							<div class="form-group">
							    <label for="name">Họ và tên</label>
							    <input type="text" class="form-control" id="name" name="name" autofocus> 				
							 </div>

							<div class="form-group">
							    <label for="email">Địa chỉ email</label>
							    <input type="email" class="form-control" id="email" name="email" autofocus> 				
							 </div>
							 <div class="form-group">
							    <label for="password">Mật khẩu</label>
							    <input type="password" class="form-control" minlength="6" maxlength="50" id="password" name="password"> 				
							 </div>
							 <div class="form-group">
							    <label for="password">Nhập lại mật khẩu</label>
							    <input type="password" class="form-control" id="repassword" name="repassword"> 				
							 </div>
							 <div class="form-group">
							    <label for="password">Số điện thoại của bạn</label>
							    <input type="text" class="form-control" maxlength="11" minlength="10" id="phone" name="phone"> 				
							 </div>
							 <div class="form-group">
							    <label for="password">Địa chỉ</label>
							    <input type="text" class="form-control" id="address" name="address"> 				
							 </div>
							 
							 <button type="submit" id="submit" class="signin-form-btn">Đăng ký</button>
						</form>
						<div class="register-policy">
							Bạn đồng ý với
							<a href="#">điều khoản sử dụng</a>
							của Ellen
						</div>
						<div class="signin-create-account">
							Bạn đã có tài khoản?
							<a href="{{route('loginUser')}}">Đăng nhập</a>
						</div>
					</div>
				</div>
				
			</div>
		</div> 		
	</div>
</section><!-- END CONTENT -->
@endsection