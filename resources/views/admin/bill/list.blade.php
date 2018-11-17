@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
                    <small>Danh sách</small>
                </h1>
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                @if(session('loixoa'))
                <div class="alert alert-danger">{{session('loixoa')}}</div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            
            <table class="table table-striped table-bordered table-hover table-list" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>MãBill</th>
                        <th>Khách hàng</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Các SP</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>                        
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($bills as $bill)
                    <tr class="odd gradeX" align="center">
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->user->fullName}}</td>
                        <td>{{$bill->email}}</td>
                        <td>{{$bill->phone}}</td>
                        <td>{{$bill->addRess}}</td>
                        <td><button data="{{$bill->id}}" class="viewDetail btn btn-primary" data-toggle="modal" data-target="#myModal">Xem</button></td>  
                        <td>@if($bill->billStatus == 1)
                                Đã thanh toán
                            @else
                                Chưa thanh toán
                            @endif
                        </td>                                          
                        <td>{{$bill->note}}</td>
                        <td>{{$bill->created_at}}</td>
                        <td>{{$bill->updated_at}}</td>                      
                        
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bill/edit/{{$bill->id}}">Edit</a></td>
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
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Các sản phẩm</h4>
        </div>
        <div class="modal-body" id="billDetail">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@endsection