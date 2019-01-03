@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản admin
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
            <form action="admin/edit/{{$admin->id}}" method="POST" id="formAdmin">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên" required maxlength="50" minlength="2" value="{{$admin->name}}" />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" readonly="" required maxlength="30" minlength="2" value="{{$admin->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" name="DiaChi" placeholder="Nhập địa chỉ" maxlength="100" minlength="3" value="{{$admin->address}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" name="SoDT" placeholder="Nhập số điện thoại" maxlength="11" minlength="6" value="{{$admin->phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Đổi mật khẩu</label>
                        <label class="radio-inline">
                            <input type="checkbox" id="changepass" name="changepass">                    
                        </label>
                    </div>
                    <div id="groupPassword"></div>                     
                    


                    <button type="submit" id="submit"  class="btn btn-warning">Sửa</button>
                                   
                </div>
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
