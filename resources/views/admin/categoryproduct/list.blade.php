@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm
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
                        <th>Tên Nhóm sản phẩm</th>
                        <th>Tên Nhóm danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($catePro as $child)
                    <tr class="odd gradeX" align="center">
                        <td>{{$child->id}}</td>
                        <td>{{$child->name}}</td>
                        <td>
                            @if($child->category_group)
                                {{$child->category_group->name}}
                            @else
                                {{"Chưa có hoặc danh mục này đã bị xóa."}}
                            @endif

                        </td>
                        <td>{{$child->created_at}}</td>
                        <td>{{$child->updated_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/categoryproduct/delete/{{$child->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/categoryproduct/edit/{{$child->id}}">Edit</a></td>
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