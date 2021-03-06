@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
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
            <form action="admin/slide/edit/{{$slide->id}}" method="POST" id="formSlide">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" type="text" name="tieude" placeholder="Nhập tiêu đề" minlength="6" required maxlength="100" value="{{ $slide->title }}" />
                    </div>
                    <div class="form-group">
                        <label>Liên kết</label>
                        <input class="form-control" type="text" required maxlength="100" minlength="6" name="link" placeholder="Nhập liên kết" value="{{ $slide->link }}" />
                    </div>  
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1"
                            @if($slide->enable == 1)
                             checked
                             @endif
                             type="radio">Hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" 
                            @if($slide->enable == 0)
                             checked
                             @endif
                            type="radio">Khóa
                        </label>
                    </div>  
                    <div class="form-group">
                        <label>Chọn ảnh</label>                        
                       <input id="ckfinder-input-pro" type="hidden" placeholder="Chọn hình ảnh" required maxlength="190" name="image" value="{{$slide->image}}">
                        <div><img id="img-pro" src="{{$slide->image}}"  alt="" class="img-edit img-fluid"></div>
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
