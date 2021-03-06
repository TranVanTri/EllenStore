@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Size
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <!-- thông báo errors -->
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                @endif

                <!-- thông báo thêm thành công -->
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                <!-- kết thúc thông báo thêm thành cong -->

            </div>
            <form action="admin/size/add" method="POST" id="formSize">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên size</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên size"  value="{{ old('Ten') }}" />
                    </div>
                    
                    <button type="submit" class="btn btn-warning"  id="submit">Thêm</button>
                                   
                </div>
                
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
