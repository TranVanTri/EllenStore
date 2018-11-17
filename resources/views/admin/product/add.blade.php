@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
            <form action="admin/product/add" method="POST" id="formProduct">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" type="text" name="name" placeholder="Nhập tên sản phẩm" required maxlength="100" minlength="3" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm (VNĐ)</label>
                        <input class="form-control" type="number" maxlength="10" minlength="4" name="price" value="{{ old('price', 0) }}"/>
                    </div>
                    <div class="form-group">
                        <label>Giảm giá (VNĐ)</label>
                        <input class="form-control" type="number" maxlength="10" name="sale" value="{{ old('price', 0) }}"/>
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <label class="checkbox-inline" style="margin-left: 5px">
                            <input name="size[]" value="S" checked type="checkbox">S
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="M" type="checkbox">M
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="L" type="checkbox">L
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="XL" type="checkbox">XL
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="XXL" type="checkbox">XXL
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Màu</label>
                        <input class="form-control" type="text" name="color" placeholder="Trắng, Xanh..." required maxlength="5" value="{{ old('color') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input class="form-control" type="text" name="describe" placeholder="Nhập mô tả cho sản phẩm" required maxlength="100" minlength="80" value="{{ old('describe') }}"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="idCategoryProduct">
                        @foreach($danhmuc as $dm)    
                        	<option value="{{$dm->id}}">{{$dm->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1" checked type="radio">Còn hàng
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" type="radio">Hết hàng
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm nổi bật</label>
                        <label class="radio-inline">
                            <input name="highLight" value="1" checked type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="highLight" value="0" type="radio">Không
                        </label>
                    </div>                    
                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea class="form-control" rows="3" required name="detail" id="detail">{{ old('detail') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning" disabled="disabled" id="submit">Thêm sản phẩm</button>
                    <button type="reset" class="btn btn-default">Reset</button>                
                </div>
                <div class="col-lg-5" style="padding-bottom:120px">
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <div class="input-group">
                            <input id="ckfinder-input-avatar" type="text" class="form-control" placeholder="Chọn hình ảnh" required maxlength="190" name="avatar">
                            <div class="input-group-btn">
                              <button id="ckfinder-popup-avatar" class="btn btn-warning" type="button">Browse Server</button>
                            </div>
                        </div>
                    </div>
                    <div id="group-img">
                        <div class="form-group">
                            <label>Các ảnh khác</label>
                            <div class="input-group">
                                <input id="ckfinder-input-1" type="text" class="form-control" placeholder="Chọn hình ảnh"  maxlength="190"  name="otherimg[]">
                                <div class="input-group-btn">
                                  <button class="btn btn-primary ckfinder-popup" type="button">Browse Server</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="them-anh" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm ảnh</button>
                    <button type="button" id="xoa-anh" class="btn btn-warning"><i class="fa fa-minus"></i> Xóa ảnh</button>
                </div>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
