@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh sách</small>
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
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>                        
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($slides as $child)
                    <tr class="odd gradeX" align="center">
                        <td>{{$child->id}}</td>
                        <td>{{$child->title}}</td>
                        <td>{{$child->des}}</td>
                        <td>
                            <a target="_blank" href="{{$child->image}}">
                              <img class="img-avatar" src="{{$child->image}}" alt="Forest">
                            </a>  
                        </td>                       
                        <td>{{$child->created_at}}</td>
                        <td>{{$child->updated_at}}</td>                      
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
@endsection