@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh sách</small>
                    <small><a href="admin/slide/add" class="btn btn-success btn-them"><i class="fa fa-plus"></i> Thêm slide</a></small>
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
                    <tr align="center">
                        <th>Mã ID</th>
                        <th>Tiêu để</th>
                        <th>Liên kết</th>
                        <th>Hình ảnh</th>                        
                        <th>Trạng thái</th>
                        <th>Líc sử cập nhật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($slides as $child)
                    <tr class="odd gradeX" align="center">
                        <td>{{$child->id}}</td>
                        <td>{{$child->title}}</td>
                        @if($child->enable == 1)
                            <td><a href="{{$child->link}}" target="_blank">{{$child->link}} <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                        @else
                            <td>{{$child->link}}</td>
                        @endif                        
                        <td>
                            <a target="_blank" href="{{$child->image}}">
                              <img class="img-avatar" src="{{$child->image}}"> <i class="fa fa-external-link" aria-hidden="true"></i>
                            </a>  
                        </td>                       
                        @if($child->enable == 1)
                            <td style="color: blue">Đang hoạt động...</td>
                        @else
                            <td style="color: red">Ngừng hoạt động</td>
                        @endif
                        <td><button class="view-history-slide btn btn-info" data="{{$child->id}}" data-toggle="modal" data-target="#myModal">Xem</button></td>                 
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$child->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$child->id}}">Edit</a></td>
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
                    <tr align="center">
                        <th>Mã QT viên</th>
                        <th>Tên QT viên</th>
                        <th>Điện thoại</th>
                        <th>Thao tác</th>
                        <th>Tiêu đề</th>
                        <th>Liên kết</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Ngày</th>
                    </tr>
                </thead>
                <tbody id="slideHistory">                    
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