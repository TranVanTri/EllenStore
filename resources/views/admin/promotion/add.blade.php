@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
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
            <form action="admin/promotion/add" method="POST" id="formPromosition">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên khuyến mãi</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Tên khuyến mãi" required minlength="3" maxlength="100" value="{{ old('Ten') }}" />
                    </div>
                    
                    <div class="form-group">
                        <label>Phần trăm giảm giá(%)</label>
                        <input class="form-control" type="number" maxlength="2" minlength="1" name="per_decr"  value="{{ old('sale', 0) }}"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Ngày bắt đầu khuyến mãi</label>
                        <input type='text' class="form-control" id='datetimepicker1' name="start_date_sale" />
                    </div>

                    <div class="form-group">
                        <label>Ngày kết thúc khuyến mãi</label>
                        <input type='text' class="form-control" id='datetimepicker2' name="end_date_sale" />
                    </div>
                    
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1" checked type="radio">Hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" type="radio">Khóa
                        </label>
                    </div>
                    {{-- <div class="form-group">
                        <label>Chọn sản phẩm khuyến mãi</label>
                        <input type="hidden" >
                        <div id="tag" style="margin-bottom: 5px;">
                            
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal">Chọn</button>
                        </div>
                    </div>
 --}}

                    <div class="form-group">
                        <label>Ảnh</label>                        
                        <input id="ckfinder-input-pro" type="hidden" placeholder="Chọn hình ảnh" required maxlength="190" name="image">
                        <div><img id="img-pro" src="upload\images\image-icon.png"  alt="" class="img-edit img-fluid"></div>
                        <div class="input-group-btn">
                          <button id="ckfinder-popup-pro" data-input="ckfinder-input-pro" data-preview="img-pro" class="btn btn-info" type="button">Chọn ảnh</button>
                        </div>                       
                    </div>
                    

                    <button type="submit" class="btn btn-warning"  id="submit">Thêm</button>
                                   
                </div>
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
{{-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog my-modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Danh sách sản phẩm</h4>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover table-list" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>MãSP</th>
                        <th>TênSP</th>
                        <th>Giá (VNĐ)</th>  
                        <th>Size</th>                   
                        <th>SL</th>
                        <th>Ảnh mẫu</th>
                        <th>Chọn</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach($product as $pro)
                    <tr class="odd gradeX" align="center">
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        <td>{{$pro->price}}</td>
                        <td>
                            @foreach($pro->sizes as $value)
                                {{$value->name}}
                            @endforeach
                        </td>
                        <td>{{$pro->quantity}}</td>
                        <td>
                            <a target="_blank" href="{{$pro->avatar}}">
                              <img class="img-avatar" src="{{$pro->avatar}}" alt="Forest"> <i class="fa fa-external-link" aria-hidden="true"></i>
                            </a>                            
                        </td>
                        <td>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="checkbox-sp check-sp-{{$pro->id}}" attrName="{{$pro->name}}" attrId="{{$pro->id}}">
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
