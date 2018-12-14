@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm đơn hàng
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(count($errors) >0)
                       <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                             {{$err}}<br/>
                          @endforeach
                       </div>
                    @endif

                    @if(session('thongbao'))
                       <div class="alert alert-success">
                           {{session('thongbao')}}
                       </div>
                    @endif
                    @if(session('loi'))
                       <div class="alert alert-danger">
                           {{session('loi')}}
                       </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/bill/them" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            
                            <div class="form-group">
                                <label>Khách hàng</label>
                                <select class="form-control" name="khachhang">
                                    @foreach($customer as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tổng tiền</label>
                                <input class="form-control" name="tongtien" placeholder="Nhập tổng tiền đơn hàng" />
                            </div>
                            <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <br/>
                                <input type="radio" checked="" name="hinhthuc" value="ATM">ATM
                                <input type="radio" name="hinhthuc" value="COD">COD
                                <input type="radio" name="hinhthuc" value="Khác">Khác
                            </div>
                            
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea id="demo" placeholder="Nhập ghi chú cho khách hàng" name="ghichu" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <br/>
                                <input type="radio" name="trangthai" value="2">Đã giao
                                <input type="radio" checked="" name="trangthai" value="0">Chưa giao
                                <input type="radio" name="trangthai" value="1">Chưa giao hết
                                
                            </div>
                           
                           
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection


