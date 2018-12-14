@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa đơn hàng
                            <small>Sửa</small>
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
                        <form action="admin/bill/sua/{{$bill->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            
                            <div class="form-group">
                                <label>Khách hàng</label>
                                <select class="form-control" name="khachhang">
                                    @foreach($customer as $c)
                                    <option
                                    @if($c->id == $bill->id_customer)
                                    {{'selected=""'}}
                                    @endif
                                     value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tổng tiền</label>
                                <input class="form-control" disabled="" value="{{$bill->total}}" name="tongtien" placeholder="Nhập tổng tiền đơn hàng" />
                            </div>
                            <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <br/>
                                <input type="radio" name="hinhthuc" value="ATM"
                                @if($bill->payment == 'ATM')
                                {{'checked=""'}}
                                @endif
                                >ATM
                                <input type="radio" name="hinhthuc" value="COD"
                                @if($bill->payment == 'COD')
                                {{'checked=""'}}
                                @endif
                                >COD
                                <input type="radio" name="hinhthuc" value="Khác"
                                @if($bill->payment == 'Khác')
                                {{'checked=""'}}
                                @endif
                                >Khác
                            </div>
                            
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea id="demo" placeholder="Nhập ghi chú cho khách hàng" name="ghichu" class="form-control ckeditor" rows="3">{{$bill->note}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <br/>
                                <input type="radio" name="trangthai" value="2"
                                @if($bill->status == 2)
                                {{'checked=""'}}
                                @endif
                                >Đã giao
                                <input type="radio" name="trangthai" value="0"
                                @if($bill->status == 0)
                                {{'checked=""'}}
                                @endif
                                >Chưa giao
                                <input type="radio" name="trangthai" value="1"
                                @if($bill->status == 1)
                                {{'checked=""'}}
                                @endif
                                >Chưa giao hết
                                
                            </div>
                           
                           
                            <button type="submit" class="btn btn-default">Sửa</button>
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


