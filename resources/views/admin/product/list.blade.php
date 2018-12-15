@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Danh sách</small>
                    <small><a href="admin/product/add" class="btn btn-success btn-them"><i class="fa fa-plus"></i> Thêm sản phẩm</a></small>
                </h1>
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                @if(session('loi')) 
                <div class="alert alert-danger">{{session('loi')}}</div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover table-list" id="dataTables-example">
                <thead>
                    <tr align="center" style="font-size: 12px">
                        <th>MãSP</th>
                        <th>TênSP</th>
                        <th>Giá (VNĐ)</th>  
                        <th>Tên KM</th>  
                        <th>KM (%)</th>  
                        <th>Size</th>                   
                        <th>SL</th>
                        <th>Ảnh mẫu</th>
                        <th>Trạng thái</th>
                        <th>Nổi bật</th>                        
                        <th>Danh mục</th>                        
                        <th>Lịch sử</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($product as $pro)
                    <tr class="odd gradeX" align="center" style="font-size: 12px">
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        <td>{{$pro->price}} </td>
                        <td>{{$pro->promotion->name}} </td>
                        <td style="color: red;">
                            @if($pro->promotion->enable == 1)
                                {{$pro->promotion->per_decr}} 
                            @else
                                0
                            @endif
                        </td>
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
                        @if($pro->enable == 1)
                            <td style="color: blue">Đang bán</td>
                        @else
                            <td style="color: red">Ngừng bán</td>
                        @endif                        
                        <td>
                            @if($pro->highLight == 1)
                                Có
                            @else
                                Không
                            @endif
                        </td>                      
                        <td>{{$pro->category_product->name}}</td>
                        
                        <td><button class="view-history-pro btn btn-info" data="{{$pro->id}}" data-toggle="modal" data-target="#myModal">Xem</button></td>                      
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pro->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pro->id}}">Edit</a></td>
                    </tr> 
                    @endforeach                  
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog my-modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lịch sử cập nhật</h4>
        </div>
        <div class="modal-body">
            <h3 id="loadding" class="text-center"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Loadding...</h3>
            <h3 id="error" class="text-center"><i style="color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Có sự cố xảy ra. </h3>
            <table class="table table-striped table-bordered table-hover table-list" id="dataTables-history">
                <thead>
                    <tr align="center" style="font-size: 12px">
                        <th>Mã QT viên</th>
                        <th>Tên QT viên</th>
                        <th>Điện thoại</th>
                        <th>Thao tác</th>
                        <th>TênSP</th>
                        <th>Giá (VNĐ)</th>
                        <th>Tên KM</th>  
                        <th>KM (%)</th>                     
                        <th>Size</th>                     
                        <th>SL</th>
                        <th>Ảnh mẫu</th>
                        <th>Trạng thái</th>
                        <th>Nổi bật</th>                
                        <th>Danh mục</th>
                        <th>Ngày</th>
                    </tr>
                </thead>
                <tbody id="proHistory">                    
                </tbody>
            </table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@endsection