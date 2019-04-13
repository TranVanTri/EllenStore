@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm
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
            <form action="admin/categoryproduct/edit/{{$catePro->id}}" method="POST" id="formCategoryProduct">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên nhóm sản phẩm mới" required maxlength="100" minlength="3" value="{{$catePro->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Nhóm danh mục</label>
                         <select class="form-control" name="NhomDanhMuc">
                            @foreach($cateGroup as $child)
                                <option 
                                    @if($catePro->idCategoryGroup == $child->id)
                                    {{"selected"}}
                                    @endif
                                value="{{$child->id}}">{{$child->name}}</option>
                            @endforeach
                        </select>
                    </div>                   
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1"
                            @if($catePro->enable == 1)
                             checked
                             @endif
                             type="radio">Hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" 
                            @if($catePro->enable == 0)
                             checked
                             @endif
                            type="radio">Khóa
                        </label>
                    </div>   
                    
                    <div class="form-group">
                        <label>Ảnh</label>                        
                        <input id="ckfinder-input-pro" type="hidden" placeholder="Chọn hình ảnh" required maxlength="190" name="image" value="{{$catePro->image}}">
                        <div><img id="img-pro" src="{{$catePro->image}}"  alt="" class="img-edit img-fluid"></div>
                        <div class="input-group-btn">
                          <button id="ckfinder-popup-pro" data-input="ckfinder-input-pro" data-preview="img-pro" class="btn btn-info" type="button">Chọn ảnh</button>
                        </div>         
                    </div>

                    <button type="submit" id="submit"  class="btn btn-warning">Sửa</button>
                                  
                </div>
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
