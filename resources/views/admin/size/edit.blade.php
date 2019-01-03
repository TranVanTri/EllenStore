@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Size
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
            <form action="admin/size/edit/{{$size->id}}" method="POST" id="formSize">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">  
                    <div class="form-group">
                        <label>Tên size</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên size mới" required maxlength="3" minlength="1" value="{{$size->name}}" />
                    </div>  
                                   
                    <button type="submit"  id="submit" class="btn btn-warning">Sửa</button>
                                   
                </div>
                
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
