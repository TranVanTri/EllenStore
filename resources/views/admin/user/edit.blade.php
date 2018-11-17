@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                    <small>Chỉnh sửa</small>
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
            <form action="admin/user/edit/{{$user->id}}" method="POST" id="formUser">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên tài khoản" required maxlength="50" minlength="2" value="{{$user->fullName}}" />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" placeholder="Nhập email tài khoản" readonly="" required maxlength="30" minlength="2" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" name="DiaChi" placeholder="Nhập địa chỉ tài khoản" maxlength="100" minlength="3" value="{{$user->address}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" name="SoDT" placeholder="Nhập số điện thoại của tài khoản" maxlength="11" minlength="6" value="{{$user->phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Đổi mật khẩu</label>
                        <label class="radio-inline">
                            <input type="checkbox" id="changepass" name="changepass">                    
                        </label>
                    </div>
                    <div id="groupPassword"></div>                     
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input type="radio" name="enable" value="0" 
                            @if($user->enable == 0)
                                {{"checked"}}                     
                            @endif
                            > Khóa
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="enable" value="1"
                            @if($user->enable == 1)
                                {{"checked"}}                     
                            @endif >Hoạt động   
                        </label>
                    </div>


                    <button type="submit" id="submit" disabled class="btn btn-warning">Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>               
                </div>
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
