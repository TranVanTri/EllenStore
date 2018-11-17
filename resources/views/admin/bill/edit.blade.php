@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
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
            <form action="admin/bill/edit/{{$bill->id}}" method="POST" id="formBill">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" type="text" name="fullName" disabled required maxlength="100" minlength="3" value="{{$bill->user->fullName}}" />
                    </div>
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Nhập email"  maxlength="30" minlength="12" value="{{$bill->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại" required maxlength="11" value="{{$bill->phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" name="addRess" placeholder="Nhập địa chỉ" required maxlength="100" value=" {{$bill->addRess}}"/>
                    </div> 
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea class="form-control" rows="3" disabled>{{$bill->note}}</textarea>
                    </div>                     
                    
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="billStatus" value="1" type="radio" 
                            @if($bill->billStatus ==1)
                                checked 
                            @endif
                            >Đã thanh toán
                        </label>
                        <label class="radio-inline">
                            <input name="billStatus" value="0" type="radio"
                            @if($bill->billStatus ==0)
                                checked 
                            @endif
                            >Chưa thanh toán
                        </label>
                    </div>
                    <button type="submit" id="submit" disabled="disabled" class="btn btn-warning">Sửa hóa đơn</button>
                    <button type="reset" class="btn btn-default">Reset</button>                
                </div>
                <div class="col-lg-5" style="padding-bottom:120px">
                    <?php $dem = 1;?>
                    @foreach($billdetail as $bd)
                    <div class="form-group">
                        @if($dem == 1)
                        <label>Các sản phẩm</label>
                        @endif
                        <div class="input-group">
                            <input type="text" class="form-control" disabled required maxlength="90" 
                            value="{{$bd->product->name}}">
                            <div class="input-group-btn">
                              <button class="btn btn-default" type="button">{{$bd->quantity}}</button>
                            </div>
                        </div>
                    </div>
                    <?php $dem++;?>
                    @endforeach                 
                </div>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
