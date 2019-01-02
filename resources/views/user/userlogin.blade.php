@extends('user.layout.index')
@section('title')
<title>Đăng nhập</title>
@endsection
@section('content')
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8 auth-signin">
				<h3 class="signin-title text-center">Đăng nhập</h3>
				<div class="container">
					<div class="signin-content">
						<div>
							<a href="{{ url('auth/google') }}" class="btn-fb-signin">
							<img src="https://accounts.google.com/favicon.ico" alt=""> Đăng nhập bằng Google</a>
						</div>
						<div class="phan-cach">
							<hr>
							<span class="phan-cach-text">Hoặc</span>
						</div>

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
						<form  action="login" method="POST" id="formLogin">
							 {!! csrf_field() !!}
							<div class="form-group">
							    <label for="email">Địa chỉ email</label>
							    <input type="email" class="form-control" required id="email" value="{{old('email')}}" name="email" autofocus> 				
							 </div>
							 <div class="form-group">
							    <label for="password">Mật khẩu</label>
							    <input type="password" class="form-control" required id="password" name="password"> 				
							 </div>
							 <div class="forgot-password">
							 	<a href="">Bạn quên mật khẩu?</a>
							 </div>
							 <button type="submit" id="submit" class="signin-form-btn">Đăng nhập</button>
						</form>
						<div class="signin-create-account">
							Bạn chưa có tài khoản
							<a href="{{route('userregister')}}">Tạo tài khoản mới</a>
						</div>
					</div>
				</div>
				
			</div>
		</div> 		
	</div>
</section><!-- END CONTENT -->
@endsection