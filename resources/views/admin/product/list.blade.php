@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                        <th>MãSP</th>
                        <th>TênSP</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Kích thước</th>
                        <th>Màu</th>
                        <th>Ảnh mẫu</th>
                        <th>Trạng thái</th>
                        <th>Nổi bật</th>
                        <th>Danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($product as $pro)
                    <tr class="odd gradeX" align="center">
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        <td>{{$pro->price}} (VNĐ)</td>
                        <td>{{$pro->sale}} (VNĐ)</td>
                        <td>
                            <?php 
                                $size = $pro->size;
                                $dl='';
                                if($size === "Chưa nhập"){
                                    echo $size;
                                }else{
                                    $size = json_decode($size);
                                    foreach ($size as $value) {
                                        if($value === end($size)){
                                            $dl .=$value;
                                        }else{
                                            $dl .=$value.', ';
                                        }                                        
                                    }
                                    echo $dl; 
                                }                                
                            ?>
                        </td>
                        <td>{{$pro->color}}</td>
                        <td>
                        	<a target="_blank" href="{{$pro->avatar}}">
							  <img class="img-avatar" src="{{$pro->avatar}}" alt="Forest">
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
                        <td>{{$pro->created_at}}</td>
                        <td>{{$pro->updated_at}}</td>                      
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
@endsection