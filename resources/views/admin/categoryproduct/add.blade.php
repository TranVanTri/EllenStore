@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm
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
            <form action="admin/categoryproduct/add" method="POST" id="formCategoryProduct">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên nhóm sản phẩm</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên nhóm sản phẩm bạn muốn thêm" required minlength="3" maxlength="100" value="{{ old('Ten') }}" />
                    </div>
                    <div class="form-group">
                        <label>Nhóm danh mục</label>
                        <select class="form-control" name="NhomDanhMuc">
                            <!-- lấy danh sách các nhóm danh mục -->
                            @foreach($cateGroup as $child)
                            <option value="{{$child->id}}">{{$child->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning" disabled id="submit">Thêm</button>
                    <button type="reset" class="btn btn-default">Hủy</button>                
                </div>
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
