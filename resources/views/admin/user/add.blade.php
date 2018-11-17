@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                
            </div>
            <form action="admin/user/add" method="POST" id="formUser">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Họ và Tên</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên người dùng" required maxlength="100" minlength="3" value="{{ old('Ten') }}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" maxlength="50" required minlength="4" name="Email" placeholder="Nhập Email của bạn." value="{{ old('Email') }}" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input id="password" class="form-control" type="password" required minlength="6" maxlength="50" name="Password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control" type="password" required minlength="6" maxlength="50" name="PasswordAgain" placeholder="Nhập lại mật khẩu"/>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" name="DiaChi" placeholder="Nhập địa chỉ người dùng"  maxlength="100" minlength="3" value="{{ old('DiaChi') }}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" name="SoDT" placeholder="Nhập số điện thoại người dùng"  maxlength="11" minlength="6" value="{{ old('SoDT') }}" />
                    </div>                    

                    <button type="submit" id="submit" disabled class="btn btn-warning">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
