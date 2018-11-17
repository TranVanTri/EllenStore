@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
            <form action="admin/product/edit/{{$product->id}}" method="POST" id="formProduct">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" type="text" name="name" placeholder="Nhập tên sản phẩm" required maxlength="100" minlength="3" value="{{$product->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm (VNĐ)</label>
                        <input class="form-control" type="number" name="price" value="{{$product->price}}"/>
                    </div>
                    <div class="form-group">
                        <label>Giảm giá (VNĐ)</label>
                        <input class="form-control" type="number" name="sale" value="{{$product->sale}}"/>
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <?php 
                            $size = $product->size;
                            $size = json_decode($size);
                        ?>
                        <label class="checkbox-inline" style="margin-left: 5px">
                            <input name="size[]" value="S"
                            @if(is_array($size) && in_array('S', $size))
                                checked
                            @endif 
                             type="checkbox">S
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="M"
                            @if(is_array($size) && in_array('M', $size))
                                checked
                            @endif 
                             type="checkbox">M
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="L"
                            @if(is_array($size) && in_array('L', $size))
                                checked
                            @endif 
                             type="checkbox">L
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="XL"
                            @if(is_array($size) && in_array('XL', $size))
                                checked
                            @endif 
                             type="checkbox">XL
                        </label>
                        <label class="checkbox-inline">
                            <input name="size[]" value="XXL"
                            @if(is_array($size) && in_array('XXL', $size))
                                checked
                            @endif 
                             type="checkbox">XXL
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Màu</label>
                        <input class="form-control" type="text" name="color" placeholder="Trắng, Xanh..." required maxlength="5" value="{{$product->color}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input class="form-control" type="text" name="describe" placeholder="Nhập mô tả cho sản phẩm" required maxlength="100" minlength="80" value="{{$product->describe}}" />
                    </div>
                    
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="idCategoryProduct">
                        @foreach($danhmuc as $dm)    
                        	<option value="{{$dm->id}}"
                            @if($dm->id == $product->idCategoryProduct)
                                selected 
                            @endif
                            >{{$dm->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1" checked type="radio"
                            @if($product->enable ==1)
                                checked 
                            @endif
                            >Đang bán
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" type="radio"
                            @if($product->enable ==0)
                                checked 
                            @endif
                            >Ngừng bán
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm nổi bật</label>
                        <label class="radio-inline">
                            <input name="highLight" value="1" type="radio" 
                            @if($product->highLight ==1)
                                checked 
                            @endif
                            >Có
                        </label>
                        <label class="radio-inline">
                            <input name="highLight" value="0" type="radio"
                            @if($product->highLight ==0)
                                checked 
                            @endif
                            >Không
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea class="form-control" rows="3" required
                         name="detail" id="detail">{{$product->detail}}</textarea>
                    </div>
                    <button type="submit" id="submit" disabled="disabled" class="btn btn-warning">Sửa sản phẩm</button>
                    <button type="reset" class="btn btn-default">Reset</button>                
                </div>
                <div class="col-lg-5" style="padding-bottom:120px">
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <div class="input-group">
                            <input id="ckfinder-input-avatar" type="text" class="form-control" placeholder="Chọn hình ảnh" required maxlength="90" name="avatar" value="{{$product->avatar}}">
                            <div class="input-group-btn">
                              <button id="ckfinder-popup-avatar" class="btn btn-warning" type="button">Browse Server</button>
                            </div>
                        </div>
                    </div>
                    <div id="group-img">
                        @if(!empty($otherimg))
                        <?php $dem = 1;?>
                        @foreach($otherimg as $img)
                        <div class="form-group">
                            @if($dem== 1)
                            <label>Các ảnh khác</label>  
                            @endif                          
                            <div class="input-group">
                                <input id="ckfinder-input-{{$dem}}" type="text" class="form-control" placeholder="Chọn hình ảnh"  maxlength="180" required name="otherimg[]" 
                                value="{{$img}}">
                                <div class="input-group-btn">
                                  <button class="btn btn-primary ckfinder-popup" type="button">Browse Server</button>
                                </div>
                            </div>                            
                        </div>
                        <?php $dem++;?>
                        @endforeach
                        @else
                        <div class="form-group">
                            <label>Các ảnh khác</label>
                            <div class="input-group">
                                <input id="ckfinder-input-1" type="text" class="form-control" placeholder="Chọn hình ảnh"  maxlength="180" required name="otherimg[]">
                                <div class="input-group-btn">
                                  <button class="btn btn-primary ckfinder-popup" type="button">Browse Server</button>
                                </div>
                            </div>
                        </div>
                        @endif
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
